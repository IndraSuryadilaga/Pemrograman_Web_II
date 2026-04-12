<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Smartphone Samsung</title>
    <style>
        table {
            border: 1px solid  black;
            font-family: serif;
        }
        th, td {
            border: 1px solid black;
            padding: 4px 8px;
            text-align: left;
        }
        th {
            background-color: red;
            color: black;
            font-weight: bold;
            font-size: 1.4em;
            padding: 20px 10px;
        }
    </style>
</head>
<body>

<?php
$smartphones = [
        "hp1" => "Samsung Galaxy S22",
        "hp2" => "Samsung Galaxy S22+",
        "hp3" => "Samsung Galaxy A03",
        "hp4" => "Samsung Galaxy Xcover 5"
];
?>

<table>
    <thead>
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($smartphones as $key => $value) {
        echo "<tr>";
        echo "<td>" . $smartphones[$key] . "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

</body>
</html>