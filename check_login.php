<?php
session_start(); // Start the session

if (!isset($_SESSION['nisn'])) {
    // Redirect to login page if the user is not logged in
    header("Location: login2.php");
    exit();
}
?>
