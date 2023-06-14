<?php

session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../login/login.html");
  exit;
}
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  $nama = $_SESSION['nama'];
}
require '../../functions.php';

$user = query("SELECT * FROM mimin WHERE username = '$username'")[0];

if($user['gambar'] == NULL){
  $gambar = 'http://bootdey.com/img/Content/avatar/avatar1.png';
}else{
  $gambar = 'img/'.$user['gambar'];
}
// if(isset($_POST["change"])){
//   $user['gambar'] = $gambar;
//   var_dump($_POST);
//   die;
//   if(ubah_user($_POST)>0){
//       echo "
//       <script>
//       alert('Data berhasil diubah!');
//       document.location.href = 'index.html';
//       </script>";
//   } else {
//       echo "
//       <script>('Data gagal diubah!');
//       document.location.href = 'index.html';
//       </script>";
//   }
// }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Beautyku | Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="../../plugins/fontawesome-free/css/all.min.css"
    />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Tempusdominus Bootstrap 4 -->
    <link
      rel="stylesheet"
      href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
    />
    <!-- iCheck -->
    <link
      rel="stylesheet"
      href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link
      rel="stylesheet"
      href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
    />
    <!-- Daterange picker -->
    <link
      rel="stylesheet"
      href="../../plugins/daterangepicker/daterangepicker.css"
    />
    <!-- summernote -->
    <link
      rel="stylesheet"
      href="../../plugins/summernote/summernote-bs4.min.css"
    />
    <!-- Profile -->
    <!-- <link rel="stylesheet" href="./style.css" /> -->
    <style>
      .img-account-profile {
        height: 10rem;
      }
      .rounded-circle {
        border-radius: 50% !important;
      }
      .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
      }
      .card .card-header {
        font-weight: 500;
      }
      .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
      }
      .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
      }
    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <!-- <div
        class="preloader flex-column justify-content-center align-items-center"
      >
        <img
          class="animation__shake"
          src="../../dist/img/AdminLTELogo.png"
          alt="AdminLTELogo"
          height="60"
          width="60"
        />
      </div> -->

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
              ><i class="fas fa-bars"></i
            ></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <!-- Sign out -->
          <li class="nav-item">
            <a class="nav-link" href="../login/logout.html">
              <i class="fas fa-sign-out-alt"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="<?= $gambar ?>"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="#" class="d-block"><?= ucwords($user['nama']) ?></a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input
                class="form-control form-control-sidebar"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-header">DASHBOARD</li>
              <li class="nav-item">
                <a href="../../" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-header">PESANAN</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>
                    Pesanan Sekarang
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../order/" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Menunggu Konfirmasi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../order/" class="nav-link">
                      <i class="far fa-circle nav-icon text-warning"></i>
                      <p>Pesanan di Proses</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../order/" class="nav-link">
                      <i class="far fa-circle nav-icon text-success"></i>
                      <p>Pesanan Selesai</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="../history/" class="nav-link">
                  <i class="nav-icon fas fa-history"></i>
                  <p>
                    Riwayat Pesanan
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../review/" class="nav-link">
                  <i class="nav-icon fas fa-star"></i>
                  <p>
                    Ulasan Pembeli
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../report/" class="nav-link">
                  <i class="nav-icon fas fa-exclamation-circle"></i>
                  <p>Aduan Pembeli</p>
                </a>
              </li>
              <li class="nav-header">PENJUALAN</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book-open"></i>
                  <p>
                    Katalog
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../katalog/skincare/" class="nav-link">
                      <i class="far fa-circle nav-icon text-pink"></i>
                      <p>Skincare</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../katalog/bodycare/" class="nav-link">
                      <i class="far fa-circle nav-icon text-pink"></i>
                      <p>Bodycare</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../katalog/makeup/" class="nav-link">
                      <i class="far fa-circle nav-icon text-pink"></i>
                      <p>Makeup</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="../produk/" class="nav-link">
                  <i class="nav-icon fas fa-tags"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-header">AKUN</li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../client/" target="_blank" class="nav-link">
                  <i class="nav-icon fas fa-globe"></i>
                  <p>Website Client</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../settings/" class="nav-link">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>Settings</p>
                </a>
              </li>
              <li class="nav-header">LOGOUT</li>
              <li class="nav-item">
                <a href="../login/logout.html" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Keluar</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Profile <?= ucwords($user['nama']) ?></h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="../../">Home</a></li>
                  <li class="breadcrumb-item active">Profile</li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container-xl px-4 mt-2">
          <div class="row">
            <div class="container col-xl-4">
              <!-- Profile picture card-->
              <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                  <!-- Profile picture image-->
                  <img
                    class="img-account-profile rounded-circle mb-2"
                    src="<?= $gambar ?>"
                    alt=""
                  />
                  <!-- Profile picture help block-->
                  <div class="small font-italic text-muted mb-4">
                    JPG or PNG no larger than 3 MB
                  </div>
                  <!-- Profile picture upload button-->
                </div>
              </div>
            </div>
            <div class="container col-xl-8">
              <!-- Account details card-->
              <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?= $user['id']; ?>">
                    <input type="file" id="gambar" name="gambar" style="display: none;" value="<? $user['gambar'] ?>">
                    <input type="hidden" id="gambarlama" name="gambarLama" value="<?= $user['gambar']; ?>">
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                      <label class="small mb-1" for="inputUsername"
                        >Username</label
                      >
                      <span class="form-control"><?= $user['username'] ?></span>
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                      <!-- Form Group (first name)-->
                      <div class="col-md-6">
                        <label class="small mb-1" for="inputFirstName"
                          >Nama</label
                        >
                        <span class="form-control"><?= $user['nama'] ?></span>
                      </div>
                      <!-- Form Group (last name)-->
                      <div class="col-md-6">
                        <label class="small mb-1" for="inputLastName"
                          >No Karyawan</label
                        >
                        <span class="form-control"><?= $user['no_karyawan'] ?></span>
                      </div>
                    </div>
                    <!-- Form Row -->
                    <div class="row gx-3 mb-3">
                      <!-- Form Group (organization name)-->
                      <div class="col-md-6">
                        <label class="small mb-1" for="inputOrgName"
                          >Role</label
                        >
                        <span class="form-control"><?= $user['role'] ?></span>
                      </div>
                      <!-- Form Group (location)-->
                      <div class="col-md-6">
                        <label class="small mb-1" for="inputLocation"
                          >Domisili</label
                        >
                        <span class="form-control"><?= $user['domisili'] ?></span>
                      </div>
                    </div>
                    <!-- Form Group (email address)-->
                    <div class="mb-3">
                      <label class="small mb-1" for="inputEmailAddress"
                        >Alamat Email</label
                      >
                      <span class="form-control"><?= $user['email'] ?></span>
                    </div>
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                      <!-- Form Group (phone number)-->
                      <div class="col-md-6">
                        <label class="small mb-1" for="inputPhone"
                          >Nomer Handphone</label
                        >
                        <span class="form-control"><?= $user['ponsel'] ?></span>
                      </div>
                      <!-- Form Group (birthday)-->
                      <div class="col-md-6">
                        <label class="small mb-1" for="inputBirthday"
                          >Tanggal Lahir</label
                        >
                        <span class="form-control"><?= $user['tanggal_lahir'] ?></span>
                      </div>
                    </div>
                    <!-- Save changes button-->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="#">Beautyku</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> Final Project
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../../plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../dist/js/pages/dashboard.js"></script>
    <script>
      // JavaScript
      document.getElementById("buttongambar").addEventListener("click", function() {
        document.getElementById("gambar").click();
      });

      document.getElementById("gambar").addEventListener("change", function() {
        var file = this.files[0];
        // Lakukan apa pun yang Anda inginkan dengan file yang dipilih, misalnya mengunggahnya ke server
        console.log("File yang dipilih:", file);
      });
      </script>
  </body>
</html>
