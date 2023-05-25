<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'TokoSkincare';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}

// Memeriksa apakah tabel katalog sudah berisi data
$query = "SELECT COUNT(*) as count FROM katalog";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$count = $row['count'];

if ($count == 0) {
    // Data produk yang akan dimasukkan ke dalam tabel
    $produk = [
        ['nama' => 'SKINTIFIC - 5X Ceramide', 'deskripsi' => 'SKINTIFIC - 5X Ceramide Barrier Repair Moisture Gel', 'harga' => 100000, 'gambar' => 'FotoProduk/gambar1.png'],
        ['nama' => 'SKINTIFIC- MUGWORT', 'deskripsi' => 'Anti pores and acne clay mask', 'harga' => 200000, 'gambar' => 'FotoProduk/gambar2.png'],
        ['nama' => 'SKINTIFIC - 5X Ceramide', 'deskripsi' => 'SKINTIFIC - 5X Ceramide Barrier Repair Moisture Gel', 'harga' => 100000, 'gambar' => 'FotoProduk/gambar1.png'],
        ['nama' => 'SKINTIFIC- MUGWORT', 'deskripsi' => 'Anti pores and acne clay mask', 'harga' => 200000, 'gambar' => 'FotoProduk/gambar2.png'],
        // Tambahkan data produk lainnya di sini...
    ];

    // Memasukkan data produk ke dalam tabel katalog
    foreach ($produk as $item) {
        $nama = $conn->real_escape_string($item['nama']);
        $deskripsi = $conn->real_escape_string($item['deskripsi']);
        $harga = $item['harga'];
        $gambar = $conn->real_escape_string($item['gambar']);

        $query = "INSERT INTO katalog (nama, deskripsi, harga, gambar) VALUES ('$nama', '$deskripsi', $harga, '$gambar')";
        $conn->query($query);
    }
}

// Kode untuk menampilkan katalog produk
?>
<!DOCTYPE html>
<html>
<head>
    <title>Katalog Produk</title>
    <style>
        .product {
            display: inline-block;
            width: 23%;
            margin: 1%;
            text-align: center;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
    $query = "SELECT * FROM katalog";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            $count++;
            if ($count % 4 == 1) {
                echo '<div class="product">';
            }

            echo '<img src="' . $row["gambar"] . '" alt="' . $row["nama"] . '" style="width: 150px; height: 150px;"><br>';
            echo '<h3>' . $row["nama"] . '</h3>';
            echo '<p>' . $row["deskripsi"] . '</p>';
            echo '<p>Harga: Rp' . $row["harga"] . '</p>';

            if ($count % 4 == 0) {
                echo '</div>';
            }
        }

        // Menangani produk yang tersisa jika jumlah produk tidak habis dibagi 4
        if ($count % 4 != 0) {
            echo '</div>';
        }
    } else {
        echo "Tidak ada item ditemukan dalam katalog.";
    }
    ?>

</body>
</html>

<?php
$conn->close();
?>
