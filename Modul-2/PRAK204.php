<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ejaan Bilangan Cacah</title>
</head>
<body>

<form method="POST">
    Nilai : <input type="number" name="nilai" value="<?= $_POST['nilai'] ?? '' ?>" required> <br>
    <button type="submit" name="konversi">Konversi</button>
</form>

<?php
if (isset($_POST['konversi'])) {
    $nilai = $_POST['nilai'];
    $hasil = "";

    if ($nilai < 0) {
        $hasil = "Bilangan harus cacah (>= 0)";
    } elseif ($nilai == 0) {
        $hasil = "Nol";
    } elseif ($nilai < 10) {
        $hasil = "Satuan";
    } elseif ($nilai >= 11 && $nilai <= 19) {
        $hasil = "belasan";
    } elseif ($nilai < 100) {
        $hasil = "Puluhan";
    } elseif ($nilai < 1000) {
        $hasil = "Ratusan";
    } else {
        $hasil = "Anda Menginput Melebihi Limit Bilangan";
    }

    echo "<h1>Hasil: " . $hasil . "</h1>";
}
?>

</body>
</html>