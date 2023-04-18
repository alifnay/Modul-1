<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
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
        function validateForm() {
            var id = document.forms["loginForm"]["id"].value;
            var password = document.forms["loginForm"]["password"].value;

            if (id == "" || password == "") {
                alert("Username dan Password harus diisi");

                if(id == ""){
                    document.forms["loginForm"]["id"].focus();
                } else {
                    document.forms["loginForm"]["password"].focus();
                } 
                return false;
            }

            var letters = /^[A-Za-z]/;
            if (!id.match(letters) || !password.match(letters)) {
                alert("Username dan Password hanya bisa diisi dengan huruf");
                if (!id.match(letters)) {
					document.forms["loginForm"]["id"].focus();
				} else {
					document.forms["loginForm"]["password"].focus();
				}
				return false;
            }
        }
    </script>
</head>

<body>

    <div class="login-box">
        <h2>Login</h2>

        <form name="loginForm" action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validateForm()">
            <div class="user-box">
                <input type="text" name="id" id="id">
                <label for="id">Username</label>
            </div>

            <div class="user-box">
                <input type="password" name="password" id="password">
                <label for="password">Password</label>
            </div>

            <p style="color:#fff; font-size: 16px;">Belum punya akun?
                <button class="klik-button">klik disini</button>
            </p>
            <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input class="submit-button" type="submit" value="Login">
            </a>
        </form>  
    </div>

    <?php
    $valid_id = "Alif";
    $valid_password = "Nay";
    
    $id = $_POST["id"];
    $password = $_POST["password"];
    
    if (!is_string($id) || !is_string($password)) {
        echo "ID/Username dan Password harus berupa string";
        exit();
    }
    
    if ($id === $valid_id && $password === $valid_password) {
        echo "Selamat datang, " . $id;
    } else {
        echo "Login gagal";
    }
    ?>
    
</body>
</html>