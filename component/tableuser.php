                <link rel="stylesheet" href="../../src/datatables/datatables.min.css">
                <?php
                require '../../config/conn.php';
                $sqluser = "SELECT * FROM user ";
                $index = 1 ;

                $usertable = $conn->query($sqluser);
                ?>
                
                <table id="tableuser" class="table table-striped" style="width:100%" >
                <!-- class="table table-light border table-striped  shadow" -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Tlp</th>
                            <th>Location</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($usertable as $datauser){
                    ?>
                    <tr>
                        <td><?=$index++?></td>
                        <td><?=$datauser['id']?></td>
                        <td><?=$datauser['nama']?></td>
                        <td><?=$datauser['tlp']?></td>
                        <td><?=$datauser['location']?></td>
                        <td><?=$datauser['username']?></td>
                        <td>
                        <a onclick="alert('apakah yakin anda')" href="../../function/deleteuser.php?uid=<?=$datauser['id']?>" class="btn btn-danger me-1">Delete</a>
                        <a href="" class="btn btn-dark ms-1" data-bs-toggle="modal" data-bs-target="#modalubah<?=$datauser['id']?>">Change</a>
                        </td>
                    </tr>

                    <div class="modal fade modalubah" id="modalubah<?=$datauser['id']?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-contents">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">Ubah Data Karyawan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <!-- form -->
                                <form action="../../function/ubahuser.php" method="post">
                                <div class="mb-3 d-none">
                                    <label  class="form-label ">ID</label>
                                    <input type="text" class="form-control " name="uid" value="<?=$datauser['id']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?=$datauser['nama']?>">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Tlp</label>
                                    <input type="text" class="form-control" name="tlp" value="<?=$datauser['tlp']?>" >
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" name="location" value="<?=$datauser['location']?>">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" value="<?=$datauser['password']?>">
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
                

                    <?php
                    }
                    ?>
                                            
                    </tbody>
                </table>
                <script src="../../src/datatables/jquery-3.7.1.min.js"></script>
                <script src="../../src/datatables/datatables.min.js"></script>
                <script>
                    	
                new DataTable('#tableuser');
                </script>
