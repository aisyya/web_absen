<?php
// koneksi database
include 'connection.php';

if (isset($_GET['nisn'])) {
    $nisn = $_GET['nisn'];

    // Ambil data dari database
    $sql = "SELECT * FROM daftar_nilai WHERE nisn='$nisn'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "NISN tidak tersedia.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $nilai = $_POST['nilai'];

    $sql = "UPDATE daftar_nilai SET nama='$nama', kelas='$kelas', nilai='$nilai' WHERE nisn='$nisn'";

    if ($conn->query($sql)) {
        header("Location: belajarr1.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="belajarr2.css">
    <title>FORMULIR</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    background: url(power.jpg) no-repeat center center fixed;
    background-size: cover;
    margin: 0;
    height: 100vh;
}

.container {
    width: 90%;
    max-width: 450px;
    background-color: rgba(0, 0, 0, 0.8);
    padding: 30px 20px;
    border-radius: 8px;
    color: #f9f9f9;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.5);
    text-align: center;
}

.form-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 25px;
}

.user-input-box table {
    width: 100%;
}

.user-input-box td {
    padding: 12px 0;
    font-size: 16px;
}

input[type="text"],
input[type="number"],
select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 15px;
    background-color: #fff;
}

button[type="submit"] {
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    background-color: #4CAF50;
    border: none;
    color: white;
    font-size: 18px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #43a047;
}

@media (max-width: 600px) {
    .container {
        padding: 20px;
    }
}


    </style>
</head>
<body>
<div class="container">
    <h2 class="form-title">EDIT INFO</h2>
    <form action="" method="POST">
        <div class="main-user-info">
            <div class="user-input-box">
                <table>    
                    <tr>
                        <td>NISN</td>
                        <td><input type="text" name="nisn" value="<?php echo htmlspecialchars($data['nisn']); ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>"></td>
                    </tr>
                    <tr>
                        <td>Nilai</td>
                        <td><input type="number" name="nilai" value="<?php echo htmlspecialchars($data['nilai']); ?>"></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>
                            <select name="kelas">
                                <option value="">Silakan pilih kelas</option>
                                <option value="XI RPL 1" <?php if ($data['kelas'] == 'XI RPL 1') echo 'selected'; ?>>XI RPL 1</option>
                                <option value="XI RPL 2" <?php if ($data['kelas'] == 'XI RPL 2') echo 'selected'; ?>>XI RPL 2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="simpan" value="input">Update</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</div>
</body>
</html>
