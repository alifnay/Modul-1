<?php
    session_start();
    if (isset($_SESSION['login'])) {
        unset($_SESSION);
        session_destroy();
        echo "<h1>Kamu berhasil logout/keluar</h1>";
        echo "<h1>Klik <a href='latihan2_1.php'> disini </a> untuk login kembali. <br> 
        Kamu tidak bisa masuk ke <a href='latihan2_2.php'> HOME (beranda)</a> lagi. </h2>";
    }
?>