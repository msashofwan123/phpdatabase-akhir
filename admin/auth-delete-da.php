<?php
require_once('../database/koneksi.php');

$id = $_POST['id'];

mysqli_query($conn, "DELETE FROM `login` WHERE `id` = '$id'");


if ($query) {
    header('location:authorize.php?success=Status Berhasi DIhapus');
} else {
    header('location:authorize.php?alert=Status Gagal DiDelete');
}
?>