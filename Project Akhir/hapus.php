<?php
    include "koneksi.php";
    $nip = $_GET['nip'];
    mysqli_query($koneksi, "DELETE FROM data WHERE nip='$nip'") or die();

    header("location:dataPengajar.php?pesan=hapus");
?>