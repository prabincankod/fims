<?php
session_start();
require_once "../includes/functions.php";
redirect_to_login();
require_once "../config/db.php";


if (!isset($_GET['id'])) {
    header("Location: /fims/dashboard");
}

$id = $_GET['id'];

$sql = "DELETE from friends where id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: /fims/dashboard");
} else {
    echo "SAD: failed deleting your friend. ";
}
