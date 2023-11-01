<?php
require '../config/conn.php';

if (isset($_POST['save'])) {
    echo $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    echo $tlp = mysqli_real_escape_string($conn, $_POST['tlp']);
    echo $location = mysqli_real_escape_string($conn, $_POST['location']);
    echo $id = mysqli_real_escape_string($conn, $_POST['uid']);
    echo $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "UPDATE user SET nama = '$nama', tlp = '$tlp', location = '$location', password = '$password' WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        $success_message = "Berhasil Update user";
        header("Location: ../page/home?berhasil='$success_message'");
    } else {
        $error_message = "Gagal Update user";
        header("Location: ../page/home?gagal='$error_message'");
    }
}
?>