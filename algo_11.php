<!DOCTYPE html>
<html>
<head>
    <title>Form Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFC436;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        input {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Pegawai</h1>
        <form action="" method="post">
            <label for="pegawai_number">Masukkan nomor pegawai (11 digit):</label>
            <input type="text" id="pegawai_number" name="pegawai_number" maxlength="11" required>
            <button type="submit">Submit</button>
        </form>
        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $pegawaiNumber = $_POST["pegawai_number"];

                if (strlen($pegawaiNumber) == 11) {
                    $golongan = $pegawaiNumber[0];
                    $tanggal = substr($pegawaiNumber, 1, 2);
                    $bulan = substr($pegawaiNumber, 3, 2);
                    $tahun = substr($pegawaiNumber, 5, 4);
                    $nomorUrut = substr($pegawaiNumber, 9, 2);

                    // Konversi kode bulan menjadi nama bulan
                    $bulanArray = ["", "JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGU", "SEP", "OKT", "NOV", "DES"];
                     
                    $namaBulan = $bulanArray[(int)$bulan];

                    echo "<h2>Hasil:</h2>";
                    echo "Nomor Golongan: $golongan <br>";
                    echo "Tanggal Lahir: $tanggal $namaBulan $tahun <br>";
                    echo "Nomor Urut: $nomorUrut <br>";
                    echo "Bulan Kelahiran: $namaBulan";
                } else {
                    echo "Nomor pegawai harus terdiri dari 11 digit.";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>