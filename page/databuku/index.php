<?php
session_start();
if(!$_SESSION['user_id']){
    header("Location: ../login");
}
require '../../config/conn.php';

$name_user = $_SESSION['name'];
if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $query_buku_select = "SELECT * FROM buku WHERE nama_buku LIKE '%$keyword%' OR deskripsi_buku LIKE '%$keyword%' OR id_buku LIKE '%$keyword%' OR kategori_buku LIKE '%$keyword%' OR pencipta_buku LIKE '%$keyword%' ORDER BY created_at DESC";
}else{
    $query_buku_select = "SELECT * FROM buku";
}



$data_buku = $conn->query($query_buku_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
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
    <!-- content -->
    <div class="content container-fluid p-3 ">
        <!-- sidebar -->
        <div class="sidebar ">
            <?php
            $activedatabuku = "actives";
            require "../../component/sidebar.php"
            ?>
        </div>
        <!-- sidebar end -->
        <!-- content dashboard -->
        <div class="content-dashboard">
            <!-- nav -->
            <div class="p-4 header">
                <!-- search -->
                <form action="" method="GET">
                <div class="form-control bg-dark border-0 search-ctr">
                        <input type="text" class="bg-transparent search border-0 text-light" name="keyword" autocomplete="off">
                        <button class="btn"><i class="bi bi-search text-light"></i></button>
                    </div>
                </form>
                <!-- search end -->
                <!-- nav -->
                <ul class="p-0 m-0">
                    <li><a href="../databuku" class="text-dark btn outline-none border-0" data-filter="all">Semua</a></li>
                    <li><button type="button"  class="text-dark btn outline-none border-0" data-filter=".pelajaran">Pelajaran</button></li>
                    <li><button type="button"  class="text-dark btn outline-none border-0" data-filter=".komik">Komik</button></li>
                    <li><button type="button"  class="text-dark btn outline-none border-0" data-filter=".filosofi">Filosofi</button></li>
                </ul>
                <!-- nav end -->
            </div>
            <!-- nav end -->
            <!-- content -->
            <?php
            if (isset($keyword) && trim($keyword) !== '') {
                echo "<div class='ps-4'>
                    <h6 class='text-dark'>Hasil Pencarian: " . $keyword . "</h6>
                </div>";
            } else {
                echo "";
            }
            $index_buku = 1;

            ?>
            <div class="data-buku p-4 box-content">
                <?php
                foreach($data_buku as $buku_field){
                ?>
                <div class="card-buku mix <?=$buku_field['kategori_buku']?>" data-order="<?=$index_buku++?>">
                    <!-- image -->
                    <div class="img-buku">
                        <img src="../../src/img/buku/<?=$buku_field['sampul_buku']?>" alt="">
                    </div>
                    <!-- image end -->
                    <!-- bottom card -->
                    <div class="p-2">
                        <span class="text-dark fs-5 fw-bold"><?=$buku_field['nama_buku']?></span>
                        <span class="text-dark-50 descript-buku"><?=$buku_field['deskripsi_buku']?></span>
                        <span class="text-black fw-bold">Karya : <?=$buku_field['pencipta_buku']?></span>
                        <div class=" align-items-center mt-1">
                            <a href="../lihatbuku?idbuku=<?=$buku_field['id_buku']?>" class="btn btn-sm btn-outline-dark btn-full mb-1">Lihat</a>
                            <form action="../pinjam" method="get">
                            <div class="d-none">
                            <input type="text" name="nama_buku" value="<?=$buku_field['nama_buku']?>">
                            <input type="text" name="id_buku" value="<?=$buku_field['id_buku']?>">
                            <input type="text" name="kategori_buku" value="<?=$buku_field['kategori_buku']?>">
                            <input type="text" name="sampul_buku" value="<?=$buku_field['sampul_buku']?>">
                            
                            </div>
                            <button type="submit" class="btn btn-sm btn-dark btn-full">Pinjam</button>
                            </form>
                        </div>
                    </div>
                    <!-- bottom card end -->
                </div>
                <?php
                }
                ?>
            </div>
            <!-- content end -->
        </div>
        <!-- content dashboard end -->
    </div>
    <!-- content -->


    <script src="../../src/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- mixitup -->
    <script src="../../src/mixitupjs/mixitup/dist/mixitup.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            let mixer = mixitup('.box-content');
        })
    </script>
    <!-- mixitup edn -->
</body>
</html>