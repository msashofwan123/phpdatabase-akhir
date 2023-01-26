<?php

include_once('getdata.php');
$id = $_POST['id'];
echo $id;

?>
<h4>Apakah Anda Yakin Ingin Menghapus Data Ini?</h4>

<form action="obat-da.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="no" value="<?= $id; ?>">
    <input type="submit" value="hapus" class="btn btn-danger">
</form>

