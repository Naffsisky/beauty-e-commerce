<?php 
require './function.php';

if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        echo "
        <script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    } else {
        // echo "
        // <script>('Data gagal ditambahkan!');
        // document.location.href = 'index.php';
        // </script>";
    }
    
}
if (!$result){
    echo mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Produk</title>
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
            <h1>Tambah Produk</h1>
        </center>
        <form action="" method="POST" enctype="multipart/form-data">
            <section class="base">
                <div>
                    <label for="kode_produk">Kode Produk</label>
                    <input type="text" name="kode_produk" id="kode_produk" required>
                </div>
                <div>
                    <label for="nama">Nama Produk</label>
                    <input type="text" name="nama" id="nama" required>
                </div>
                <div>
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" id="stok" required>
                </div>
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" required>
                </div>
                <div>
                    <label for="gambar">Gambar Produk</label>
                    <input type="file" name="gambar" id="gambar" required>
                </div>
                <div>
                    <button type="submit" name="submit">Tambah Produk</button>
                </div>
            </section>
        </form>
    </body>
</html>