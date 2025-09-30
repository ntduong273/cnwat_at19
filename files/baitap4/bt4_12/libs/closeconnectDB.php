<?php
    // Đóng kết nối (nếu tồn tại)
    if (isset($conn) && $conn instanceof mysqli) {
        $conn->close();
        // echo "Đã đóng kết nối!"; // test, có thể bỏ đi
    }
?>
