<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            background: url('power.jpg') no-repeat center center fixed;
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
            width: 100%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }

        .navbar .logo a {
            color: #fff;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 10px;
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
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            margin: 100px auto;
        }

        .container h3 {
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }

        .input-group {
            margin-bottom: 20px; /* Increased spacing between fields */
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
            <li><a href="#data-mapel">Data mapel</a></li>
            <li><a href="login2.php">Login</a></li>
        </ul>
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>

    <div class="container">
        <form action="" method="POST">
            <h3>Reset Password</h3>
            <div class="input-group">
                <input type="text" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="New Password" name="password" required>
            </div>
            <div class="input-group">
                <button type="submit" name="submit" class="btn">Reset Password</button>
            </div>
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
