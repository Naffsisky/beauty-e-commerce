<!DOCTYPE html>
<html>
<head>
  <title>Keranjang Belanja</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "beautyku");

     if (!$result){
    echo mysqli_error($conn);
    }


    // Tambahkan produk ke keranjang belanja
    if (isset($_POST['add_to_cart'])) {
      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];

      // Query INSERT untuk menyimpan data produk ke dalam tabel keranjang_belanja
      $query = "INSERT INTO keranjang_belanja (product_id, product_name, product_price) VALUES ('$product_id', '$product_name', '$product_price')";
      $result = mysqli_query($conn, $query);

      if ($result) {
        echo 'Produk berhasil ditambahkan ke keranjang belanja.';
      } else {
        echo 'Gagal menambahkan produk ke keranjang belanja: ' . mysqli_error($conn);
      }
    }

    // Hapus produk dari keranjang belanja
    if (isset($_GET['remove'])) {
      $product_id = $_GET['remove'];

      // Query DELETE untuk menghapus produk dari tabel keranjang_belanja
      $query = "DELETE FROM keranjang_belanja WHERE id = '$product_id'";
      $result = mysqli_query($conn, $query);

      if ($result) {
        echo 'Produk berhasil dihapus dari keranjang belanja.';
      } else {
        echo 'Gagal menghapus produk dari keranjang belanja: ' . mysqli_error($conn);
      }
    }

    // Tampilkan keranjang belanja
    $query = "SELECT * FROM keranjang_belanja";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      echo '<h1>Keranjang Belanja</h1>';
      echo '<div class="cart-container">';
      while ($product = mysqli_fetch_assoc($result)) {
        echo '<div class="cart-item">';
        echo '<div class="details">';
        echo '<h3>' . $product['product_name'] . '</h3>';
        echo '<p>Harga: Rp' . number_format($product['product_price'], 0, ',', '.') . '</p>';
        echo '<button class="remove-button" onclick="window.location.href=\'keranjang.php?remove=' . $product['id'] . '\'">Hapus</button>';
        echo '</div>';
        echo '</div>';
      }
      echo '</div>';
    } else {
      echo '<h1>Keranjang Belanja Kosong</h1>';
    }

    // Tutup koneksi database
    mysqli_close($conn);
    ?>
  </div>
</body>
</html>
