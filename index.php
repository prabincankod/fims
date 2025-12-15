<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIMS | Homepage</title>
</head>

<body>
    <h1>
        FIMS
    </h1>
    <?php if (isset($_SESSION['id'])) { ?>
        <a href="dashboard">Go to Dashboard</a>
    <?php } else { ?>
        <a href="register.php">
            Register
        </a>
        <a href="login.php">
            Login
        </a>
    <?php } ?>


</body>

</html>