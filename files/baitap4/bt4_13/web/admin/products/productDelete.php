<?php

require_once __DIR__ . '/../../configs/database.php';
$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM products WHERE id=$id");
header('Location: index.php?page=productList');
exit;