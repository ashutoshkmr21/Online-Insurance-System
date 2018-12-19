<?php
//destroy session when logout
 session_start();
 unset($_SESSION['user_name']);
 session_destroy();
 header('Location: index.php');
?>