<?php



require '../config/conn.php'; 

function insertData($id_buku, $nama_buku, $kategori_buku, $sampul_buku, $nama_siswa, $nim_siswa, $kelas, $jurusan_siswa, $nohp_siswa, $tglpinjam_siswa, $tengat_siswa, $status) {
    global $conn; 

    $query = "INSERT INTO data_pinjaman_buku (id_buku, nama_buku, kategori_buku, sampul_buku, nama_siswa, nim, kelas, jurusan, no_tlp, tanggal_pinjam, tengat_pengembalian, status) 
              VALUES ('$id_buku', '$nama_buku', '$kategori_buku', '$sampul_buku', '$nama_siswa', '$nim_siswa', '$kelas', '$jurusan_siswa', '$nohp_siswa', '$tglpinjam_siswa', '$tengat_siswa', '$status')";

    if (mysqli_query($conn, $query)) {
        return true; 
    } else {
        return false; 
    }
}

if (isset($_POST['pinjam'])) {
    $id_buku = htmlspecialchars($_POST['id_buku']);
    $nama_buku = htmlspecialchars($_POST['nama_buku']);
    $kategori_buku = htmlspecialchars($_POST['kategori_buku']);
    $sampul_buku = htmlspecialchars($_POST['sampul_buku']);
    $nama_siswa = htmlspecialchars($_POST['nama_siswa']);
    $nim_siswa = htmlspecialchars($_POST['nim_siswa']);
    $kelas_siswa = htmlspecialchars($_POST['kelas']);
    $jurusan_siswa = htmlspecialchars($_POST['jurusan']);
    $nohp_siswa = htmlspecialchars($_POST['no_hp']);
    $tglpinjam_siswa = htmlspecialchars($_POST['tgl_pinjam']);
    $tengat_siswa = htmlspecialchars($_POST['tengat']);
    

    $result = insertData($id_buku, $nama_buku, $kategori_buku, $sampul_buku, $nama_siswa, $nim_siswa, $kelas_siswa, $jurusan_siswa, $nohp_siswa, $tglpinjam_siswa, $tengat_siswa, 'belum');
    if ($result) {
        header("Location: ../page/pinjambuku?berhasil=Berhasil Input Buku");
    } else {
        header("Location: ../page/pinjambuku?gagal=Gagal Input Buku");
    }
}

?>
