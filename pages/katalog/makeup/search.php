<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../../login/login.html");
  exit;
}
if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  $nama = $_SESSION['nama'];
}
require '../functions.php';

$sort = $_GET['sort'] ?? '';
$sortText = 'Sort by';

if ($sort === 'stok'){
    $produk = query("SELECT * FROM produk WHERE kategori = 'makeup' ORDER BY stok ASC");
    $sortText = 'Sort by stok';
} elseif ($sort === 'harga'){
    $produk = query("SELECT * FROM produk WHERE kategori = 'makeup' ORDER BY harga ASC");
    $sortText = 'Sort by harga';
}
$keyword = $_GET["keyword"];
$query = "SELECT * FROM produk WHERE kategori = 'makeup'
            AND
            nama LIKE '%$keyword%'
        ";
$produk = query($query);
?>
<div>
    <div class="dropdown">
        <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $sortText; ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="?sort=stok" data-sort="stok">Stok</a>
            <a class="dropdown-item" href="?sort=harga" data-sort="harga">Harga</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../bodycare/">Default</a>
        </div>
    </div>
    <div class="product-container">
        <?php foreach ($produk as $row) : ?>
        <div class="product-item">
            <img class="product-image" src="../../produk/img/<?= $row["gambar"]; ?>" alt="Gambar Produk">   
            <h3 class="product-name"><?= $row['nama']; ?></h3>
            <p class="product-price">Rp<?= number_format($row['harga'], 0, ',', '.'); ?></p>
            <h4 class="product-stock">Stok : <?= $row['stok']; ?></h4>
        </div>
        <?php endforeach; ?>
    </div>
</div>