<?php
$conn = mysqli_connect("localhost", "root", "", "beautyku");

if (!$result){
    echo mysqli_error($conn);
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function register($data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $username = strtolower(stripslashes($data["username"]));
    $email = htmlspecialchars(stripslashes($data["email"]));
    $role = htmlspecialchars($data["kode"]);
    $ponsel = htmlspecialchars($data["ponsel"]);
    $domisili = htmlspecialchars($data["domisili"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $no_karyawan = htmlspecialchars($data["no_karyawan"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM mimin WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('Username sudah terdaftar!');
                document.location.href = 'register.html';
            </script>
        ";
        return false;
    }

    if($password !== $password2){
        echo "
        <script>
            alert('Konfirmasi password tidak sesuai!');
            document.location.href = 'register.html';
        </script>
        ";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    if ($role == "4DM1N"){
        mysqli_query($conn, "INSERT INTO mimin VALUES (NULL, '$nama', '$username', '$tanggal_lahir', '$domisili', 'Admin', '$email', '$ponsel', '$no_karyawan', '$password', NULL)");
    } elseif($role == "M4N4G3R"){
        mysqli_query($conn, "INSERT INTO mimin VALUES (NULL, '$nama', '$username', '$tanggal_lahir', '$domisili', 'Manager', '$email', '$ponsel', '$no_karyawan', '$password', NULL)");
    } else {
        mysqli_query($conn, "INSERT INTO mimin VALUES (NULL, '$nama', '$username', '$tanggal_lahir', '$domisili', 'Pegawai', '$email', '$ponsel', '$no_karyawan', '$password', NULL)");
    }
    return mysqli_affected_rows($conn);
}

?>