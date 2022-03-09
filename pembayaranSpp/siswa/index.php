<?php 

require '../functions.php';

$conn = mysqli_connect("localhost","root","","pembayaranspp");


if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $nis = $_POST["nis"];

    $sql = "SELECT * FROM siswa WHERE nama = '$nama' AND nis = '$nis'";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) ) {
        // login berhasil
        if ($nis == 28880) {
            header("location: a.php");
        }elseif ($nis == 28881) {
            header("location: b.php");
        }
        exit;
    } else {
        // login gagal
        echo "<script>
                alert('Username atau Password salah!');
                document.location.href = 'login.php';
            </script>";
    }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
</head>
<body>
    
    <h1>Halaman Login Siswa</h1>

    <form action="" method="post">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama">
        <br>
        <label for="nis">Nis : </label>
        <input type="text" name="nis" id="nis">
        <br>
        <button type="submit" name="submit">Kirim</button>
        <p><a href="regisSiswa.php">Belum punya akun?</a> || <a href="../index.php">Kembali?</a></p>
    </form>

</body>
</html>