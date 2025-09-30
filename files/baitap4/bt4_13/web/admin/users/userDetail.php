<?php

require_once __DIR__ . '/../../configs/database.php';
$id = intval($_GET['id']);
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));
?>
<h2>Thông tin chi tiết người dùng: <?= htmlspecialchars($user['username']) ?></h2>
<img src="<?= htmlspecialchars($user['image']) ?>" width="200"><br>
Fullname: <?= htmlspecialchars($user['fullname']) ?><br>
Birthday: <?= htmlspecialchars($user['birthday']) ?><br>
Address: <?= htmlspecialchars($user['address']) ?><br>