<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/headadmin.php';
include('server.php');

?>

<?php
$db = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM product_order ORDER BY id DESC";
$result = mysqli_query($db, $query);
?>

<style>
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
        padding: 8px;
        text-align: center;
    }

    .pro-order th {
        background-color: #f2f2f2;
    }

    .pro-order button {
        padding: 6px;
        border-radius: 10px;
        border: none;
    }

    .pro-order .filter-buttons {
        margin-bottom: 10px;
    }

    .pro-order .filter-buttons button:nth-child(1) {
        background-color: aqua;
    }

    .pro-order .filter-buttons button:nth-child(2) {
        background-color: yellow;
    }

    .pro-order .filter-buttons button:nth-child(3) {
        background-color: #00e700;
    }

    .pro-order .filter-buttons button:nth-child(4) {
        background-color: #ff1e1e;
    }

    .pro-order .table_order button {
        background-color: orange;
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

    .pro-order .table_order tr td:nth-child(9) {
        border: none;
    }
    .save-button,.save-note-button{
        display: none;
    }
</style>

<body>
    <section class="pro-order">
        <div class="homeheader">
            <h2 style="text-align: center;">
                <?= $product_order ?>
            </h2>
        </div>
        <div class="container">
            <div class="filter-buttons">
                <button data-status="All">ทั้งหมด</button>
                <button data-status="รอตรวจสอบ">รอตรวจสอบ</button>
                <button data-status="สำเร็จ">สำเร็จ</button>
                <button data-status="ปฏิเสธ">ปฏิเสธ</button>
            </div>
            <div class="table_order">
                <table>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ผู้ใช้งาน</th>
                        <th>ชนิด</th>
                        <th>รายการ</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>
                        <th>สถานะ</th>
                        <th>หมายเหตุ</th>
                    </tr>
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
                                    <?php echo $row['item']; ?>
                                </td>
                                <td>
                                    <?php echo $row['quantity']; ?>
                                </td>
                                <td>
                                    <?php echo $row['price']; ?>
                                </td>
                                <td>
                                    <select class="status-dropdown" data-row-id="<?php echo $row['id']; ?>" disabled>
                                        <option value="รอตรวจสอบ" <?php if ($row['status'] === 'รอตรวจสอบ')
                                            echo 'selected'; ?>>
                                            รอตรวจสอบ</option>
                                        <option value="สำเร็จ" <?php if ($row['status'] === 'สำเร็จ')
                                            echo 'selected'; ?>>สำเร็จ
                                        </option>
                                        <option value="ปฏิเสธ" <?php if ($row['status'] === 'ปฏิเสธ')
                                            echo 'selected'; ?>>ปฏิเสธ
                                        </option>
                                    </select>
                                    <button class="edit-button" data-row-id="<?php echo $row['id']; ?>">แก้ไข</button>
                                    <button class="save-button" data-row-id="<?php echo $row['id']; ?>">บันทึก</button>
                                    <button class="cancle-button" id="canclestatus" data-row-id="<?php echo $row['id']; ?>">ยกเลิก</button>
                                </td>
                                <td>
                                    <input type="text" class="note-input" data-row-id="<?php echo $row['id']; ?>"
                                        value="<?php echo $row['note']; ?>" disabled>
                                    <button class="edit-note-button" data-row-id="<?php echo $row['id']; ?>">แก้ไข</button>
                                    <button class="save-note-button" data-row-id="<?php echo $row['id']; ?>">บันทึก</button>
                                    <button class="cancle-button" data-row-id="<?php echo $row['id']; ?>">ยกเลิก</button>
                                </td>
                                <td>
                                    <!-- เพิ่มไอคอนถังขยะและปุ่มลบ -->
                                    <button class="delete-button" data-row-id="<?php echo $row['id']; ?>">ลบ</button>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "ไม่พบสินค้าในระบบ";
                    }
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>

<script>
    const filterButtons = document.querySelectorAll('.filter-buttons button');
    const tableRows = document.querySelectorAll('.table_order table tr');

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            const status = this.getAttribute('data-status');

            tableRows.forEach(row => {
                const rowStatus = row.getAttribute('data-status');

                if (status === 'All' || rowStatus === status) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });

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
            statusDropdown.removeAttribute('disabled');
            button.style.display = 'none';
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

    const editNoteButtons = document.querySelectorAll('.table_order table tr .edit-note-button');

    editNoteButtons.forEach(button => {
        const rowId = button.getAttribute('data-row-id');
        button.addEventListener('click', function () {
            const row = button.closest('tr');
            const noteInput = row.querySelector(`input.note-input[data-row-id="${rowId}"]`);
            noteInput.removeAttribute('disabled');
            button.style.display = 'none';
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
    const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const rowId = button.getAttribute('data-row-id');

            if (confirm('คุณต้องการลบข้อมูลนี้หรือไม่?')) {
                deleteRow(rowId);
            }
        });
    });

    async function deleteRow(rowId) {
        try {
            const response = await fetch('product_order_delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `rowId=${encodeURIComponent(rowId)}`,
            });

            if (response.ok) {
                location.reload(); // รีเฟรชหน้าหลังจากลบข้อมูล
                alert('ลบข้อมูลเรียบร้อยแล้ว');
            } else {
                alert('เกิดข้อผิดพลาดในการลบข้อมูล');
            }
        } catch (error) {
            console.error('เกิดข้อผิดพลาดในการลบข้อมูล:', error);
        }
    }
</script>

</html>