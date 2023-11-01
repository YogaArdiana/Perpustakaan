<?php
require '../config/conn.php';

if (isset($_GET['uid'])) {  
    echo $id = mysqli_real_escape_string($conn, $_GET['uid']);

    $query = "DELETE FROM user WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        $success_message = "Berhasil Delete User ID : ". $id;
        header("Location: ../page/home?berhasil= $success_message");
    } else {
        $error_message = "Gagal Delete user: " . mysqli_error($conn);
        header("Location: ../page/home?gagal= $error_message");
    }
}
?>