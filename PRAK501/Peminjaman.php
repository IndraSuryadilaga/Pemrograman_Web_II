<?php
require_once 'Model.php';

if (isset($_GET['delete_id'])) {
    deletePeminjaman($_GET['delete_id']);
    header("Location: Peminjaman.php");
    exit;
}

$data_peminjaman = getAllPeminjaman();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Data Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Buku Terdaftar di Perpustakaan</h1>
    <div class="section">
        <div class="section-header">
            <h2>Manajemen Transaksi Peminjaman</h2>
            <div>
                <a href="Index.php" class="btn btn-primary">Kembali ke Dashboard</a>
                <a href="FormTambahPeminjaman.php" class="btn btn-success">Tambah Transaksi</a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data_peminjaman)): ?>
                    <tr><td colspan="7" class="no-data">Belum ada data transaksi peminjaman.</td></tr>
                <?php else: ?>
                    <?php foreach ($data_peminjaman as $pinjam): ?>
                        <tr>
                            <td><?= htmlspecialchars($pinjam['id_peminjaman']); ?></td>
                            <td><?= htmlspecialchars($pinjam['nama_member']); ?></td>
                            <td><?= htmlspecialchars($pinjam['judul_buku']); ?></td>
                            <td><?= htmlspecialchars($pinjam['tgl_pinjam']); ?></td>
                            <td><?= htmlspecialchars(isset($pinjam['tgl_kembali']) ? $pinjam['tgl_kembali'] : '-'); ?></td>
                            <td><?= htmlspecialchars($pinjam['status']); ?></td>
                            <td class="actions">
                                <a href="FormEditPeminjaman.php?id=<?= $pinjam['id_peminjaman']; ?>" class="btn btn-warning">Edit</a>
                                <a href="Peminjaman.php?delete_id=<?= $pinjam['id_peminjaman']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus transaksi ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>