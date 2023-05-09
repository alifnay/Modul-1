<!--Studi Kasus menggunakan Login page minggu lalu-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style.css">

    <script>
        //Javascript
        // function validateForm() {
        //     var id = document.forms["loginForm"]["id"].value;
        //     var password = document.forms["loginForm"]["password"].value;

        //     if (id == "" || password == "") { //jika id dan password kosong
        //         alert("Username dan Password harus diisi"); //muncul peringatan 

        //         if(id == ""){ //jika usernmae/id kosong
        //             document.forms["loginForm"]["id"].focus(); //akan mengembalikan focus ke form id
        //         } else { //jika password kosong
        //             document.forms["loginForm"]["password"].focus(); //akan mengembalikan focus ke form password
        //         } 
        //         return false;
        //     }

        //     var letters = /^[A-Za-z]/; 
        //     if (!id.match(letters) || !password.match(letters)) { //jika username dan password tidak memenuhi var letters
        //         alert("Username dan Password hanya bisa diisi dengan huruf"); //memunculkan peringatan 
        //         if (!id.match(letters)) { //jika username tidak memenuhi var letters
		// 			document.forms["loginForm"]["id"].focus(); //mengembalikan focus ke form username
		// 		} else {
		// 			document.forms["loginForm"]["password"].focus(); //mengembalikan focus ke form password
		// 		}
		// 		return false;
        //     }
        // }
    </script>
</head>

<body>

    <div class="login-box">
        <h2>Login</h2>

        <form name="loginForm" action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validateForm()">
            <!--class username-->
            <div class="user-box">
                <input type="text" name="id" id="id">
                <label for="id">Username</label>
            </div>
            <!--class password-->
            <div class="user-box">
                <input type="password" name="password" id="password">
                <label for="password">Password</label>
            </div>

            <!--tambahan-->
            <p style="color:#fff; font-size: 16px;">Belum punya akun?
                <button class="klik-button">klik disini</button>
            </p>

            <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <!--login button-->
                <input class="submit-button" type="submit" value="Login" name="login">
            </a>
        </form>  
    </div>
    
    <!--Studi Kasus Modul 10-->
    <!--PHP-->
    <?php
        session_start();
        if (isset($_POST['login'])) {
            $user = $_POST['id'];
            $pass = $_POST['password'];
            //memeriksa login
            if ($user == "Alif" && $pass == "naynay") {
                //membuat session
                $_SESSION['login'] = $user;
                header("location: StudiKasus_2.php");
                //menuju ke halaman pemeriksaan session
                echo "<h1>Halo, kamu berhasil login! </h1>";
                echo "<h2>Klik <a href='StudiKasus_2.php'> disini </a> untuk menuju ke halaman pemeriksaan session</h2>";
            } else {
                echo "Login gagal, silahkan coba login kembali!";
            }
        }
    ?>
</body>
</html>