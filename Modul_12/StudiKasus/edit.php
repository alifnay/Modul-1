<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengedit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <div class="title">
        <h1>Edit Data</h1>
    </div>
    <br>
    <div class="container">
        <div class="box">
        <br>
        <h3>Edit Data</h3>
        <br>

        <?php
        include "koneksi.php";
        $nim = $_GET['nim'];
        $data = mysqli_query($koneksi, "SELECT * FROM data WHERE nim='$nim'");

        while($d = mysqli_fetch_array($data)) {
        ?>

            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                <div class="row mb-3">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" name="nim" value="<?php echo $d['nim'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" value="<?php echo $d['nama'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat" value="<?php echo $d['alamat'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <a href="dashboard.php">Lihat semua data</a>
                </div>
                <input type="submit" value="Simpan" class="btn btn-primary" style="margin-top: 20px;">
            </form>
            <?php
        }
        ?>
        </div>
    </div>
</body>
</html>