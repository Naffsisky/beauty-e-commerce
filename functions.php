<?php 
$conn = mysqli_connect("localhost", "root", "", "beautyku");

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

    $eksternal_id = uniqid() . mt_rand();
    $eksternal_id = preg_replace("/[^0-9]/", "", $eksternal_id);

    $kode_produk = htmlspecialchars($data["kode_produk"]);
    $nama = htmlspecialchars($data["nama"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $gambar = upload();

    if(!$gambar){
        return false;
    }

    $result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode_produk'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('kode produk sudah terdaftar!');
        document.location.href = 'tambah.php';
        </script>";
        return false;
    }

    $query = "INSERT INTO produk VALUES(NULL, '$eksternal_id','$kode_produk','$nama','$stok','$harga','$kategori','$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
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
        echo "<script>
        alert('yang Anda upload bukan gambar!');
        </script>";
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

function hapus($eksternal_id){
    global $conn;
    $result = mysqli_query($conn, "SELECT gambar FROM produk WHERE eksternal_id = $eksternal_id");
    $file = mysqli_fetch_assoc($result);
    $fileName = implode('.', $file);
    $location = "./img/$fileName";
    if (file_exists($location)) {
        unlink('./img/' . $fileName);
    }
    mysqli_query($conn, "DELETE FROM produk WHERE eksternal_id = $eksternal_id");

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
    $gambarLama = ($data["gambarLama"]);

    if ($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else {
        $result = mysqli_query($conn, "SELECT gambar FROM produk WHERE id = $id");
        $file = mysqli_fetch_assoc($result);
        $fileName = implode('.', $file);
        unlink('img/' . $fileName);
        $gambar = upload();
    }

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

function ubah_user($data){
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $domisili = htmlspecialchars($data["domisili"]);
    $ponsel = htmlspecialchars($data["ponsel"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $gambar = ($data["gambar"]);
    $gambarLama = ($data["gambarLama"]);
     // Nama tidak boleh kosong
    if(empty($nama)){
        return "Nama tidak boleh kosong.";
    }
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else {
        $result = mysqli_query($conn, "SELECT gambar FROM mimin WHERE id = $id");
        $file = mysqli_fetch_assoc($result);
        $fileName = implode('.', $file);
        unlink('/img' . $fileName);
        $gambar = upload();
    }
    $query = "UPDATE mimin SET
        nama = '$nama',
        domisili = '$domisili',
        ponsel = '$ponsel',
        tanggal_lahir = '$tanggal_lahir',
        gambar = '$gambar'
    WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>