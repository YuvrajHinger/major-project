<?php
@session_start();
unset($_SESSION['id']);
unset($_SESSION['password']);
@session_unset();
header("location: ../login.php");
?>
