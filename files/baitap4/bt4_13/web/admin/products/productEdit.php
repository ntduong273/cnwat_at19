<?php

require_once __DIR__ . '/../../configs/database.php';

$id = intval($_GET['id']);
$product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));
$categories = mysqli_query($conn, "SELECT * FROM categories");

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = floatval($_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = $product['image'];

    // Xử lý upload ảnh mới nếu có
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imgName = basename($_FILES['image']['name']);
        $targetPath = '../../images/' . $imgName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $image = "http://localhost/web/images/" . $imgName;
        }
    }

    $sql = "UPDATE products SET name='$name', price=$price, category='$category', description='$description', image='$image' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php?page=productList');
        exit;
    } else {
        $err = "Lỗi: " . mysqli_error($conn);
    }
}
?>
<h2>Sửa sản phẩm</h2>
<?php if ($err): ?><p style="color:red"><?= $err ?></p><?php endif; ?>
<form method="post" enctype="multipart/form-data">
    Tên sản phẩm: <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br>
    Giá: <input type="number" name="price" value="<?= htmlspecialchars($product['price']) ?>" required><br>
    Danh mục:
    <select name="category" required>
        <?php while($cat = mysqli_fetch_assoc($categories)): ?>
            <option value="<?= htmlspecialchars($cat['name']) ?>" <?= $cat['name'] == $product['category'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['name']) ?>
            </option>
        <?php endwhile; ?>
    </select><br>
    Mô tả: <textarea name="description"><?= htmlspecialchars($product['description']) ?></textarea><br>
    Hình ảnh hiện tại:<br>
    <?php if ($product['image']): ?>
        <img src="<?= htmlspecialchars($product['image']) ?>" width="100"><br>
    <?php endif; ?>
    Hình ảnh mới: <input type="file" name="image"><br>
    <button type="submit">Lưu</button>
</form>