<?php

require_once __DIR__ . '/../../configs/database.php';
$result = mysqli_query($conn, "SELECT * FROM users");
?>
<h2>Danh sách người dùng</h2>
<a href="index.php?page=userAdd">Add new user</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Fullname</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['fullname']) ?></td>
        <td>
            <?php if ($row['image']): ?>
                <img src="<?= htmlspecialchars($row['image']) ?>" width="50">
            <?php endif; ?>
        </td>
        <td>
            <a href="index.php?page=userDetail&id=<?= $row['id'] ?>">Chi tiết</a> |
            <a href="index.php?page=userEdit&id=<?= $row['id'] ?>">Sửa</a> |
            <a href="index.php?page=userDelete&id=<?= $row['id'] ?>" onclick="return confirm('Xóa user này?')">Xóa</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>