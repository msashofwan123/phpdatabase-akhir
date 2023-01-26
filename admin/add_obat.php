<?php
session_start();

if ($_SESSION['nama_login'] == null) {
  header("location: ../login");
};

require_once('../database/koneksi.php');
// Data Status
$sql_status = "SELECT * FROM stokobat";
$result_status = mysqli_query($conn, $sql_status);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" href="../assets/favicon.ico">
  <title>Inspira Media - Tambah Data</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include_once('sidebar.php'); ?>
    <!-- Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include_once('topbar.php'); ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Obat</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
            </ol>
          </div>

          <?php
          if (isset($_GET['success'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= $_GET['success']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php }
          ?>
          <?php
          if (isset($_GET['alert'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= $_GET['alert']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php }
          ?>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4 mx-auto">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">TAMBAH DATA</h6>
                </div>
                <div class="card-body ms-5">
                  <form action="obat-ca.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="nama">Nama Obat</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Paracetamol">
                      <small id="namaHelp" class="form-text text-muted">Pastikan Menginput Nama Sesuai Dengan Aslinya</small>
                    </div>
                    <div class="form-group">
                      <label for="khasiat">Khasiat/Manfaat</label>
                      <input type="textarea" class="form-control" id="khasiat" name="khasiat" placeholder="Mengurangi Panas">
                    </div>
                    <div class="form-group">
                      <label for="dosis">Dosis</label>
                      <input type="text" class="form-control" id="dosis" name="dosis" placeholder="12,5mg 3x sehari">
                    </div>
                    <div class="form-group">
                      <label for="izin">No. Izin Edar</label>
                      <input type="text" class="form-control" id="izin" name="izin" placeholder="GKL9320916010A1">
                    </div>
                    <div class="form-group">
                      <label for="file" class="form-label">Upload Foto</label>
                      <input class="form-control" name="file" type="file" id="file">
                      <small id="fileHelp" class="form-text text-muted">Disarankan : 144 x 238 px</small>
                    </div>
                    <div class="form-group">
                      <label for="golongan">Golongan Obat</label>
                      <select class="form-control" id="golongan" name="golongan">
                        <option>Pilih Golongan</option>
                        <option value="Obat Bebas">Obat Bebas</option>
                        <option value="Obat Bebas Terbatas">Obat Bebas Terbatas</option>
                        <option value="Obat Keras">Obat Keras</option>
                        <option value="Obat Wajib Apotek">Obat Wajib Apotek</option>
                        <option value="Obat Herbal">Obat Herbal</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="status">Status Obat</label>
                      <select class="form-control" id="status" name="status">
                        <option>Pilih Status</option>
                        <?php
                        while ($statusobat = mysqli_fetch_assoc($result_status)) {
                          $selected = ($statusobat['id'] == $idstok) ? 'selected' : '';
                          echo "<option value='{$statusobat['id']}' $selected>{$statusobat['name']}</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            <!--Row-->

            <!-- Modal Logout -->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <a href="login.php" class="btn btn-primary">Logout</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!---Container Fluid-->
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>copyright &copy; <script>
                  document.write(new Date().getFullYear());
                </script> - developed by
                <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
              </span>
            </div>
          </div>
        </footer>
        <!-- Footer -->
      </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>

</body>

</html>