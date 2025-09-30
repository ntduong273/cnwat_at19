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

    .ar1-form {
        margin-top: 20px;
        background: #222;
        padding: 18px 20px 10px 20px;
        border-radius: 10px;
        width: fit-content;
    }
    .ar1-inputs input[type="text"] {
        width: 40px;
        padding: 4px;
        margin-right: 4px;
        background: #f9f9d1;
        border: 1px solid #ccc;
        border-radius: 3px;
        text-align: center;
        color: #222;
        font-size: 1em;
    }
    .ar1-form button {
        padding: 5px 18px;
        margin-left: 8px;
        font-size: 1em;
        border-radius: 4px;
        border: 1px solid #aaa;
        background: #eee;
        color: #222;
        cursor: pointer;
        transition: background 0.2s;
    }
    .ar1-form button:hover {
        background: #ddd;
    }
    .ar1-result {
        margin-top: 18px;
        background: #181818;
        padding: 14px 18px;
        border-radius: 8px;
        color: #fff;
        font-size: 1.1em;
        width: fit-content;
    }
    .ar1-label {
        color: #ffd700;
        font-weight: bold;
    }
</style>
  
    <a class="home-link" href="home.php">Home</a>
    <a class="ar1chieu-link" href="ar1Chieu.php">Ar1Chieu</a>
    <a class="matrix-link" href="matrix.php">Matrix</a>
    <a class="associateArr-link" href="associateArray.php">AssociateArr</a>
    <br><br>
    <div style="color: white;">
        <span class="ar1-label" style="color: white;">Thao tác trên mảng 1 chiều:</span><br>
        Bài toán: nhập vào chuỗi số, tính tổng các số, giá trị trung bình, tìm min, max, trung bình cộng.
    </div>
    <form class="ar1-form" method="post">
        <div class="ar1-inputs">
            <?php
            // Hiển thị 10 ô input, giữ lại giá trị sau khi submit
            $inputs = [];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                for ($i = 0; $i < 10; $i++) {
                    $val = isset($_POST['nums'][$i]) ? htmlspecialchars($_POST['nums'][$i]) : '';
                    $inputs[] = $val;
                }
            } else {
                // Giá trị mặc định
                $inputs = ['3','3','3','1','3','3','5','3','3','3'];
            }
            for ($i = 0; $i < 10; $i++) {
                echo '<input type="text" name="nums[]" maxlength="5" value="'.$inputs[$i].'">';
            }
            ?>
            <button type="reset">Reset</button>
            <button type="submit" name="calc">Calculate</button>
        </div>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['calc'])) {
        $nums = array_map('trim', $_POST['nums']);
        $nums = array_map('floatval', $nums);
        $valid = array_filter($nums, function($v){ return is_numeric($v); });
        if (count($valid) === 0) {
            echo '<div class="ar1-result">Vui lòng nhập ít nhất 1 số hợp lệ!</div>';
        } else {
            $tong = array_sum($nums);
            $min = min($nums);
            $max = max($nums);
            $trungbinh = $tong / count($nums);
            echo '<div class="ar1-result">';
            echo '<b>KẾT QUẢ:</b><br>';
            echo 'Tổng: <b>'.$tong.'</b><br>';
            echo 'Trung bình: <b>'.round($trungbinh,2).'</b><br>';
            echo 'Min: <b>'.$min.'</b><br>';
            echo 'Max: <b>'.$max.'</b>';
            echo '</div>';
        }
    }
    ?>