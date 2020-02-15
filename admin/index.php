<?php
    require_once '../load.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to Your Website </h2>

    <?php
    $time = date("H"); //displays in the 24 hour clock format
    if ($time < "12") {
        echo "Good morning, good morning! It's great to stay up late!";
    } else
   
    if ($time >= "12" && $time < "17") {
        echo "Afternoon! *tips hat*";
    } else
    
    if ($time >= "17" && $time < "19") {
        echo "Have a good evening";
    } else
    
    if ($time >= "19") {
        echo "Good night, Sweet dreams";
    }
    ?>

    <br>
    <br>

    <?php
    echo "Last Activity: ";
    ?>
    
</body>
</html>