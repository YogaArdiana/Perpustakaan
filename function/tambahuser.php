<?php
require '../config/conn.php';

if (isset($_POST['save'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $tlp = mysqli_real_escape_string($conn, $_POST['tlp']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $nama = htmlspecialchars($nama);
    $tlp = htmlspecialchars($tlp);
    $location = htmlspecialchars($location);
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    $check_query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        
        header("Location: ../page/home?gagal= Username Sudah Ada");
    }
    else{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (nama, tlp, location, username, password) VALUES ('$nama', '$tlp', '$location', '$username', '$hashed_password')";

    if (mysqli_query($conn, $query)) {
        $success_message = "User baru \"$nama\" telah ditambahkan pada database";
        header("Location: ../page/home?berhasil= '$success_message'");
    } else {
        $error_message = "Gagal menambahkan user: " . mysqli_error($conn);
        header("Location: ../page/home?gagal= '$error_message'");
    }
    }
}
?>