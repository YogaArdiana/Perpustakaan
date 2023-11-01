<?php
require '../config/conn.php';

if (isset($_POST['save'])) {
    echo $nama = mysqli_real_escape_string($conn, $_POST['nama_buku']);
    echo $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi_buku']);
    echo $pencipta = mysqli_real_escape_string($conn, $_POST['pencipta_buku']);
    echo $id = mysqli_real_escape_string($conn, $_POST['id_buku']);
    echo $kategori = mysqli_real_escape_string($conn, $_POST['kategori_buku']);

    $query = "UPDATE buku SET nama_buku = '$nama', deskripsi_buku = '$deskripsi', kategori_buku = '$kategori', pencipta_buku = '$pencipta' WHERE id_buku = '$id'";

    if (mysqli_query($conn, $query)) {
        $success_message = "Berhasil Update Buku";
        header("Location: ../page/table_buku?berhasil= '$success_message'");
    } else {
        $error_message = "Gagal Update Buku: " . mysqli_error($conn);
        header("Location: ../page/table_buku?gagal= '$error_message'");
    }
}
?>