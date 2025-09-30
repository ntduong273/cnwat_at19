<?php
    function VeBang() {
        echo ("
            <table width=500px border=1 heigh=100px bgcolor=gray>
                <tr><td>aaa</td><td>bb</td></tr>
                <tr><td>aaa</td><td>bb</td></tr>
                <tr><td>aaa</td><td>bb</td></tr>
            </table>
        ");
    }

    function Max2($a, $b) {
        return $a>=$b?$a:$b;
    }

    function CheckLogin($username, $password) 
    {
        $hashPass = md5($password);
        $hashPassDung = md5("admin");

        if ($username == "admin" && $hashPass == $hashPassDung) {
            return true;
        } else {
            return false;
        }
    }

    function TongDay1($mangSo)
    {
        $sum = 0;
        for($i=0; $i<count($mangSo); $i++) {
            $sum += $mangSo[$i];
        }
        return $sum;
    }
    function TongDay2($mangSo)
    {
        $sum = 0;
        foreach($mangSo as $item) {
            $sum += $item;
        }
        return $sum;
    }
?>