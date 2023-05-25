<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'skincare';

$conn = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}
?>
