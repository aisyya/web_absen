<?php 
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'nilai_db';

// Membuat koneksi
$conn = mysqli_connect($server, $user, $pass, $database);

// Memeriksa koneksi
if (!$conn) {
  die("<script>alert('Connection failed: " . mysqli_connect_error() . "')</script>");
}
?>
