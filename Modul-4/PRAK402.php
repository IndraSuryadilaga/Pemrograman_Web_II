<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul 4 - Soal 2</title>

    <style>
        table {border-collapse: collapse;}
        th, td {border: 1px solid #000; padding: 6px; text-align: left;}
        th {background-color: #c8c8c8; font-weight: bold; }
    </style>
</head>
<body>

<?php
$data_mahasiswa = [
        ["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
        ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
        ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
        ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75]
];

foreach ($data_mahasiswa as &$mhs) {
    $nilai_akhir = (0.4 * $mhs['uts']) + (0.6 * $mhs['uas']);
    $mhs['nilai_akhir'] = $nilai_akhir;

    if ($nilai_akhir >= 80) {
        $mhs['nilai_huruf'] = "A";
    } elseif ($nilai_akhir >= 70) {
        $mhs['nilai_huruf'] = "B";
    } elseif ($nilai_akhir >= 60) {
        $mhs['nilai_huruf'] = "C";
    } elseif ($nilai_akhir >= 50) {
        $mhs['nilai_huruf'] = "D";
    } else {
        $mhs['nilai_huruf'] = "E";
    }
}
unset($mhs);
?>

<h3>Daftar Nilai Mahasiswa</h3>

<table>
    <thead>
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Akhir</th>
        <th>Nilai Huruf</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data_mahasiswa as $mhs) : ?>
        <tr>
            <td><?= $mhs['nama'] ?></td>
            <td><?= $mhs['nim'] ?></td>
            <td><?= $mhs['uts'] ?></td>
            <td><?= $mhs['uas'] ?></td>
            <td><?= number_format($mhs['nilai_akhir'], 1) ?></td>
            <td><?= $mhs['nilai_huruf'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>