<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul 3 - Soal 5</title>
</head>
<body>

<form method="POST">
    <input type="text" name="text" value="<?= $_POST['text'] ?? '' ?>">
    <button type="submit" name="print">Submit</button>
</form>

<?php
if (isset($_POST['print'])) {
    $text = strtolower($_POST['text'] ?? '');
    $arr_text = str_split($text);
    $length = strlen($text);
    $temp = 1;

    echo '<h3>Input:</h3>' . $_POST['text'] . '<br>';

    echo '<h3>Output:</h3>';

    for ($i = 0; $i < $length; $i++) {
        echo strtoupper($arr_text[$i]);
        for ($j = 1; $j < $length; $j++) {
            echo $arr_text[$i];
        }
    }
}
?>

</body>
</html>