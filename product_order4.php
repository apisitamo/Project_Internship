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

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$limit = 10;

$offset = ($page - 1) * $limit;

$query = "SELECT * FROM product_order
WHERE `status` = 'rejected'
          ORDER BY CASE
            WHEN status = 'pending' THEN 0
            WHEN status = 'completed' THEN 1
            WHEN status = 'rejected' THEN 2
            ELSE 3
          END, id DESC
          LIMIT $limit OFFSET $offset";

$result = mysqli_query($db, $query);

// คำนวณจำนวนสินค้าทั้งหมด
$totalProductsQuery = "SELECT COUNT(*) AS total FROM product_order  ";
$totalProductsResult = mysqli_query($db, $totalProductsQuery);

if ($totalProductsResult) {
    $totalProductsRow = mysqli_fetch_assoc($totalProductsResult);
    $totalProducts = $totalProductsRow['total'];
} else {
    $totalProducts = 0;
}
// คำนวณจำนวนสินค้าที่มีสถานะเป็น 'pending'
$pendingProductQuery = "SELECT COUNT(*) AS pendingCount FROM product_order WHERE status = 'pending'";
$pendingProductResult = mysqli_query($db, $pendingProductQuery);

if ($pendingProductResult) {
    $pendingProductRow = mysqli_fetch_assoc($pendingProductResult);
    $pendingProductCount = $pendingProductRow['pendingCount'];
} else {
    $pendingProductCount = 0;
}
// คำนวณจำนวนสินค้าที่มีสถานะเป็น 'completed'
$completedProductQuery = "SELECT COUNT(*) AS completedCount FROM product_order WHERE status = 'completed'";
$completedProductResult = mysqli_query($db, $completedProductQuery);

if ($completedProductResult) {
    $completedProductRow = mysqli_fetch_assoc($completedProductResult);
    $completedProductCount = $completedProductRow['completedCount'];
} else {
    $completedProductCount = 0;
}
// คำนวณจำนวนสินค้าที่มีสถานะเป็น 'rejected'
$rejectedProductQuery = "SELECT COUNT(*) AS rejectedCount FROM product_order WHERE status = 'rejected'";
$rejectedProductResult = mysqli_query($db, $rejectedProductQuery);

if ($rejectedProductResult) {
    $rejectedProductRow = mysqli_fetch_assoc($rejectedProductResult);
    $rejectedProductCount = $rejectedProductRow['rejectedCount'];
} else {
    $rejectedProductCount = 0;
}



?>

<?php
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM product_order WHERE id = '$deleteId'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Successfully deleted'); window.location.href = 'product_order.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'product_order.php';</script>";
    }
}
?>

<style>
    .pro-order .homeheader {
        margin-top: 75px;
    }

    .pro-order #con-table {
        max-width: 1450px;
    }

    .pro-order .bottom-box {
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
        background-color: #c0c0c0;
    }

    .pro-order table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ccc;
    }

    .pro-order th,
    .pro-order td {
        border: 1px solid #ccc;
        padding: 20px 20px;
        text-align: center;
    }

    .pro-order th {
        background-color: #FFF6E7;
        padding: 15px;
    }

    .pro-order button img {
        width: 34%;
    }

    .pro-order .table_order td:nth-child(8) {
        width: 15%;
    }

    .pro-order .table_order th:nth-child(2),
    .pro-order td:nth-child(10) {
        padding: 0px;
    }

    .pro-order td:nth-child(3) {
        width: 12%;
    }

    .pro-order .deleteitem {
        padding: 6px 0px;
    }

    .pro-order button {
        padding: 6px 20px;
        border-radius: 10px;
        border: none;
        margin-top: 5px;
    }

    .pro-order .filter-buttons {
        margin: 0px 15px 15px 0px;
    }

    .pro-order .filter-buttons a:nth-child(1) button {
        background-color: aqua;
    }

    .pro-order .filter-buttons a:nth-child(2) button {
        background-color: yellow;
    }

    .pro-order .filter-buttons a:nth-child(3) button {
        background-color: #00e700;
    }

    .pro-order .filter-buttons a:nth-child(4) button {
        background-color: #ff1e1e;
    }

    .pro-order .table_order .status-dropdown {
        border: none;
        background: yellow;
        padding: 0px 5px;
    }

    .pro-order .table_order .status-dropdown option:nth-child(2) {
        background: #00e700;
    }

    .pro-order .table_order .status-dropdown option:nth-child(3) {
        background: red;
    }

    .pro-order .pagination {
        display: block;
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .pro-order .pagination a {
        margin-left: 5px;
        margin-right: 5px;
        background: #e5e5e5;
        padding: 9px 19px;
        border-radius: 40px;
        font-size: 19px;
    }

    .pro-order .pagination a:hover {
        background-color: #0d6efd;
        color: white !important;
        transition: 0.4s;
    }

    .pro-order .pagination .pagination-link.active {
        background-color: #0d6efd;
        color: white !important;
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
        /* width: 30%;
        height: 20%;*/
        align-items: center;
    }

    .popup-add #popup2 #confirm-delete-button {
        margin-right: 5px;
        background: #00e500;
        padding: 6px 25px;
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

<body>
    <section class="pro-order">
        <div class="click-overlay" id="click-overlay1"></div>
        <div class="homeheader">
            <h2 style="text-align: center;">
                <?= $product_order ?>
            </h2>
        </div>
        <div class="container" id="con-table">
            <div class="filter-buttons">
                <a href="product_order.php">
                    <button data-status="All">
                        <?= $all ?> (<span id="all-Product">
                            <?= $totalProducts ?>
                        </span>)
                    </button>
                </a>
                <a href="product_order2.php">
                    <button data-status="pending">
                        <?= $check ?> (<span id="pending-Product">
                            <?= $pendingProductCount ?>
                        </span>)
                    </button>
                </a>
                <a href="product_order3.php">
                    <button data-status="completed">
                        <?= $complete ?> (<span id="completed-Product">
                            <?= $completedProductCount ?>
                        </span>)
                    </button>
                </a>
                <a href="product_order4.php">
                    <button data-status="rejected">
                        <?= $reject ?> (<span id="rejected-Product">
                            <?= $rejectedProductCount ?>
                        </span>)
                    </button>
                </a>
            </div>
            <div class="table_order">
                <table>
                    <thead>
                        <tr>
                            <th>
                                <?= $order ?>
                            </th>
                            <th>
                                <?= $User ?>
                            </th>
                            <th>
                                <?= $types2 ?>
                            </th>
                            <th>
                                <?= $lists ?>
                            </th>
                            <th>
                                <?= $quantityy ?>
                            </th>
                            <th>
                                <?= $pricess ?>
                            </th>
                            <th>
                                <?= $timess ?>
                            </th>
                            <th>
                                <?= $statuss ?>
                            </th>
                            <th>
                                <?= $notess ?>
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1 + $offset;
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
                                        <?php echo $row['price']; ?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/y H:i', strtotime($row['order_time'])); ?>
                                    </td>
                                    <td>
                                        <select class="status-dropdown" data-row-id="<?php echo $row['id']; ?>" disabled>
                                            <option value="pending" <?php if ($row['status'] === 'pending')
                                                echo 'selected'; ?>><?= $check ?>
                                            </option>
                                            <option value="completed" <?php if ($row['status'] === 'completed')
                                                echo 'selected'; ?>>
                                                <?= $complete ?>
                                            </option>
                                            <option value="rejected" <?php if ($row['status'] === 'rejected')
                                                echo 'selected'; ?>>
                                          <?= $reject ?></option>
                                        </select>
                                        <button class="edit-button" data-row-id="<?php echo $row['id']; ?>">
                                            <?= $edit ?>
                                        </button>
                                        <button class="save-button" data-row-id="<?php echo $row['id']; ?>">
                                            <?= $save ?>
                                        </button>
                                        <button class="cancle-button" id="canclestatus" data-row-id="<?php echo $row['id']; ?>"
                                            style="display: none;">
                                            <?= $cancle ?>
                                        </button>
                                    </td>
                                    <td>
                                        <input type="text" class="note-input" data-row-id="<?php echo $row['id']; ?>"
                                            value="<?php echo $row['note']; ?>" disabled>
                                        <button class="edit-note-button" data-row-id="<?php echo $row['id']; ?>">
                                            <?= $edit ?>
                                        </button>
                                        <button class="save-note-button" data-row-id="<?php echo $row['id']; ?>">
                                            <?= $save ?>
                                        </button>
                                        <button class="cancle-note-button" data-row-id="<?php echo $row['id']; ?>"
                                            style="display: none;">
                                            <?= $cancle ?>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="deleteitem" data-row-id="<?php echo $row['id']; ?>"><img
                                                src="assets/images/bin.png" alt=""></button>
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
            $totalPages = ceil($rejectedProductCount / $limit); // คำนวณจำนวนหน้าทั้งหมด
            $prevPage = ($page > 1) ? $page - 1 : 1;
            $nextPage = ($page < $totalPages) ? $page + 1 : $totalPages;

            // echo "<a href='product_order4.php?page=1' class='pagination-link'>First</a>"; // ลิงก์ไปหน้าแรก

            if ($page > 1) {
                echo "<a href='product_order4.php?page=$prevPage' class='pagination-link'><</a>"; // ลิงก์หน้าก่อนหน้า
            }

            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i == $page) ? 'active' : '';
                echo "<a href='product_order4.php?page=$i' class='pagination-link $activeClass'>$i</a>";
            }

            if ($page < $totalPages) {
                echo "<a href='product_order4.php?page=$nextPage' class='pagination-link'>></a>"; // ลิงก์หน้าถัดไป
            }

            // echo "<a href='product_order4.php?page=$totalPages' class='pagination-link'>Last</a>"; // ลิงก์ไปหน้าสุดท้าย
            ?>
        </div>

    </section>

    <section class="popup-add">

        <div class="popup" id="popup2">
            <div class="popup-content">
                <span class="close-popup" id="close-popup2">&times;</span>
                <div class="container">
                    <p style="text-align: center;">
                        <?= $wantdel ?>
                    </p>
                    <button class="button-close-2" id="confirm-delete-button"
                        href='product_order.php?delete_id=<?php echo $row['id']; ?>'>
                        <?= $confirm ?>
                    </button>
                    <button class="button-close-2" id="button-close2">
                        <?= $cancle ?>
                    </button>
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
            alert('Status saved successfully');
        });
    });

    async function updateStatusInDatabase(rowId, selectedStatus) {
        const response = await fetch('product_order_update_status.php', {
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
        const response = await fetch('product_order_update_note.php', {
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
            const deleteLink = `product_order.php?delete_id=${deleteId}`;
            window.location.href = deleteLink;
        }
    });
</script>


</html>