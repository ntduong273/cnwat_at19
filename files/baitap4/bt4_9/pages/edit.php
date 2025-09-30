<?php
$id = isset($_GET["id"]) ? intval($_GET["id"]) : -1;
$students = file("student.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if ($id >= 0 && $id < count($students)) {
    $data = explode("|", $students[$id]);
    $name = $data[0] ?? "";
    $birthday = $data[1] ?? "";
    $address = $data[2] ?? "";
    $class = $data[3] ?? "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newName = $_POST["fullname"];
        $newBirthday = $_POST["birthday"];
        $newAddress = $_POST["address"];
        $newClass = $_POST["class"];

        // Ghi đè lại bản ghi
        $students[$id] = "$newName|$newBirthday|$newAddress|$newClass";

        file_put_contents("student.txt", implode(PHP_EOL, $students) . PHP_EOL);

        echo "<p style='color:green;'>Cập nhật thành công!</p>";
        echo "<p><a href='list.php'>Quay lại danh sách</a></p>";
        exit;
    }
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Sửa thông tin sinh viên</title>
    </head>
    <body>
        <h2>Sửa thông tin sinh viên</h2>
        <form method="post">
            Họ tên: <input type="text" name="fullname" value="<?php echo $name; ?>"><br><br>
            Ngày sinh: <input type="date" name="birthday" value="<?php echo $birthday; ?>"><br><br>
            Địa chỉ: <input type="text" name="address" value="<?php echo $address; ?>"><br><br>
            Lớp: <input type="text" name="class" value="<?php echo $class; ?>"><br><br>
            <input type="submit" value="Lưu">
        </form>
        <p><a href="list.php">Quay lại danh sách</a></p>
    </body>
    </html>

    <?php
} else {
    echo "<p style='color:red;'>Không tìm thấy sinh viên!</p>";
    echo "<p><a href='list.php'>Quay lại danh sách</a></p>";
}
?>
