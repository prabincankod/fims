<?php
require_once 'config/db.php';
session_start();




if (isset($_SESSION['email'])) {
    header("Location: /fims/dashboard/");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * from users where email = '" . $email . "' LIMIT 1";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            header("Location: /fims/dashboard");

            echo "Logged in";
        } else {
            echo "password doesnot match";
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        Login Here
    </h1>
    <form action="" method="post">
        EMAIL : <input type="email" name="email">
        Password : <input type="text" name="password">

        <button type="submit">
            Login
        </button>
    </form>
</body>

</html>