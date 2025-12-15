<?php
session_start();
require_once 'config/db.php';

if (isset($_SESSION['email'])) {
    header("Location: /fims/dashboard");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    // checking whether user email exists or not.
    $sql = "SELECT email FROM users WHERE email = '" . $email . "' LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)) {
        echo "Email Already Exists";
    } else {

        if ($password === $confirm_password) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT  INTO users(name, address, email, phone, password) VALUES('$name', '$address', '$email', '$phone', '$password')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "Account Created Successfully";
                header("Location: /fims/login.php");
            }
        } else {

            echo "Confirm password doesnot match";
        }
    }
}

?>




<body>

    <h1>Register a User</h1>

    <form action="" method="post">
        Name: <input type="text" name="name" required> <br>
        Email: <input type="email" name="email" required> <br>
        Phone: <input type="text" name="phone" required> <br>
        Address: <textarea name="address" rows="3" id=""></textarea> <br>
        Password: <input type="text" name="password" required>
        Confirm Password: <input type="text" name="confirm_password" required>

        <br>
        <button type="submit">
            Create User
        </button>
        <a href="index.php"> Cancel</a>
    </form>