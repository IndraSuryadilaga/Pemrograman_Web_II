<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum Form Validation</title>
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
        .required {
            color: red;
        }
    </style>
</head>
<body>

<?php
$nama = $nim = $jk = "";
$namaErr = $nimErr = $jkErr = "";
$showOutput = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    if (empty($_POST["nama"])) {
        $namaErr = "nama tidak boleh kosong";
        $isValid = false;
    } else {
        $nama = htmlspecialchars($_POST["nama"]);
    }


    if (empty($_POST["nim"])) {
        $nimErr = "nim tidak boleh kosong";
        $isValid = false;
    } else {
        $nim = htmlspecialchars($_POST["nim"]);
    }

    if (empty($_POST["jk"])) {
        $jkErr = "jenis kelamin tidak boleh kosong";
        $isValid = false;
    } else {
        $jk = $_POST["jk"];
    }

    if ($isValid) {
        $showOutput = true;
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table>
        <tr>
            <td>Nama:</td>
            <td>
                <input type="text" name="nama" value="<?php echo $nama; ?>">
                <span class="required">*</span>
                <span class="error"><?php echo $namaErr; ?></span>
            </td>
        </tr>
        <tr>
            <td>Nim:</td>
            <td>
                <input type="text" name="nim" value="<?php echo $nim; ?>">
                <span class="required">*</span>
                <span class="error"><?php echo $nimErr; ?></span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Jenis Kelamin :<span class="required">*</span>
                <span class="error"><?php echo $jkErr; ?></span><br>
                <input type="radio" name="jk" value="Laki-laki" <?php if($jk=="Laki-laki") echo "checked";?>> Laki-Laki <br>
                <input type="radio" name="jk" value="Perempuan" <?php if($jk=="Perempuan") echo "checked";?>> Perempuan
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Submit">
            </td>
        </tr>
    </table>
</form>

<?php
if ($showOutput) {
    echo "<h2>Output:</h2>";
    echo $nama . "<br>";
    echo $nim . "<br>";
    echo $jk;
}
?>

</body>
</html>
