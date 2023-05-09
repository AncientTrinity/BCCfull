<?php

session_start();
unset($_SESSION['authenticated']);
unset($_SESSION['auth_user']);
$_SESSION['status'] ="you logged out succsesfully";
header("location:index.php");

?>