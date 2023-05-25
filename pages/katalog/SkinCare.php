<!DOCTYPE html>
<html>
<head>
  <title>Katalog Produk</title>
  <link rel="stylesheet" type="text/css" href="style.css">
<body>
  <div class="container">
    <h1>Katalog Produk</h1>

<?php
//session_start();

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "skincare");
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Daftar produk
$products = array(
    array(
        'id' => 1,
        'nama' => 'The Soy Face Cleanser',
        'deskripsi' => 'Soy Face Cleanser dari fresh secara instan dapat menghilangkan kelembapan esensial kulit. kaya akan asam amino, protein kedelai yang dapat mendukung retensi kelembapan.',
        'harga' => 516000,
        'gambar' => 'FotoProduk/1.jpeg'
    ),
    array(
        'id' => 2,
        'nama' => 'DR.JART + Poremedic Pore Minish Bubble 120 ml',
        'deskripsi' => 'PORE MEDIC Poremish 120ml, Produk ini tanpa alkohol dan cocok buat semua jenis kulit.',
        'harga' => 380000,
        'gambar' => 'FotoProduk/2.jpeg'
    ),
    array(
        'id' => 3,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/3.jpeg'
    ),
    array(
        'id' => 4,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/4.jpeg'
    ),
    array(
        'id' => 5,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/5.jpeg'
    ),
    array(
        'id' => 6,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/6.jpeg'
    ),
    array(
        'id' => 7,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/7.jpeg'
    ),
    array(
        'id' => 8,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/8.jpeg'
    ),
    array(
        'id' => 9,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/9.jpeg'
    ),
    array(
        'id' => 10,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/10.jpeg'
    ),
    array(
        'id' => 11,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/11.jpeg'
    ),
    array(
        'id' => 12,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/12.jpeg'
    ),
    array(
        'id' => 13,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/13.jpeg'
    ),
    array(
        'id' => 14,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/14.jpeg'
    ),
    array(
        'id' => 15,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/15.jpeg'
    ),
    array(
        'id' => 16,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/16.jpeg'
    ),
    array(
        'id' => 17,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/17.jpeg'
    ),
    array(
        'id' => 18,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/18.jpeg'
    ),
    array(
        'id' => 19,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/19.jpeg'
    ),
    array(
        'id' => 20,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/20.jpeg'
    ),
    array(
        'id' => 21,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/21.jpeg'
    ),
    array(
        'id' => 22,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/22.jpeg'
    ),
    array(
        'id' => 23,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/23.jpeg'
    ),
    array(
        'id' => 24,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/24.jpeg'
    ),
    array(
        'id' => 25,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/25.jpeg'
    ),
    array(
        'id' => 26,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/27.png'
    ),
    array(
        'id' => 27,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/28.png'
    ),
    array(
        'id' => 28,
        'nama' => 'Jhon Masters Organics face cleanser',
        'deskripsi' => 'Pembersih wajah eksfoliasi Jhon Masters Organics dengan Jojoba dan Ginseng menggabungkan ekstrak herbal dan tumbuhan serta minyak esensial untuk membantu menghilangkan kotoran di kulit',
        'harga' => 600000,
        'gambar' => 'FotoProduk/29.png'
    ),
   
    // Tambahkan produk lainnya di sini
);

// Loop untuk menampilkan produk
foreach ($products as $product) {
    echo '<div class="product-card">';
    echo '<img src="' . $product['gambar'] . '" alt="' . $product['nama'] . '" class="product-image">';
    echo '<h3>' . $product['nama'] . '</h3>';
    echo '<p>' . $product['deskripsi'] . '</p>';
    echo '<p>Harga: Rp' . number_format($product['harga'], 0, ',', '.') . '</p>';
    echo '<form method="POST" action="cart.php">';
    echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
    echo '<input type="hidden" name="product_name" value="' . $product['nama'] . '">';
    echo '<input type="hidden" name="product_des" value="' . $product['deskripsi'] . '">';
    echo '<input type="hidden" name="product_price" value="' . $product['harga'] . '">';
    echo '<input type="hidden" name="product_image" value="' . $product['gambar'] . '">';
    echo '<button class="buy-button" name="add_to_cart">Beli</button>';
    echo '</form>';
    echo '</div>';

    // Simpan produk ke database
    $productId = $product['id'];
    $productNama = $product['nama'];
    $productDes = $product['deskripsi'];
    $productHarga = $product['harga'];
    $productGambar = $product['gambar'];

    $query = "INSERT INTO produk_skincare (id, nama, deskripsi, harga, gambar) VALUES ('$productId', '$productNama', '$productDes','$productHarga', '$productGambar')";
    $result = $koneksi->query($query);
}
?>

  </div>
</body>
</html>


