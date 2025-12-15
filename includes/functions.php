<?php
function redirect_to_login()
{
    if (!isset($_SESSION['email'])) {
        header("Location: /fims/login.php");
    }
}
