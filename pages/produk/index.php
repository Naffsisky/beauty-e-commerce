<?php require 'function.php';
$produk = query("SELECT * FROM produk");

if(isset($_POST["cari"])){
    $produk = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>
    <Head>
        <title>Halaman Produk</title>
        <style type="text/css">
            *{
                font-family: "Trebuchet MS";
            }
            h1{
                text-transform: uppercase;
                color: #177090;
            }
            table{
                border: 1px solid #ddeeee;
                border-collapse: collapse;
                border-spacing: 0;
                width: 70%;
                margin: 10px auto 10px auto;
            }
            table thead th{
                background-color: #ddefef;
                border: 1px solid #ddeeee;
                color: #336b6b;
                padding: 10px;
                text-align: left;
                text-shadow: 1px 1px 1px #fff;
            }
            table tbody td{
                border: 1px solid #ddeeee;
                color: #333;
                padding: 10px;
            }
            a{
                background-color: #177090;
                color: #fff;
                padding: 10px;
                font-size: 12px;
                text-decoration: none;
            }
        </style>
    </Head>
    <body>
        <center><h1>Data Produk</h1></center>
        <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a></center>
        <br>
        <center>
        <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
            <button type="submit" name="cari">Cari!</button>
        </form>
        </center>
        <table>
            <thead>
                <th>No.</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Gambar Produk</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php $no = 1;?>
                <?php foreach($produk as $row): ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row["kode_produk"]; ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["stok"] ?></td>
                    <td>Rp. <?= number_format($row["harga"], 0, ',' , '.'); ?></td>
                    <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"];?>">Edit</a>
                        <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Anda yakin ingin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php $no++;?>
                <?php endforeach;?>    
            </tbody>
        </table>
    </body>
</html>