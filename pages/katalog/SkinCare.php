<?php 
$conn = mysqli_connect("localhost", "root", "", "beautyku");

if (!$result){
    echo mysqli_error($conn);
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
    exit();
}

$query = "SELECT * FROM produk";
$stmt = $pdo->query($query);

if (!$stmt) {
    echo "Error: " . $pdo->errorInfo()[2];
    exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Katalog Produk Skincare</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
    <h1>Katalog Produk Skincare</h1>
    <div class="product-container">
        <?php foreach ($result as $row) : ?>
            <div class="product-item">
                <form method="POST" action="cart.php">
                <img class="product-image" src="<?= $row['gambar']; ?>" alt="Gambar Produk">
                <h3 class="product-name"><?= $row['nama']; ?></h3>
                <p>Harga: Rp<?= number_format($row['harga'], 0, ',', '.'); ?></p>
                <button class="buy-button" name="add_to_cart">Beli</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

