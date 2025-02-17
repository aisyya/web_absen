<?php 
include "config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1); // Menampilkan kesalahan untuk debugging

session_start();
if (isset($_SESSION['username'])) {
    header("location: login2.php");
    exit();
}

if (isset($_POST['submit'])) {
    $nisn = $_POST['nisn']; // Ambil nilai NISN
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengecek apakah username sudah ada
    $sql = "SELECT * FROM user WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah ada. Silakan pilih yang lain.')</script>";
    } 
        // Tambahkan user baru
        $stmt = $conn->prepare("INSERT INTO user (nisn, username, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nisn, $username, $password); // Bind NISN, username, dan password

        if ($stmt->execute()) {
            echo "<script>alert('User berhasil terdaftar.')</script>";
            header("location: login2.php");
            exit();
        } else {
            echo "Error: " . $stmt->error; // Tampilkan kesalahan yang lebih spesifik
        }
    }

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="belajarr2.css">
    <title>FORMULIR</title>
    <link rel="stylesheet" type="text/css" href="https://fontawesome.com/search">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            align-items: center;
            background: url(smk.jfif);
            background-size: cover;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: #333;
            margin-bottom: 50px;
        }
        .navbar .logo a {
            color: #fff;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .nav-links {
            list-style: none;
            display: flex;
        }
        .nav-links li {
            margin-left: 1rem;
        }
        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 4px;
        }
        .nav-links a:hover {
            background: #555;
        }
        .container {
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 100px auto;
        }
        form h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            text-align: center;
            color: white;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .btn {
            background: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        .btn:hover {
            background: #45a049;
        }
        .login-register-text {
            text-align: center;
            margin-top: 20px;
            color: white;
        }
        .login-register-text a {
            color: #4CAF50;
            text-decoration: none;
        }
        .login-register-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="#">Formulir</a>
        </div>
        <ul class="nav-links">
            <li><a href="homepage.php">Home</a></li>        
            <li><a href="profile.php">Profile</a></li>
            <li><a href="belajarr1.php">Data nilai</a></li>
            <li><a href="data-mapel.php">Data mapel</a></li>
            <li><a href="login2.php">Login</a></li>
        </ul>
    </div>

    <div class="container">
        <form action="" method="POST" class="login-email">
            <h3>REGISTER</h3>
            <div class="input-group">
                <input type="text" placeholder="NISN" name="nisn" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" type="submit" class="btn">Daftar</button>
            </div>
            <p class="login-register-text">Sudah punya akun? <a href="login2.php">Login</a></p>
        </form>
    </div>
</body>
</html>
