<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Definisi Fungsi/Prosedur</title>
</head>

<body>
    
    <?php

    // Contoh Prosedur 
    function do_print() {
        // Mencetak informasi timestamp
        echo time();
    }

    // Memanggil prosedur
    do_print();
    echo '<br />';

    // Contoh fungsi penjumlahan 
    function jumlah($a, $b) {
        return ($a + $b);
    }

    echo jumlah(2, 3);
    // Output: 5

    ?>

</body>
</html>