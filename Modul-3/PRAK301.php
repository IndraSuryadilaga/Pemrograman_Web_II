<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul 3 - Soal 1</title>
</head>
<body>

<form method="POST">
    Jumlah Peserta: <input type="number" name="amount" value=""> <br>
    <button type="submit" name="print">Cetak</button>
</form>

<?php
if (isset($_POST['print'])) {
    $amount = $_POST['amount'];
    $i = 1;

    while ($i <= $amount) {
        if ($i % 2 == 1) {
            echo "<h2 style='color: red'>Peserta Ke-$i</h2>";
        } else {
            echo "<h2 style='color: green'>Peserta Ke-$i</h2>";
        }
        $i++;
    }
}
?>

</body>
</html>