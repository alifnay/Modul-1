<?php
    include ("koneksi.php");

    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: SignIn.php");
        exit;
    }

    if (isset($_POST['tambah_data'])) {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $fakultas = $_POST['fakultas'];
        $matkul = $_POST['matkul'];
        $profile = $_POST['profile'];
        $lulusan = $_POST['lulusan'];
    
        $query = mysqli_query($koneksi, "INSERT INTO data (nip, nama, fakultas, matkul, profile, lulusan) VALUES ('$nip', '$nama', '$fakultas', '$matkul', '$profile', '$lulusan')");
    
        if ($query) {
            $message = (object) [
                'type' => 'success',
                'text' => 'Berhasil menambah data'
            ];
            header("location: dataPengajar.php");
        } else {
            echo "Gagal tambah data";
        }
    }

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#data').DataTable();
        });

        function confirmDelete() {
            return confirm("Apakah anda yakin ingin menghapus data?");
        }

        function confirmLogout() {
            return confirm("Apakah anda ingin logout?");
        }
    </script>
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
                                <a class="nav-link active" style="cursor: pointer;">Pengajar</a>
                            </li>
                            <form action="" method="post">
                            <li class="nav-item">
                            <button class="btn btn-danger" type="submit" name="log-out" onclick="return confirmLogout()">Logout</button>
                            </li>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <section class="image-animated" class="d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative aos-init aos-animate">
            <div class="box" style="margin-top: 20px;">
                <div class="title-table" style="margin-bottom: 40px; text-align: center; font-family: sans-serif;">
                    <h5>Data Pengajar UNY</h5>
                </div>
                    <table class="table table-hover" id="data">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Fakultas</th>
                            <th>Mata Kuliah</th>
                            <th>Menu</th>
                        </tr>
                        </thead>
                        <?php
                        include ("koneksi.php");
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * from data");
                        while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $d['nip']; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td><?php echo $d['fakultas']; ?></td>
                                <td><?php echo $d['matkul']; ?></td>
                                <td>
                                    <a class="btn btn-outline-primary" href="lihat.php?nip=<?php echo $d['nip']; ?>">Lihat</a>
                                    <a class="btn btn-outline-primary" href="edit.php?nip=<?php echo $d['nip']; ?>">Edit</a>
                                    <a class="btn btn-outline-primary" href="hapus.php?nip=<?php echo $d['nip']; ?>" onclick="return confirmDelete()">Hapus</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                <br>
                <div class="d-flex justify-content-between">
                    <form action="tambahdata.php" method="post">
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
                    </form>
                </div>
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