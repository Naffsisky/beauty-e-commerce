<?php 
require 'config.php';

$produk = query("SELECT * FROM produk");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Katalog Produk Skincare</title>
</head>
<link rel="stylesheet" type="text/css" href="./style.css">
<body>
    <h1>Katalog Produk Skincare</h1>
    <div class="product-container">
        <?php foreach ($produk as $row) : ?>
            <div class="product-item">
                <img class="product-image" src="../produk/img/<?= $row["gambar"]; ?>" alt="Gambar Produk">   
                <h3 class="product-name"><?= $row['nama']; ?></h3>
                <p>Harga: Rp<?= number_format($row['harga'], 0, ',', '.'); ?></p>
                <a class="buy-button" href="cart.php?id=<?= $row["id"];?>">Beli</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

