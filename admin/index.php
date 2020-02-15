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
    date_default_timezone_set('America/Chicago');
    
    $welcome_string="Something broke... But welcome to the site!";
    $numeric_date=date("G");
    
    //Based on military time
    if($numeric_date>=0&&$numeric_date<=11)
    $welcome_string="Good Morning, good morning!";

    else if($numeric_date>=12&&$numeric_date<=17)
    $welcome_string="Good Afternoon!";

    else if($numeric_date>=18&&$numeric_date<=21)
    $welcome_string="Good Evening!";
    
    else if($numeric_date>=22&&$numeric_date<=23)
    $welcome_string="You're up late! Sleep is important! Well, not for me. I'm a computer.";
    
    //Display our greeting
    echo "$welcome_string";
    ?>

    <br>
    <br>

    <?php
    echo "Last Activity: ";
    ?>
    
</body>
</html>