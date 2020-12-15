<?php
$conn = mysqli_connect("localhost", "root", "", "web");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function admin($data)
{
    global $conn;
    $email = strtolower($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $tgl_lhr = $data["tgl_lahir"];
    $jenis_kelamin = $data["jenis_kelamin"];
    //cek email
    $result = mysqli_query($conn, "SELECT email FROM admin WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo " 
            <script>
                alert('email sudah terdaftar');
            </script>";
        return false;
    }
    if ($password !== $password2) {
        echo "
            <script>
                alert('password yang anda masukkan salah');
            </script>";
        return false;
    }
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //masukkan data user ke database
    mysqli_query($conn, "INSERT INTO admin VALUES('','$email','$password','$tgl_lhr','$jenis_kelamin')");

    return mysqli_affected_rows($conn);
}


function user($data)
{
    global $conn;
    $email = strtolower($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $tgl_lahir = $data["tgl_lahir"];
    $jenis_kelamin = $data["jenis_kelamin"];
    //cek email
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo " 
            <script>
                alert('email sudah terdaftar');
            </script>";
        return false;
    }
    if ($password !== $password2) {
        echo "
            <script>
                alert('password yang anda masukkan salah');
            </script>";
        return false;
    }
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //masukkan data user ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$email','$password','$tgl_lahir','$jenis_kelamin')");

    return mysqli_affected_rows($conn);
}
