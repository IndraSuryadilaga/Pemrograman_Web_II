<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul 3 - Soal 3</title>
    <style>
        img {
            width: 16px;
            height: 16px;
            vertical-align: middle;
        }
    </style>
</head>
<body>

<form method="POST">
    Batas Bawah : <input type="number" name="under" value="<?= $_POST['under'] ?? '' ?>"> <br>
    Batas Atas : <input type="number" name="upper" value="<?= $_POST['upper'] ?? '' ?>"> <br>
    <button type="submit" name="print">Cetak</button>
</form>

<?php
if (isset($_POST['print'])) {
    $under = (int)$_POST['under'];
    $upper = (int)$_POST['upper'];
    $url = 'https://www.freepnglogos.com/images/star-images-9441.html';

    $current = $under;

    do {
        if (($current + 7) % 5 == 0) {
            echo "<img src='$url' alt='icon'>";
        } else {
            echo $current;
        }
        echo " ";
        $current++;
    } while ($current <= $upper);
}
?>

</body>
</html>