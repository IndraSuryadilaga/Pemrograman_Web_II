<?php
require_once 'Model.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    header("Location: Peminjaman.php");
    exit;
}

global $pdo;
$stmt = $pdo->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
$stmt->execute([$id]);
$peminjaman = $stmt->fetch();

if (!$peminjaman) {
    echo "Data transaksi tidak ditemukan!";
    exit;
}

$data_member = getAllMember();
$data_buku   = getAllBuku();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_member   = $_POST['id_member'];
    $id_buku     = $_POST['id_buku'];
    $tgl_pinjam  = $_POST['tgl_pinjam'];
    $status      = $_POST['status'];

    $tgl_kembali = !empty($_POST['tgl_kembali']) ? $_POST['tgl_kembali'] : null;
    if ($status == 'Belum Dikembalikan') {
        $tgl_kembali = null;
    } else if ($status == 'Sudah Dikembalikan' && is_null($tgl_kembali)) {
        $tgl_kembali = date('Y-m-d');
    }

    updatePeminjaman($id, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku, $status);
    header("Location: Peminjaman.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2 class="h2-edit">Edit Transaksi Peminjaman</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="id_member">Ubah Member (Peminjam)</label>
            <select id="id_member" name="id_member" required>
                <?php foreach ($data_member as $member): ?>
                    <option value="<?= $member['id_member']; ?>" <?= ($member['id_member'] == $peminjaman['id_member']) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($member['nama_member']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="id_buku">Ubah Buku</label>
            <select id="id_buku" name="id_buku" required>
                <?php foreach ($data_buku as $buku): ?>
                    <option value="<?= $buku['id_buku']; ?>" <?= ($buku['id_buku'] == $peminjaman['id_buku']) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($buku['judul_buku']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="date" id="tgl_pinjam" name="tgl_pinjam" value="<?= htmlspecialchars($peminjaman['tgl_pinjam']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="tgl_kembali">Tanggal Kembali</label>
            <input type="date" id="tgl_kembali" name="tgl_kembali" value="<?= htmlspecialchars(isset($peminjaman['tgl_kembali']) ? $peminjaman['tgl_kembali'] : ''); ?>">
        </div>

        <div class="form-group">
            <label for="status">Status Peminjaman</label>
            <select id="status" name="status" required>
                <option value="Belum Dikembalikan" <?= (isset($peminjaman['status']) && $peminjaman['status'] == 'Belum Dikembalikan') ? 'selected' : ''; ?>>
                    Belum Dikembalikan
                </option>
                <option value="Sudah Dikembalikan" <?= (isset($peminjaman['status']) && $peminjaman['status'] == 'Sudah Dikembalikan') ? 'selected' : ''; ?>>
                    Sudah Dikembalikan
                </option>
            </select>
        </div>
        
        <button type="submit" class="btn-submit btn-submit-edit">Update Transaksi</button>
        <a href="Peminjaman.php" class="btn btn-cancel">Batal</a>
    </form>
</div>

<script>
    const tglPinjamInput = document.getElementById('tgl_pinjam');
    const tglKembaliInput = document.getElementById('tgl_kembali');
    const statusInput = document.getElementById('status');

    function updateMinReturnDate() {
        if (tglPinjamInput.value) {
            tglKembaliInput.min = tglPinjamInput.value;
        }
    }

    function getTodayDate() {
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');
        return `${yyyy}-${mm}-${dd}`;
    }

    function handleStatusChange() {
        if (statusInput.value === 'Belum Dikembalikan') {
            tglKembaliInput.value = '';
        } else if (statusInput.value === 'Sudah Dikembalikan') {
            if (!tglKembaliInput.value) {
                tglKembaliInput.value = getTodayDate();
            }
        }
    }

    updateMinReturnDate();

    tglPinjamInput.addEventListener('change', updateMinReturnDate);
    statusInput.addEventListener('change', handleStatusChange);

    document.querySelector('form').addEventListener('submit', function(e) {
        // Validasi 1: Tanggal kembali tidak boleh sebelum tanggal pinjam
        if (tglKembaliInput.value && tglKembaliInput.value < tglPinjamInput.value) {
            alert('Tanggal Kembali tidak boleh lebih awal dari Tanggal Pinjam.');
            e.preventDefault();
        }
        if (statusInput.value === 'Sudah Dikembalikan' && !tglKembaliInput.value) {
            alert('Untuk status "Sudah Dikembalikan", Tanggal Kembali wajib diisi.');
            e.preventDefault();
        }
    });
</script>
</body>
</html>