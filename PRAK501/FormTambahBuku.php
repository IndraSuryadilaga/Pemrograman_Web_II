<?php
require_once 'Model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul    = $_POST['judul_buku'];
    $penulis  = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun    = $_POST['tahun_terbit'];

    insertBuku($judul, $penulis, $penerbit, $tahun);

    header("Location: Buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container form-container-small">
    <h2>Tambah Buku Baru</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="judul_buku">Judul Buku</label>
            <input type="text" id="judul_buku" name="judul_buku" required>
        </div>
        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" name="penulis" required>
        </div>
        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" required>
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" required>
        </div>
        
        <button type="submit" class="btn-submit">Simpan Data</button>
        <a href="Buku.php" class="btn btn-cancel">Batal</a>
    </form>
</div>

</body>
</html>