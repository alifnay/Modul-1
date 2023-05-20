<?php
include("koneksi.php");
$message = null;

if (isset($_POST['login'])) {
    $username = $_POST['id'];
    $password = $_POST['password'];

    $query = "SELECT * FROM username WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $data['username'];
        header("location: dashboard.php");
    } else {
        $message = (object) [
            'type' => 'danger',
            'text' => 'Username atau password salah'
        ];
        header("refresh:2; url=login.php");
    }
}
?>

<!--Studi Kasus menggunakan Login page minggu lalu-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style.css">
    <style>
        .error {
            margin: 20px 30px;
            color: red;
        }

        /*CSS*/
        html {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: #f2eee3;
        }

        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, .5);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 10px;
        }

        .login-box h2{
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input{
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus ~ label,
        .login-box .user-box input:valid ~ label {
            top: -20px;
            left: 0;
            color: #03e9f4;
            font-size: 12px;
        }

        .login-box form a {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #03e9f4;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 4px;
        }

        .login-box a:hover {
            background: #03e9f4;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #03e9f4,
                        0 0 25px #03e9f4,
                        0 0 50px #03e9f4,
                        0 0 100px #03e9f4;
        }

        .login-box a span {
            position: absolute;
            display: block;
        }

        .login-box a span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #03e9f4);
            animation: btn-anim1 1s linear infinite;
        }

        @keyframes btn-anim1 {
            0% {
            left: -100%;
            }
            50%,100% {
            left: 100%;
            }
        }

        .login-box a span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #03e9f4);
            animation: btn-anim2 1s linear infinite;
            animation-delay: .25s;
        }

        @keyframes btn-anim2 {
            0% {
            top: -100%;
            }
            50%,100% {
            top: 100%;
            }
        }

        .login-box a span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #03e9f4);
            animation: btn-anim3 1s linear infinite;
            animation-delay: .5s;
        }

        @keyframes btn-anim3 {
            0% {
            right: -100%;
            }
            50%,100% {
            right: 100%;
            }
        }

        .login-box a span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #03e9f4);
            animation: btn-anim4 1s linear infinite;  
            animation-delay: .75s;
            }

        @keyframes btn-anim4 {
            0% {
            bottom: -100%;
            }
            50%,100% {
            bottom: 100%;
            }
        }

        .submit-button {
            background: none;
            border: none;
            font-size: 14px;
            font-weight: bolder;
            color: #03e9f4;
        }
        .submit-button:hover {
            color: #fff;
            cursor: pointer;
        }
        .klik-button {
            background: none;
            color: #03e9f4;
            border: none;
            font-size: 16px ;
        }
        .klik-button:hover {
            cursor: pointer;
            opacity: 70%;
        }
        .klik-button:active {
            cursor: pointer;
            opacity: 50%;
        }
    </style>

    <script>
        //Javascript
        function validateForm() {
            var id = document.forms["loginForm"]["id"].value;
            var password = document.forms["loginForm"]["password"].value;

            if (id == "" || password == "") { //jika id dan password kosong
                alert("Username dan Password harus diisi"); //muncul peringatan 

                if(id == ""){ //jika usernmae/id kosong
                    document.forms["loginForm"]["id"].focus(); //akan mengembalikan focus ke form id
                } else { //jika password kosong
                    document.forms["loginForm"]["password"].focus(); //akan mengembalikan focus ke form password
                } 
                return false;
            }

            var letters = /^[A-Za-z]/; 
            if (!id.match(letters) || !password.match(letters)) { //jika username dan password tidak memenuhi var letters
                alert("Username dan Password hanya bisa diisi dengan huruf"); //memunculkan peringatan 
                if (!id.match(letters)) { //jika username tidak memenuhi var letters
					document.forms["loginForm"]["id"].focus(); //mengembalikan focus ke form username
				} else {
					document.forms["loginForm"]["password"].focus(); //mengembalikan focus ke form password
				}
				return false;
            }
        }
    </script>
</head>

<body>

    <div class="login-box">
        <h2>Login</h2>
        <?php
            if($message) : 
        ?>
        <div class="error"><?php echo $message->text ?></div>
        <?php endif; ?>
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
</body>
</html>
