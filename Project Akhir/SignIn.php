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
        header("refresh:2; url=SignIn.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body class="loginBody">
    <div class="container">
    <!--Header-->
    <header class="header-login">
        <div class="logo">
            <img src="https://i.pinimg.com/originals/ef/75/29/ef75292bd5a38ba2ee5363f9cb7a94e4.png" style="width: 7%; margin-right: 10px;">
            <span>UNIVERSITAS NEGERI YOGYAKARTA</span>
        </div>
    </header><br>
    
    <!--Content-->
        <div class="box">
            <div class="row">
                <div class="col">
                    <div class="user-image">
                    <img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg?w=740&t=st=1685710860~exp=1685711460~hmac=04b9c6a7c99f20319694212fe44c23e2c40d07712807bcd63b86325f23fcbd41"
                    style="width: 85%;" class="img-fluid animated">
                    </div>
                </div>
                <div class="col">
                    <form action="<?php $_SERVER['PHP_SELF']?>" name="loginForm" method="post">
                        <div class="title-signin">Log In</div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="id" placeholder="Username" name="id" required>
                            <label for="id">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                            <label for="password">Password</label>
                            <i class="uil uil-eye-slash toggle" onclick="myFunction()"></i>
                        </div>

                        <script>
                            const toggle = document.querySelector(".toggle");
                            function myFunction() {
                                var x = document.getElementById("password");
                                if (x.type === "password") {
                                    x.type = "text";
                                        toggle.classList.replace("uil-eye-slash", "uil-eye");
                                    } else {
                                        x.type = "password";
                                        toggle.classList.replace("uil-eye", "uil-eye-slash");
                                    }
                                }
                        </script>

                        <div class="tosignup">
                            Belum punya akun? Klik 
                            <a href="SignUp.php"> disini</a>
                        </div>
                        <div class="signin-btn">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block" name="login" value="Login">Sign In</button>
                            </div>
                        </div>
                        <?php
                            if($message) : 
                        ?>
                        <div class="error"><?php echo $message->text ?></div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>