<?php
require 'config.php';

$produk = query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Katalog Produk Skincare</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <h1>Katalog Produk Skincare</h1>

    <div class="search-sort-container">
        <div class="search-input-container">
            <input type="text" id="search-input" class="search-input search-large" placeholder="Cari produk...">
        </div>
        <div class="button-container">
            <button class="button" onclick="searchProducts()">Cari</button>
            <button class="button" onclick="sortProducts()">Urutkan</button>
            <button class="button" onclick="resetProducts()">Kembali</button>
        </div>
    </div>
    <div class="product-container">
        <?php foreach ($produk as $row) : ?>
            <div class="product-item">
                <img class="product-image" src="../produk/img/<?= $row["gambar"]; ?>" alt="Gambar Produk">   
                <h3 class="product-name"><?= $row['nama']; ?></h3>
                <p>Harga: Rp<?= number_format($row['harga'], 0, ',', '.'); ?></p>
                <h4 class="product-stock">Stok: <?= $row['stok']; ?></h4>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        // Simpan tampilan awal
        var initialProducts = document.getElementsByClassName("product-container")[0].innerHTML;

        function searchProducts() {
            var input = document.getElementById("search-input").value.toLowerCase();
            var products = document.getElementsByClassName("product-item");

            for (var i = 0; i < products.length; i++) {
                var name = products[i].getElementsByClassName("product-name")[0].innerText.toLowerCase();
                var stock = products[i].getElementsByClassName("product-stock")[0].innerText.toLowerCase();

                if (name.includes(input) || stock.includes(input)) {
                    products[i].style.display = "";
                } else {
                    products[i].style.display = "none";
                }
            }
        }

        function sortProducts() {
            var products = Array.from(document.getElementsByClassName("product-item"));

            products.sort(function (a, b) {
                var stockA = parseInt(a.getElementsByClassName("product-stock")[0].innerText.split(":")[1].trim());
                var stockB = parseInt(b.getElementsByClassName("product-stock")[0].innerText.split(":")[1].trim());

                return stockA - stockB;
            });

            var container = document.getElementsByClassName("product-container")[0];

            for (var i = 0; i < products.length; i++) {
                container.appendChild(products[i]);
            }
        }

        function resetProducts() {
            var container = document.getElementsByClassName("product-container")[0];
            container.innerHTML = initialProducts;
        }
    </script>
</body>
</html>
