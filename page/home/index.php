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
    <title>Home</title>
    <!-- bootsrap 5.3-->
    <link rel="stylesheet" href="../../src/bootstrap/css/bootstrap.min.css">
    <!-- bootstrap 5.3 end -->
    <!-- css -->
    <link rel="stylesheet" href="../../src/icon/bootstrap-icons/bootstrap-icons.min.css">
    <!-- css end -->
    <!-- css -->
    <link rel="stylesheet" href="../../src/css/global.css">
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
            $activehome = "actives";
            require "../../component/sidebar.php"
            ?>
        </div>
        <!-- sidebar end -->
        <!-- content dashboard -->
        <div class="content-dashboard">
            <?php
            require '../../config/conn.php';
            $query1 = "SELECT COUNT(*) as totalbuku FROM buku";
            $result1 = $conn->query($query1);
            $query2 = "SELECT COUNT(*) as totalpinjam FROM data_pinjaman_buku WHERE status = 'belum'";
            $result2 = $conn->query($query2);
            
            if ($result1->num_rows > 0) {
                $row = $result1->fetch_assoc();
                $totalBuku = $row["totalbuku"];
            } else {
                $totalBuku = 0;
            }
            
            if ($result2->num_rows > 0) {
                $row = $result2->fetch_assoc();
                $totalPinjam = $row["totalpinjam"];
            } else {
                $totalPinjam = 0;
            }
            
            ?>
            <!-- content dashboard card -->
            <div class="content-dashboard-ctr p-4">
                <!-- card -->
                <a href="../databuku" class="cards card-1  ms-1 me-1 shadow">
                    <span class="p-0 m-0 fw-bold">Data Buku</span>
                    <span class="p-0 m-0 fs-1"><?=$totalBuku?> Buku</span>
                </a>
                <!-- card -->
                <!-- card -->
                <a href="../pinjambuku" class="cards card-2  ms-1 me-1 shadow">
                    <span class="p-0 m-0 fw-bold ">Pinjam Buku</span>
                    <span class="p-0 m-0 fs-1 "><?=$totalPinjam?></span>
                </a>
                <!-- card -->
            </div>
            <!-- content dashboard card end -->
            <!-- table user -->
            <div class="table-ctr p-4">
                <div>
                    <a class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalId">Tambah User</a>
                </div>
                <?php
                require '../../component/tableuser.php';
                ?>
            </div>
            <!-- table user end -->
        </div>
        <!-- content dashboard end -->
    </div>
    <!-- content -->

    <!-- modal ubah user -->
    <!-- Button trigger modal -->
    
    <!-- Modal -->
    
    
    <!-- modal ubah user end -->


    <!-- modal tambah user -->
    <!-- Button trigger modal -->
    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Tambah Data Karyawan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <!-- form -->
                    <form action="../../function/tambahuser.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Tlp</label>
                        <input type="text" class="form-control" name="tlp">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Lokasi</label>
                        <input type="text" class="form-control" name="location" >
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <!-- form -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        let modalId = document.getElementById('modalId');
    
        modalId.addEventListener('show.bs.modal', function (event) {
              // Button that triggered the modal
              let button = event.relatedTarget;
              // Extract info from data-bs-* attributes
              let recipient = button.getAttribute('data-bs-whatever');
    
            // Use above variables to manipulate the DOM
        });
    </script>
    
    <!-- modal tambah user end -->

    <script src="../../src/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>