<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Nếu chưa đăng nhập, thông báo và dừng truy cập
    echo '<!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Chưa đăng nhập</title>
        <style>
            body { background: #0f0f0f; color: #fff; font-family: Montserrat, sans-serif; text-align: center; padding-top: 80px; }
            .warning { color: #ff5252; font-size: 1.3em; margin-bottom: 20px; }
            a { color: #3498db; text-decoration: none; }
            a:hover { text-decoration: underline; }
        </style>
    </head>
    <body>
        <div class="warning">Bạn chưa đăng nhập! Không được phép truy cập trang này.</div>
        <a href="../pages/login.php">Quay lại trang đăng nhập</a>
    </body>
    </html>';
    exit;
}
?>

<style>
    body {
        background: #1e1e1e; 
    }
    a.logout-link, a.home-link, a.upload-link {
        display: inline-block;
        margin-top: 16px;
        padding: 10px 28px;
        background: #3498db;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1em;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 8px rgba(52,152,219,0.08);
    }
    a.logout-link:hover, a.home-link:hover, a.upload-link:hover {
        background: #217dbb;
        box-shadow: 0 4px 16px rgba(52,152,219,0.18);
    }
</style>    

<p style="color: white;">Welcome back, my admin!</p>
<a class="home-link" href="../admin/pages/home.php">Home</a>
<a class="upload-link" href="../admin/pages/upload.php">Upload Flash</a>
<a class="logout-link" href="../admin/pages/logout.php">Log out</a>