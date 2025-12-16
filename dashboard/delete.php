<?php
session_start();
require_once "../includes/functions.php";
redirect_to_login();
require_once "../config/db.php";


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
// check if the friend is my friend or not
if ($friend['added_by'] != $uid) {
    echo "Not allowed to Delete because " . $friend['name'] . " is not your friend";
    exit();
}

$sql = "DELETE from friends where id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: /fims/dashboard");
} else {
    echo "SAD: failed deleting your friend. ";
}
