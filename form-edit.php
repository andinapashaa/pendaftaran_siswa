<?php
include("config.php");

// Pastikan id ada di URL
if (!isset($_GET['id'])) {
    header('Location: list-siswa.php'); // Jika tidak ada id, kembali ke halaman list
}

// Ambil id dari query string
$id = $_GET['id'];

// Buat query untuk mengambil data siswa dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);

// Cek jika query gagal
if (!$query) {
    die('Query gagal: ' . mysqli_error($db));
}

// Ambil data siswa jika ada
$siswa = mysqli_fetch_assoc($query);

// Cek jika data siswa tidak ditemukan
if (!$siswa) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Edit Siswa SMAN 1 GLAGAH</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #789DBC;
            color: white;
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
        }

        h3 {
            margin: 0;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: none;
            padding: 0;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #608BC1;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
			font-family: 'Poppins', sans-serif;
            width: 100%;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #133E87;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .radio-group {
            display: flex;
            justify-content: space-between;
        }

        .radio-group label {
            font-weight: normal;
        }

        /* Responsiveness */
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }

            input[type="submit"] {
                width: 100%;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h3>Formulir Edit Siswa</h3>
    </header>

    <form action="proses-edit.php" method="POST">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <div class="form-group">
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo htmlspecialchars($siswa['nama']) ?>" />
            </div>

            <div class="form-group">
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"><?php echo htmlspecialchars($siswa['alamat']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <?php $jk = $siswa['jenis_kelamin']; ?>
                <div class="radio-group">
                    <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>> Laki-laki</label>
                    <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>> Perempuan</label>
                </div>
            </div>

            <div class="form-group">
                <label for="agama">Agama: </label>
                <?php $agama = $siswa['agama']; ?>
                <select name="agama">
                    <option <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                    <option <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                    <option <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                    <option <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                    <option <?php echo ($agama == 'Atheis') ? "selected" : "" ?>>Atheis</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sekolah_asal">Sekolah Asal: </label>
                <input type="text" name="sekolah_asal" placeholder="nama sekolah" value="<?php echo htmlspecialchars($siswa['sekolah_asal']) ?>" />
            </div>

            <div class="form-group">
                <input type="submit" value="Simpan" name="simpan" />
            </div>
        </fieldset>
    </form>
</body>
</html>
