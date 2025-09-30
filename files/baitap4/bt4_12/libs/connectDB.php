<?php
    // Thông tin kết nối
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "lop";          // tên CSDL

    // Tạo kết nối
    $conn = new mysqli($host, $user, $pass, $db);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    } else {
        // echo "Kết nối thành công!"; // test, có thể bỏ đi
    }
?>
