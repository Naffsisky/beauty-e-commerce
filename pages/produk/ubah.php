<?php 
require 'function.php';

$id = $_GET["id"];

$produk = query("SELECT * FROM produk WHERE id = $id")[0];
if(isset($_POST["submit"])){
    if(ubah($_POST)>0){
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>('Data gagal diubah!');
        document.location.href = 'index.php';
        </script>";
    }
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ubah Produk</title>
        <style type="text/css">
            *{
                font-family: "Trebuchet MS";
            }
            h1{
                text-transform: uppercase;
                color: #177090;
            }
            .base{
                width: 400px;
                padding: 20px;
                margin-left: auto;
                margin-right: auto;
                background-color: #ededed;
            }
            label{
                margin-top: 10px;
                float: left;
                text-align: left;
                width: 100%;
            }
            input{
                padding: 6px;
                width: 100%;
                box-sizing: border-box;
                background-color: #f8f8f8;
                border: 2px solid #ccc;
                outline-color: #177090;
            }
            button{
                background-color: #177090;
                color: #fff;
                padding: 10px;
                font-size: 12px;
                border: 0;
                margin-top: 20px;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <center><h1>Ubah Data Produk</h1></center>
        <form action="" method="POST">
        <input type="hidden" name="id" value="<?=$produk["id"];?>"> </input>
        <section class="base">
            <div>
                <label for="kode_produk">Kode Produk</label>
                <input type="text" name="kode_produk" id="kode_produk" required value="<?= $produk["kode_produk"]; ?>">
            </div>
            <div>
                <label for="nama">Nama Produk</label>
                <input type="text" name="nama" id="nama" required value="<?= $produk["nama"]; ?>">
            </div>
            <div>
                <label for="stok">Stok</label>
                <input type="number" name="stok" id="stok" required value="<?= $produk["stok"]; ?>">
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" required value="<?= $produk["harga"]; ?>">
            </div>
            <div style="text-align: center">
                <label for="gambar">Gambar Produk</label>
                <img src="img/<?= $produk["gambar"]; ?>" width="70">
                <input type="file" name="gambar" id="gambar" value="<?= $produk["gambar"]; ?>">
            </div>
            <div>
                <button type="submit" name="submit">Ubah Data</button>
            </div>
        </section>
        </form>
    </body>
</html>