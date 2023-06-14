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
require '../login/functions.php';

$id = $_GET["id"];
$user = query("SELECT * FROM mimin WHERE username = '$username'")[0];
$produk = query("SELECT * FROM produk WHERE id = $id")[0];

if($user['gambar'] == NULL){
    $gambar = 'http://bootdey.com/img/Content/avatar/avatar1.png';
  }else{
    $gambar = '../profile/img/'.$user['gambar'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan</title>
    <!---stylesheet-->
    <link rel="stylesheet" href="style.css"/>
    <!--poppins fond-familly-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--using-font awesome-->
    <script src="fontawesome/js/all.js"></script>
</head>
<body>
    <section id="ulasan">
        <div class="ulasan-heading">
            <h1>ULASAN PRODUK</h1>
            <br>
            <p><a href="./" style="color: black"><b>Back</b>?</a></p>
        </div>
        <!--box container-->
        <div class="ulasan-box-container">
            <div class="produk">
                <div class="produk-box">
                    <div class="produk-img">
                        <img src="../produk/img/<?= $produk['gambar'] ?>"/>
                    </div>
                    <div class="profile-produk">
                        <div class="nama-produk">
                            <Strong style="text-align: center"><?= $produk['nama'] ?></Strong>
                            <span>Kode : <?= $produk['kode_produk'] ?></span>
                        </div>
                        <div class="review">
                            <i class="fas fa-star"></i> <!--stars-->
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span><?= ucwords($produk['kategori']) ?></span>
                        </div>
                    </div>
                    <div class="rincihan-produk">
                        <p> <?= ucwords($produk['nama']) ?> adalah salah satu sabun wajah terbaik di dunia degan komposisi yang aman dan tentunya sudah teruji</p>
                    </div>
                </div>
            </div>


            <!--box1-->
            <div class="ulasan-box">
                <!--top-->
                <div class="box-top">
                    <div class="Profile"> 
                        <!--profile-->
                        <div class="profile-img">
                        <img src="image/pp1.jpeg" />
                        </div>
                    <!--nameuser-->
                    <div class="name-user">
                        <strong>Kim Jisoo</strong>
                        <span>@sooyaa</span>
                    </div>
                    </div> 
                    <div class="review">
                        <i class="fas fa-star"></i> <!--stars-->
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <!--komentar-->
                <div class="komentar">
                   <p>Barang ini sangat bagus sekali pemakaian wajah saya langsung bercahaya</p> 
                </div>
            </div>
            
            <!--box2-->
            <div class="ulasan-box">
                <!--top-->
                <div class="box-top">
                    <div class="Profile"> 
                        <!--profile-->
                        <div class="profile-img">
                        <img src="image/pp2.jpg" />
                        </div>
                    <!--nameuser-->
                    <div class="name-user">
                        <strong>Lalisa</strong>
                        <span>@Lalalalisa</span>
                    </div>
                    </div> 
                    <div class="review">
                        <i class="fas fa-star"></i> <!--stars-->
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <!--komentar-->
                <div class="komentar">
                   <p>Barang ini sangat bagus </p> 
                </div>
            </div>

            <!--box3-->
            <div class="ulasan-box">
                <!--top-->
                <div class="box-top">
                    <div class="Profile"> 
                        <!--profile-->
                        <div class="profile-img">
                        <img src="image/pp3.jpeg" />
                        </div>
                    <!--nameuser-->
                    <div class="name-user">
                        <strong>Kim Jennie</strong>
                        <span>@rubye_jennie</span>
                    </div>
                    </div> 
                    <div class="review">
                        <i class="fas fa-star"></i> <!--stars-->
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <!--komentar-->
                <div class="komentar">
                   <p>Lumayan</p> 
                </div>
            </div>

            <!--box4-->
            <div class="ulasan-box">
                <!--top-->
                <div class="box-top">
                    <div class="Profile"> 
                        <!--profile-->
                        <div class="profile-img">
                        <img src="image/pp4.jpeg" />
                        </div>
                    <!--nameuser-->
                    <div class="name-user">
                        <strong>Rose</strong>
                        <span>@Rossiee</span>
                    </div>
                    </div> 
                    <div class="review">
                        <i class="fas fa-star"></i> <!--stars-->
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <!--komentar-->
                <div class="komentar">
                   <p>Barang ini tidak cocok denganku </p> 
                </div>
            </div>


                        
        </div>
    </section>
    
</body>
</html>