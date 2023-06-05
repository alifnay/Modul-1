<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: SignIn.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <style>
        .title{
            text-align: center;
            margin: 20px 20px 50px 20px;
        }

        .box{
            border: 1px solid #f0f3f7;
            border-radius: 3px !important;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
            padding: 24px 40px 32px;
            width: 100%;
        }
        .rounded-circle{
            display: block;
            margin: auto;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <!--Header-->
    <header class="header-dashAdmin">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid" style="padding-left: 20px; padding-right: 70px;">
                <a class="navbar-brand" href="dashboard.php">
                    <img src="https://i.pinimg.com/originals/ef/75/29/ef75292bd5a38ba2ee5363f9cb7a94e4.png" alt="" style="width: 7%">
                    <span style="color: white; cursor: pointer;">UNIVERSITAS NEGERI YOGYAKARTA</span>
                </a>
            </div>
        </nav>
    </header>
    
    <?php
    include ("koneksi.php");
    $nip = $_GET['nip'];
    $data = mysqli_query($koneksi, "SELECT * from data WHERE nip='$nip'") or die('koneksi gagal');
    $no = 1;
    while($d = mysqli_fetch_array($data)){
    ?>

    <!--Content-->
    <section class="image-animated">
        <div class="container d-flex flex-column">
            <div class="box" style="margin-top: 40px; margin-bottom: 40px;">
                <div class="profile">
                    <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" class="rounded-circle" width="10%">
                </div>
                
                <table>
                    <tr>
                        <td>NIP</td>
                        <td>: <?php echo $d['nip'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: <?php echo $d['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>Fakultas</td>
                        <td>: <?php echo $d['fakultas'] ?></td>
                    </tr>
                    <tr>
                        <td>Mata Kuliah</td>
                        <td>: <?php echo $d['matkul'] ?></td>
                    </tr>
                    <tr>
                        <td>Profile</td>
                        <td>: <?php echo $d['profile'] ?></td>
                    </tr>
                    <tr>
                        <td>Lulusan</td>
                        <td>: <?php echo $d['lulusan'] ?></td>
                    </tr>
                    <tr></tr>
                </table>
                <?php
            } ?>
                <a href="dataPengajar.php" class="btn btn-primary" style="margin-top: 20px;">Kembali</a>
            </div>
        </div>
    </section>

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