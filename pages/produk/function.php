<?php 
$conn = mysqli_connect("localhost", "root", "", "beau");

if (!$result){
    echo mysqli_error($conn);
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $kode_produk = htmlspecialchars($data["kode_produk"]);
    $nama = htmlspecialchars($data["nama"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);
    var_dump($nama);
    var_dump($harga);
    $gambar = upload();
    var_dump($gambar);
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO produk VALUES('','$kode_produk','$nama','$stok','$harga','$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['nama'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    //cek yang diupload berupa gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'heic'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        var_dump($ekstensiGambar);
        // echo "<script>
        // alert('yang Anda upload bukan gambar!');
        // </script>";
        return false;
    }

    //cek ukuran terlalu besar
    if($ukuranFile > 3000000){
        echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    //lolos pengecekan, gambar diupload
    //nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    $destinationFile = './img/';

    move_uploaded_file($tmpName, $destinationFile . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $kode_produk = htmlspecialchars($data["kode_produk"]);
    $nama = htmlspecialchars($data["nama"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE produk SET
        kode_produk = '$kode_produk',
        nama = '$nama',
        stok = '$stok',
        harga = '$harga',
        gambar = '$gambar'
    WHERE id = $id";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM produk 
        WHERE 
    kode_produk LIKE '%$keyword%' OR
    nama LIKE '%$keyword%'
    ";
    return query($query);
}
?>