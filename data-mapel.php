<?php 
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['nisn'])) {
    header("Location: login2.php"); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="belajarr2.css">
    <title>Data Mata Pelajaran</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Times New Roman;
            font-size: 17px;
        }
        body {
            background: url(power.jpg) no-repeat center center fixed;
            background-size: cover;
        }
        .header {
            background: #333;
            color: rgb(0, 0, 0, 0.5);
            position: sticky;
            top: 0;
            z-index: 100;
            width: 100%;
            margin-bottom: 20px;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: #333;
            max-width: 1200px;
            margin: 0 auto;
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
        }
        .nav-links a:hover {
            background: #555;
            border-radius: 4px;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .kotak {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        .kotak .top-kotak { 
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            width: 200px;
            margin-bottom: 20px;
            position: relative;
        }
        .kotak .top-kotak img {
            width: 180%;
            height: auto;
            border-radius: 8px;
            margin-left: -50px;

        }
        .bottom-kotak {
    display: flex;
    width: 100%; /* Ensures it takes full width */
}
.bottom-item {
    flex: 1; /* Allows items to grow equally */
    margin: 0 5px; /* Decreased space between items */
    text-align: center; /* Center align the images */
}
.bottom-item img {
    width: 50%; /* Keep width at 50% */
    height: auto;
    border-radius: 8px;
}


        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            text-align: center;
        }
        .close-btn {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="navbar">
            <div class="logo">
                <a href="#">Formulir</a>
            </div>
            <ul class="nav-links">
                <li><a href="homepage.php">Home</a></li>        
                <li><a href="profile.php">Profile</a></li>
                <li><a href="belajarr1.php">Data nilai</a></li>
                <li><a href="data-mapel.php">Data mapel</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <h2>Data Mata Pelajaran</h2>

        <!-- Kotak Interaktif -->
        <div class="kotak">
            <div class="top-kotak" onclick="showPopup('rpl')">
                <img src="rpll.jpg" alt="RPL">
            </div>
            <div class="bottom-kotak">
                <div onclick="showPopup('dkv')" class="bottom-item">
                    <img src="dkv.jpg" alt="DKV">
                </div>
                <div onclick="showPopup('animasi')" class="bottom-item">
                    <img src="animasi.jpg" alt="Animasi">
                </div>
            </div>
        </div>

        <!-- Pop-up Modal -->
        <div id="popup" class="popup">
            <div class="popup-content">
                <span id="popup-title" style="font-weight: bold; font-size: 1.2rem;"></span>
                <div id="popup-boxes"></div>
                <button class="close-btn" onclick="closePopup()">Tutup</button>
            </div>
        </div>

    </div>

    <script>
        function showPopup(kelas) {
            let title = '';
            let content = '';

            if (kelas === 'rpl') {
                title = 'Mata Pelajaran RPL';
                content = `
                    <div style="display: flex; justify-content: center; gap: 20px;">
                        <div style="background-color: #4CAF50; color: white; padding: 20px; text-align: center; border-radius: 8px; width: 150px;">XI RPL 1</div>
                        <div style="background-color: #4CAF50; color: white; padding: 20px; text-align: center; border-radius: 8px; width: 150px;">XI RPL 2</div>
                    </div>
                `;
            } else if (kelas === 'dkv') {
                title = 'Mata Pelajaran DKV';
                content = `
                    <div style="display: flex; justify-content: center; gap: 20px;">
                        <div style="background-color: #4CAF50; color: white; padding: 20px; text-align: center; border-radius: 8px; width: 150px;">XI DKV 1</div>
                        <div style="background-color: #4CAF50; color: white; padding: 20px; text-align: center; border-radius: 8px; width: 150px;">XI DKV 2</div>
                    </div>
                `;
            } else if (kelas === 'animasi') {
                title = 'Mata Pelajaran Animasi';
                content = `
                    <div style="display: flex; justify-content: center; gap: 20px;">
                        <div style="background-color: #4CAF50; color: white; padding: 20px; text-align: center; border-radius: 8px; width: 150px;">XI DKV 1</div>
                        <div style="background-color: #4CAF50; color: white; padding: 20px; text-align: center; border-radius: 8px; width: 150px;">XI DKV 2</div>
                    </div>
                `;
            }

            document.getElementById('popup-title').innerText = title;
            document.getElementById('popup-boxes').innerHTML = content;
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>
</html>
