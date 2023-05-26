<?php 
require 'function.php';
$eksternal_id = $_GET["id"];
var_dump($eksternal_id);
if(hapus($eksternal_id) > 0){
    echo "
    <script>
    alert('Data berhasil dihapus!');
    document.location.href = 'index.php';
    </script>";
} else {
    echo "
    <script>('Data gagal dihapus!');
    document.location.href = 'index.php';
    </script>";
}
?>