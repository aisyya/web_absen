<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <style>
        body {
            margin: 0;
            font-family: Righteous;
            background: linear-gradient(100deg, #0000FF, #B4C6E7);
            height: 100vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 50px;
            box-sizing: border-box;
        }
        .content {
            text-align: left;
            color: #fff;
            margin-left: 107px;
        }
        h1 {
            font-size: 4em;
            margin: 0;
            font-weight: bold;
            line-height: 1;
        }
        .line-break {
            display: block;
        }
        p {
            font-size: 1.5em;
            margin: 10px 0 30px 0;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 30px;
            font-size: 1.2em;
            color: #fff;
            background-color: #2E75B6;
            text-decoration: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .image-container {
            max-width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Selamat<span class="line-break"></span>Datang</h1>
        <p>Silakan mengisi data diri Anda dan <span class="line-break"></span>dapatkan kode QR untuk event yang Anda datangi!</p>
        <a href="#" class="button">Start</a>
    </div>
    <div class="image-container">
        <img src="grapic.png" alt="Decorative Image">
    </div>
</body>
</html>
