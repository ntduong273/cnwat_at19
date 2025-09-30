<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #1e1e1e;
    }
    .containerA {
        display: grid;
        grid-template-columns: 2fr 8fr; /* Tỉ lệ 2:8 */
        height: 100vh; /* full màn hình */
    }
    .left {
        background: #1e1e1e;
        padding: 10px;
        border-right: 1px solid #ccc;
    }
    .right {
        background: #1e1e1e;
        padding: 20px;
    }
    a.home-link {
        display: inline-block;
        margin-top: 16px;
        padding: 10px 28px;
        background: #3498db;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1em;
        transition: background 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 8px rgba(52,152,219,0.08);
    }
    a.home-link:hover {
        background: #217dbb;
        box-shadow: 0 4px 16px rgba(52,152,219,0.18);
    }
</style>
<!--
<a class="home-link" href="#" target="mainFrame">Home</a>
-->
<div class="containerA">
    <div class="left">
        <?php include "pages/listclass.php"; ?>
    </div>
    <div class="right">
        <?php include "pages/liststudentinclass.php"; ?>
    </div>
</div>