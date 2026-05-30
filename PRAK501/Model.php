<?php
require_once 'Koneksi.php';

function getAllMember() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM member ORDER BY id_member DESC");
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Error mengambil data member: " . $e->getMessage());
    }
}

function getMemberById($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM member WHERE id_member = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    } catch (PDOException $e) {
        die("Error mengambil data member by ID: " . $e->getMessage());
    }
}

function insertMember($nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    global $pdo;
    try {
        $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terkahir_bayar) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar]);
    } catch (PDOException $e) {
        die("Error menambah member: " . $e->getMessage());
    }
}

function updateMember($id, $nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    global $pdo;
    try {
        $sql = "UPDATE member SET nama_member = ?, nomor_member = ?, alamat = ?, 
                tgl_mendaftar = ?, tgl_terkahir_bayar = ? WHERE id_member = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar, $id]);
    } catch (PDOException $e) {
        die("Error mengubah member: " . $e->getMessage());
    }
}

function deleteMember($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM member WHERE id_member = ?");
        return $stmt->execute([$id]);
    } catch (PDOException $e) {
        die("Error menghapus member: " . $e->getMessage());
    }
}

// 2. CRUD TABEL BUKU

function getAllBuku() {
    global $pdo;
    try {
        $stmt = $pdo->query("SELECT * FROM buku ORDER BY id_buku DESC");
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Error mengambil data buku: " . $e->getMessage());
    }
}

function getBukuById($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM buku WHERE id_buku = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    } catch (PDOException $e) {
        die("Error mengambil data buku by ID: " . $e->getMessage());
    }
}

function insertBuku($judul, $penulis, $penerbit, $tahun) {
    global $pdo;
    try {
        $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$judul, $penulis, $penerbit, $tahun]);
    } catch (PDOException $e) {
        die("Error menambah buku: " . $e->getMessage());
    }
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {
    global $pdo;
    try {
        $sql = "UPDATE buku SET judul_buku = ?, penulis = ?, penerbit = ?, tahun_terbit = ? WHERE id_buku = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$judul, $penulis, $penerbit, $tahun, $id]);
    } catch (PDOException $e) {
        die("Error mengubah buku: " . $e->getMessage());
    }
}

function deleteBuku($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM buku WHERE id_buku = ?");
        return $stmt->execute([$id]);
    } catch (PDOException $e) {
        die("Error menghapus buku: " . $e->getMessage());
    }
}

// 3. CRUD TABEL PEMINJAMAN (RELASI)

function getAllPeminjaman() {
    global $pdo;
    try {
        // Melakukan JOIN agar informasi nama member dan judul buku ikut terbaca
        $sql = "SELECT p.*, m.nama_member, b.judul_buku 
                FROM peminjaman p
                JOIN member m ON p.id_member = m.id_member
                JOIN buku b ON p.id_buku = b.id_buku
                ORDER BY p.id_peminjaman DESC";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Error mengambil data peminjaman: " . $e->getMessage());
    }
}

function insertPeminjaman($tgl_pinjam, $tgl_kembali, $id_member, $id_buku, $status) {
    global $pdo;
    try {
        $sql = "INSERT INTO peminjaman (tgl_pinjam, tgl_kembali, id_member, id_buku, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$tgl_pinjam, $tgl_kembali, $id_member, $id_buku, $status]);
    } catch (PDOException $e) {
        die("Error menambah transaksi peminjaman: " . $e->getMessage());
    }
}

function updatePeminjaman($id, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku, $status) {
    global $pdo;
    try {
        $sql = "UPDATE peminjaman SET tgl_pinjam = ?, tgl_kembali = ?, id_member = ?, id_buku = ?, status = ? WHERE id_peminjaman = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$tgl_pinjam, $tgl_kembali, $id_member, $id_buku, $status, $id]);
    } catch (PDOException $e) {
        die("Error mengubah transaksi peminjaman: " . $e->getMessage());
    }
}

function deletePeminjaman($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
        return $stmt->execute([$id]);
    } catch (PDOException $e) {
        die("Error menghapus transaksi peminjaman: " . $e->getMessage());
    }
}
?>