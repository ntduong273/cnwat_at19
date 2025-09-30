<?php
require_once __DIR__."/../configs/database.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM products WHERE id=$id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
?>

<?php if ($product): ?>
<div class="product-detail">
    <h2><?= htmlspecialchars($product['name']) ?></h2>
    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="400">
    <p><strong>Hãng:</strong> <?= htmlspecialchars($product['category']) ?></p>
    <p><strong>Mô tả:</strong> <?= htmlspecialchars($product['description']) ?></p>
    <p><strong>Giá:</strong> <span class="price"><?= number_format($product['price'], 0, ',', '.') ?> đ</span></p>
</div>
<?php else: ?>
    <p>Sản phẩm không tồn tại.</p>
<?php endif; ?>
