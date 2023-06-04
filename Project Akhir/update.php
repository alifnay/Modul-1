<?php
    include "koneksi.php";
    $id = $_POST['id'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $fakultas = $_POST['fakultas'];
    $matkul = $_POST['matkul'];
    $profile = $_POST['profile'];
    $lulusan = $_POST['lulusan'];

    mysqli_query($koneksi, "UPDATE data SET nip = '$nip', nama='$nama', fakultas='$fakultas', matkul='$matkul', profile='$profile'
    , lulusan ='$lulusan'WHERE id='$id'");

    header("location:dataPengajar.php?pesan=update");
?>