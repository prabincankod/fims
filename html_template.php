<?php

/*
PHP Lab 1.
Author: Prabin Subedi
*/

$name = "Prabin Subedi";

// name of the student that will be displayed in the website
$name = $_GET['name'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello <?php echo $name; ?>

    </title>
</head>

<body>
    <p>
        Your name is : <?php echo $name; ?>
    </p>
</body>

</html>