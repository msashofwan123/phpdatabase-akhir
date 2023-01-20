<?php
session_start();
require_once('../database/koneksi.php');

$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

// CEK KETERSEDIAAN DATA USERNAME DI DATABASE
$sql = "SELECT COUNT(*) FROM `login` WHERE username='$username'";
$result = $conn->query($sql);

if ($result->fetch_row()[0] > 0) {
    header("Location: index.php?alert=Maaf, Username anda sudah terdaftar");
} else {

    // CEK KETERSEDIAAN DATA EMAIL DI DATABASE
    $sql = "SELECT COUNT(*) FROM `login` WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->fetch_row()[0] > 0) {
        header("Location: index.php?alert=Maaf, Email anda sudah terdaftar");
    } else {
        
        // INPUT DATA AKUN BARU KE DATABASE
        $sql = "INSERT INTO `login` (`username`, `password`) VALUES ('$username', '$pass')";
        $insert = mysqli_query($conn, $sql);

        // MEMBERIKAN PESAN KONFIRMASI BILA REGISTER BERHASIL
        if ($insert) {
            header("Location: index.php?success=Selamat, Akun Anda Telah Berhasil Didaftarkan. Jangan Lupa Menghubungi Admin, Untuk Aktivasi");
        } else {
            header("Location: index.php?alert=Maaf, Permintaan Tidak Dapat Diproses. Silahkan Coba Lagi");
        }
    }
}
