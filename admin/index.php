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


    
    $time = date("H");

    $timezone = date("e");
    
    if ($time < "12") {
        echo "Look How beautiful this Morning is:)";
    } else
   
    if ($time >= "12" && $time < "17") {
        echo "Look at this nice afternoon ";
    } else
    
    if ($time >= "17" && $time < "19") {
        echo "Have a Good evening";
    } else
    
    if ($time >= "19") {
        echo "Good night Sweet Dreams";
    }
    ?>
</body>
</html>