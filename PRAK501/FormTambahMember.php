<?php
require_once 'Model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama               = $_POST['nama_member'];
    $nomor              = $_POST['nomor_member'];
    $alamat             = $_POST['alamat'];
    $tgl_mendaftar      = $_POST['tgl_mendaftar'];

    $tgl_terakhir_bayar = !empty($_POST['tgl_terakhir_bayar']) ? $_POST['tgl_terakhir_bayar'] : null;

    insertMember($nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar);

    header("Location: Member.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Member</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2>Tambah Member Baru</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nama_member">Nama Member</label>
            <input type="text" id="nama_member" name="nama_member" required>
        </div>
        <div class="form-group">
            <label for="nomor_member">Nomor Member</label>
            <input type="text" id="nomor_member" name="nomor_member" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat"></textarea>
        </div>
        <div class="form-group">
            <label for="tgl_mendaftar">Tanggal Mendaftar</label>
            <input type="datetime-local" id="tgl_mendaftar" name="tgl_mendaftar" required>
        </div>
        <div class="form-group">
            <label for="tgl_terakhir_bayar">Tanggal Terakhir Bayar</label>
            <input type="date" id="tgl_terakhir_bayar" name="tgl_terakhir_bayar">
        </div>
        
        <button type="submit" class="btn-submit">Simpan Data</button>
        <a href="Member.php" class="btn btn-cancel">Batal</a>
    </form>
</div>

</body>
</html>