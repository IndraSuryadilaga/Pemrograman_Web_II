<?php
require_once 'Model.php';

if (isset($_GET['delete_id'])) {
    deleteMember($_GET['delete_id']);
    header("Location: Member.php");
    exit;
}

$data_member = getAllMember();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Data Member</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Member Terdaftar di Perpustakaan</h1>
    <div class="section">
        <div class="section-header">
            <h2>Manajemen Data Member</h2>
            <div>
                <a href="Index.php" class="btn btn-primary">Kembali ke Dashboard</a>
                <a href="FormTambahMember.php" class="btn btn-success">Tambah Member Baru</a>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Member</th>
                    <th>Nomor Member</th>
                    <th>Alamat</th>
                    <th>Tgl Mendaftar</th>
                    <th>Terakhir Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data_member)): ?>
                    <tr><td colspan="7" class="no-data">Belum ada data member.</td></tr>
                <?php else: ?>
                    <?php foreach ($data_member as $member): ?>
                        <tr>
                            <td><?= htmlspecialchars($member['id_member']); ?></td>
                            <td><?= htmlspecialchars($member['nama_member']); ?></td>
                            <td><?= htmlspecialchars($member['nomor_member']); ?></td>
                            <td><?= htmlspecialchars($member['alamat']); ?></td>
                            <td><?= htmlspecialchars($member['tgl_mendaftar']); ?></td>
                            <td><?= htmlspecialchars($member['tgl_terkahir_bayar']); ?></td>
                            <td class="actions">
                                <a href="FormEditMember.php?id=<?= $member['id_member']; ?>" class="btn btn-warning">Edit</a>
                                <a href="Member.php?delete_id=<?= $member['id_member']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus member ini?');">Hapus</a>
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