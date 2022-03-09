<?php 
require "../functions.php";

$kelas = query("SELECT * FROM siswa");
$petugas = query("SELECT * FROM petugas");
$pembayaran = query("SELECT * FROM pembayaran");



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Selamat datang Admin</h1>
    <br><br>

    <h3>Data Siswa</h3>
    <a href="siswa/tambahSis.php">tambah data siswa</a>

    <!-- siswa -->
    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>aksi</td>
            <td>Nisn</td>
            <td>Nis</td>
            <td>Nama</td>
            <td>IdKelas</td>
            <td>Alamat</td>
            <td>No Telepon</td>
            <td>Id SPP</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $kelas as $row):?>
            <tr>
                <td><?= $i; ?></td>
                <td><a href="siswa/ubahSis.php?id=<?= $row["id_spp"]; ?>">ubah</a> || <a href="siswa/hapusSis.php?id=<?= $row["id_spp"]; ?>"> Hapus</a></td>
                <td><?= $row["nisn"]; ?></td>
                <td><?= $row["nis"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?php 
                    if ($row["id_kelas"] == 1) {
                        echo "X RPL 2";
                    }elseif ($row["id_kelas"] == 2) {
                        echo "XI RPL 2";
                    }else{
                        echo "XII RPL 2";
                    }
                ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["no_telp"]; ?></td> 
                <td><?= $row["id_spp"]; ?></td> 
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <!-- akhir siswa -->



    <!-- petugas -->
    <br><br>
    <h3>Data Petugas</h3>
    <a href="petugas/tambahPet.php">tambah data Petugas</a>

    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>aksi</td>
            <td>Username</td>
            <td>Password</td>
            <td>Nama Petugas</td>
            <td>Jabatan</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $petugas as $ptgs):?>
            <tr>
                <td><?= $i; ?></td>
                <td><a href="petugas/ubahPet.php?id=<?= $ptgs["id_petugas"]; ?>">ubah</a> || <a href="petugas/hapusPet.php?id=<?= $ptgs["id_petugas"]; ?>"> Hapus</a></td>
                <td><?= $ptgs["username"]; ?></td>
                <td><?= $ptgs["password"]; ?></td>
                <td><?= $ptgs["nama_petugas"]; ?></td>
                <td><?= $ptgs["level"]; ?></td>                
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <!-- history -->
    <br><br>
    <h3>Data Pembayaran Spp</h3>
    <a href="spp/tambahSpp.php">tambah data pembayaran Spp</a>

    <table border="2" cellpadding="20" cellspacing="0">
        <tr>
            <td>ID Pembayaran</td>
            <td>ID Petugas</td>
            <td>aksi</td>
            <td>Nisn</td>
            <td>Tgl Bayar</td>
            <td>Bulan Dibayar</td>
            <td>Tahun Dibayar</td>
            <td>ID SPP</td>
            <td>Jumlah Nominal</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $pembayaran as $spp):?>
            <tr>
                <td><?= $spp["id_pembayaran"]; ?></td>
                <td><a href="spp/ubahHis.php?id=<?= $spp["id_pembayaran"]; ?>">Ubah</a> || <a href="spp/hapusHis.php?id=<?= $spp["id_pembayaran"]; ?>">Hapus</a></td>
                <td><?= $spp["id_petugas"]; ?></td>
                <td><?= $spp["nisn"]; ?></td>
                <td><?= $spp["tgl_bayar"]; ?></td>
                <td><?= $spp["bulan_dibayar"]; ?></td>
                <td><?= $spp["tahun_dibayar"]; ?></td>
                <td><?= $spp["id_spp"]; ?></td>
                <td><?= $spp["jumlah_dibayar"]; ?></td>
                              
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <a href="../index.php">Log Out</a>

</body>
</html>