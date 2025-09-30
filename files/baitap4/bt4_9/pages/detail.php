<?php
$id = isset($_GET["id"]) ? intval($_GET["id"]) : -1;
$students = file("student.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if ($id >= 0 && $id < count($students)) {
    $data = explode("|", $students[$id]);
    $name = $data[0] ?? "";
    $birthday = $data[1] ?? "";
    $address = $data[2] ?? "";
    $class = $data[3] ?? "";

    // Giống list.php → ảnh gán theo chỉ số (id bắt đầu từ 0, nên cộng thêm 1)
    $image = "/AT190115/files/baitap4/bt4_9/images/user" . ($id+1) . ".jpg";
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Chi tiết sinh viên</title>
    </head>
    <body>
        <h2>Chi tiết sinh viên</h2>
        <div style="text-align:center;">
            <img src="<?php echo $image; ?>" width="150"><br>
            <p><b>Họ tên:</b> <?php echo $name; ?></p>
            <p><b>Ngày sinh:</b> <?php echo $birthday; ?></p>
            <p><b>Địa chỉ:</b> <?php echo $address; ?></p>
            <p><b>Lớp:</b> <?php echo $class; ?></p>
        </div>
        <p style="text-align:center;">
            <a href="edit.php?id=<?php echo $id; ?>">Sửa thông tin</a> | 
            <a href="list.php">Quay lại danh sách</a>
        </p>
    </body>
    </html>
    <?php
} else {
    echo "<p style='color:red;'>Không tìm thấy sinh viên!</p>";
    echo "<p><a href='list.php'>Quay lại danh sách</a></p>";
}
?>
