<?php
session_start();
require_once "../includes/functions.php";
redirect_to_login();
require_once "../config/db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $added_by = $_SESSION['id'];

    $sql = "INSERT INTO friends(name, address, email, phone, added_by) VALUES('$name', '$address', '$email' , '$phone', '$added_by')";

    if (mysqli_query($conn, $sql)) {

        header("Location: /fims/dashboard");
        echo "Frind Added Succssfully";
    } else {
        echo "Friend could not be added.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a friend</title>
</head>

<body>


    <a href="/fims/">Home</a>
    <a href="/fims/dashboard">Dashboard</a>

    <form action="" method="post">
        Name: <input type="text" name="name" required> <br>
        Address: <input type="text" name="address" required><br>
        Phone: <input type="text" name="phone" required><br>
        Email: <input type="text" name="email" required>
        <br>
        <button type="submit">
            Add Friend
        </button>
    </form>
</body>
</html>