<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul 3 - Soal 2</title>
    <style>
        img {
            width: 24px;
            height: 24px;
            vertical-align: middle;
        }
        .spacer {
            display: inline-block;
            width: 24px;
        }
    </style>
</head>
<body>

<form method="POST">
    Tinggi : <input type="number" name="height" value="<?= $_POST['height'] ?? '' ?>"> <br>
    Alamat Gambar : <input type="text" name="url" value="<?= $_POST['url'] ?? 'https://cdn0.iconfinder.com/data/icons/web-and-mobile-icons-volume-2/128/52-512.png' ?>"> <br>
    <button type="submit" name="print">Cetak</button>
</form>

<?php
if (isset($_POST['print'])) {
    $height = (int)$_POST['height'];
    $url = $_POST['url'];
    $row = 1;

    echo "<br>";

    while ($row <= $height) {
        $spacer = 1;
        while ($spacer < $row) {
            echo "<span class='spacer'></span>";
            $spacer++;
        }

        $j = 1;
        while ($j <= ($height - $row + 1)) {
            echo "<img src='$url' alt='icon'>";
            $j++;
        }

        echo "<br>";
        $row++;
    }
}
?>

</body>
</html>