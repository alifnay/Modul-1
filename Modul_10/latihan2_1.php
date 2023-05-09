<?php
    session_start();
    if (isset($_POST['login'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        //memeriksa login
        if ($user == "Lebron" && $pass == "1234") {
            //menciptakan session
            $_SESSION['login'] = $user;
            //menuju ke halaman pemeriksaan session
            echo "<h1>Halo, kamu berhasil login! </h1>";
            echo "<h2>Klik <a href='latihan2_2.php'> disini (latihan2_2.php)</a> untuk menuju ke halaman pemeriksaan session</h2>";
        } else {
            die ("Anda belum login! Pastikan anda login terlebih dahulu <a href='latihan2_1.php'> disini</a>");
        }
    } else {
        ?>
        <html>
            <head>
                <title>Login disini</title>
            </head>
            <body>
                <form action="" method="post">
                    <h2>Login disini</h2>
                    Username    : <input type="text" name="user"><br>
                    Password    : <input type="password" name="pass"><br>
                    <input type="submit" name="login" value="login">
                </form>
            </body>
        </html>
    <?php
    } ?>