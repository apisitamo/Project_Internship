<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/headadmin.php';
include 'include/langid.php';
include('server.php');

?>

<?php
$db = mysqli_connect($servername, $username, $password, $dbname);

$itemsPerPage = 10;

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$offset = ($page - 1) * $itemsPerPage;

$query = "SELECT * FROM course_order
          ORDER BY CASE
            WHEN status = 'รอตรวจสอบ' THEN 0
            WHEN status = 'สำเร็จ' THEN 1
            WHEN status = 'ปฏิเสธ' THEN 2
            ELSE 3
          END, id DESC
          LIMIT $offset, $itemsPerPage";

$result = mysqli_query($db, $query);

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM course_order WHERE id = '$deleteId'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Successfully deleted'); window.location.href = 'course_order.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'course_order.php';</script>";
    }
}
?>

<style>
    .course-order .homeheader {
        margin-top: 75px;
    }

    .course-order #con-table {
        max-width: 1450px;
    }

    .course-order .bottom-box {
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
        background-color: #c0c0c0;
    }

    .course-order table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ccc;
    }

    .course-order th,
    .course-order td {
        border: 1px solid #ccc;
        padding: 12px 23px;
        text-align: center;
    }

    .course-order th {
        background-color: #f2f2f2;
        padding: 15px;
    }

    .course-order button {
        padding: 6px 20px;
        border-radius: 10px;
        border: none;
        margin-top: 5px;
    }

    .course-order .filter-buttons {
        margin: 0px 15px 15px 0px;
    }

    .course-order .filter-buttons button:nth-child(1) {
        background-color: aqua;
    }

    .course-order .filter-buttons button:nth-child(2) {
        background-color: yellow;
    }

    .course-order .filter-buttons button:nth-child(3) {
        background-color: #00e700;
    }

    .course-order .filter-buttons button:nth-child(4) {
        background-color: #ff1e1e;
    }

    .course-order .table_order .status-dropdown {
        border: none;
        background: yellow;
        padding: 0px 5px;
    }

    .course-order .table_order .status-dropdown option:nth-child(2) {
        background: #00e700;
    }

    .course-order .table_order .status-dropdown option:nth-child(3) {
        background: red;
    }

    .save-button,
    .save-note-button {
        display: none;
    }

    .deleteitem {
        padding: 5px 10px;
        margin-top: 5px;
        border: none;
        background: white;
    }

    .popup {
        display: none;
        z-index: 1000;
        width: 900px;
        height: 600px;
        padding: 20px;
        border-radius: 5px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        justify-content: center;
        background: #FFFAF5;
        border-radius: 10px;
    }


    .click-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
        z-index: 900;
    }

    .close-popup {
        position: absolute;
        top: -10px;
        right: 15px;
        cursor: pointer;
        font-size: 50px;
    }

    .popup-add button {
        padding: 6px;
        border-radius: 10px;
        border: none;
    }

    .popup-add #popup2 {
        width: 30%;
        height: 20%;
    }

    .popup-add #popup2 #confirm-delete-button {
        margin-right: 5px;
        background: #00e500;
    }

    .popup-add #popup2 #button-close2 {
        margin-left: 5px;
        background: red;
        padding: 6px 25px;
    }

    .popup-add #popup2 .popup-content .container {
        margin-top: 20px;
    }

    .edit-button,
    .edit-note-button {
        background-color: burlywood
    }

    .save-button,
    .save-note-button {
        background-color: #34DC32;
    }

    .cancle-button,
    .cancle-note-button {
        background-color: #ff1e1e;
    }
</style>

<style>
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 40px;
    }

    .pagination a,
    .pagination .current-page {
        margin: 0 5px;
        padding: 5px 10px;
        text-decoration: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f2f2f2;
        color: #333;
    }

    .pagination .current-page {
        background-color: #007bff;
        color: #fff;
    }
</style>

<body>
    <section class="course-order">
        <div class="click-overlay" id="click-overlay1"></div>
        <div class="homeheader">
            <h2 style="text-align: center;">
                <?= $course_order ?>
            </h2>
        </div>
        <div class="container" id="con-table">
            <div class="filter-buttons">
                <button data-status="All"><?= $all ?> (<span id="total-orders">0</span>)</button>
                <button data-status="รอตรวจสอบ"><?= $check ?> (<span id="pending-orders">0</span>)</button>
                <button data-status="สำเร็จ"><?= $complete ?> (<span id="completed-orders">0</span>)</button>
                <button data-status="ปฏิเสธ"><?= $reject ?> (<span id="rejected-orders">0</span>)</button>
            </div>
            <div class="table_order">
                <table>
                    <thead>
                        <tr>
                            <th><?= $order ?></th>
                            <th><?= $User ?></th>
                            <th><?= $types2 ?></th>
                            <th><?= $lists ?></th>
                            <th><?= $quantityy ?></th>
                            <th><?= $dayss ?></th>
                            <th><?= $pricess ?></th>
                            <th><?= $timess ?></th>
                            <th><?= $statuss ?></th>
                            <th><?= $notess ?></th>
                            <th><?= $deletion ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr data-status="<?php echo $row['status']; ?>">
                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['type']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['quantity']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['day']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['price']; ?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/y H:i', strtotime($row['order_time'])); ?>
                                    </td>
                                    <td>
                                        <select class="status-dropdown" data-row-id="<?php echo $row['id']; ?>" disabled>
                                            <option value="รอตรวจสอบ" <?php if ($row['status'] === 'รอตรวจสอบ')
                                                echo 'selected'; ?>><?= $check ?></option>
                                            <option value="สำเร็จ" <?php if ($row['status'] === 'สำเร็จ')
                                                echo 'selected'; ?>>
                                                <?= $complete ?></option>
                                            <option value="ปฏิเสธ" <?php if ($row['status'] === 'ปฏิเสธ')
                                                echo 'selected'; ?>>
                                                <?= $reject ?></option>
                                        </select>
                                        <button class="edit-button" data-row-id="<?php echo $row['id']; ?>"><?= $edit ?></button>
                                        <button class="save-button" data-row-id="<?php echo $row['id']; ?>"><?= $save ?></button>
                                        <button class="cancle-button" id="canclestatus" data-row-id="<?php echo $row['id']; ?>"
                                            style="display: none;"><?= $cancle ?></button>
                                    </td>
                                    <td>
                                        <input type="text" class="note-input" data-row-id="<?php echo $row['id']; ?>"
                                            value="<?php echo $row['note']; ?>" disabled>
                                        <button class="edit-note-button" data-row-id="<?php echo $row['id']; ?>"><?= $edit ?></button>
                                        <button class="save-note-button" data-row-id="<?php echo $row['id']; ?>"><?= $save ?></button>
                                        <button class="cancle-note-button" data-row-id="<?php echo $row['id']; ?>"
                                            style="display: none;"><?= $cancle ?></button>
                                    </td>
                                    <td>
                                        <button class="deleteitem" data-row-id="<?php echo $row['id']; ?>"><img src="assets/images/bin.png" alt=""></button>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "ไม่พบสินค้าในระบบ";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="pagination">
            <?php
            // หาจำนวนรายการทั้งหมดในฐานข้อมูล
            $totalItemsQuery = "SELECT COUNT(*) as total FROM course_order";
            $totalItemsResult = mysqli_query($db, $totalItemsQuery);
            $totalItemsRow = mysqli_fetch_assoc($totalItemsResult);
            $totalItems = $totalItemsRow['total'];

            // คำนวณจำนวนหน้าทั้งหมด
            $totalPages = ceil($totalItems / $itemsPerPage);

            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i === $page) {
                    echo "<span class='current-page'>$i</span>";
                } else {
                    echo "<a href='course_order.php?page=$i'>$i</a>";
                }
            }
            ?>
        </div>
    </section>

    <section class="popup-add">

        <div class="popup" id="popup2">
            <div class="popup-content">
                <span class="close-popup" id="close-popup2">&times;</span>
                <div class="container">
                    <p style="text-align: center;"><?= $wantdel ?></p>
                    <button class="button-close-2" id="confirm-delete-button"
                        href='course_order.php?delete_id=<?php echo $row['id']; ?>'><?= $confirm ?></button>
                    <button class="button-close-2" id="button-close2"><?= $cancle ?></button>
                </div>
            </div>
        </div>

    </section>

</body>

<script>
    // สถานะ

    const editButtons = document.querySelectorAll('.edit-button');
    const cancle = document.querySelectorAll('.cancle-button');
    cancle.forEach(button => {
        const rowId = button.getAttribute('data-row-id');
        button.addEventListener('click', function () {
            location.reload();
        });
    });


    editButtons.forEach(button => {
        const rowId = button.getAttribute('data-row-id');
        button.addEventListener('click', function () {
            const row = button.closest('tr');
            const statusDropdown = row.querySelector(`select[data-row-id="${rowId}"]`);
            const cancelButton = row.querySelector(`button.cancle-button[data-row-id="${rowId}"]`);
            statusDropdown.removeAttribute('disabled');
            button.style.display = 'none';
            cancelButton.style.display = 'inline';
            const saveButton = row.querySelector(`button.save-button[data-row-id="${rowId}"]`);
            saveButton.style.display = 'inline';
        });
    });

    const saveButtons = document.querySelectorAll('.save-button');

    saveButtons.forEach(button => {
        const rowId = button.getAttribute('data-row-id');
        button.addEventListener('click', async function () {
            const row = button.closest('tr');
            const statusDropdown = row.querySelector(`select[data-row-id="${rowId}"]`);
            const selectedStatus = statusDropdown.value;

            await updateStatusInDatabase(rowId, selectedStatus);
            location.reload();
            alert('บันทึกสถานะเรียบร้อยแล้ว');
        });
    });

    async function updateStatusInDatabase(rowId, selectedStatus) {
        const response = await fetch('course_order_update_status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `rowId=${encodeURIComponent(rowId)}&selectedStatus=${encodeURIComponent(selectedStatus)}`,
        });

        const result = await response.text();
        console.log('Status updated successfully:', result);
    }
</script>

<script>
    // หมายเหตุ

    const editNoteButtons = document.querySelectorAll('.table_order table tr .edit-note-button');
    const canclenote = document.querySelectorAll('.cancle-note-button');
    canclenote.forEach(button => {
        const rowId = button.getAttribute('data-row-id');
        button.addEventListener('click', function () {
            location.reload();
        });
    });

    editNoteButtons.forEach(button => {
        const rowId = button.getAttribute('data-row-id');
        button.addEventListener('click', function () {
            const row = button.closest('tr');
            const noteInput = row.querySelector(`input.note-input[data-row-id="${rowId}"]`);
            const cancelButton = row.querySelector(`button.cancle-note-button[data-row-id="${rowId}"]`);
            noteInput.removeAttribute('disabled');
            button.style.display = 'none';
            cancelButton.style.display = 'inline';
            const saveNoteButton = row.querySelector(`button.save-note-button[data-row-id="${rowId}"]`);
            saveNoteButton.style.display = 'inline';
        });
    });

    const noteInputs = document.querySelectorAll('.note-input');

    noteInputs.forEach(input => {
        const rowId = input.getAttribute('data-row-id');

        input.addEventListener('input', function () {
            const noteValue = input.value.trim();
            const saveNoteButton = input.parentElement.querySelector(`button.save-note-button[data-row-id="${rowId}"]`);

            if (noteValue === "") {
                saveNoteButton.disabled = true;
            } else {
                saveNoteButton.disabled = false;
            }
        });
    });

    const saveNoteButtons = document.querySelectorAll('.save-note-button');

    saveNoteButtons.forEach(button => {
        const rowId = button.getAttribute('data-row-id');
        button.addEventListener('click', async function () {
            const row = button.closest('tr');
            const noteInput = row.querySelector(`input.note-input[data-row-id="${rowId}"]`);
            const noteValue = noteInput.value.trim();

            if (noteValue === "") {
                alert('กรุณากรอกข้อมูล');
                location.reload();
                return;
            }

            await updateNoteInDatabase(rowId, noteValue);
            alert('บันทึกข้อมูลเรียบร้อยแล้ว');
            location.reload();
        });
    });

    async function updateNoteInDatabase(rowId, noteValue) {
        const response = await fetch('course_order_update_note.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `rowId=${encodeURIComponent(rowId)}&noteValue=${encodeURIComponent(noteValue)}`,
        });

        const result = await response.text();
        console.log('Note updated successfully:', result);
    }
</script>

<script>
    // ลบคำสั่งซื้อ

    const Deleteitem = document.querySelectorAll('.deleteitem');
    const clickOverlay1 = document.querySelector('#click-overlay1');

    const popup2 = document.querySelector('#popup2');
    const closesecondpopup = document.querySelector('#close-popup2');
    const buttonclosesecond = document.querySelector('#button-close2');
    const confirmDeleteButton = document.querySelector('#confirm-delete-button');

    Deleteitem.forEach(button => {
        button.addEventListener('click', () => {
            console.log("Open deleteitem popup");
            popup2.style.display = 'flex';
            clickOverlay1.style.display = 'block';
            const deleteId = button.getAttribute('data-row-id');
            confirmDeleteButton.setAttribute('data-delete-id', deleteId);
        });
    });

    clickOverlay1.addEventListener('click', () => {
        console.log("Clicked on overlay");
        popup2.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });


    closesecondpopup.addEventListener('click', () => {
        console.log("X second popup ");
        popup2.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });
    buttonclosesecond.addEventListener('click', () => {
        console.log("close BTN second POPUP");
        popup2.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });
    confirmDeleteButton.addEventListener('click', () => {
        const deleteId = confirmDeleteButton.getAttribute('data-delete-id');
        if (deleteId) {
            const deleteLink = `course_order.php?delete_id=${deleteId}`;
            window.location.href = deleteLink;
        }
    });
</script>

<script>
    //ตัวกรอง
    // ฟังก์ชันเพิ่ม
    function updateOrderCounts() {
        const totalOrders = document.querySelectorAll('.table_order table tbody tr').length;
        const pendingOrders = document.querySelectorAll('.table_order table tbody tr[data-status="รอตรวจสอบ"]').length;
        const completedOrders = document.querySelectorAll('.table_order table tbody tr[data-status="สำเร็จ"]').length;
        const rejectedOrders = document.querySelectorAll('.table_order table tbody tr[data-status="ปฏิเสธ"]').length;

        document.getElementById('total-orders').textContent = totalOrders;
        document.getElementById('pending-orders').textContent = pendingOrders;
        document.getElementById('completed-orders').textContent = completedOrders;
        document.getElementById('rejected-orders').textContent = rejectedOrders;
    }

    // โฟกัสไปที่ฟังก์ชัน updateOrderCounts
    updateOrderCounts();

    const filterButtons = document.querySelectorAll('.filter-buttons button');
    const tableRows = document.querySelectorAll('.table_order table tbody tr');

    // ตรวจสอบการคลิกที่ตัวกรองและแสดงรายการตามสถานะที่เลือก
    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            const status = this.getAttribute('data-status');
            let i = 1; // ตัวแปร i สำหรับเลขลำดับ

            tableRows.forEach(row => {
                const rowStatus = row.getAttribute('data-status');

                if (status === 'All' || rowStatus === status) {
                    row.style.display = 'table-row';
                    const tdNumber = row.querySelector('td:first-child');
                    tdNumber.textContent = i++; // ตั้งค่าเลขลำดับให้กับคอลัมน์ลำดับ
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

</html>