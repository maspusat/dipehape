<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            background-color: #007BFF;
            color: white;
            padding: 20px;
        }

        form {
            text-align: center;
            margin: 20px auto;
            width: 60%;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .message {
            text-align: center;
            margin: 20px auto;
            width: 60%;
            padding: 10px;
        }

        .success {
            background-color: #4CAF50;
            color: white;
        }

        .error {
            background-color: #FF5733;
            color: white;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "moas_pushat";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nim = $_POST["nim"];
        $nama = $_POST["nama"];
        $password = $_POST["password"];

        $sql = "INSERT INTO data_mahasiswa (NIM, Nama, Password) VALUES ('$nim', '$nama', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='message success'>Data mahasiswa berhasil ditambahkan.</div>";
        } else {
            echo "<div class='message error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }

    $conn->close();
    ?>
    <h2>Tambah Data Mahasiswa</h2>
    <form action="" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Tambah Data">
    </form>

    <a href="index.php">
        <button>Kembali</button>

</body>
</html>
