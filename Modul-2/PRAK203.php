<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konversi Suhu</title>
</head>
<body>

<form method="POST">
    Nilai : <input type="number" step="any" name="nilai" value="<?= $_POST['nilai'] ?? '' ?>" required><br>

    Dari : <br>
    <input type="radio" name="dari" value="C" <?= (isset($_POST['dari']) && $_POST['dari'] == "C") ? "checked" : "checked" ?>> Celcius <br>
    <input type="radio" name="dari" value="F" <?= (isset($_POST['dari']) && $_POST['dari'] == "F") ? "checked" : "" ?>> Fahrenheit <br>
    <input type="radio" name="dari" value="R" <?= (isset($_POST['dari']) && $_POST['dari'] == "R") ? "checked" : "" ?>> Rheamur <br>
    <input type="radio" name="dari" value="K" <?= (isset($_POST['dari']) && $_POST['dari'] == "K") ? "checked" : "" ?>> Kelvin <br>

    Ke : <br>
    <input type="radio" name="ke" value="C" <?= (isset($_POST['ke']) && $_POST['ke'] == "C") ? "checked" : "" ?>> Celcius <br>
    <input type="radio" name="ke" value="F" <?= (isset($_POST['ke']) && $_POST['ke'] == "F") ? "checked" : "checked" ?>> Fahrenheit <br>
    <input type="radio" name="ke" value="R" <?= (isset($_POST['ke']) && $_POST['ke'] == "R") ? "checked" : "" ?>> Rheamur <br>
    <input type="radio" name="ke" value="K" <?= (isset($_POST['ke']) && $_POST['ke'] == "K") ? "checked" : "" ?>> Kelvin <br>

    <button type="submit" name="konversi">Konversi</button>
</form>

<?php
if (isset($_POST['konversi'])) {
    $nilai = $_POST['nilai'];
    $dari = $_POST['dari'];
    $ke = $_POST['ke'];
    $celcius = 0;
    $hasil = 0;

    switch ($dari) {
        case "C": $celcius = $nilai; break;
        case "F": $celcius = ($nilai - 32) * 5/9; break;
        case "R": $celcius = $nilai * 5/4; break;
        case "K": $celcius = $nilai - 273.15; break;
    }

    switch ($ke) {
        case "C": $hasil = $celcius; break;
        case "F": $hasil = ($celcius * 9/5) + 32; break;
        case "R": $hasil = $celcius * 4/5; break;
        case "K": $hasil = $celcius + 273.15; break;
    }

    echo "<h1>Hasil Konversi: " . $hasil . "</h1>";
}
?>

</body>
</html>