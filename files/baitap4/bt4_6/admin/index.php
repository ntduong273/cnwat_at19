<?php
session_start();
if (!isset($_SESSION['username'])) {
    // ...existing code...
    exit;
}

// Xử lý danh sách link yêu thích
$fav_links = [];
if (isset($_COOKIE['fav_links'])) {
    $fav_links = json_decode($_COOKIE['fav_links'], true);
    if (!is_array($fav_links)) $fav_links = [];
}

// Thêm link mới nếu có submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_link'])) {
    $new_link = trim($_POST['new_link']);
    if ($new_link !== '' && filter_var($new_link, FILTER_VALIDATE_URL)) {
        if (!in_array($new_link, $fav_links)) {
            $fav_links[] = $new_link;
            setcookie('fav_links', json_encode($fav_links), time() + 30*24*60*60, "/");
        }
    }
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
<a class="upload-link" href="../admin/pages/upload.php">Upload files</a>
<a class="logout-link" href="../admin/pages/logout.php">Log out</a>

<hr>
<h3 style="color: white;">Web link yêu thích</h3>
<ul>
    <?php if (!empty($fav_links)): ?>
        <?php foreach ($fav_links as $link): ?>
            <li><a href="<?php echo htmlspecialchars($link); ?>" target="_blank"><?php echo htmlspecialchars($link); ?></a></li>
        <?php endforeach; ?>
    <?php else: ?>
        <li style="color: white;">Chưa có link nào.</li>
    <?php endif; ?>
</ul>
<form method="post" style="margin-top:10px;">
    <input type="url" name="new_link" placeholder="Nhập link mới (https://...)" style="width:60%;" required>
    <button type="submit" style="color: white;">Thêm link</button>
</form>