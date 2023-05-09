<?php
    session_start();
    if (isset($_SESSION['login'])) {
        unset($_SESSION);
        session_destroy();
        echo "<h1>Kamu berhasil logout</h1>";
        echo "<h3>Klik <a href='StudiKasus.php'> disini </a> untuk login kembali. <br> 
        Kamu tidak bisa masuk ke <a href='StudiKasus_2.php'> HOME</a> lagi.</h3>";
    }
?>