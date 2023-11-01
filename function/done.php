<?php
require '../config/conn.php';

$id_pinjaman = $_GET['dataid'];

$sql = "UPDATE data_pinjaman_buku SET status='sudah' WHERE id_pinjaman = $id_pinjaman";

if(isset($sql)){
    $done = $conn->query($sql);
    header('Location: ../page/pinjambuku?berhasil=berhasil');
}else{
    header('Location: ../page/pinjambuku?gagal=gagal');
}
?>  