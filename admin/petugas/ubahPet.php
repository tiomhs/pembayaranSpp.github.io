<?php 

require "../../functions.php";
$id = $_GET["id"];

$petugas = query("SELECT * FROM petugas WHERE id_petugas = $id")[0];

if (isset($_POST["submit"])) {
    
    if (ubahPet($_POST)) {
        header("location: ../index.php");
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Petugas</title>
</head>
<body>

    <h1>Halaman Registrasi Petugas</h1>

    <form action="" method="post">
        <input type="hidden" name="id_petugas" value="<?= $petugas["id_petugas"]; ?>">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" autocomplete="off" value="<?= $petugas["username"]; ?>">
        <br>
        <label for="namaPetugas">Nama Petugas : </label>
        <input type="text" name="namaPetugas" id="namaPetugas" autocomplete="off" value="<?= $petugas["nama_petugas"]; ?>">
        <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" autocomplete="off" value="<?= $petugas["password"]; ?>">
        <br>
        <label for="level">Level : </label>
        <select name="level" id="level">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        <button type="submit" name="submit">Kirim</button>
    </form>
    
</body>
</html>