<?php
require_once 'Model.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    header("Location: Member.php");
    exit;
}

$member = getMemberById($id);

if (!$member) {
    echo "Data member tidak ditemukan!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama               = $_POST['nama_member'];
    $nomor              = $_POST['nomor_member'];
    $alamat             = $_POST['alamat'];
    $tgl_mendaftar      = $_POST['tgl_mendaftar'];
    $tgl_terakhir_bayar = !empty($_POST['tgl_terakhir_bayar']) ? $_POST['tgl_terakhir_bayar'] : null;

    updateMember($id, $nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar);

    header("Location: Member.php");
    exit;
}

$tgl_mendaftar_formatted = date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar']));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Member</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2 class="h2-edit">Edit Data Member</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nama_member">Nama Member</label>
            <input type="text" id="nama_member" name="nama_member" value="<?= htmlspecialchars($member['nama_member']); ?>" required>
        </div>
        <div class="form-group">
            <label for="nomor_member">Nomor Member</label>
            <input type="text" id="nomor_member" name="nomor_member" value="<?= htmlspecialchars($member['nomor_member']); ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat"><?= htmlspecialchars($member['alamat']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="tgl_mendaftar">Tanggal Mendaftar</label>
            <!-- Menggunakan format waktu yang sudah disesuaikan agar muncul di input -->
            <input type="datetime-local" id="tgl_mendaftar" name="tgl_mendaftar" value="<?= $tgl_mendaftar_formatted; ?>" required>
        </div>
        <div class="form-group">
            <label for="tgl_terakhir_bayar">Tanggal Terakhir Bayar</label>
            <input type="date" id="tgl_terakhir_bayar" name="tgl_terakhir_bayar" value="<?= htmlspecialchars($member['tgl_terkahir_bayar']); ?>">
        </div>
        
        <button type="submit" class="btn-submit btn-submit-edit">Update Data</button>
        <a href="Member.php" class="btn btn-cancel">Batal</a>
    </form>
</div>

</body>
</html>