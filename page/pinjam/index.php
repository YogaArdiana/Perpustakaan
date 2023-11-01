<?php
session_start();
if(!$_SESSION['user_id']){
    header("Location: ../login");
}
$name_user = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PinjamBuku</title>
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
        <div class="container-fluid bg-light border pinjam-ctr fixed-top">
            <!-- navbar -->
            <div class="container-fluid  navbar-color">
                <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand fw-bold" href="#">Pinjam Buku</a>
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
            <div class="container content-pinjam">
                <div class="card-pinjam p-4 shadow">
                    <div class="img-buku">
                        <img src="../../src/img/buku/<?=$_GET['sampul_buku']?>" alt="">
                        <span class="me-2">ID Buku :</span><span class="fw-bold"><?=$_GET['id_buku']?></span><br>
                        <span class="me-2">Buku :</span><span class="fw-bold"><?=$_GET['nama_buku']?></span><br>
                        <span class="me-2">Kategori :</span><span class="fw-bold"><?=$_GET['kategori_buku']?></span><br>
                    </div>
                    <div class="ms-3">
                        <form action="../../function/input_pinjam_buku.php" method="post"   >
                            <input class="d-none" type="text" name="nama_buku" value="<?=$_GET['nama_buku']?>">
                            <input class="d-none" type="text" name="id_buku" value="<?=$_GET['id_buku']?>">
                            <input class="d-none" type="text" name="sampul_buku" value="<?=$_GET['sampul_buku']?>">
                            <input class="d-none" type="text" name="kategori_buku" value="<?=$_GET['kategori_buku']?>">
                            <label for="" class="form-label fw-bold p-0 m-0 mt-2">Nama Siswa</label>
                            <input class="form-control" type="text" name="nama_siswa">
                            <label for="" class="form-label fw-bold p-0 m-0 ">NIM</label>
                            <input class="form-control" type="text" name="nim_siswa">
                            <label for="" class="form-label fw-bold p-0 m-0 ">Jurusan</label>
                            <select class="form-select mb-1" name="kelas">
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                            <select class="form-select" name="jurusan">
                                <option value="RPL">RPL</option>
                                <option value="TKJ">TKJ</option>
                                <option value="MM">MM</option>
                                <option value="BDP">BDP</option>
                                <option value="AKL">AKL</option>
                            </select>
                            <label for="" class="form-label fw-bold p-0 m-0 ">No HP</label>
                            <input class="form-control" type="text" name="no_hp">
                            <div class="date-colapse">
                                <div>
                                <label for="" class="form-label fw-bold p-0 m-0 ">Tgl_pinjam</label><br>
                                <input type="date" name="tgl_pinjam">                         
                                </div>
                                <div>
                                <label for="" class="form-label fw-bold p-0 m-0 ">Tengat</label><br>
                                <input type="date" name="tengat">
                                </div>
                            </div>
                            <button class="container-fluid btn btn-success mt-3" name="pinjam">Pinjam</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content end -->
        </div>

    <script scr="../../src/bootstrap/css/bootstrap.bundle.min.css"></script>
</body>
</html>