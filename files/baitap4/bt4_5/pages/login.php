<?php
session_start();
$errors = [];
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        // Đăng nhập thành công, chuyển hướng đến admin/index.php
        header('Location: ../admin/index.php');
        exit;
    } else {
        $errors[] = 'Sai tên đăng nhập hoặc mật khẩu!';
    }
}
?>

<style>
    body {
        background: #1e1e1e; 
        color: white;
    }
    .form-box {
        width:360px; 
        margin:30px auto; 
        padding:20px; 
        border:1px solid #ccc; 
        border-radius:6px;
    }
    .input-row {
        margin:10px 0;
    }
    label {
        display:block; 
        font-weight:bold; 
        margin-bottom:6px;
    }
    input[type="text"], input[type="password"] {
        width:100%; 
        padding:8px; 
        box-sizing:border-box;
    }
    .error {
        color:red;
        margin-bottom:10px;
    }
    .buttons { 
        margin-top:12px;
    }
</style>   

<div class="form-box">
    <h2>Login Form</h2>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $e) echo htmlspecialchars($e) . "<br>"; ?>
        </div>
    <?php endif; ?>

    <form method="post" action="login.php" autocomplete="off">
        <div class="input-row">
            <label for="username">Username:</label>
            <input id="username" name="username" type="text" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
        </div>

        <div class="input-row">
            <label for="password">Password:</label>
            <input id="password" name="password" type="password">
        </div>

        <div class="buttons">
            <input type="reset" value="Reset">
            <input type="submit" value="Login">
        </div>
    </form>
</div>
<p style="font-weight: bold;">Chú ý:</p>
<p>- Xử lý đăng nhập cần dùng Session để lưu trạng thái đã đăng nhập thành công hoặc truyền dữ liệu giữa các page.
<br>- Session: là 1 phiên làm việc của người dùng. Bắt đầu từ khi tiến trình client (trình duyệt phía client chạy) gửi request và kết nối đến web server. Kết thúc khi ngắt kết nối (thường là đóng tiến trình phía client).
<br>- Biến session: lưu trữ thông tin trong 1 phiên làm việc của người dùng. Phạm vi nhận biết biến session là toàn cục.
<br>- Thường sử dụng biến session: Login, ShoppingCart, MultiLanguage 
<br>- Trước khi sử dụng biến session trong PHP cần phải gọi hàm session_start()  
<br>- Hủy biến session khi không dùng: sử dụng hàm unset() hoặc đặt = null
</p>   
