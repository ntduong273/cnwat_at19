<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>LaptopShop.vn</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // Chuyển trang khi chọn danh mục ở dropdown
        function goToCategory(select) {
            var cat = select.value;
            if (cat !== '') {
                window.location.href = 'index.php?page=productList&category=' + encodeURIComponent(cat);
            }
        }
        // Xử lý tìm kiếm
        function submitSearch(e) {
            e.preventDefault();
            var keyword = document.getElementById('search-keyword').value;
            var cat = document.getElementById('search-category').value;
            window.location.href = 'index.php?page=productSearch&keyword=' + encodeURIComponent(keyword) + '&category=' + encodeURIComponent(cat);
        }
    </script>
</head>
<body>
    <div class="topbar">
        <div class="logo">LaptopShop.vn</div>
        <div class="menu">
            <a href="index.php?page=home">Trang Chủ</a>
            <a href="#">Hướng Dẫn</a>
            <a href="#">Giới Thiệu</a>
            <a href="#">Tuyển Dụng</a>
            <a href="#">Liên Hệ</a>
        </div>
        <div class="search">
            <form onsubmit="submitSearch(event)">
                <input type="text" id="search-keyword" name="keyword" placeholder="Nhập thông tin tìm kiếm...">
                <select id="search-category" name="category" onchange="goToCategory(this)">
                    <option value="">Tất cả danh mục</option>
                    <option value="ACER">Laptop ACER</option>
                    <option value="ASUS">Laptop ASUS</option>
                    <option value="DELL">Laptop DELL</option>
                    <option value="HP">Laptop HP</option>
                    <option value="LENOVO">Laptop LENOVO</option>
                    <option value="MACBOOK">Laptop MACBOOK</option>
                    <option value="SAMSUNG">Laptop SAMSUNG</option>
                </select>
                <button class="btn-search" type="submit">Tìm Kiếm</button>
                <a href="index.php?page=cart">Xem giỏ hàng</a>
            </form>
            
        </div>
        
    </div>

    <div class="container">
        <div class="sidebar">
            <h3>Danh mục</h3>
            <ul>
                <li><a href="index.php">Tất cả sản phẩm</a></li>
                <li><a href="index.php?page=productList&category=ACER">Laptop ACER</a></li>
                <li><a href="index.php?page=productList&category=ASUS">Laptop ASUS</a></li>
                <li><a href="index.php?page=productList&category=DELL">Laptop DELL</a></li>
                <li><a href="index.php?page=productList&category=HP">Laptop HP</a></li>
                <li><a href="index.php?page=productList&category=LENOVO">Laptop LENOVO</a></li>
                <li><a href="index.php?page=productList&category=MACBOOK">Laptop MACBOOK</a></li>
                <li><a href="index.php?page=productList&category=SAMSUNG">Laptop SAMSUNG</a></li>
            </ul>
            <form method="get" action="index.php">
                <input type="hidden" name="page" value="productList">
                <label>Lọc theo giá:</label>
                <select name="price_range" onchange="this.form.submit()">
                    <option value="">--Chọn mức giá--</option>
                    <option value="0-10000000">0 - 10 triệu</option>
                    <option value="10000000-20000000">10 - 20 triệu</option>
                    <option value="20000000-30000000">20 - 30 triệu</option>
                    <option value="30000000-40000000">30 - 40 triệu</option>
                </select>
            </form>
        </div>
        <div class="content">
<!-- ...existing code... -->