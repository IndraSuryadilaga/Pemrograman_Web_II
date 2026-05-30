<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul 4 - Soal 3</title>
    <style>
        table { border-collapse: collapse;}
        th, td { border: 1px solid #000; padding: 6px;}
        th { background-color: #f2f2f2; font-weight: bold; text-align: left}
        .bg-merah { background-color: red; font-weight: bold; text-align: center; }
        .bg-hijau { background-color: green; font-weight: bold; text-align: center; }
    </style>
</head>
<body>

<h2>Daftar Pengambilan KRS Mahasiswa</h2>

<?php
$daftar_mahasiswa = [
        [
                "nama" => "Ridho",
                "matkul" => [
                        ["nama_matkul" => "Pemrograman I", "sks" => 2],
                        ["nama_matkul" => "Praktikum Pemrograman I", "sks" => 1],
                        ["nama_matkul" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
                        ["nama_matkul" => "Arsitektur Komputer", "sks" => 3]
                ]
        ],
        [
                "nama" => "Ratna",
                "matkul" => [
                        ["nama_matkul" => "Basis Data I", "sks" => 2],
                        ["nama_matkul" => "Praktikum Basis Data I", "sks" => 1],
                        ["nama_matkul" => "Kalkulus", "sks" => 3]
                ]
        ],
        [
                "nama" => "Tono",
                "matkul" => [
                        ["nama_matkul" => "Rekayasa Perangkat Lunak", "sks" => 3],
                        ["nama_matkul" => "Analisis dan Perancangan Sistem", "sks" => 3],
                        ["nama_matkul" => "Komputasi Awan", "sks" => 3],
                        ["nama_matkul" => "Kecerdasan Bisnis", "sks" => 3]
                ]
        ]
];

foreach ($daftar_mahasiswa as &$mhs) {
    $total_sks = 0;

    foreach ($mhs['matkul'] as $mk) {
        $total_sks += $mk['sks'];
    }

    $mhs['total_sks'] = $total_sks;

    if ($total_sks < 7) {
        $mhs['keterangan'] = "Revisi KRS";
        $mhs['class_warna'] = "bg-merah";
    } else {
        $mhs['keterangan'] = "Tidak Revisi";
        $mhs['class_warna'] = "bg-hijau";
    }
}
unset($mhs);
?>

<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach ($daftar_mahasiswa as $mhs) {
        foreach ($mhs['matkul'] as $index => $mk) {
            echo "<tr>";

            if ($index === 0) {
                echo "<td class='text-center'>$no</td>";
                echo "<td>{$mhs['nama']}</td>";
            } else {
                echo "<td></td>";
                echo "<td></td>";
            }

            echo "<td>{$mk['nama_matkul']}</td>";
            echo "<td class='text-center'>{$mk['sks']}</td>";

            if ($index === 0) {
                echo "<td class='text-center'>{$mhs['total_sks']}</td>";
                echo "<td class='{$mhs['class_warna']}'>{$mhs['keterangan']}</td>";
            } else {
                echo "<td></td>";
                echo "<td></td>";
            }

            echo "</tr>";
        }
        $no++;
    }
    ?>
    </tbody>
</table>

</body>
</html>