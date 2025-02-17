<?php 
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['nisn'])) {
    header("Location: login2.php"); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="belajarr2.css">
	<title>FORMULIR</title>
	<link rel="stylesheet" type="text/css" href="https://fontawesome.com/search">
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
	align-items: center;
	background: url(smk.jfif);
	background-size: cover;
	padding-right: 40px;
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
    width: 103%;
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
.container{
	width: 35%;
	background: rgb(0, 0, 0, 0.5);
	padding: 28px;
	border-radius: 10px;
	margin-top: 50px;
	margin-left: 450px;
	justify-content: center;
	margin-right: 100px;
	height: 480px;
}

	</style>
</head>
<body class="nav">
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

	</body>
	<body>
<div class="container">
	<h2 class="form-title">DAFTAR NILAI KELAS</h2>
<form action="tambah-siswa.php" method="POST">
	<div class="main-user-info">
		<div class="user-input-box">
	<table>	
		<tr>
		<td>nisn</td></tr>
		<td><input type="text" name="nisn"></td></tr>
		<tr>
		<td>nama</td></tr>
		<td><input type="text" name="nama"></td></tr>
		<tr>
		<td>nilai</td></tr>
		<td><input type="number" name="nilai"></td></tr>
		<tr>
		<td>kelas</td></tr>
		<td><select name="kelas">
			<option hidden>Pilih kelas</option>
			<option>XI RPL 1</option>
			<option>XI RPL 2</option>
		</select>
		</td></tr>
		<tr>
		<td><button type="submit" name="simpan" value="input">Input</td>
	    </tr>
	</table>
</form>

<div class="item-two">
<table border="1">
	<th colspan="8">NILAI KELAS XI RPL</th>
	<tr>
		<td>no</td>
		<td>nisn</td>
		<td>nama</td>
		<td>kelas</td>
		<td>nilai</td>
		<td colspan="8">option</td>
	</tr>
	<?php
	    include 'connection.php';
	    $no = 1;
	    $data = mysqli_query($conn, "SELECT * FROM daftar_nilai");
	    while($d = mysqli_fetch_array($data)){
	    	?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $d ['nisn'];?></td>
		<td><?php echo $d ['nama'];?></td>
		<td><?php echo $d ['kelas'];?></td>
		<td><?php echo $d ['nilai'];?></td>
		<td><center><a href="edit-siswa.php?nisn=<?php echo $d ['nisn']; ?>"><i class="fa-solid fa-pen"></i>edit</a></center></td>
		<td><center><a href="delete-siswa.php?nisn=<?php echo $d ['nisn']; ?>"><i class="fa-solid fa-trash"></i>delete</a></center></td>
	</tr>
	<?php
}
?>
</table>
</div>
</body>
</html>