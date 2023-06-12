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
require 'functions.php';
$user = query("SELECT * FROM mimin WHERE username = '$username'")[0];
$produk = query("SELECT * FROM produk");

if($user['gambar'] == NULL){
  $gambar = 'http://bootdey.com/img/Content/avatar/avatar1.png';
}else{
  $gambar = '../profile/img/'.$user['gambar'];
}

$sort = $_GET['sort'] ?? '';
$sortText = 'Sort by';

// Lakukan sorting berdasarkan nilai sort
if ($sort === 'stok') {
    $produk = query("SELECT * FROM produk ORDER BY stok ASC");
    $sortText = 'Sort by stok';
} elseif ($sort === 'harga') {
    $produk = query("SELECT * FROM produk ORDER BY harga ASC");
    $sortText = 'Sort by harga';
} 
if(isset($_POST["cari"])){
  $produk = cari($_POST["keyword"]);
}

// melakukan tampilan awal saat tombol dengan name and id reset di tekan

if(isset($_POST["reset"])){
  $produk = query("SELECT * FROM produk");
  $sortText = 'Sort by';
  $sort = '';
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Beautyku | Produk</title>

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
    <!-- <link rel="stylesheet" href="./katalogstyle.css" /> -->
    <style>
        table thead th{
            background-color: #ddefef;
            border: 1px solid #ddeeee;
            color: #336b6b;
            padding: 10px;
            text-align: center;
            text-shadow: 1px 1px 1px #fff;
        }
        table tbody td{
            border: 1px solid #ddeeee;
            color: #333;
            padding: 10px;
        }
        table tbody td a{
            background-color: #177090;
            color: #fff;
            padding: 0px;
            font-size: 15px;
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 1px;
            outline: 2px solid #177090;
        }
        .dropdown {
          position: relative;
          display: inline-block;
        }

      .dropdown-toggle {
        padding: 8px 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f8f9fa;
        cursor: pointer;
      }

      .dropdown-menu {
        display: none;
        position: absolute;
        z-index: 1;
        min-width: 160px;
        padding: 8px 0;
        margin: 0;
        list-style: none;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
      }

      .dropdown-item {
        display: block;
        padding: 8px 16px;
        text-decoration: none;
        color: #333;
        transition: background-color 0.3s;
      }

      .dropdown-item:hover {
        background-color: #f8f9fa;
      }

      .dropdown-divider {
        height: 1px;
        margin: 4px 0;
        background-color: #ccc;
      }
        @media (max-width: 767px) {
            table {
            width: 100%;
            }
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
          <li class="nav-item">
            <a
              class="nav-link"
              data-widget="navbar-search"
              href="#"
              role="button"
            >
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline" method="POST" action="">
                <div class="input-group input-group-sm">
                  <input
                    class="form-control form-control-navbar"
                    type="search"
                    placeholder="Search"
                    aria-label="Search" name="keyword" id="keyword" autocomplete="off"
                  />
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit" name="cari" id="cari">
                      <i class="fas fa-search"></i>
                    </button>
                    <button
                      class="btn btn-navbar"
                      type="button"
                      data-widget="navbar-search"
                      name="reset" id="reset"
                    >
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./tambah.html">
              <i class="far fa-plus-square"></i>
            </a>
          </li>
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
              <a href="../profile/" class="d-block"><?= ucwords($user['nama']) ?></a>
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
                    <span class="badge badge-info right">20</span>
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
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tags"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-header">AKUN</li>
              <li class="nav-item">
                <a href="../profile/" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-globe"></i>
                  <p>Website Client</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
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
                <h1 class="m-0">Dashboard</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="../../">Home</a></li>
                  <li class="breadcrumb-item active">Produk</li>
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
        <div class="container" id="content">
          <div class="table-responsive">
            <table style="border: 1px solid #ddeeee;
                border-collapse: collapse;
                border-spacing: 0;
                width: 70%;
                margin: 10px auto">
                <thead>
                    <th>No.</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Gambar Produk</th>
                    <th>Aksi</th>
                </thead>
                <tbody style="text-align: center;">
                <div class="dropdown">
                  <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $sortText; ?>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="?sort=stok" data-sort="stok">Stok</a>
                    <a class="dropdown-item" href="?sort=harga" data-sort="harga">Harga</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../produk/">Default</a>
                  </div>
                </div>
                  <?php $no = 1;?>
                  <?php foreach($produk as $row): ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row["kode_produk"]; ?></td>
                        <td><?= $row["nama"] ?></td>
                        <td><?= $row["stok"] ?></td>
                        <td>Rp. <?= number_format($row["harga"], 0, ',' , '.'); ?></td>
                        <td><img src="img/<?= $row["gambar"]; ?>" width="120"></td>
                        <td>
                            <a href="ubah.html?id=<?= $row["id"];?>">Edit</a>
                            <a href="hapus.html?id=<?= $row["eksternal_id"];?>" onclick="return confirm('Anda yakin ingin hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php $no++;?>
                    <?php endforeach;?>    
                </tbody>
            </table>
          </div>
          <br />
        </div>
        <!-- /.content -->
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
    <script>
      var keyword = document.getElementById('keyword');
      var tombolCari = document.getElementById('cari');
      var tombolReset = document.getElementById('reset');
      var content = document.getElementById('content');
      keyword.addEventListener('keyup', function(){
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
          if (xhr.readyState == 4 && xhr.status == 200){
            content.innerHTML = xhr.responseText;
          }
        }
        xhr.open('GET', 'search.php?keyword=' + keyword.value, true);
        xhr.send();
      });
      tombolReset.addEventListener('click', function(){
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200){
          content.innerHTML = xhr.responseText;
        }
      }

      xhr.open('GET', 'search.php?keyword=', true);
      xhr.send();
    });
    </script>
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
  </body>
</html>