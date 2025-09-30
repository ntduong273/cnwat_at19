<style>
    table, tr, th {
        color: white;
    }
</style>

<?php
    //include "connectDB.php";   // mở kết nối

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "lop"; 
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) die("Kết nối thất bại: " . $conn->connect_error);

    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='8'>";
        echo "<tr><th colspan='4'>DANH SACH SINH VIEN TRONG LOP</th></tr>";
        echo "<tr><th>Ten</th><th>Dia chi</th><th>Gioi tinh</th><th>Thao tac</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["StudentName"] . "</td>";
            echo "<td>" . $row["StudentAddress"] . "</td>";
            echo "<td>" . $row["StudentGender"] . "</td>";
            echo "<td><a href='http://192.168.1.19/phpmyadmin/index.php?route=/sql&pos=0&db=lop&table=students&id=" . "' target='_blank'>Chi tiết</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Không có sinh viên nào.";
    }

    //include "closeConnectDB.php";  // đóng kết nối
?>
<?php $conn->close(); ?>
