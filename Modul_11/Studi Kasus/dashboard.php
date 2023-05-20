<?php
    include ("koneksi.php");

    if (isset($_POST['tambah_data'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $alamat = $_POST['alamat'];
    
        $query = mysqli_query($koneksi, "INSERT INTO data (nama, nim, alamat) VALUES ('$nama', '$nim', '$alamat')");
    
        if ($query) {
            $message = (object) [
                'type' => 'success',
                'text' => 'Berhasil menambah data'
            ];
            header("location: dashboard.php");
        } else {
            echo "Gagal tambah data";
        }
    }

    if (isset($_POST['log-out'])) {
        session_destroy();
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <style>
        .title{
            text-align: center;
            margin: 20px 20px 50px 20px;
        }

        .title-child{
            margin-bottom: 20px;
        }

        .box{
            border: 1px solid #f0f3f7;
            border-radius: 3px !important;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
            padding: 24px 40px 32px;
            width: 100%;
        }

        table{
            margin-bottom: 50px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#data').DataTable();
        });
    </script>
</head>
<body>
    <br><br>
    <div class="container">
    <div class="box">
        <h5 class="title">Data Mahasiswa</h5>
        <table class="table table-hover" id="data">
            <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
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
                    <td><?php echo $d['nim']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td>
                        <a class="btn btn-outline-primary" href="lihat.php?nim=<?php echo $d['nim']; ?>">Lihat</a>
                        <a class="btn btn-outline-primary" href="edit.php?nim=<?php echo $d['nim']; ?>">Edit</a>
                        <a class="btn btn-outline-primary" href="hapus.php?nim=<?php echo $d['nim']; ?>">Hapus</a>
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
            <form action="" method="post" >
                <button type="submit" class="btn btn-danger" name="log-out">Log Out</button>
            </form>
        </div>
        </div>
        </div>
    </div>
    </div>
</body>
</html>