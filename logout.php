<?php
session_start();
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi
header("Location: login2.php"); // Alihkan ke halaman login
exit();
?>
