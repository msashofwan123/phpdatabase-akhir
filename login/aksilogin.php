<?php
session_start();
require_once('../database/koneksi.php');

$username = $_POST['username'];
$pass = $_POST['password'];

// CEK KETERSEDIAAN DATA AKUN DI DATABASE
$sql = "SELECT * FROM `login` WHERE (`username` = '$username' OR `email` = '$username') AND `password` = '$pass'
";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// JIKA DATA DITEMUKAN, MAKA DITERUSKAN KE INDEX
if ($data) {

    // Cek Status Login
    if ($data['status'] == 1) {
        $_SESSION['nama_login'] = $_POST['username'];
        if ($_POST['ingatkan']) {
            $_SESSION['ingatkan'] = true;
        }
        header("location: ../admin");
    } else {
        header("location: index.php?aktivasi=Maaf, Akun Anda Belum Teraktivasi");
    }
    
} else {
    header("location: index.php?pesan=Maaf, Username/Password Tidak Dikenal");
}