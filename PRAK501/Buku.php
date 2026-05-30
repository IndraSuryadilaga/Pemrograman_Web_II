<?php
require_once 'Model.php';

if (isset($_GET['delete_id'])) {
    deleteBuku($_GET['delete_id']);
    header("Location: Buku.php");
    exit;
}

$data_buku = getAllBuku();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Data Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Buku Terdaftar di Perpustakaan</h1>
    <div class="section">
        <div class="section-header">
            <h2>Manajemen Data Buku</h2>
            <div>
                <a href="Index.php" class="btn btn-primary">Kembali ke Dashboard</a>
                <a href="FormTambahBuku.php" class="btn btn-success">Tambah Buku Baru</a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data_buku)): ?>
                    <tr><td colspan="6" class="no-data">Belum ada data buku.</td></tr>
                <?php else: ?>
                    <?php foreach ($data_buku as $buku): ?>
                        <tr>
                            <td><?= htmlspecialchars($buku['id_buku']); ?></td>
                            <td><?= htmlspecialchars($buku['judul_buku']); ?></td>
                            <td><?= htmlspecialchars($buku['penulis']); ?></td>
                            <td><?= htmlspecialchars($buku['penerbit']); ?></td>
                            <td><?= htmlspecialchars($buku['tahun_terbit']); ?></td>
                            <td class="actions">
                                <a href="FormEditBuku.php?id=<?= $buku['id_buku']; ?>" class="btn btn-warning">Edit</a>
                                <a href="Buku.php?delete_id=<?= $buku['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?');">Hapus</a>
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