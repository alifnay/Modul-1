<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <div class="title">
        <h1>Detail Mahasiswa</h1>
    </div>

    <?php
    include ("koneksi.php");
    $nim = $_GET['nim'];
    $data = mysqli_query($koneksi, "SELECT * from data WHERE nim='$nim'") or die('koneksi gagal');
    $no = 1;
    while($d = mysqli_fetch_array($data)){
    ?>
    <div class="container">
        <div class="box">
            <div class="profile">
                <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" class="rounded-circle" width="10%">
            </div>
            
            <table>
                <tr>
                    <td>NIM</td>
                    <td>: <?php echo $d['nim'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: <?php echo $d['nama'] ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?php echo $d['alamat'] ?></td>
                </tr>
                <tr></tr>
            </table>
            <?php
        } ?>
            <a href="dashboard.php" class="btn btn-primary" style="margin-top: 20px;">Kembali</a>
        </div>
    </div>
</body>
</html>