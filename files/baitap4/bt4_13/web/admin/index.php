<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Map page name to file path
$pageMap = [
    'dashboard'      => 'dashboard.php',
    // users
    'userList'       => 'users/userList.php',
    'userAdd'        => 'users/userAdd.php',
    'userEdit'       => 'users/userEdit.php',
    'userDetail'     => 'users/userDetail.php',
    'userDelete'     => 'users/userDelete.php',
    
    // products
    'productList'    => 'products/productList.php',
    'productAdd'     => 'products/productAdd.php',
    'productEdit'    => 'products/productEdit.php',
    'productDelete'  => 'products/productDelete.php',
];

$includeFile = isset($pageMap[$page]) ? $pageMap[$page] : 'dashboard.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin - LaptopShop.vn</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div style="display:flex;">
    <div style="width:180px; background:#eee; padding:10px;">
        <button onclick="location.href='../index.php'">Return Home</button><br>
        <button onclick="location.href='index.php'">Admin Home</button><br>
        <button onclick="location.href='../index.php?page=logout'">Logout</button><br>
        <button onclick="location.href='index.php?page=userList'">UsersManage</button><br>
        <button onclick="location.href='index.php?page=productList'">Products</button><br>
    </div>
    <div style="flex:1; padding:20px;">
        <?php include $includeFile; ?>
    </div>
</div>
</body>
</html>