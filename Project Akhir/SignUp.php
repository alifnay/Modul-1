<?php
    include("koneksi.php");
    $message = null;

    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $query = mysqli_query($koneksi, "INSERT INTO username (username, email, password) VALUES ('$username', '$email', '$password')");
    
        if ($query) {
            $message = (object) [
                'type' => 'success',
                'text' => 'Berhasil menambah data'
            ];
            header("location: SignIn.php");
        } else {
            $message = (object) [
                'type' => 'danger',
                'text' => 'Gagal melakukan registrasi'
            ];
            header("refresh:2; url=SignUp.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!--Bootstrap dan CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
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
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                        <div class="title-signup">Registrasi Akun</div>
                        <p class="p-regis">Masukkan nama user dan email untuk membuat akun baru!</p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="name@gmail.com" name="email" required>
                            <label for="email">Email address</label>
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

                        <div class="tosignin">
                            Kembali ke menu Sign In, klik
                            <a href="SignIn.php"> disini</a>
                        </div>

                        <div class="regis-btn">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block" name="signup" value="SignUp">Sign Up</button>
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