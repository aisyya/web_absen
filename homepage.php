<?php 
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['nisn'])) {
    header("Location: login2.php"); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
            position: relative;
            padding-bottom: 50px;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url(smk.jfif) no-repeat center center fixed;
            background-size: cover;
            filter: blur(3px);
            z-index: -1; /* Letakkan gambar di belakang konten lainnya */
        }

        /* Notifikasi Selamat Datang Styles */
#welcomeModal .modal-content {
    background-color: #fff;
    border: 1px solid #888;
    border-radius: 8px;
    width: 80%;
    max-width: 500px;
    margin: 15% auto; /* Posisi tengah vertical */
    padding: 20px;
    position: relative;
}

/* Notifikasi Pop-Up Styles */
.notification {
    position: fixed;
    top: 60px; /* Jarak dari atas layar */
    left: 50%;
    transform: translateX(-50%); /* Memusatkan notifikasi secara horizontal */
    background-color: grey; 
    color: white; /* Warna teks putih */
    padding: 15px;
    border-radius: 100px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    z-index: 1000; /* Pastikan notifikasi di atas elemen lain */
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 16px;
    width: 300px; /* Atur lebar sesuai kebutuhan */
    opacity: 0; /* Mulai dengan transparansi */
    transition: opacity 0.5s ease-in-out;
}
.notification p {
    margin-right: 20px;
}
.notification.show {
    opacity: 1; /* Tampilkan notifikasi dengan transisi */
}

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: #333;
            margin-bottom: 50px;
            width: 100%;
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

        .slideshow-container {
            position: relative;
            max-width: 1000px;
            margin: auto;
            overflow: hidden;
        }

        .slide {
            display: none;
        }

        .slide img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .boxes-container {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            padding: 0 20px;
            padding-bottom: 50px;
        }

        .box {
            flex: 1;
            margin: 0 10px;
            height: 200px; /* Atur tinggi sesuai kebutuhan */
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            cursor: pointer; /* Pointer untuk menunjukkan bahwa kotak bisa diklik */
        }

        .box img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Agar gambar tetap proporsional dan tidak terdistorsi */
        }

        /* Modal Styles */
        .modal {
            display: none; /* Hide modal by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.8);
            padding-top: 30px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 8px;
            width: 80%;
            max-width: 800px;
            display: flex; /* Flexbox untuk membuat layout sisi kiri dan kanan */
        }

        .modal-img {
            flex: 1;
            margin-right: 20px;
        }

        .modal-img img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .modal-text {
            flex: 2;
            margin-top: 50px;
        }
        .modal-text h2 {
             padding-bottom: 20px;
             margin-left: 10px;
        }
        .modal-text p {
            padding: 10px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            margin-right: 20px;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<!-- Notifikasi Pop-Up -->
<div id="notification" class="notification">
    <p>Selamat Datang di Website Kami!</p>
    <!-- <span class="close" onclick="closeNotification()">&times;</span> -->
</div>


    <div class="background-image"></div>
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

    <div class="slideshow-container">
        <div class="slide">
            <img src="slide1.png" alt="Gambar 1">
        </div>
        <div class="slide">
            <img src="slide2.png" alt="Gambar 2">
        </div>
        <div class="slide">
            <img src="slide3.png" alt="Gambar 3">
        </div>
        <div class="slide">
            <img src="slide4.png" alt="Gambar 4">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <div class="boxes-container">
        <div class="box" onclick="openModal('modal1')">
            <img src="rpll.jpg" alt="Foto 1">
        </div>
        <div class="box" onclick="openModal('modal2')">
            <img src="animasi.jpg" alt="Foto 2">
        </div>
        <div class="box" onclick="openModal('modal3')">
            <img src="dkv.jpg" alt="Foto 3">
        </div>
    </div>

    <!-- Modal 1 -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal1')">&times;</span>
            <div class="modal-img">
                <img src="IMG_6809.jpg" alt="Foto 1">
            </div>
            <div class="modal-text">
                <h2>REKAYASA PERANGKAT LUNAK</h2>
                <p>Rekayasa Perangkat Lunak adalah disiplin ilmu dan teknik dalam pengembangan perangkat lunak yang mencakup semua aspek dari proses pembuatan perangkat lunak. Ini meliputi perencanaan, analisis kebutuhan, desain, pengembangan, pengujian, dan pemeliharaan perangkat lunak.</p>
                <p>Tujuannya adalah untuk menghasilkan perangkat lunak yang berkualitas tinggi yang memenuhi kebutuhan pengguna, dapat diandalkan, dan efisien.</p>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div id="modal2" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal2')">&times;</span>
            <div class="modal-img">
                <img src="IMG_6731.jpg" alt="Foto 2">
            </div>
            <div class="modal-text">
                <h2>ANIMASI</h2>
                <p>Jurusan Animasi adalah bidang studi yang fokus pada pembuatan dan pengembangan animasi dalam berbagai bentuk, seperti animasi 2D, 3D, dan efek visual.</p>
                <p>Jurusan ini menggabungkan seni kreatif dengan teknologi komputer untuk menciptakan konten visual yang dinamis dan menarik. Mahasiswa jurusan ini mempelajari berbagai aspek teknik animasi, desain karakter, dan produksi media digital.</p>
            </div>
        </div>
    </div>

    <!-- Modal 3 -->
    <div id="modal3" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal3')">&times;</span>
            <div class="modal-img">
                <img src="IMG_6048.jpg" alt="Foto 3">
            </div>
            <div class="modal-text">
                <h2>DESAIN KOMUNIKASI VISUAL</h2>
                <p>Jurusan Desain Komunikasi Visual (DKV) adalah bidang studi yang berfokus pada pembuatan dan penyampaian pesan visual yang efektif melalui berbagai media.</p>
                <p>Jurusan ini menggabungkan prinsip desain dengan komunikasi untuk menciptakan solusi visual yang membantu menyampaikan pesan, memecahkan masalah komunikasi, dan membangun identitas merek. Peserta didik dalam jurusan ini belajar untuk merancang elemen-elemen visual yang menarik dan komunikatif, termasuk grafik, tipografi, ilustrasi, dan media digital.</p>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    // Menampilkan notifikasi
function showNotification() {
    const notification = document.getElementById('notification');
    notification.classList.add('show');

    // Menghilangkan notifikasi setelah 5 detik
    setTimeout(function() {
        notification.classList.remove('show');
    }, 2000); // 5000ms = 5 detik
}

// Menutup notifikasi
function closeNotification() {
    document.getElementById('notification').classList.remove('show');
}

// Tampilkan notifikasi saat halaman dimuat
window.onload = function() {
    showNotification();
}


        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("slide");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex-1].style.display = "block";
        }

        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                closeModal(event.target.id);
            }
        }
    </script>
    <script type="text/javascript">
    let inactivityTime = function () {
        let timeout;
        const logout = () => {
            window.location.href = 'logout.php'; // Alihkan ke halaman logout
        };

        const resetTimer = () => {
            clearTimeout(timeout);
            timeout = setTimeout(logout, 10000); // 300000 ms = 5 menit
        };

        window.onload = resetTimer; // Reset timer saat halaman dimuat
        window.onmousemove = resetTimer; // Reset timer saat mouse bergerak
        window.onkeypress = resetTimer; // Reset timer saat tombol ditekan
    };  

    inactivityTime();
</script>
</body>
</html>
