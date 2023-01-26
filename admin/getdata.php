<?php
require_once('../database/koneksi.php');


$sql = "SELECT * FROM `dataobat`";
$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($result);