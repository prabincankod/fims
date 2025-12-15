<?php
session_start();
require_once "../includes/functions.php";
require_once "../config/db.php";
redirect_to_login();

$uid = $_SESSION['id'];

$sql = "select * from friends where added_by=$uid";

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIMS| Dashboard</title>
</head>

<body>
    <h1>Welcome, <?php echo $_SESSION['email'] ?> </h1>
    <a href="add.php"> Add a Friend</a>
    <br>
    <a href="logout.php"> Logout</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php if (mysqli_num_rows($result)) {
                while ($friend = mysqli_fetch_assoc($result)) {
                    echo "<tr> ";

                    echo "<td>" . $friend['id'] . " </td>";
                    echo "<td>" . $friend['name'] . " </td>";
                    echo "<td>" . $friend['address'] . " </td>";
                    echo "<td>" . $friend['phone'] . " </td>";
                    echo "<td>" . $friend['email'] . " </td>";

                    echo "<td><a href='delete.php?id=" . $friend['id'] . "' > delete </a> </td>";

                    echo "</tr> ";
                }
            } else {
            ?>
                <tr>
                    No Friends found
                </tr>
            <?php
            } ?>
        </tbody>
    </table>


</body>





</html>