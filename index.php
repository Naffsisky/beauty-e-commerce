<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ./pages/login/login.html");
  exit;
}
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  $nama = $_SESSION['nama'];
}

require './functions.php';

$produk = query ("SELECT * FROM produk WHERE stok < 5 ORDER BY stok ASC LIMIT 5");
$user = query("SELECT * FROM mimin WHERE username = '$username'")[0];

if($user['gambar'] == NULL){
  $gambar = 'http://bootdey.com/img/Content/avatar/avatar1.png';
}else{
  $gambar = 'pages/profile/img/'.$user['gambar'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Beautyku | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Tempusdominus Bootstrap 4 -->
    <link
      rel="stylesheet"
      href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
    />
    <!-- iCheck -->
    <link
      rel="stylesheet"
      href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link
      rel="stylesheet"
      href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
    />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css" />
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <div
        class="preloader flex-column justify-content-center align-items-center"
      >
        <img
          class="animation__shake"
          src="dist/img/loading.gif"
          alt="AdminLTELogo"
          height="60"
          width="60"
        />
      </div>

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
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header"
                >15 Notifications</span
              >
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer"
                >See All Notifications</a
              >
            </div>
          </li>
          <!-- Sign out -->
          <li class="nav-item">
            <a class="nav-link" href="./pages/login/logout.php">
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
              <a href="pages/profile/" class="d-block"><?= ucwords($user['nama']) ?></a>
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
                <a href="#" class="nav-link active">
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
                    <a href="pages/order/" class="nav-link">
                      <i class="far fa-circle nav-icon text-danger"></i>
                      <p>Menunggu Konfirmasi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/order/" class="nav-link">
                      <i class="far fa-circle nav-icon text-warning"></i>
                      <p>Pesanan di Proses</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/order/" class="nav-link">
                      <i class="far fa-circle nav-icon text-success"></i>
                      <p>Pesanan Selesai</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="pages/history/" class="nav-link">
                  <i class="nav-icon fas fa-history"></i>
                  <p>
                    Riwayat Pesanan
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/review/" class="nav-link">
                  <i class="nav-icon fas fa-star"></i>
                  <p>
                    Ulasan Pembeli
                    <span class="badge badge-info right">20</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/report/" class="nav-link">
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
                    <a href="pages/katalog/skincare/" class="nav-link">
                      <i class="far fa-circle nav-icon text-pink"></i>
                      <p>Skincare</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/katalog/bodycare/" class="nav-link">
                      <i class="far fa-circle nav-icon text-pink"></i>
                      <p>Bodycare</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/katalog/makeup/" class="nav-link">
                      <i class="far fa-circle nav-icon text-pink"></i>
                      <p>Makeup</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="pages/produk/" class="nav-link">
                  <i class="nav-icon fas fa-tags"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-header">AKUN</li>
              <li class="nav-item">
                <a href="pages/profile/" class="nav-link">
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
                <a href="./pages/login/logout.html" class="nav-link">
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
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
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
        <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>150</h3>

                    <p>Total Pesanan</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Statistik Penjualan</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>44</h3>

                    <p>Pengguna Baru</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>65</h3>

                    <p>Pesanan Dibatalkan</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-close-circled"></i>
                  </div>
                  <a href="#" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
              <!-- Left col -->
              <section class="col-lg-7 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-exchange-alt mr-1"></i>
                      Pendapatan Bulanan
                    </h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Waktu</th>
                            <th>Mutasi</th>
                            <th>Saldo</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>2023-06-01</td>
                            <td>1,000,000</td>
                            <td>1,000,000</td>
                            <td>Saldo Awal</td>
                          </tr>
                          <tr>
                            <td>2023-06-02</td>
                            <td>500,000</td>
                            <td>1,500,000</td>
                            <td>Penjualan</td>
                          </tr>
                          <tr>
                            <td>2023-06-03</td>
                            <td>200,000</td>
                            <td>1,700,000</td>
                            <td>Penjualan</td>
                          </tr>
                          <tr>
                            <td>2023-06-04</td>
                            <td>100,000</td>
                            <td>1,800,000</td>
                            <td>Penjualan</td>
                          </tr>
                          <tr>
                            <td>2023-06-05</td>
                            <td>50,000</td>
                            <td>1,850,000</td>
                            <td>Penjualan</td>
                          </tr>
                          <!-- Tambahkan baris data saldo masuk sesuai kebutuhan -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-shopping-cart mr-1"></i>
                      Restock
                    </h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        <?php foreach($produk as $row): ?>
                          <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= ucfirst($row['kategori']) ?></td>
                            <td><?= $row['stok'] ?></td>
                            <td><?= number_format($row["harga"], 0, ',' , '.'); ?></td>
                          </tr>
                        <?php $no++;?>
                        <?php endforeach;?>  
                          <!-- Tambahkan baris data saldo masuk sesuai kebutuhan -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card bg-gradient-success">
                  <div class="card-header border-0">
                    <h3 class="card-title">
                      <i class="far fa-calendar-alt"></i>
                      Calendar
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                      <!-- button with a dropdown -->
                      <button
                        type="button"
                        class="btn btn-success btn-sm"
                        data-card-widget="collapse"
                      >
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body pt-2">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%">
                    <div id="sparkline-1" style="display: none"></div></div>
                    <div id="sparkline-2" style="display: none"></div>
                    <div id="sparkline-3" style="display: none"></div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- TO DO List -->
                <!-- /.card -->
              </section>
              <!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->
              <section class="col-lg-5 connectedSortable">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-wallet mr-1"></i>
                      Dompet Toko
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content p-0">
                      <div
                        class="tab-pane fade show active"
                        id="income"
                        style="position: relative; height: 150px"
                      >
                      <p>
                        <i class="fas fa-money-bill-wave"></i>
                        <span class="text text-lg">Saldo</span><br>
                        <span class="text-bold text-lg">Rp. 1.850.000</span>
                      </p>
                      <p>
                        <i class="fas fa-money-bill-wave"></i>
                        <span class="text text-lg">Withdraw</span><br>
                        <span class="text-bold text-lg">Rp. 11.850.000</span>
                    </p>
                      </div>
                    </div>
                    <button class="btn btn-primary float-right" id="withdrawButton">Withdraw</button>
                  </div>
                  <!-- /.card-body -->
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-info-circle mr-1"></i>
                      Keterangan
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content p-0">
                    <ol>
                      <li style="text-align: justify">Proses pencairan saldo 1-3 hari kerja untuk semua Bank.</li>
                      <li style="text-align: justify">Pencairan saldo tidak dikenakan biaya untuk Penjual yang menggunakan Bank BCA, BRI, dan Mandiri.</li>
                      <li style="text-align: justify">Pencairan saldo akan dikenakan biaya Rp. 6.500,- untuk Penjual yang menggunakan Bank selain BCA, BRI, dan Mandiri.</li>
                      <li style="text-align: justify">Minimal pengajuan pencairan saldo toko yang dapat diproses adalah Rp. 20.000,-</li>
                      <li style="text-align: justify">Maksimal pengajuan pencairan saldo toko yang dapat diproses pada akhir pekan dan hari libur nasional adalah Rp. 250.000.000,- (Dua Ratus Lima Puluh Juta Rupiah) khusus pengguna Bank Central Asia (BCA), Rp. 500.000.000 (Lima Ratus Juta Rupiah), dan Rp. 50.000.000,- (Lima Puluh Juta Rupiah) per pengajuan tergantung dari Bank pengguna.</li>
                      <li style="text-align: justify">Pencairan saldo di akhir pekan dan hari libur nasional yang melebihi ketentuan tersebut akan diproses pada hari kerja berikutnya.</li>
                    </ol>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- Map card -->
                <!-- /.card -->

                <!-- solid sales graph -->
                <!-- /.card -->

                <!-- Calendar -->
                <!-- /.card -->
              </section>
              <!-- right col -->
            </div>
            <!-- /.row (main row) -->
          </div>
          <!-- /.container-fluid -->
        </section>
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

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
  </body>
</html>
