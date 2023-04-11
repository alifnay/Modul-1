<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleksi switch</title>
</head>

<body>
    
    <?php

    $i = 0;

    if($i == 0) {
        echo "i equals 0";
    } elseif ($i == 1) {
        echo "i equals 1";
    } elseif ($i == 2) {
        echo "i equals 2";
    }

    echo '&nbsp';
    
    // Ekuivalen, dengan pendekatan switch
    switch ($i) {
        case 0 : 
            echo "i equals 0";
            break;
        case 1 : 
            echo "i equals 1";
            break;
        case 2 : 
            echo "i equals 2";
            break;
    }

    ?>
    
</body>
</html>