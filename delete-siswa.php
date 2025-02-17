<?php
//koneksi database
include 'connection.php';

//menangkap data nisn yg dikirim dari url
$nisn = $_GET['nisn'];


//mengapus data dari database
mysqli_query($conn, "delete FROM daftar_nilai WHERE nisn='$nisn'");

//mengalikan kembali ke halaman formulir
header("location:belajarr1.php");
?> 