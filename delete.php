<!DOCTYPE html>
<html>
<head>
    <title>Hapus Data Mahasiswa</title>
    <style>
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

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #FF5733;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #E74C3C;
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
        .button-container {
            text-align: center;
            margin: 20px auto;
        }

        .action-button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin: 5px;
        }

        .action-button:hover {
            background-color: #0056b3;
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
        if (isset($_POST["nim"])) {
            $nim = $_POST["nim"];

            // Pastikan $nim adalah angka dan memiliki panjang 11 digit
            if (is_numeric($nim) && strlen($nim) == 11) {
                $sql = "DELETE FROM data_mahasiswa WHERE NIM = '$nim'";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='message success'>Data mahasiswa berhasil dihapus.</div>";
                } else {
                    echo "<div class='message error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                }
            } else {
                echo "<div class='message error'>NIM harus berupa 11 digit angka.</div>";
            }
        }
    }

    $conn->close();
    ?>


    <h2>Hapus Data Mahasiswa</h2>
    <form action="" method="POST">
        <label for="nim">NIM:</label>
        <input type="number" id="nim" name="nim" required><br>

        <input type="submit" value="Hapus Data">
    </form>
    <a href="index.php">
        <button>Kembali</button>

</body>
</html>
