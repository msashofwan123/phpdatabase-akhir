<?php
require_once('../database/koneksi.php');

session_start();

if ($_SESSION['nama_login'] == null) {
  header("location: ../login");
};

$sql = "SELECT * FROM `dataobat`";
$result = mysqli_query($conn, $sql);
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
  <title>Inspira Media - Data Obat</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
  <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


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

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Obat-Obatan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Data Obat</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <a class="btn btn-success" href="add_obat.php">TAMBAH DATA</a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="mytable">
                    <thead class="thead-light">
                      <tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Khasiat</th>
                        <th>Dosis</th>
                        <th>No Izin</th>
                        <th>Gambar</th>
                        <th>Jenis Obat</th>
                        <th>Status</th>
                        <th>
                          <center>ACTION
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      while ($data = mysqli_fetch_assoc($result)) {
                        if ($data['file'] == "") {
                          $gambar = "";
                        } else {
                          $gambar = $data['file'];
                        }
                      ?>
                        <tr>
                          <th><?= $no++; ?></th>
                          <th><?= $data['id']; ?></th>
                          <td><?= $data['nama']; ?></td>
                          <td><?= $data['khasiat']; ?></td>
                          <td><?= $data['dosis']; ?></td>
                          <td><?= $data['izin']; ?></td>
                          <td><img class="img-thumbnail" width="100" src="storage/img/<?= $gambar ?>" /></td>
                          <td><?= $data['golongan']; ?></td>
                          <td></td>
                          <td>
                            <button class="btn btn-info btn-edit" data-bs-toggle="modal" data-bs-target="#editdata" data-id="<?= $data['id'] ?>" data-bs-aksi="ubah"> Ubah
                            </button>
                            <button class="btn btn-danger btn-delete" data-bs-toggle="modal" data-id="<?= $data['id'] ?>"> Hapus
                            </button>
                          </td>
                        </tr>

                      <?php
                      }

                      ?>

                    </tbody>
                  </table>
                </div>
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

          <!-- MODAL EDIT BOOTSTRAP 4-->
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="edit-body">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
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
              <b><a href="#" target="_blank">mhd.shofwan</a></b>
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

  <!-- JQUERY 3.X -->
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>

  <!-- BOOTSTRAP JS -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

  <!-- BOOTSTRAP 4 JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script> -->
  <!-- <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

  <!-- DATA TABLES  -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function() {
      $('#mytable').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/id.json"
        }
      });
    });
  </script>

  <!-- EDIT DATA MODAL -->
  <script>
    $(document).on('click', '.btn-edit', function() {
      var id = $(this).data('id');
      $.ajax({
          url: 'form.php',
          type: 'POST',
          data: {
            id: id
          },
          dataType: 'html'
        })
        .done(function(data) {
          $('#editModal').modal('show');
          $('#edit-body').html(data);
        })
        .fail(function() {
          alert("Error fetching form. Please try again.");
        });
    });
  </script>
  <script>
    $(document).on('click', '.btn-delete', function() {
      var id = $(this).data('id');
      $.ajax({
          url: 'delete_obat.php',
          type: 'POST',
          data: {
            id: id
          },
          dataType: 'html'
        })
        .done(function(data) {
          $('#editModal').modal('show');
          $('#edit-body').html(data);
        })
        .fail(function() {
          alert("Error fetching form. Please try again.");
        });
    });
  </script>

</body>

</html>