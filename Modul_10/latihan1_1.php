<?php
    $value1 = 'Lebron';
    $value2 = 'Lebron James';
    setcookie("username", $value1);
    setcookie("nama_lengkap", $value2, time() +3600); //login expired 1 jam
    echo "<h2>Ini halaman untuk set cookie</h2>";
    echo "<h2>Klik <a href='latihan1_2.php'>disini</a> untuk mengecek cookies. </h2>" //link ke file latihan1_2.php
?>