<?php 
require 'config.php';

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
if (!$result){
    echo mysqli_error($conn);
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
                border: 0px;
                margin-top: 20px;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <center>
            <h1>Cart</h1>
        </center>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$produk["id"];?>">
            <input type="hidden" name="gambarLama" value="<?= $produk["gambar"]; ?>">
            <section class="base" style="border-radius: 10px;">
                <div style="text-align: center">
                  <label for="gambar">Gambar Produk</label>
                  <img src="../produk/img/<?= $produk["gambar"]; ?>" width="70">
                </div>
                <div>
                    <label for="nama">Nama Produk</label>
                    <p><?= $produk['nama']; ?></p>
                </div>
                <div>
                    <label for="stok">Harga</label>
                    <p><?= $produk['harga']; ?></p>
                </div>
                <div>
                    <button type="submit" name="submit" onclick="return confirm('Apakah data yang anda masukan sudah benar?')";>Hapus Data</button>
                </div>
            </section>
        </form>
    </body>
</html>