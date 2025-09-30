<?php
require_once __DIR__."/../configs/database.php";

$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$sql = "SELECT * FROM products WHERE name LIKE '%$keyword%' OR description LIKE '%$keyword%'";
$result = mysqli_query($conn, $sql);
?>

<div class="products">
    <h2>Kết quả tìm kiếm cho: "<?= htmlspecialchars($keyword) ?>"</h2>
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
        echo "<p>Không tìm thấy sản phẩm nào.</p>";
    }
    ?>
</div>
