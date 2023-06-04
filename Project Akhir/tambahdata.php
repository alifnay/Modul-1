<?php
    include ("koneksi.php");

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script>
        //Javascript
        function validateForm() {
            var nip = document.forms["addform"]["nip"].value;
            var nama = document.forms["addform"]["nama"].value;
            var fakultas = document.forms["addform"]["fakultas"].value;
            var matkul = document.forms["addform"]["fakultas"].value;

            if (nip == "" || nama == "" || fakultas == "" || matkul == "") { //jika nama, nip, fakultas, dan matkul kosong
                alert("Data pengajar harus diisi"); //muncul peringatan 

                if(nip == ""){ //jika usernmae/id kosong
                    document.forms["addform"]["nip"].focus(); //akan mengembalikan focus ke form id
                } else if (nama == ""){ //jika password kosong
                    document.forms["addform"]["nama"].focus(); //akan mengembalikan focus ke form password
                } else if (fakultas == ""){
                    document.forms["addform"]["fakultas"].focus();
                } else {
                    document.forms["addform"]["matkul"].focus();
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

    <section class="image-animated">
        <div class="container d-flex flex-column">
            <h3 class="title">Data Pengajar</h3>
            <div class="box" style="margin-top: 20px; margin-bottom: 20px;">
                <h5 class="title-child">Menambahkan data pengajar</h5>
                <form action="dataPengajar.php" method="post" name="addform" onsubmit="return validateForm()">
                    <div class="mb-3 mt-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" placeholder="Masukkan nip" name="nip">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <input type="text" class="form-control" id="fakultas" placeholder="Masukkan fakultas" name="fakultas">
                    </div>
                    <div class="mb-3">
                        <label for="matkul" class="form-label">Mata Kuliah</label>
                        <input type="text" class="form-control" id="matkul" placeholder="Masukkan matkul" name="matkul">
                    </div>
                    <div class="mb-3">
                        <label for="profile" class="form-label">Profile</label>
                        <textarea class="form-control" name="profile" value="<?php echo $d['profile'] ?>" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="lulusan" class="form-label">Lulusan</label>
                        <input type="text" class="form-control" id="lulusan" placeholder="Masukkan lulusan" name="lulusan">
                    </div>
                    <div class="flex">
                        <button type="submit" class="btn btn-primary" name="tambah_data">
                            Submit
                        </button>
                        <a href="dataPengajar.php" class="btn btn-success">
                            Batal
                        </a>
                    </div>
                </form>
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