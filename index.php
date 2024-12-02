<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru | SMAN 1 GLAGAH</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Resetting default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and global styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            color: #333;
            line-height: 1.6;
        }

        /* Header styles with background image */
        header {
            background-image: url('smansa.png'); /* Ganti dengan path gambar sekolah */
            background-size: cover; /* Menyesuaikan ukuran gambar agar memenuhi seluruh header */
            background-position: center; /* Menentukan posisi gambar */
            color: white;
            padding: 100px 0; /* Memberikan ruang lebih untuk header */
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        /* Overlay untuk meningkatkan keterbacaan teks */
        header::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Menggelapkan gambar untuk kontras lebih baik */
            z-index: 1;
        }

        /* Teks header */
        header h1, header h3 {
            position: relative;
            z-index: 2;
        }

        header h1 {
            font-size: 3rem;
            font-weight: 600;
        }

        header h3 {
            font-size: 1.5rem;
            font-weight: 300;
        }

        /* Navigation Menu styles */
        nav {
            background-color: #81BFDA;
            padding: 15px 0;
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            color: white;
            font-weight: 500;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        nav ul li a:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        /* Main content styles */
        main {
            padding: 40px 20px;
            text-align: center;
        }

        h4 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #007BFF;
        }

        /* Status message styles */
        .status-message {
            padding: 20px;
            border-radius: 5px;
            margin: 20px auto;
            width: 80%;
            max-width: 400px;
            font-size: 1.1rem;
            background-color: #e0f7fa;
            color: #00796b;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .status-message.error {
            background-color: #ffcdd2;
            color: #d32f2f;
        }
    </style>
</head>
<body>
    <header>
        <h3>Pendaftaran Siswa Baru</h3>
        <h1>SMAN 1 GLAGAH</h1>
    </header>

    <nav>
        <ul>
            <li><a href="form-daftar.php">Daftar Baru</a></li>
            <li><a href="list-siswa.php">Pendaftar</a></li>
        </ul>
    </nav>

    <main>
        
        <?php if(isset($_GET['status'])): ?>
        <div class="status-message <?= ($_GET['status'] == 'sukses') ? '' : 'error' ?>">
            <?php
                if($_GET['status'] == 'sukses'){
                    echo "Pendaftaran siswa baru berhasil!";
                } else {
                    echo "Pendaftaran gagal!";
                }
            ?>
        </div>
        <?php endif; ?>
    </main>

</body>
</html>
