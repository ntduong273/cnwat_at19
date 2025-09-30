<?php
require_once __DIR__ . '/../../configs/database.php';
$result = mysqli_query($conn, "SELECT * FROM products");
?>
<h2>Danh sách sản phẩm</h2>
<a href="index.php?page=productAdd">Thêm sản phẩm mới</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Hình ảnh</th>
        <th>Danh mục</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= number_format($row['price'], 0, ',', '.') ?> đ</td>
        <td>
            <?php if ($row['image']): ?>
                <img src="<?= htmlspecialchars($row['image']) ?>" width="50">
            <?php endif; ?>
        </td>
        <td><?= htmlspecialchars($row['category']) ?></td>
        <td>
            <a href="index.php?page=productEdit&id=<?= $row['id'] ?>">Sửa</a> |
            <a href="index.php?page=productDelete&id=<?= $row['id'] ?>" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>