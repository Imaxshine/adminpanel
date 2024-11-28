<?php
session_start();
if(!isset($_SESSION['username']) || !isset($_SESSION['status'])){
    header('Location: login.php');
    exit;
}else{
    echo "Welcome back {$_SESSION['username']} as Admin";

    echo '<p>';
    echo '<a href="logout.php">Logout</a>';
    echo '</p>';
}
