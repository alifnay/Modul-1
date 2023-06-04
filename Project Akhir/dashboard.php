<?php
include("koneksi.php");

if (isset($_POST['log-out'])) {
    session_destroy();
    header("location: SignIn.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
    <!--Header-->
    <header class="header-dashAdmin">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid" style="padding-left: 20px; padding-right: 70px;">
                <a class="navbar-brand" href="#">
                    <img src="https://i.pinimg.com/originals/ef/75/29/ef75292bd5a38ba2ee5363f9cb7a94e4.png" alt="" style="width: 7%">
                    <span style="color: white; cursor: pointer;">UNIVERSITAS NEGERI YOGYAKARTA</span>
                </a>
                <div class="navbarRight">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dataPengajar.php">Pengajar</a>
                            </li>
                            <form action="" method="post">
                            <li class="nav-item">
                                <button class="btn btn-danger" type="submit" name="log-out">Logout</button>
                            </li>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <!--Content-->
    <section class="image-animated" class="d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative aos-init aos-animate">
            <div class="welcome">
                <img src="image-dashboard.png" class="img-fluid animated">
                <h2>
                    Halo ^^
                    Selamat datang
                    <span style="color: blue">Admin</span>
                </h2>
            </div>
        </div>
    </section>

    <!--Footer-->
    <footer id="footer" class="footer">
        <div class="footer-content bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer-info">
                            <h3>BEST UNIVERSITY</h3>
                            <p>Jl. Colombo Yogyakarta No.1, 
                                <br>Kabupaten Sleman, 
                                <br>Daerah Istimewa Yogyakarta</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>