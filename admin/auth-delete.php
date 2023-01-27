<?php 
require_once('../database/koneksi.php');
$id = $_POST['id'];

?>
<h4>Apakah Anda Yakin Ingin Menghapus User Ini?</h4>

<form action="auth-delete-da.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <input type="submit" value="hapus" class="btn btn-danger">
</form>
