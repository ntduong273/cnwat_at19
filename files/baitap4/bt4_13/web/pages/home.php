

<?php
// Kết nối database
require_once __DIR__."/../configs/database.php";

// Lấy danh sách các loại sản phẩm
$sql_categories = "SELECT DISTINCT category FROM products";
$result_categories = mysqli_query($conn, $sql_categories);
?>

<div class="products">
    <h2>Sản phẩm mới nhất theo hãng</h2>
    <?php
    while ($cat = mysqli_fetch_assoc($result_categories)) {
        $category = $cat['category'];
        echo "<h3 class='category-title'>Laptop " . htmlspecialchars($category) . "</h3>";

        // Lấy 2 sản phẩm mới nhất trong mỗi category
        $sql_products = "SELECT * FROM products WHERE category='$category' ORDER BY created_at DESC LIMIT 2";
        $result_products = mysqli_query($conn, $sql_products);

        while ($row = mysqli_fetch_assoc($result_products)) {
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
    }
    ?>
</div>

