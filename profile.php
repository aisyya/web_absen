<?php 
include 'check_login.php'; // Ensure the user is logged in
// Your existing code for the homepage goes here
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="belajarr2.css">
    <title>Profil Guru</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Times New Roman;
    font-size: 17px;
}
        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url(smk.jfif) no-repeat center center fixed;
            background-size: cover;
        }
        .header {
            background: #333;
            color: rgb(0, 0, 0, 0.5);
            position: sticky;
            top: 0;
            z-index: 100;
            width: 100%;
            margin-bottom: 500px;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: #333;
            width: 450%;
            max-width: 1200px;
            margin: 0 auto;
            margin-right: 10px;
        }
        .navbar .logo a {
            color: #fff;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
            margin-left: -50px;
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
            font-size: 1,5rem;
            padding: 0.5rem 1rem;
            margin-left: 2px;
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
            align-items: center;
            background: rgba(0, 0, 0, 0.7);
            padding: 28px;
            border-radius: 10px;
            margin: 50px auto;
            width: 890px;
            max-width: 1200px;
            margin-top: 1590px;
            margin-left: -1085px;
        }
        .profile-box {
            border: 1px solid #fff;
            padding: 20px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
            text-align: center;
            width: 300px;
            margin-right: 5px;
        }
        .profile-box img {
            max-width: 40%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .profile-box h3 {
            margin-top: 0;
            color: #fff;
        }
        .profile-box p {
            margin: 10px 0;
            color: #fff;
        }
        .profile-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            width: 100%;
            max-width: 1200px;
        }
        .profile-container .profile-box {
            flex: 1;
            max-width: 48%;
        }
        .profile-container-full {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            width: 100%;
            max-width: 1200px;
        }
        .profile-container-full .profile-box {
            flex: 1;
            max-width: 22%; /* Adjust width to fit four boxes in a row */
        }
        .profile-container-additional {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
        }
        .profile-container-additional .profile-box {
            flex: 1;
            max-width: 22%; /* Adjust width to fit four boxes in a row */
        }
        .profile-container-more {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
        }
        .profile-container-more .profile-box {
            flex: 1;
            max-width: 22%; /* Adjust width to fit four boxes in a row */
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
    <div class="burger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</div>

    </div>
    <div class="container">
        <div class="profile-box">
            <img src="IMG_7584.jpg" alt="Kepala sekolah SMKN 71 JAKARTA">
            <div class="profile-info">
                <h3>Kepala Sekolah</h3>
                <p>Drs. Lambas Pakpahan, MM</p>
            </div>
        </div>
        <div class="profile-container">
            <div class="profile-box">
                <img src="IMG_3845.JPG" alt="Wakil Kepala Sekolah SMKN 71 JAKARTA">
                <div class="profile-info">
                    <h3>Wakil Kepala Sekolah bid. kesiswaan</h3>
                    <p>Dra. Suwarni</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3845.JPG" alt="Guru Mapel SMKN 71 JAKARTA">
                <div class="profile-info">
                    <h3>Wakil Kepala Sekolah bid. kurikulum</h3>
                    <p>Jenny Vera Nursjam, M.Pd</p>
                </div>
            </div>
        </div>
        <div class="profile-container-full">
            <div class="profile-box">
                <img src="IMG_3855.jpg" alt="Guru Mapel 1">
                <div class="profile-info">
                    <h3>Nurhadi Yahya, S.Pd</h3>
                    <p>KAPRODI DKV</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3966.jpg" alt="Guru Mapel 2">
                <div class="profile-info">
                    <h3>Khairul arifin, S.Pd</h3>
                    <p>Guru Konsentrasi keahlian DKV</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3936.jpg" alt="Guru Mapel 3">
                <div class="profile-info">
                    <h3>Anggi Laras Pratiwi, S.Pd</h3>
                    <p>Guru Konsentrasi keahlian DKV</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3862.jpg" alt="Guru Mapel 4">
                <div class="profile-info">
                    <h3>Rahmat Setiawan, S.Ds</h3>
                    <p>Guru Konsentrasi keahlian DKV</p>
                </div>
            </div>
        </div>
        <div class="profile-container-additional">
            <div class="profile-box">
                <img src="IMG_3940.jpg" alt="Keterangan 1">
                <div class="profile-info">
                    <h3>Anisha Oktaviana, S.Pd</h3>
                    <p>Guru Konsentrasi keahlian ANIMASI</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3872.jpg" alt="Keterangan 2">
                <div class="profile-info">
                    <h3>Miftahul Zannah, S.Pd</h3>
                    <p>Guru Konsentrasi keahlian ANIMASI</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3875.jpg" alt="Keterangan 3">
                <div class="profile-info">
                    <h3>Fonny Krisnawulan, S.Ds</h3>
                    <p>Guru Konsentrasi keahlian ANIMASI</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="bindo.jfif" alt="Keterangan 4">
                <div class="profile-info">
                    <h3>Umi handayani S.Pd</h3>
                    <p>Guru Bahasa Indonesia</p>
                </div>
            </div>
        </div>
        <div class="profile-container-more">
            <div class="profile-box">
                <img src="IMG_3946.jpg" alt="Keterangan 5">
                <div class="profile-info">
                    <h3>Nanda Arsya Murti, S.Kom</h3>
                    <p>KAPRODI RPL</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3927.jpg" alt="Keterangan 6">
                <div class="profile-info">
                    <h3>Azizah Khoiro Nisah, S.Pd</h3>
                    <p>Guru Konsentrasi keahlian RPL</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3868.jpg" alt="Keterangan 7">
                <div class="profile-info">
                    <h3>Nurhayatul Fadillah, S.Pd</h3>
                    <p>Guru Konsentrasi keahlian RPL</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3840.jpg" alt="Keterangan 8">
                <div class="profile-info">
                    <h3>Muhammad Usman, S.Si</h3>
                    <p>Guru Agama Islam</p>
                </div>
            </div>
        </div>
        <!-- New profile boxes -->
        <div class="profile-container-more">
            <div class="profile-box">
                <img src="IMG_4011.jpg" alt="Keterangan 9">
                <div class="profile-info">
                    <h3>Nurina Kartika Ayu, S.Pd</h3>
                    <p>Guru PJOK</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3835.jpg" alt="Keterangan 10">
                <div class="profile-info">
                    <h3>Faradillah Aryani, S.Pd</h3>
                    <p>Guru PPKWU</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3902.jpg" alt="Keterangan 11">
                <div class="profile-info">
                    <h3>Sigit Prasetyo, S.Pd</h3>
                    <p>Guru Bahasa Indonesia</p>
                </div>
            </div>
            <div class="profile-box">
                <img src="IMG_3918.jpg" alt="Keterangan 12">
                <div class="profile-info">
                    <h3>Dwiadi Eliyanto, S.Pd</h3>
                    <p>Guru Bahasa Inggris</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
