<?php
require '../config/conn.php';

if (isset($_GET['buku_id'])) {  
    echo $id_buku = mysqli_real_escape_string($conn, $_GET['buku_id']);

    $query = "DELETE FROM buku WHERE id_buku     = $id_buku";

    if (mysqli_query($conn, $query)) {
        $success_message = "Berhasil Delete Buku ";
        header("Location: ../page/table_buku?berhasil= '$success_message'");
    } else {
        $error_message = "Gagal Delete Buku: " . mysqli_error($conn);
        header("Location: ../page/table_buku?gagal= '$error_message'");
    }
}
?>