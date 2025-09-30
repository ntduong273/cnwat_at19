<?php
require_once __DIR__ . '/../../configs/database.php';
$id = intval($_GET['id']);
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));
?>
<h2>Sửa thông tin user</h2>
<form method="post" enctype="multipart/form-data">
    Username: <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required><br>
    Password: <input type="password" name="password" value="<?= htmlspecialchars($user['password']) ?>" required><br>
    Fullname: <input type="text" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>" required><br>
    Birthday: <input type="date" name="birthday" value="<?= htmlspecialchars($user['birthday']) ?>"><br>
    Address: <textarea name="address" id="address"><?= htmlspecialchars($user['address']) ?></textarea><br>
    Image (ảnh cũ):<br>
    <?php if ($user['image']): ?>
        <img src="../../images/<?= htmlspecialchars($user['image']) ?>" width="100"><br>
    <?php endif; ?>
    (upload ảnh mới): <input type="file" name="image"><br>
    <button type="submit">Save</button>
</form>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('address');
</script>