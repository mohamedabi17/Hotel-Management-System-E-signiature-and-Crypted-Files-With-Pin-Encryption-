<?php

 

session_start();
session_unset();
session_destroy();
unset($_SESSION['user_id']);
unset($_SESSION['username']);
session_abort();
header('Location:login.php');
exit();
?>