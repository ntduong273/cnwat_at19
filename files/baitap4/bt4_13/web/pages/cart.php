<?php
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>
<h2>Giỏ hàng của bạn</h2>
<?php if (empty($cart)): ?>
    <p>Giỏ hàng trống.</p>
<?php else: ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xóa</th>
        </tr>
        <?php
        require_once __DIR__ . '/../configs/database.php';
        $total = 0;
        foreach ($cart as $id => $qty):
            $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));
            $subtotal = $product['price'] * $qty;
            $total += $subtotal;
        ?>
        <tr>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= number_format($product['price'], 0, ',', '.') ?> đ</td>
            <td><?= $qty ?></td>
            <td><?= number_format($subtotal, 0, ',', '.') ?> đ</td>
            <td><a href="index.php?page=cart&remove=<?= $id ?>">Xóa</a></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><b>Tổng cộng</b></td>
            <td colspan="2"><b><?= number_format($total, 0, ',', '.') ?> đ</b></td>
        </tr>
    </table>
<?php endif; ?>

<a href="index.php">Tiếp tục mua hàng</a>