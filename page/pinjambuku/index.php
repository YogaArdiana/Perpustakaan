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
    <title>Pinjam Buku</title>
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
            $activepinjambuku = "actives";
            require "../../component/sidebar.php"
            ?>
        </div>
        <!-- sidebar end -->
        <!-- content dashboard -->
        <div class="content-dashboard">
            <!-- tambah buku ctr -->
            <div class="data-pinjams">
            <!-- nav -->
            <div class="p-4 header">
                <!-- search -->
                <form action="" method="GET">
                <div class="form-control bg-dark border-0 search-ctr">
                        <input type="text" class="bg-transparent search border-0 text-light" name="keyword">
                        <button class="btn"><i class="bi bi-search text-light"></i></button>
                    </div>
                </form>
                <!-- search end -->
                <!-- nav in -->
                <ul class="p-0 m-0">
                    <li><a href="../pinjambuku" class="text-dark btn outline-none border-0" data-filter="all">All</a></li>
                    <li><button type="button" class="text-dark btn outline-none border-0" data-filter=".belum">Meminjam</button></li>
                    <li><button type="button"  class="text-dark btn outline-none border-0" data-filter=".sudah">Mengembalikan</button></li>
                    <li><button type="button"  class="text-dark btn outline-none border-0" data-filter=".tengat">Tengat</button></li>
                </ul>
                <!-- nav in end -->
            </div>
            <!-- nav end -->
            <!-- content -->
                <div class="card-ctr box-content p-4">
                    <?php
                    require '../../config/conn.php';

                    if(isset($_GET['keyword'])){
                        $keyword = $_GET['keyword'];
                        $query_select_pinjam = "SELECT * FROM data_pinjaman_buku WHERE nama_siswa LIKE '%$keyword%' OR nama_buku LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR tanggal_pinjam LIKE '%$keyword%' ORDER BY created_at DESC";
                    }else{
                        $query_select_pinjam = "SELECT * FROM data_pinjaman_buku ORDER BY created_at DESC";
                    }

                    $data_pinjam_buku = $conn->query($query_select_pinjam);
                    $indexofpinjam = 1;



                    if (isset($keyword) && trim($keyword) !== '') {
                        echo "<div class='ps-1'>
                            <h6 class='text-dark'>Hasil Pencarian: " . $keyword . "</h6>
                        </div>";
                    } else {
                        echo "";
                    }
        
        
                    ?>
                    <!-- card -->
                    <?php
                    foreach($data_pinjam_buku as $data){
                        $isSudah = $data['status'] == 'sudah';
                        $tengatDate = new DateTime($data['tengat_pengembalian']);
                        $currentDate = new DateTime();

                        $tengatDate->format('Y-m-d');
                        $currentDate->format('Y-m-d');
                
                        // Jika belum selesai dan tanggal tenggat telah berlalu
                        if (!$isSudah && $currentDate > $tengatDate) {
                            $sudah_tengat = '<span class="bg-danger p-1 rounded text-light">(SUDAH TENGAT)</span>';
                            $class_tengat = 'tengat';
                        } else {
                            $sudah_tengat = ''; // Tidak ada kelas bg-danger
                            $class_tengat = '';
                        }
                    ?>
                    <div class="card-data bg-light p-2 mt-2 mix <?=$data['status']?> <?=$class_tengat?>" data-order="<?=$indexofpinjam++?>">
                        <div class="card-data-img bg-dark">
                            <img src="../../src/img/buku/<?=$data['sampul_buku']?>" alt="">
                        </div>
                        <div class="ms-3 "> 
                            <span class="fw-bold">Buku : <?=$data['nama_buku']?></span><br>
                            <span class="fw-bold">Peminjam : <?=$data['nama_siswa']?></span><br>
                            <span class="fw-bold">NIM : <?=$data['nim']?></span><br>
                            <span class="fw-bold">Tanggal : <?=$data['tanggal_pinjam']?></span><br>
                            <span class="fw-bold tengat">Tengat :<?=$data['tengat_pengembalian']?> </span><br>
                            <span class="fw-bold">Tlp/Wa : <?=$data['no_tlp']?></span><br>
                            <span class="fw-bold">Status : 
                                <span class="status <?= $data['status'] == 'belum' ? 'text-danger' : 'text-success'; ?>">
                                <?=$data['status']?> Dikembalikan <?= $sudah_tengat ?>
                                </span>
                            </span>
                        </div>

                        <div class="ms-auto mt-auto">
                            <a onclick="return confirm('Apakah Anda yakin?')" class="btn btn-success <?= $data['status'] == 'belum' ? '' : 'd-none'; ?>" href="../../function/done.php?dataid=<?=$data['id_pinjaman']?>">Done</a>
                            <a onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger" href="../../function/deletedatapinjaman.php?dataid=<?=$data['id_pinjaman']?>">Delete</a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <!-- card end -->
                </div>
            <!-- content end-->
            </div>
            <!-- tambah buku ctr end -->
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
    <!-- tengat -->


    <!-- tengat end -->
</body>
</html>