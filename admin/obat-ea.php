<?php
require_once('../database/koneksi.php');

// Kolom Data Dari Table
$id = $_POST['id'];
$nama = $_POST['nama'];
$khasiat = $_POST['khasiat'];
$dosis = $_POST['dosis'];
$izin = $_POST['izin'];
$file = $_FILES['file']['name'];
$golongan = $_POST['golongan'];
$status = $_POST['status'];

echo $id;

$sql = "UPDATE `dataobat` SET `nama`='$nama', `khasiat`='$khasiat', `dosis`='$dosis', `izin`='$izin', `golongan`='$golongan'";
if ($file != '') {
    $sql .= ",`file`='$file'";
}
$sql .="WHERE `id`='$id'";

$update = mysqli_query($conn, $sql);

if ($update) {
    header('location: dataobat.php?success=Data Berhasil Diubah');
    // echo var_dump($_POST);
} else {
    header('Location: dataobat.php?alert=Data Tidak Diupdate');
}


// Cek Status Obat
$cek_status = mysqli_query($conn, "SELECT * FROM `statusobat` WHERE `id_obat` = '$id'");

// Perintah Jika Sudah = UPDATE. Jika Belum = INSERT
if (mysqli_fetch_assoc($cek_status)) {
    $query = mysqli_query($conn, "UPDATE `statusobat` SET `id_stok` = '$status' WHERE `id_obat` = '$id' ");
} else {
    $query = mysqli_query($conn, "INSERT INTO `statusobat` (`id`, `id_obat`, `id_stok`) VALUES ( null, '$id', '$status')");
}

// Memindahkan Gambar
move_uploaded_file($_FILES["file"]["tmp_name"], 'storage/img/' . $file);