<style>
    body {  
        background: #1e1e1e;
    }

    a.home-link, a.ar1chieu-link, a.matrix-link, a.associateArr-link {
        display: inline-block;
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
    a.home-link:hover, a.ar1chieu-link:hover, a.matrix-link:hover, a.associateArr-link:hover {
        background: #217dbb;
        box-shadow: 0 4px 16px rgba(52,152,219,0.18);
    }
</style>
  
<a class="home-link" href="pages/home.php">Home</a>
<a class="ar1chieu-link" href="pages/ar1Chieu.php">Ar1Chieu</a>
<a class="matrix-link" href="pages/matrix.php">Matrix</a>
<a class="associateArr-link" href="pages/associateArray.php">AssociateArr</a>
<br><br>
<div style="color: white;">
    <?php
        require_once("libs/math.php");
        VeBang();
        echo ("<br>");
        echo (Max2(100, 10));

        if(CheckLogin("admin", "admin")) 
        {
            echo ("<br>Dang nhap thanh cong");
        } else {
            echo ("<br>Dang nhap that bai");
        }

        $mang = array(10, 2, 8, 6, 4, 1 ,9);

        echo ("<br>Tong theo cach 1: " . TongDay1($mang));
        echo ("<br>Tong theo cach 2: " . TongDay2($mang));
    ?>
</div>