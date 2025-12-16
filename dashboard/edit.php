<?php
session_start();
require_once "../includes/functions.php";
redirect_to_login();
require_once "../config/db.php";



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $added_by = $_SESSION['id'];

    $sql = "UPDATE `friends` SET `name`='$name',`address`='$address',`phone`='$phone',`email`='$email',`added_by`='$added_by' WHERE id= $id";

    if (mysqli_query($conn, $sql)) {
        echo "Frind Updated Succssfully";
        header("Location: /fims/dashboard");
    } else {
        echo "Friend could not be Edited.";
    }
}

if ($_SERVER['REQUEST_METHOD'] = 'GET') {


    if (!isset($_GET['id'])) {
        header("Location: /fims/dashboard");
    }

    $id = $_GET['id'];
    $uid = $_SESSION['id'];

    // find if friend exists or not.
    $sql = "select * from friends where id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (!mysqli_num_rows($result)) {
        echo "Friend Id doesnot exist";
        exit();
    }
    $friend = mysqli_fetch_assoc($result);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit A friend</title>
</head>
<body>
    <a href="/fims/">Home</a>
    <a href="/fims/dashboard">Dashboard</a>
    <form action="" method="post">
        Name: <input type="text" value="<?php echo $friend['name'] ?>" name="name" required> <br>
        Address: <input type="text" value="<?php echo $friend['address'] ?>" name="address" required><br>
        Phone: <input type="text" value="<?php echo $friend['phone'] ?>" name="phone" required><br>
        Email: <input type="text" value="<?php echo $friend['email'] ?>" name="email" required>
        <input type="text" value="<?php echo $friend['id'] ?>" name="id" required hidden>
        <br>
        <button type="submit">
            EDIT
        </button>
    </form>
</body>

</html>