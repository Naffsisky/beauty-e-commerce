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
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM mimin WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('Username sudah terdaftar!');
                document.location.href = 'register.php';
            </script>
        ";
        return false;
    }

    if($password !== $password2){
        echo "
        <script>
            alert('Konfirmasi password tidak sesuai!');
            document.location.href = 'register.php';
        </script>
        ";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    if ($role == "4DM1N"){
        mysqli_query($conn, "INSERT INTO mimin VALUES (NULL, '$nama', '$username', 'Admin', '$email', '$password')");
    } elseif($role == "5T4FF"){
        mysqli_query($conn, "INSERT INTO mimin VALUES (NULL, '$nama', '$username', 'Manager', '$email', '$password')");
    } else {
        mysqli_query($conn, "INSERT INTO mimin VALUES (NULL, '$nama', '$username', 'Pegawai', '$email', '$password')");
    }
    return mysqli_affected_rows($conn);
}

?>