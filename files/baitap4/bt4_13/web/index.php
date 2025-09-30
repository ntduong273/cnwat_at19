<?php
session_start();
if (isset($_GET['addcart'])) {
    $id = intval($_GET['addcart']);
    if (!isset($_SESSION['cart'][$id])) $_SESSION['cart'][$id] = 0;
    $_SESSION['cart'][$id]++;
    header('Location: index.php?page=cart');
    exit;
}
if (isset($_GET['remove'])) {
    $id = intval($_GET['remove']);
    unset($_SESSION['cart'][$id]);
    header('Location: index.php?page=cart');
    exit;
}

// index.php (gốc project)
require_once __DIR__ . '/configs/database.php';

// chọn page: home | productList | productDetail | productSearch
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$allowed = ['home', 'productList', 'productDetail', 'productSearch', 'cart'];
if (!in_array($page, $allowed)) {
    $page = 'home';
}

include __DIR__ . '/templates/header.php';
?>

<div class="site-container">

    <main class="main-content">
        <?php
        $pageFile = __DIR__ . '/pages/' . $page . '.php';
        if (file_exists($pageFile)) {
            include $pageFile;
        } else {
            echo "<h2>Trang không tồn tại</h2>";
        }
        ?>
    </main>
</div>

<?php include __DIR__ . '/templates/footer.php'; ?>
