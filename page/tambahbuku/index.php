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
    <title>Tambah Buku</title>
    <!-- bootsrap 5.3-->
    <link rel="stylesheet" href="../../src/bootstrap/css/bootstrap.min.css">
    <!-- bootstrap 5.3 end -->
    <!-- css -->
    <link rel="stylesheet" href="../../src/css/global.css">
    <!-- css end -->
    <!-- css -->
    <link rel="stylesheet" href="../../src/icon/bootstrap-icons/bootstrap-icons.min.css">
    <!-- css end -->
    <!-- css dashboard -->
    <link rel="stylesheet" href="../../src/css/content-dashboard.css">
    <!-- css dashboard end -->
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
    <!-- content -->
    <div class="content container-fluid p-3 ">
        <!-- sidebar -->
        <div class="sidebar ">
            <?php
            $activetambahbuku = "actives";
            require "../../component/sidebar.php"
            ?>
        </div>
        <!-- sidebar end -->
        <!-- content dashboard -->
        <div class="content-dashboard">
            <!-- tambah buku ctr -->
            <div class="tambah-buku p-4">
                    <!-- image -->
                    <div class="sec-1">
                        <!-- image ctr -->
                        <label for="uploadInput" class="pointer">
                        <div class="img-ctr">
                            <img id="uploadedImage" src="../../src/img/buku/3.jpg" alt="">
                        </div>
                        </label>
                        <!-- image ctr end -->
                    </div>
                    <!-- image end -->
                    
                    <!-- input -->
                    <div class="sec-2">
                        <form action="../../function/tambahbuku.php" method="post" enctype="multipart/form-data">
                            <label class="text-dark fs-6" for="">Nama Buku</label>
                            <input placeholder="Contoh : One Piece" class="form-control " type="text" name="nama_buku">
                            <label class="text-dark fs-6" for="">Pembuat Buku</label>
                            <input class="form-control" type="text" name="pencipta_buku" placeholder="Contoh : Eichiro oda">
                            <label class="text-dark fs-6" for="">Deskripsi Buku</label>
                            <textarea class="form-control " placeholder="Jelaskan tentang buku... " id="floatingTextarea" name="deskripsi_buku"></textarea>
                            <label class="text-dark fs-6" for="">Pilih Kategori Buku</label>
                            <select id="" class="form-select outline-none" name="kategori_buku">
                                <option value="pelajaran">Pelajaran</option>
                                <option value="komik">Komik</option>
                                <option value="filosofi">Filosofi</option>
                            </select>
                            <label class="text-dark fs-6" for="">Tambah Gambar</label>
                            <input id="uploadInput" class="form-control bg-dark text-light outline-none border-white" type="file" name="sampul_buku" accept="image/*">
                            <button class="btn btn-dark mt-2 border" name="submit">Tambah +</button>
                        </form>
                    </div>
                    <!-- input end -->
            </div>
            <!-- tambah buku ctr end -->
        </div>
        <!-- content dashboard end -->
    </div>
    <!-- content -->

    <script src="../../src/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- reader img -->
    <script src="../../src/js/reader.js"></script>
    <!-- reader img end -->
</body>
</html>