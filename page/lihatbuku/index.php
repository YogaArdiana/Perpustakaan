<?php
session_start();
if(!$_SESSION['user_id']){
    header("Location: ../login");
}
$name_user = $_SESSION['name'];

require '../../config/conn.php';

$id_buku = $_GET['idbuku'];
$check_query = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
$result = mysqli_query($conn, $check_query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Buku</title>
    <link rel="stylesheet" href="../../src/css/global.css">
    <!-- bootsrap 5.3-->
    <link rel="stylesheet" href="../../src/bootstrap/css/bootstrap.min.css">
    <!-- bootstrap 5.3 end -->
    <script src="../../src/sweetalert/sweetalert2@11.js"></script>
</head>
<body>
<?php
if(isset($_GET['berhasil'])){
    $berhasil = strval($_GET['berhasil']);
    echo "
    <script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '$berhasil',
        showConfirmButton: true,
        timer: 1500
    })
    </script>
    ";
}

if(isset($_GET['berhasil'])){
    $berhasil = strval($_GET['berhasil']);
    echo "
    <script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: $berhasil,
        showConfirmButton: true,
        timer: 1500
    })
    </script>
    ";
}
if(isset($_GET['gagal'])){
    $gagal = strval($_GET['gagal']);
    echo "
    <script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: '$gagal',
        showConfirmButton: false,
        timer: 1500
    })
    </script>
    ";
}
if(isset($_GET['gagal'])){
    $gagal = strval($_GET['gagal']);
    echo "
    <script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: $gagal,
        showConfirmButton: false,
        timer: 1500
    })
    </script>
    ";
}
?>
        <div class="container-fluid bg-light border ">
            <!-- navbar -->
            <div class="container-fluid  navbar-color fixed-top">
                <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand fw-bold" href="#">Lihat Buku</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link text-black-50 fw-bold" aria-current="page" href="../databuku">< Back</a>
                        </li>
                    </ul>
                    </div>
                </div>
                </nav>
            </div>
            <!-- navbar end -->
            <!-- content -->
            <div class="container content-lihat-buku mt-5">
                <div class="jummbotron" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(../../src/img/buku/<?=$row['sampul_buku']?>); background-position: center; background-size: cover;" data-tilt data-tilt-max="20" data-tilt-speed="20" data-tilt-perspective="1000" data-tilt-glare data-tilt-max-glare="0.8">
                    <div class="inner-jumbotron ms-3 mb-3" >
                        <div class="img-lihat-buku">
                            <img src="../../src/img/buku/<?=$row['sampul_buku']?>" alt="">
                        </div>
                        <div class="keterangan">
                            <div>
                                <span class="fs-3 text-light">Nama Buku : <span class="fw-bold"><?=$row['nama_buku']?></span></span><br>
                                <span class="fs-5 text-light">Pembuat : <?=$row['pencipta_buku']?></span><br>
                                <span class="fs-5 text-light">Kategori : <?=$row['kategori_buku']?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="descript mt-5">
                    <span class="fs-3 fw-semibold">Deskripsi Tentang <?=$row['nama_buku']?></span>
                    <p class="fs-5"><?=$row['deskripsi_buku']?></p>
                </div>
            </div>
            <!-- content end -->
        </div>

    <script src="../../src/datatables/jquery-3.7.1.min.js"></script>
    <script src="../../src/tiltjs/vanilla-tilt.js"></script>
    <script scr="../../src/bootstrap/css/bootstrap.bundle.min.css"></script>
</body>
</html>