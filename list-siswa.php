<?php include("config.php"); ?>

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
            background-color: #f7f7f7;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
        }

        header h3 {
            font-size: 1.8rem;
            font-weight: 600;
        }

        nav {
            margin-top: 20px;
            text-align: center;
        }

        nav a {
            text-decoration: none;
            background-color: #0A3981;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #608BC1;
        }

        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #2980b9;
            color: white;
        }

        table td {
            background-color: #ecf0f1;
        }

        table td a {
            text-decoration: none;
            color: #2980b9;
            margin-right: 10px;
        }

        table td a:hover {
            text-decoration: underline;
        }

        p {
            margin-top: 20px;
            font-size: 1.2rem;
            font-weight: 600;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            table {
                font-size: 0.9rem;
            }

            table th, table td {
                padding: 10px;
            }

            nav a {
                padding: 8px 15px;
            }

            header h3 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <h3>Siswa yang sudah mendaftar</h3>
    </header>
    
    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>
    
    <br>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah Asal</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM calon_siswa";
            $query = mysqli_query($db, $sql);
            
            while($siswa = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$siswa['id']."</td>";
                echo "<td>".$siswa['nama']."</td>";
                echo "<td>".$siswa['alamat']."</td>";
                echo "<td>".$siswa['jenis_kelamin']."</td>";
                echo "<td>".$siswa['agama']."</td>";
                echo "<td>".$siswa['sekolah_asal']."</td>";
                echo "<td>";
                echo "<a href='form-edit.php?id=".$siswa['id']."'>Edit</a> | ";
                echo "<a href='hapus.php?id=".$siswa['id']."'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }		
            ?>
        </tbody>
    </table>
    
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    
</body>
</html>
