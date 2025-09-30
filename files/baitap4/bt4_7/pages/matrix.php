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

    .content {
        flex: 8;
        background: #1e1e1e;
        padding: 20px;
        border-radius: 0 12px 12px 0;
        color: white;
    }

    .matrix-form {
        margin-top: 20px;
        background: #222;
        padding: 18px 20px 10px 20px;
        border-radius: 10px;
        width: fit-content;
    }
    .matrix-table {
        border-collapse: collapse;
        margin-bottom: 10px;
    }
    .matrix-table td {
        padding: 2px 4px;
    }
    .matrix-table input[type="text"] {
        width: 40px;
        padding: 4px;
        background: #f9f9d1;
        border: 1px solid #ccc;
        border-radius: 3px;
        text-align: center;
        color: #222;
        font-size: 1em;
    }
    .matrix-form button {
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
    .matrix-form button:hover {
        background: #ddd;
    }
    .matrix-result {
        margin-top: 18px;
        background: #181818;
        padding: 14px 18px;
        border-radius: 8px;
        color: #fff;
        font-size: 1.1em;
        width: fit-content;
    }
    .matrix-label {
        color: #ffd700;
        font-weight: bold;
    }
    .matrix-title {
        font-weight: bold;
        margin-bottom: 4px;
    }
    .matrix-output {
        font-family: monospace;
        white-space: pre;
        margin-bottom: 10px;
    }
</style>
    
    <a class="home-link" href="home.php">Home</a>
    <a class="ar1chieu-link" href="ar1Chieu.php">Ar1Chieu</a>
    <a class="matrix-link" href="matrix.php">Matrix</a>
    <a class="associateArr-link" href="associateArray.php">AssociateArr</a>
    <br><br>
    <div style="color: white;">
        <span class="matrix-label">Sử dụng mảng để tính: hiệu, tổng, tích 2 ma trận</span>
    </div>
    <div style="color: white;">
        <form class="matrix-form" method="post">
            <table class="matrix-table">
                <tr>
                    <td colspan="3" class="matrix-title" style="color: white;">Nhập Ma trận 1</td>
                    <td style="width:30px"></td>
                    <td colspan="3" class="matrix-title" style="color: white;">Nhập Ma trận 2</td>
                </tr>
                <?php
                // Lấy dữ liệu đã nhập hoặc giá trị mặc định
                $m1 = $m2 = [];
                for ($i = 0; $i < 3; $i++) {
                    for ($j = 0; $j < 3; $j++) {
                        $m1[$i][$j] = isset($_POST['m1'][$i][$j]) ? htmlspecialchars($_POST['m1'][$i][$j]) : (($i==$j)?1:($i+1));
                        $m2[$i][$j] = isset($_POST['m2'][$i][$j]) ? htmlspecialchars($_POST['m2'][$i][$j]) : 0;
                    }
                }
                // Hiển thị 2 bảng nhập
                for ($i = 0; $i < 3; $i++) {
                    echo '<tr>';
                    for ($j = 0; $j < 3; $j++) {
                        echo '<td><input type="text" name="m1['.$i.']['.$j.']" maxlength="5" value="'.$m1[$i][$j].'"></td>';
                    }
                    if ($i == 0) echo '<td rowspan="3" style="width:30px"></td>';
                    for ($j = 0; $j < 3; $j++) {
                        echo '<td><input type="text" name="m2['.$i.']['.$j.']" maxlength="5" value="'.$m2[$i][$j].'"></td>';
                    }
                    echo '</tr>';
                }
                ?>
                <tr>
                    <td colspan="3" style="text-align:right">
                        <button type="reset">Nhập Lại</button>
                    </td>
                    <td></td>
                    <td colspan="3" style="text-align:left">
                        <button type="submit" name="calc">Tính</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div style="color: white;">
    <?php
    function print_matrix($mat) {
        $out = '';
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $out .= $mat[$i][$j] . ' ';
            }
            $out .= "\n";
        }
        return $out;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['calc'])) {
        // Lấy dữ liệu và chuyển sang số
        $a = $b = [];
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $a[$i][$j] = floatval($_POST['m1'][$i][$j]);
                $b[$i][$j] = floatval($_POST['m2'][$i][$j]);
            }
        }
        // Tính tổng, hiệu, tích
        $sum = $diff = $prod = [];
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $sum[$i][$j] = $a[$i][$j] + $b[$i][$j];
                $diff[$i][$j] = $a[$i][$j] - $b[$i][$j];
                $prod[$i][$j] = 0;
                for ($k = 0; $k < 3; $k++) {
                    $prod[$i][$j] += $a[$i][$k] * $b[$k][$j];
                }
            }
        }
        echo '<div class="matrix-result">';
        echo '<b>KẾT QUẢ:</b><br>';
        echo 'Ma trận Tổng:<br><div class="matrix-output">'.nl2br(print_matrix($sum)).'</div>';
        echo 'Ma trận Hiệu:<br><div class="matrix-output">'.nl2br(print_matrix($diff)).'</div>';
        echo 'Ma trận Tích:<br><div class="matrix-output">'.nl2br(print_matrix($prod)).'</div>';
        echo '</div>';
    }
    ?>
    </div>