<?php
// Đọc dữ liệu từ file student.txt
$students = file("student.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
            padding: 6px;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 50px;
            height: 50px;
        }
        a {
            margin: 0 5px;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Danh sách sinh viên</h2>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Ảnh</th>
            <th>Lớp</th>
            <th>Thao tác</th>
        </tr>
        <?php
        $i = 1;
        foreach ($students as $student) {
            $data = explode("|", $student);
            $name = $data[0];
            $birthday = $data[1];
            $address = $data[2];
            $class = $data[3];

            // Giả sử chọn ảnh ngẫu nhiên theo giới tính / class
            $img = "/AT190115/files/baitap4/bt4_9/images/user" . $i . ".jpg"; // ví dụ ảnh user1.png, user2.png,...
            
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td>$name</td>";
            echo "<td>$birthday</td>";
            echo "<td>$address</td>";
            echo "<td><img src='$img' alt='user'></td>";
            echo "<td>$class</td>";
            echo "<td>
                    <a href='detail.php?id=$i'>Detail</a> | 
                    <a href='edit.php?id=$i'>Edit</a> | 
                    <a href='delete.php?id=$i'>Delete</a>
                  </td>";
            echo "</tr>";

            $i++;
        }
        ?>
    </table>
</body>
</html>
