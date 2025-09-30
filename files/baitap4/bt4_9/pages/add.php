<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["fullname"];
    $birthday = $_POST["birthday"];
    $address = $_POST["address"];
    $class = $_POST["class"];

    // Xử lý ảnh
    $image = "";
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "images/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $image = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    // Ghi vào file student.txt
    $data = $name . "|" . $birthday . "|" . $address . "|" . $class . "|" . $image . "\n";
    file_put_contents("student.txt", $data, FILE_APPEND | LOCK_EX);

    echo "<p style='color:green;'>Thêm sinh viên thành công!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <style>
        table {
            margin: 20px auto;
        }
        td {
            padding: 6px;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Thêm sinh viên mới</h2>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Full name:</td>
                <td><input type="text" name="fullname" required></td>
            </tr>
            <tr>
                <td>Birthday:</td>
                <td><input type="date" name="birthday" required></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" required></td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td>Class:</td>
                <td><input type="text" name="class" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="reset" value="Nhập lại">
                    <input type="submit" value="Lưu">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
