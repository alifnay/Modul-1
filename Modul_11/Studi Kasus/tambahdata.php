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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script>
        //Javascript
        function validateForm() {
            var nim = document.forms["addform"]["nim"].value;
            var nama = document.forms["addform"]["nama"].value;
            var alamat = document.forms["addform"]["alamat"].value;

            if (nim == "" || nama == "" || alamat == "") { //jika id dan password kosong
                alert("Data mahasiswa harus diisi"); //muncul peringatan 

                if(nim == ""){ //jika usernmae/id kosong
                    document.forms["addform"]["nim"].focus(); //akan mengembalikan focus ke form id
                } else if (nama == ""){ //jika password kosong
                    document.forms["addform"]["nama"].focus(); //akan mengembalikan focus ke form password
                } else {
                    document.forms["addform"]["alamat"].focus();
                }
                return false;
            }
        }
    </script>

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
    </style>
</head>

<body>
<h3 class="title">Data Mahasiswa</h3>
    <div class="container">
        <div class="box">
            <h5 class="title-child">Menambahkan data mahasiswa</h5>
            <form action="dashboard.php" method="post" name="addform" onsubmit="return validateForm()">
                <div class="mb-3 mt-3">
                    <label for="nim" class="form-label">NIM:</label>
                    <input type="text" class="form-control" id="nim" placeholder="Masukkan nim" name="nim">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat" name="alamat">
                </div>
                <div class="flex">
                    <button type="submit" class="btn btn-primary" name="tambah_data">
                        Submit
                    </button>
                    <a href="dashboard.php" class="btn btn-success">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>