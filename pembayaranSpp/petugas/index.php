<?php 

$conn = mysqli_connect("localhost","root","","pembayaranspp");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);

        if ($row["level"] == 'admin') {
            header("location: ../admin/index.php");
        }elseif ($row["level"] == 'petugas') {
            header("location: petugas.php");
        }
    } else {
        echo "Login gagal!";
    }
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petugas</title>
</head>
<body>

    <h1>Halaman Login Petugas</h1>

    <form action="" method="post">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
        <br>

        <button type="submit" name="submit">Kirim</button>
        <p><a href="regisPetugas.php">Belum punya akun?</a> || <a href="../index.php">Kembali?</a></p>
    </form>
    
</body>
</html>