<?php
    session_start();
    if(isset($_SESSION['login'])) {
        echo "<h1>Selamat datang, ". $_SESSION['login'] ."</h1>";
        echo "<h3>Anda berhasil login.</h3>";
        echo "<h3>Klik <a href='StudiKasus_3.php'>disini</a> untuk logout (keluar)</h3>";
    } else {
        //session tidak muncul karena belum login atau belum berhasil login
        die ("Anda belum login! Pastikan anda login terlebih dahulu <a href='StudiKasus.php'> disini</a>");
    }
?>