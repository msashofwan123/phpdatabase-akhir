<?php

require_once('../database/koneksi.php');
$id = $_POST['id'];
$status = $_POST['status'];

$query = mysqli_query($conn, "UPDATE `login` SET `status` = '$status' WHERE `id` = '$id' ");

if ($query) {
    header('location:authorize.php?success=Status Berhasi Diupdate');
} else {
    header('location:authorize.php?alert=Status Gagal Diupdate');
}