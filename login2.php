<?php

session_start();
include 'connection.php'; // Include your database connection

// Proses login jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nisn = $_POST['nisn'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Query untuk memeriksa apakah data sesuai dengan yang ada di database
    $sql = "SELECT * FROM user WHERE nisn = ? AND username = ? AND password = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $nisn, $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Jika ditemukan data yang cocok, simpan ke session dan redirect
        if ($result->num_rows > 0) {
            $_SESSION['nisn'] = $nisn; // Set session
            header("Location: homepage.php"); // Redirect ke homepage
            exit(); // Pastikan untuk menghentikan eksekusi lebih lanjut
        } else {
            // Jika login gagal, tampilkan pesan error
            echo "<script>alert('Login gagal. Nisn, username, atau password tidak sesuai.');</script>";
        }
    } else {
        echo "<script>alert('Terjadi kesalahan dalam database.');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Login</title>
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
            background: url('smk.jfif') no-repeat center center fixed;
            background-size: cover;
        }
        .header {
            background: #333;
            color: rgb(0, 0, 0, 0.5);
            position: sticky;
            top: 0;
            z-index: 100;
            margin: 10px;
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
            margin: 0;
            padding: 0;
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
        }
        .nav-links a:hover {
            background: #555;
            border-radius: 4px;
        }
        .burger {
            display: none;
            cursor: pointer;
        }
        .burger .line {
            width: 25px;
            height: 3px;
            background: #fff;
            margin: 5px;
            border-radius: 3px;
        }
        .container {
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 50px auto;
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
        .login-password-text a{
            text-align: center;
            margin-top: 20px;
            color: white;
            margin-left: 100px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
            .nav-links {
                flex-direction: column;
                display: none;
            }
            .nav-links.active {
                display: flex;
            }
            .burger {
                display: block;
            }
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
        <?php if (isset($_SESSION['username'])): ?>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login2.php">Login</a></li>
        <?php endif; ?>
    </ul>
    <div class="burger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</div>


    <div class="container">
        <form action="" method="POST" class="login-nisn">
            <h3>LOGIN</h3>
            <div class="input-group">
                <input type="text" placeholder="nisn" name="nisn" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="username" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="password" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" type="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Don't have an account? <a href="Register.php">Register</a></p>
            <p class="login-password-text"><a href="Forgot-pass.php">Forgot password?</a></p>
        </form>
    </div>

    <script>
        // Burger menu toggle script
        document.querySelector('.burger').addEventListener('click', () => {
            document.querySelector('.nav-links').classList.toggle('active');
        });
    </script>
</body>
</html>