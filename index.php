<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>📚 Data Mahasiswa</h1>
        
        <!-- Form Tambah -->
        <div class="form-section">
            <h2>Tambah Mahasiswa</h2>
            <form id="formTambah">
                <input type="text" id="nim" placeholder="NIM" required>
                <input type="text" id="nama" placeholder="Nama" required>
                <input type="text" id="jurusan" placeholder="Jurusan" required>
                <button type="submit">Tambah</button>
            </form>
        </div>

        <!-- Tabel Data -->
        <div class="table-section">
            <table id="tabelMahasiswa">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataMahasiswa">
                </tbody>
            </table>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
