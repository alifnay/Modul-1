<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengedit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <style>
        .title{
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .box{
            border: 1px solid #f0f3f7;
            border-radius: 3px !important;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
            padding: 24px 40px 32px;
            width: 100%;
        }
    </style>
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
                                <a class="nav-link" aria-current="page" href="dashboard.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="dataPengajar.php">Pengajar</a>
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

    <section class="image-animated">
        <div class="container d-flex flex-column">
            <div class="box" style="border-top: 3px solid #47b2e4; margin-top: 20px; margin-bottom: 20px;">
            <br>
            <h3>Edit Data</h3>
            <br>

            <?php
            include "koneksi.php";
            $nip = $_GET['nip'];
            $data = mysqli_query($koneksi, "SELECT * FROM data WHERE nip='$nip'");

            while($d = mysqli_fetch_array($data)) {
            ?>

            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                <div class="row mb-3">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="text" name="nip" value="<?php echo $d['nip'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" value="<?php echo $d['nama'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="col-sm-10">
                        <input type="text" name="fakultas" value="<?php echo $d['fakultas'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="matkul" class="col-sm-2 col-form-label">Mata Kuliah</label>
                    <div class="col-sm-10">
                        <input type="text" name="matkul" value="<?php echo $d['matkul'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="profile" class="col-sm-2 col-form-label">Profile</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="profile" value="<?php echo $d['profile'] ?>" rows="3"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lulusan" class="col-sm-2 col-form-label">Lulusan</label>
                    <div class="col-sm-10">
                        <input type="text" name="lulusan" value="<?php echo $d['lulusan'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <a href="dataPengajar.php">Lihat semua data</a>
                </div>
                <input type="submit" value="Simpan" class="btn btn-primary" style="margin-top: 20px;">
            </form>
            <?php
            }
            ?>
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