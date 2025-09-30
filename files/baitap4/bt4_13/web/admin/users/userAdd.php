<?php
require_once __DIR__ . '/../../configs/database.php';

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $image = '';

    // Xử lý upload ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imgName = basename($_FILES['image']['name']);
        $targetDir = realpath(__DIR__ . '/../../images') . '/';
        $targetPath = $targetDir . $imgName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            // Lưu đường dẫn đầy đủ như users.php
            $image = "http://localhost/web/images/" . $imgName;
        }
    }

    // Thêm user vào database
    $sql = "INSERT INTO users (username, password, fullname, birthday, address, image)
            VALUES ('$username', '$password', '$fullname', '$birthday', '$address', '$image')";
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php?page=userList');
        exit;
    } else {
        $err = "Lỗi: " . mysqli_error($conn);
    }
}
?>
<h2>Thêm người dùng mới</h2>
<?php if ($err): ?>
    <p style="color:red"><?= $err ?></p>
<?php endif; ?>
<form method="post" enctype="multipart/form-data">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Fullname: <input type="text" name="fullname" required><br>
    Birthday: <input type="date" name="birthday"><br>
    Address: <textarea name="address"></textarea><br>
    Image: <input type="file" name="image"><br>
    <button type="submit">Save</button>
</form>