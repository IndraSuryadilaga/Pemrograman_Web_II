<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul 3 - Soal 3</title>
    <style>
        img {
            width: 64px;
            height: 64px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
<?php
$amount = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = isset($_POST['current_amount']) ? (int)$_POST['current_amount'] : 0;

    if (isset($_POST['print'])) {
        $amount = (int)$_POST['initial_input'];
    } elseif (isset($_POST['increment'])) {
        $amount++;
    } elseif (isset($_POST['decrement'])) {
        if ($amount > 0) $amount--;
    }
}

$url = 'https://cdn0.iconfinder.com/data/icons/web-and-mobile-icons-volume-2/128/52-512.png';
?>

<form method="POST">
    Nilai : <input type="number" name="initial_input" value="<?= $amount ?>">
    <button type="submit" name="print">Submit</button>
    <br>

    <?php
    if ($amount > 0) {
        echo "jumlah bintang $amount <br> <br> <br>";

        $temp = $amount;
        while ($temp > 0) {
            echo "<img src='$url' alt='icon'>";
            $temp--;
        }
        echo "<br>";
    }
    ?>

    <?php if ($amount > 0): ?>
        <input type="hidden" name="current_amount" value="<?= $amount ?>">

        <button type="submit" name="increment">Tambah</button>
        <button type="submit" name="decrement">Kurang</button>
    <?php endif; ?>
</form>
</body>
</html>