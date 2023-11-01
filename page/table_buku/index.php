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
    <title>Table Buku</title>
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
            $activetablebuku = "actives";
            require "../../component/sidebar.php"
            ?>
        </div>
        <!-- sidebar end -->
        <!-- content dashboard -->
        <div class="content-dashboard">
            <!-- table user -->
            <div class="table-ctr table-ctr-2 p-4">
                <?php
                require '../../component/tablebuku.php';
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