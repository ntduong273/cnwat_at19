<?php
// Kết nối MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db = "lop"; // Đổi thành tên database của bạn
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Kết nối thất bại: " . $conn->connect_error);

// Xử lý thêm mới
if (isset($_POST['add'])) {
    $malop = $_POST['malop'];
    $tenlop = $_POST['tenlop'];
    $khoahoc = $_POST['khoahoc'];
    $gvcn = $_POST['gvcn'];
    $sql = "INSERT INTO LOP (MALOP, TENLOP, KHOAHOC, GVCN) VALUES ('$malop', '$tenlop', $khoahoc, '$gvcn')";
    $conn->query($sql);
}

// Xử lý xóa
if (isset($_GET['del'])) {
    $malop = $_GET['del'];
    $conn->query("DELETE FROM LOP WHERE MALOP='$malop'");
}

// Xử lý cập nhật
if (isset($_POST['update'])) {
    $malop = $_POST['malop'];
    $tenlop = $_POST['tenlop'];
    $khoahoc = $_POST['khoahoc'];
    $gvcn = $_POST['gvcn'];
    $sql = "UPDATE LOP SET TENLOP='$tenlop', KHOAHOC=$khoahoc, GVCN='$gvcn' WHERE MALOP='$malop'";
    $conn->query($sql);
}

// Lấy dữ liệu để sửa
$edit = null;
if (isset($_GET['edit'])) {
    $malop = $_GET['edit'];
    $res = $conn->query("SELECT * FROM LOP WHERE MALOP='$malop'");
    $edit = $res->fetch_assoc();
}
?>

<h2>Quản lý bảng LOP</h2>

<!-- Form thêm/sửa -->
<form method="post">
    Mã lớp: <input type="text" name="malop" maxlength="6" value="<?= $edit['MALOP'] ?? '' ?>" <?= $edit ? 'readonly' : '' ?> required>
    Tên lớp: <input type="text" name="tenlop" maxlength="50" value="<?= $edit['TENLOP'] ?? '' ?>" required>
    Khóa học: <input type="number" name="khoahoc" value="<?= $edit['KHOAHOC'] ?? '' ?>" required>
    GVCN: <input type="text" name="gvcn" maxlength="50" value="<?= $edit['GVCN'] ?? '' ?>" required>
    <?php if ($edit): ?>
        <button type="submit" name="update">Cập nhật</button>
        <a href="bai1.php">Hủy</a>
    <?php else: ?>
        <button type="submit" name="add">Thêm mới</button>
    <?php endif; ?>
</form>

<!-- Hiển thị bảng LOP -->
<table border="1" cellpadding="5" style="margin-top:10px;">
    <tr>
        <th>Mã lớp</th><th>Tên lớp</th><th>Khóa học</th><th>GVCN</th><th>Hành động</th>
    </tr>
    <?php
    $res = $conn->query("SELECT * FROM LOP");
    while ($row = $res->fetch_assoc()) {
        echo "<tr>
            <td>{$row['MALOP']}</td>
            <td>{$row['TENLOP']}</td>
            <td>{$row['KHOAHOC']}</td>
            <td>{$row['GVCN']}</td>
            <td>
                <a href='?edit={$row['MALOP']}'>Sửa</a> | 
                <a href='?del={$row['MALOP']}' onclick=\"return confirm('Xóa lớp này?')\">Xóa</a>
            </td>
        </tr>";
    }
    ?>
</table>
<?php $conn->close(); ?>