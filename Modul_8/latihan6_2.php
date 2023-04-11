<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Argumen Fungsi/Prosedur</title>
</head>

<body>
    
    <?php

    /**
     * Mencetak String 
     * $teks nilai string
     * $bold adalah argumen opsional
     */

    function print_teks($teks, $bold = true) {
        echo $bold ? '<b>' .$teks. '</b>' : $teks;
    }

    print_teks('Indonesiaku');
    // Mencetak dengan huruf tebal
    echo '&nbsp';
    print_teks('Indonesiaku', false);
    // Mencetak dengan huruf reguler
    ?>

</body>
</html>