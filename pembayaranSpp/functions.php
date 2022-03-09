<?php 
 
 $conn = mysqli_connect("localhost","root","","pembayaranspp");

 function query($query){
    global $conn;

    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
 }

// admin punya

function ubahPet($data){
    global $conn;

    $id = $data["id_petugas"];
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $namaPetugas = htmlspecialchars($data["namaPetugas"]);
    $level = htmlspecialchars($data["level"]);
    
    $sql = "UPDATE petugas SET username = '$username', password = '$password', nama_petugas = '$namaPetugas',level = '$level' WHERE id_petugas = '$id' ";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);

}



//  petugas
function regisPetugas($data){
    global $conn;
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $namaPetugas = htmlspecialchars($data["namaPetugas"]);
    
    $sql = "INSERT INTO petugas VALUES ('','$username','$password','$namaPetugas','petugas')";

    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function hapusPet($id){
    global $conn;

    $id = $_GET["id"];
    $sql = "DELETE FROM petugas WHERE id_petugas = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);


}


// siswa
function regisSiswa($data){
    global $conn;

    $nisn = htmlspecialchars($data["nisn"]);
    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $idkelas = htmlspecialchars($data["idkelas"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $notelp = $data["notelp"];
    

    $sql = "INSERT INTO siswa VALUES ('$nisn','$nis','$nama','$idkelas','$alamat','$notelp','1')";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function ubahSiswa($data){

    global $conn;

    $id = $data["id_spp"];
    $nisn = $data["nisn"];
    $nis = $data["nis"];
    $nama = $data["nama"];
    $idkelas = $data["idkelas"];
    $alamat = $data["alamat"];
    $notelp = $data["notelp"];

    $sql = "UPDATE `siswa` SET `nisn`='$nisn',`nis`='$nis',`nama`='$nama',`id_kelas`='$idkelas',`alamat`='$alamat',`no_telp`='$notelp' WHERE `id_spp`='$id'";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);

}

function hapusSis($id){
    global $conn;

    $sql = "DELETE FROM siswa WHERE id_spp = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);

}

// function spp

function tambahHis($data){
    global $conn;
    
    $idPet = $data["idPetugas"];
    $nisn = $data["nisn"];
    $tgl = $data["tglBayar"];
    $bln = $data["blnDibayar"];
    $thn = $data["thnDibayar"];
    $jml = $data["jumlahDibayar"];

    $sql = "INSERT INTO pembayaran VALUES ('', '$idPet','$nisn','$tgl','$bln','$thn','1','$jml')";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function ubahHis($data){
    global $conn;
    
    $id = $data["id_pembayaran"];
    $idPet = $data["idPetugas"];
    $nisn = $data["nisn"];
    $tgl = $data["tglBayar"];
    $bln = $data["blnDibayar"];
    $thn = $data["thnDibayar"];
    $jml = $data["jumlahDibayar"];

    $sql = "UPDATE pembayaran SET id_petugas = '$idPet', nisn = '$nisn', tgl_bayar = '$tgl', bulan_dibayar = '$bln', tahun_dibayar = '$thn', id_spp = '1' , jumlah_dibayar = '$jml' WHERE id_pembayaran = '$id'";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function hapusHis($id){
    global $conn;

    $sql = "DELETE FROM pembayaran WHERE id_pembayaran = $id";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);

}



?>