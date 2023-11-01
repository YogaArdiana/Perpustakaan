<?php
require '../config/conn.php';

$id_pinjaman = $_GET['dataid'];

$sql = "DELETE FROM data_pinjaman_buku WHERE id_pinjaman = $id_pinjaman";

if(isset($sql)){
    $done = $conn->query($sql);
    header('Location: ../page/pinjambuku?berhasil=Berhasil Hapus Data Buku');
}else{
    header('Location: ../page/pinjambuku?gagal=Gagal Hapus Buku');
}
?>  