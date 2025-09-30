<?php
require_once __DIR__ . '/../configs/database.php';
$category = isset($_GET['category']) ? $_GET['category'] : '';

$where = [];
if (!empty($_GET['category'])) {
    $category = mysqli_real_escape_string($conn, $_GET['category']);
    $where[] = "category='$category'";
}
if (!empty($_GET['price_range'])) {
    list($min, $max) = explode('-', $_GET['price_range']);
    $where[] = "price >= $min AND price <= $max";
}
$sql = "SELECT * FROM products";
if ($where) $sql .= " WHERE " . implode(' AND ', $where);
$sql .= " ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>


<div class="products">
    <h2>Danh sách Laptop <?= htmlspecialchars($category) ?></h2>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product-item'>";
            echo "<a href='index.php?page=productDetail&id=" . $row['id'] . "'>";
            echo "<img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "' width='150'>";
            echo "</a>";
            echo "<div class='product-info'>";
            echo "<h4><a href='index.php?page=productDetail&id=" . $row['id'] . "'>" . htmlspecialchars($row['name']) . "</a></h4>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<p class='price'>" . number_format($row['price'], 0, ',', '.') . " đ</p>";
            echo "<a href='index.php?addcart=" . $row['id'] . "'>Đặt hàng</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Không có sản phẩm nào.</p>";
    }
    ?>
</div>
