<?php
require_once('../database/koneksi.php');

// MENGAMBIL DATA DARI add_obat.php
$nama = $_POST['nama'];
$khasiat = $_POST['khasiat'];
$dosis = $_POST['dosis'];
$izin = $_POST['izin'];
$file = $_FILES['file']['name'];
$golongan = $_POST['golongan'];
$status = $_POST['status'];

echo var_dump($_POST);

$sort = $_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"], "storage/img/$sort");

$sql = "INSERT INTO `dataobat` (`nama`, `khasiat`, `dosis`, `izin`, `file`) VALUES ('$nama', '$khasiat', '$dosis', '$izin', '$file')";
$insert = mysqli_query($conn, $sql);

if ($insert) {
    header("Location: add_obat.php?success=Data Berhasil Di Input");
} else {
    header("Location: add_obat.php?alert=Data Gagal Di Input");
}
