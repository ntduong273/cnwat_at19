<?php
$id = isset($_GET["id"]) ? intval($_GET["id"]) : -1;
$students = file("student.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if ($id >= 0 && $id < count($students)) {
    // Xóa sinh viên tại vị trí $id
    unset($students[$id]);

    // Ghi lại file (implode sẽ giữ đúng format, mỗi dòng 1 sinh viên)
    file_put_contents("student.txt", implode(PHP_EOL, $students) . PHP_EOL);

    echo "<p style='color:green;'>Xóa thành công!</p>";
    echo "<p><a href='list.php'>Quay lại danh sách</a></p>";
} else {
    echo "<p style='color:red;'>Không tìm thấy sinh viên!</p>";
    echo "<p><a href='list.php'>Quay lại danh sách</a></p>";
}
?>
