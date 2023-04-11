<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleksi if-elseif</title>
</head>

<body>
    
    <?php

    $a = 10;
    $b = 5;

    if ($a > $b) {
        echo 'a lebih besar dari b';
    } elseif ($a == $b){
        echo 'a sama dengan b';
    } else {
        echo 'a TIDAK lebih besar dari b';
    }

    ?>
    
</body>
</html>