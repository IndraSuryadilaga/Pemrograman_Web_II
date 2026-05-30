<?php
require_once 'Model.php';

$data_member = getAllMember();
$data_buku   = getAllBuku();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_member   = $_POST['id_member'];
    $id_buku     = $_POST['id_buku'];
    $tgl_pinjam  = $_POST['tgl_pinjam'];
    $status      = 'Belum Dikembalikan';
    $tgl_kembali = null;

    insertPeminjaman($tgl_pinjam, $tgl_kembali, $id_member, $id_buku, $status);

    header("Location: Peminjaman.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2>Catat Peminjaman Baru</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="id_member">Pilih Member (Peminjam)</label>
            <select id="id_member" name="id_member" required>
                <option value="">-- Pilih Member --</option>
                <?php foreach ($data_member as $member): ?>
                    <option value="<?= $member['id_member']; ?>">
                        <?= htmlspecialchars($member['nama_member']); ?> (<?= htmlspecialchars($member['nomor_member']); ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="id_buku">Pilih Buku</label>
            <select id="id_buku" name="id_buku" required>
                <option value="">-- Pilih Buku --</option>
                <?php foreach ($data_buku as $buku): ?>
                    <option value="<?= $buku['id_buku']; ?>">
                        <?= htmlspecialchars($buku['judul_buku']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="date" id="tgl_pinjam" name="tgl_pinjam" required>
        </div>
        
        <button type="submit" class="btn-submit">Simpan Transaksi</button>
        <a href="Peminjaman.php" class="btn btn-cancel">Batal</a>
    </form>
</div>

</body>
</html>