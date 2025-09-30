<?php
    $page = "home";

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    if (isset($_POST['page'])) {
        $page = $_POST['page'];
    }

    session_start();
    $lang = "english";
    if (isset($_SESSION['lang'])) {
        $lang = $_SESSION['lang'];
    }

    require_once("lang/".$lang.".php");

    if (isset($_POST["btnEnglish"])) {
        $_SESSION['lang'] = "english";
        header("location: index.php?page=$page");
        exit;
    } elseif (isset($_POST["btnVietnamese"])) {
        $_SESSION['lang'] = "vietnamese";
        header("location: index.php?page=$page");
        exit;
    }
?>
<a href="index.php?page=home"><?php echo HOME; ?></a>
<a href="index.php?page=contact"><?php echo CONTACT; ?></a>
<a href="index.php?page=introduction"><?php echo INTRODUCTION; ?></a>
<a href="index.php?page=login"><?php echo LOGIN; ?></a>

<form method="post">
    <input type="hidden" name="page" value="<?php echo $page; ?>"/>
    <input type="submit" name="btnEnglish" value="English" <?php if ($lang=="english") echo 'style="background:lightgrey;"'; ?>>
    <input type="submit" name="btnVietnamese" value="Tiếng Việt" <?php if ($lang=="vietnamese") echo 'style="background:lightgrey;"'; ?>>
</form>

<hr>

<?php
// Load trang con dựa vào biến $page
    $file = "./pages/" . $page . ".php";
    if (file_exists($file)) {
        include($file);
    } else {
        echo "<p>Page not found!</p>";
    }
?>
