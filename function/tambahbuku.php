<?php

require '../config/conn.php';

if(isset($_POST['submit'])){
    $ekstensi_diperbolehkan = array('png','jpg');
    $nama = $_FILES['sampul_buku']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['sampul_buku']['size'];
    $file_tmp = $_FILES['sampul_buku']['tmp_name'];

    // post
    $nama_buku = htmlspecialchars($_POST['nama_buku']);
    $pencipta_buku = htmlspecialchars($_POST['pencipta_buku']);
    $deskripsi_buku = htmlspecialchars($_POST['deskripsi_buku']);
    $kategori_buku = htmlspecialchars($_POST['kategori_buku']);
    // post end

    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
        if ($ukuran < 1044070) {
            // Menggunakan fungsi uniqid() untuk menghasilkan nama acak
            $nama_acak = uniqid() . '.' . $ekstensi;
            move_uploaded_file($file_tmp, '../src/img/buku/' . $nama_acak);


            $stmt = $conn->prepare("INSERT INTO buku (nama_buku, pencipta_buku, deskripsi_buku, kategori_buku, sampul_buku) VALUES(?,?,?,?,?)");
            $stmt->bind_param("sssss", $nama_buku, $pencipta_buku, $deskripsi_buku, $kategori_buku, $nama_acak );
            
            
            
            if ($stmt->execute()) {
                header("Location: ../page/tambahbuku?berhasil=Berhasil Upload Buku ".$nama_buku );
            } else {
                header("Location: ../page/tambahbuku?gagal=Gagal Upload Buku");
            }
            
            $stmt->close();
        } else {
            header("Location: ../page/tambahbuku?gagal=Ukuran Gambar Terlalu Besar Max 1 MB");
        }
    } else {
        header("Location: ../page/tambahbuku?gagal=Ekstensi Tidak Di Perbolehkan");
    }
}
?>