<?php
require_once('../database/koneksi.php');

$id = $_POST['id'];
$sql = "SELECT * FROM `login` WHERE `id` = '$id'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);

$user = $result['username'];
$email = $result['email'];
$status = $result['status'];

?>
<form action="auth-form-ea.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="id">Id</label>
        <input type="number" readonly class="form-control" id="id" name="id" value="<?= $id ?>">
        <small id="namaHelp" class="form-text text-muted">ID DIISI OLEH ADMIN</small>
    </div>
    <div class="form-group">
        <label for="username">username</label>
        <input type="text" readonly class="form-control" id="username" name="username" placeholder="Mengurangi Panas" value="<?= $user ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" readonly class="form-control" id="email" name="email" placeholder="Mengurangi Panas" value="<?= $email ?>">
    </div>
    <div class="form-group">
        <label for="status">Status Akun</label>
        <select class="form-control" id="status" name="status">
            <option>Ubah Status Akun</option>
            <option <?php if ($status == '0') {
                        echo "selected";
                    } ?> value="0">Belum Teraktivasi</option>
            <option <?php if ($status == '1') {
                        echo "selected";
                    } ?> value="1">Teraktivasi</option>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>