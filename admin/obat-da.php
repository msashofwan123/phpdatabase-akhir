<?php
include_once('../database/koneksi.php');

$id = $_POST['id'];
$sql = "SELECT `file` FROM `dataobat` WHERE `id` = $id";
$data_foto = mysqli_query($conn, $sql);
$file = mysqli_fetch_assoc($data_foto);

// HAPUS DATA GAMBAR DI ASSETS
unlink("storage/img/" . $file['file']);

// HAPUS DATA
$query = "SELECT * FROM `statusobat` WHERE `id_obat` = '$id'";
$sql_status = mysqli_query($conn, $query);

if (mysqli_fetch_assoc($sql_status)) {
    $delete = mysqli_query($conn, "DELETE FROM `statusobat` WHERE `id_obat` = '$id'");
}

$hapus_data = mysqli_query($conn, "DELETE FROM `dataobat` WHERE `id` = $id");

if ($hapus_data) {
    header('location: dataobat.php?success=Data Berhasil Dihapus');
} else {
    header('location: dataobat.php?alert=Data Gagal Dihapus');
};
