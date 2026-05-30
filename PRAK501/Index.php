<?php
require_once 'Model.php';

$data_member     = getAllMember();
$data_buku       = getAllBuku();
$data_peminjaman = getAllPeminjaman();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Sistem Informasi Perpustakaan</h1>

    <div class="section">
        <div class="section-header">
            <h2>Data Anggota</h2>
            <a href="Member.php" class="btn btn-primary">Kelola Member</a>
        </div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Nomor Member</th>
                <th>Status Bayar</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($data_member)): ?>
                <tr><td colspan="4" class="no-data">Belum ada data anggota terdaftar.</td></tr>
            <?php else: ?>
                <?php
                $preview_member = array_slice($data_member, 0, 5);
                foreach ($preview_member as $member):
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($member['id_member']); ?></td>
                        <td><?= htmlspecialchars($member['nama_member']); ?></td>
                        <td><?= htmlspecialchars($member['nomor_member']); ?></td>
                        <td><?= htmlspecialchars(isset($member['tgl_terkahir_bayar']) ? $member['tgl_terkahir_bayar'] : 'Belum Lunas'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-header">
            <h2>Katalog Buku</h2>
            <a href="Buku.php" class="btn btn-primary">Kelola Buku</a>
        </div>
        <table>
            <thead>
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($data_buku)): ?>
                <tr><td colspan="4" class="no-data">Belum ada data katalog buku.</td></tr>
            <?php else: ?>
                <?php
                $preview_buku = array_slice($data_buku, 0, 5);
                foreach ($preview_buku as $buku):
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($buku['id_buku']); ?></td>
                        <td><?= htmlspecialchars($buku['judul_buku']); ?></td>
                        <td><?= htmlspecialchars($buku['penulis']); ?></td>
                        <td><?= htmlspecialchars($buku['penerbit']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-header">
            <h2>Transaksi Peminjaman</h2>
            <a href="Peminjaman.php" class="btn btn-primary">Kelola Transaksi</a>
        </div>
        <table>
            <thead>
            <tr>
                <th>ID Pinjam</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($data_peminjaman)): ?>
                <tr><td colspan="4" class="no-data">Belum ada transaksi peminjaman.</td></tr>
            <?php else: ?>
                <?php
                $preview_peminjaman = array_slice($data_peminjaman, 0, 5);
                foreach ($preview_peminjaman as $pinjam):
                    $status_text = htmlspecialchars($pinjam['status']);
                    if ($status_text == 'Belum Dikembalikan') {
                        $status_display = '<span style="color:#e74c3c; font-weight:bold;">' . $status_text . '</span>';
                    } else {
                        $status_display = '<span style="color:#2ecc71;">' . $status_text . '</span>';
                    }
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($pinjam['id_peminjaman']); ?></td>
                        <td><?= htmlspecialchars($pinjam['nama_member']); ?></td>
                        <td><?= htmlspecialchars($pinjam['judul_buku']); ?></td>
                        <td><?= $status_display; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>