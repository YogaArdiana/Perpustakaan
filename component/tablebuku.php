                <link rel="stylesheet" href="../../src/datatables/datatables.min.css">
                <?php
                require '../../config/conn.php';
                $sqlbuku = "SELECT * FROM buku ";
                $index = 1 ;

                $bukutable = $conn->query($sqlbuku);
                ?>
                
                <table id="tableuser" class="table table-striped" style="width:100%" >
                <!-- class="table table-light border table-striped  shadow" -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Pencipta</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($bukutable as $databuku){
                    ?>
                    <tr>
                        <td><?=$index++?></td>
                        <td><?=$databuku['id_buku']?></td>
                        <td><?=$databuku['nama_buku']?></td>
                        <td><?=$databuku['kategori_buku']?></td>
                        <td><?=$databuku['pencipta_buku']?></td>
                        <td>
                        <a onclick="alert('apakah yakin anda')" href="../../function/deletebuku.php?buku_id=<?=$databuku['id_buku']?>" class="btn btn-danger me-1">Delete</a>
                        <button class="btn btn-dark ms-1" data-bs-toggle="modal" data-bs-target="#modalubah<?=$databuku['id_buku']?>">Change</button>
                        </td>
                    </tr>

                    <div class="modal fade modalubah" id="modalubah<?=$databuku['id_buku']?>" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-contents">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">Ubah Data Buku</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <!-- form -->
                                <form action="../../function/ubahbuku.php" method="post">
                                <div class="mb-3 d-none">
                                    <label  class="form-label ">ID</label>
                                    <input type="text" class="form-control " name="id_buku" value="<?=$databuku['id_buku']?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama_buku" value="<?=$databuku['nama_buku']?>">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Kategori</label>
                                    <select id="" class="form-select outline-none" name="kategori_buku">
                                        <option value="pelajaran" <?php if ($databuku['kategori_buku'] == "pelajaran") echo "selected"; ?>>Pelajaran</option>
                                        <option value="komik" <?php if ($databuku['kategori_buku'] == "komik") echo "selected"; ?>>Komik</option>
                                        <option value="filosofi" <?php if ($databuku['kategori_buku'] == "filosofi") echo "selected"; ?>>Filosofi</option>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Pencipta</label>
                                    <input type="text" class="form-control" name="pencipta_buku" value="<?=$databuku['pencipta_buku']?>">
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">Deskripsi</label>
                                    <input class="form-control" name="deskripsi_buku" value="<?=$databuku['deskripsi_buku']?>">
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
