<?php
// require_once('getdata.php');
require_once('../database/koneksi.php');

$id = $_POST['id'];
$sql = "SELECT a.*,k.name,k.id AS id_stok FROM `dataobat` a LEFT JOIN statusobat b ON b.id_obat=a.id LEFT JOIN stokobat k ON k.id=b.id_stok WHERE a.`id` = '$id'";

// $sql = "SELECT a.*,k.nama_kelas,k.id AS id_kelas FROM `datasiswa` a LEFT JOIN daftar_kelas b ON b.no_siswa=a.no LEFT JOIN kelas k ON k.id=b.id_kelas WHERE a.`no` = '$id'";
// $sql = "SELECT * FROM `dataobat` WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($result);

$name = $data['nama'];
$khasiat = $data['khasiat'];
$dosis = $data['dosis'];
$izin = $data['izin'];
$file = $data['file'];
$golongan = $data['golongan'];
$idstok = $data['id_stok'];


// Data Status
$sql_status = "SELECT * FROM stokobat";
$result_status = mysqli_query($conn, $sql_status);

?>


<form action="obat-ea.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="id">Id</label>
        <input type="number" class="form-control" id="id" name="id" value="<?= $id ?>">
    </div>
    <div class="form-group">
        <label for="nama">Nama Obat</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Paracetamol" value="<?= $name ?>">
        <small id="namaHelp" class="form-text text-muted">Pastikan Menginput Nama Sesuai Dengan Aslinya</small>
    </div>
    <div class="form-group">
        <label for="khasiat">Khasiat/Manfaat</label>
        <input type="textarea" class="form-control" id="khasiat" name="khasiat" placeholder="Mengurangi Panas" value="<?= $khasiat ?>">
    </div>
    <div class="form-group">
        <label for="dosis">Dosis</label>
        <input type="text" class="form-control" id="dosis" name="dosis" placeholder="12,5mg 3x sehari" value="<?= $dosis ?>">
    </div>
    <div class="form-group">
        <label for="izin">No. Izin Edar</label>
        <input type="text" class="form-control" id="izin" name="izin" placeholder="GKL9320916010A1" value="<?= $izin ?>">
    </div>
    <div class="form-group">
        <label for="file" class="form-label">Upload Foto</label>
        <img src="storage/img/<?= $file ?>" class="img-thumbnail" alt="">
        <input class="form-control" name="file" type="file" id="file">
        <small id="fileHelp" class="form-text text-muted">Disarankan : 144 x 238 px</small>
    </div>
    <div class="form-group">
        <label for="golongan">Golongan Obat</label>
        <select class="form-control" id="golongan" name="golongan">
            <option>Pilih Golongan</option>
            <option <?php if ($golongan == 'Obat Bebas') {
                        echo "selected";
                    } ?> value="Obat Bebas">Obat Bebas</option>
            <option <?php if ($golongan == 'Obat Bebas Terbatas') {
                        echo "selected";
                    } ?> value="Obat Bebas Terbatas">Obat Bebas Terbatas</option>
            <option <?php if ($golongan == 'Obat Keras') {
                        echo "selected";
                    } ?> value="Obat Keras">Obat Keras</option>
            <option <?php if ($golongan == 'Obat Wajib Apotek') {
                        echo "selected";
                    } ?> value="Obat Wajib Apotek">Obat Wajib Apotek</option>
            <option <?php if ($golongan == 'Obat Herbal') {
                        echo "selected";
                    } ?> value="Obat Herbal">Obat Herbal</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status Obat</label>
        <select class="form-control" id="status" name="status">
            <option>Pilih Status</option>
            <?php
            while ($statusobat = mysqli_fetch_assoc($result_status)) {
                $selected = ($statusobat['id'] == $idstok) ? 'selected' : '' ;
                echo "<option value='{$statusobat['id']}' $selected>{$statusobat['name']}</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>