
<div class="sidebar-ctr ps-3 pe-3 pt-3">
                <!-- title -->
                <div class=" container-fluid p-0  title-sidebar ">
                    <div class="title-in  rounded p-3">
                        <h5 class="text-dark p-0 m-0 fs-2">School<span class="fw-bold bg-dark rounded text-light p-1">Library</span></h5>
                    </div>
                </div>
                <!-- title end -->
                <!-- user -->
                <div class=" container-fluid p-0  user-sidebar mt-3">
                    <div class=" icon-user rounded border">
                        <div class="img-user">
                        <i class="bi bi-person-circle fs-1"></i>
                        </div>
                    </div>
                    <div class="user-in  rounded  ">
                        <div class="ttl-user">
                            <h5 class="text-dark fw-bold p-0 m-0"><?=$name_user?></h5>
                            <span class="text-dark-50 p-0 m-0">Admin</span>
                        </div>
                        <div class="logout-btn">
                            <a href="../../function/logout.php" class="btn btn-danger">Log Out</a>
                        </div>
                    </div>
                </div>
                <!-- user end -->
                <!-- link -->
                <div class=" container-fluid p-0  nav-sidebar mt-3">
                    <a href="../home" class="nav-link-in text-dark rounded p-3 <?= $activehome?>">
                        <i class="fw-bold  bi bi-columns-gap me-4 fs-4 "></i>
                        <span class=" fw-bold p-0 m-0 ">Dashboard</span>                  
                    </a>
                </div>
                <div class=" container-fluid p-0  nav-sidebar mt-3">
                    <a href="../databuku" class="nav-link-in text-dark  rounded p-3 <?= $activedatabuku?>">
                        <i class="fw-bold  bi bi-book me-4 fs-4 "></i>
                        <span class=" fw-bold p-0 m-0 ">Data Buku</span>                  
                    </a>
                </div>
                <div class=" container-fluid p-0  nav-sidebar mt-3">
                    <a href="../table_buku" class="nav-link-in text-dark  rounded p-3 <?= $activetablebuku?>">
                        <i class="fw-bold  bi bi-pencil-square me-4 fs-4 "></i>
                        <span class=" fw-bold p-0 m-0 ">Table Buku</span>                  
                    </a>
                </div>
                <div class=" container-fluid p-0  nav-sidebar mt-3">
                    <a href="../tambahbuku" class="nav-link-in text-dark  rounded p-3 <?= $activetambahbuku?>">
                        <i class="fw-bold  bi bi-journal-plus me-4 fs-4 "></i>
                        <span class=" fw-bold p-0 m-0 ">Tambah Buku</span>                  
                    </a>
                </div>
                <div class=" container-fluid p-0  nav-sidebar mt-3">
                    <a href="../pinjambuku" class="nav-link-in text-dark  rounded p-3 <?= $activepinjambuku?>">
                        <i class="fw-bold  bi bi-calendar-event me-4 fs-4 "></i>
                        <span class=" fw-bold p-0 m-0 ">Pinjaman Buku</span>                  
                    </a>
                </div>
                <!-- link end -->
            </div>