<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul 4 - Soal 1</title>

    <style>
        table {
            border-collapse: collapse;
            margin-top: 10px;
        }
        td {
            border: 1px solid black;
            width: 40px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            font-size: 1.1em;
        }
    </style>
</head>
<body>

<form method="POST">
    Panjang: <input type="number" name="height"> <br>
    Lebar: <input type="number" name="width"> <br>
    Nilai: <input type="text" name="value"> <br>
    <button type="submit" name="print">Cetak</button> <br>
</form>

<?php
if (isset($_POST['print'])) {
    $height = $_POST['height'];
    $width = $_POST['width'];
    $value = $_POST['value'];

    $array = preg_split('/\s+/', $value);
    $array_size = sizeof($array);
    $matrix_size = $height * $width;

    if ($matrix_size != $array_size) {
        echo "Panjang nilai tidak sesuai dengan ukuran matriks";
    } else {

        $matrix = [];
        $counter = 0;

        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $width; $j++) {
                $matrix[$i][$j] = $array[$counter];
                $counter++;
            }
        }

        echo "<table>";
        for ($i = 0; $i < $height; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $width; $j++) {
                echo "<td>" . $matrix[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>

</body>
</html>