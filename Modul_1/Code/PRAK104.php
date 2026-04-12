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
            font-weight: bold;
            font-size: 1.1em;
        }
    </style>
</head>
<body>

<?php
$smartphones = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
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
    foreach ($smartphones as $phone) {
        echo "<tr>";
        echo "<td>" . $phone . "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

</body>
</html>