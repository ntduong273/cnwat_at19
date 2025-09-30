    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1e1e1e;
            padding: 20px;
        }
        h2 {
            color: #fff;
        }
        form {
            background: #fff;
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            max-width: 400px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            margin-top: 15px;
        }
        input[type="submit"], input[type="reset"] {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"] {
            background: #3498db;
            color: #fff;
        }
        input[type="submit"]:hover {
            background: #217dbb;
        }
        input[type="reset"] {
            background: #e74c3c;
            color: #fff;
        }
        input[type="reset"]:hover {
            background: #c0392b;
        }
        .msg {
            margin-top: 15px;
            font-weight: bold;
            color: green;
        }
    </style>

    <h2>Thêm sinh viên mới</h2>

    <form method="post" action="">
        <label for="name">Tên:</label>
        <input type="text" name="name" id="name" required>

        <label for="address">Địa chỉ:</label>
        <input type="text" name="address" id="address" required>

        <label for="age">Tuổi:</label>
        <input type="number" name="age" id="age" required min="1">

        <div class="btn">
            <input type="reset" value="Nhập Lại">
            <input type="submit" name="save" value="Ghi">
        </div>
    </form>

    <?php
    if (isset($_POST['save'])) {
        $name = trim($_POST['name']);
        $address = trim($_POST['address']);
        $age = trim($_POST['age']);

        if ($name != "" && $address != "" && $age != "") {
            // Ghi vào cuối file student.txt
            $file = fopen("student.txt", "a") or die("Không thể mở file!");
            fwrite($file, $name . PHP_EOL);
            fwrite($file, $address . PHP_EOL);
            fwrite($file, $age . PHP_EOL);
            fclose($file);

            echo "<p class='msg'>Đã ghi sinh viên mới vào file!</p>";
        } else {
            echo "<p class='msg' style='color:red;'>Vui lòng nhập đầy đủ thông tin.</p>";
        }
    }
    ?>