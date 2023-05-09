<?php
    session_start();
    if (isset($_SESSION['login'])) {
        echo "<h1>Selamat datang, ". $_SESSION['login'] ."</h1>";
        echo "<h2>Halaman ini bisa tampil jika berhasil login. Ini adalah HOME (beranda) kamu. </h2>";
        echo "<h2>Klik <a href='latihan2_3.php'>disini (latihan2_3.php)</a> untuk logout (keluar)</h2>";
    } else {
        //session tidak muncul karena belum login atau belum berhasil login
        die ("Anda belum login! Pastikan anda login terlebih dahulu <a href='latihan2_1.php'> disini</a>");
    }
?>