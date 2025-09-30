<?php

$errors = [];
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === 'admin' && $password === 'admin') {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        setcookie("username", $name, time() + 30*24*60*60); 
        setcookie("password", $pass, time() + 30*24*60*60);
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
    <p>Dùng Session để xử lý đăng nhập.
    <br>Cookies: lưu thông tin người dùng đăng nhập thành công. Thường dùng để ghi nhớ username, password để không phải đánh lại khi sử dụng cùng trình duyệt trong các lần sau. 
    </p>   
