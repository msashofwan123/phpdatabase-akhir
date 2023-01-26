<?php
include_once('../database/koneksi.php');

$no = $_POST['no'];
$sql = "SELECT `file` FROM `dataobat` WHERE `id` = $no";
$data_foto = mysqli_query($conn, $sql);
$file = mysqli_fetch_assoc($data_foto);

// HAPUS DATA GAMBAR DI ASSETS
unlink("storage/img/" . $file['file']);

// HAPUS DATA
$hapus_data = mysqli_query($conn, "DELETE FROM `dataobat` WHERE `id` = $no");

if ($hapus_data) {
    header('location: dataobat.php?success=Data Berhasil Dihapus');
} else {
    header('location: dataobat.php?alert=Data Gagal Dihapus');
};
