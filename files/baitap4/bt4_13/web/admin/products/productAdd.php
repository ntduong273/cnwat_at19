<?php


require_once __DIR__ . '/../../configs/database.php';

// Lấy danh sách danh mục
$categories = mysqli_query($conn, "SELECT * FROM categories");

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = floatval($_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = '';

    // Xử lý upload ảnh (tham khảo userAdd)
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imgName = basename($_FILES['image']['name']);
        $targetDir = realpath(__DIR__ . '/../../images') . '/';
        $targetPath = $targetDir . $imgName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $image = "http://localhost/web/images/" . $imgName;
        }
    }

    $sql = "INSERT INTO products (name, price, category, description, image)
            VALUES ('$name', $price, '$category', '$description', '$image')";
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php?page=productList');
        exit;
    } else {
        $err = "Lỗi: " . mysqli_error($conn);
    }
}
?>
<h2>Thêm sản phẩm mới</h2>
<?php if ($err): ?><p style="color:red"><?= $err ?></p><?php endif; ?>
<form method="post" enctype="multipart/form-data">
    Tên sản phẩm: <input type="text" name="name" required><br>
    Giá: <input type="number" name="price" required><br>
    Danh mục:
    <select name="category" required>
        <?php while($cat = mysqli_fetch_assoc($categories)): ?>
            <option value="<?= htmlspecialchars($cat['name']) ?>"><?= htmlspecialchars($cat['name']) ?></option>
        <?php endwhile; ?>
    </select><br>
    Mô tả: <textarea name="description"></textarea><br>
    Hình ảnh: <input type="file" name="image"><br>
    <button type="submit">Thêm</button>
</form>