<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Customer</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Customer Onlineshop</li>
        </ol>


        <div class="card mb-4">
            <div class="card-header row align-items-center">
                <div class="col-9">
                    <i class="fas fa-table mr-1"></i>Data Register Customer
                </div>
                <div class="col-3">
                    <form action="dashboard_admin.php" method="get">
                        <input type="hidden" name="page" value="data_customer">
                        <input type="text" placeholder="Pencarian data" name="keyword">
                        <button>Search</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Usernama</th>
                                <th>Nama Customer</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Handphone</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Usernama</th>
                                <th>Nama Customer</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Handphone</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            include "../koneksi.php";
                            $no = 1;
                            $query = "";
                            if (isset($_GET['keyword'])) {
                                $query .= "WHERE nm_customer LIKE '%$_GET[keyword]%' OR gender LIKE '%$_GET[keyword]%' OR email LIKE '%$_GET[keyword]%' OR nohp LIKE '%$_GET[keyword]%' OR alamat LIKE '%$_GET[keyword]%'";
                            }
                            $sqlc = mysqli_query($con, "Select * From tbl_customer $query");
                            while ($rc = mysqli_fetch_array($sqlc)) {


                            ?>
                                <tr>
                                    <td><?php echo "$no"; ?></td>
                                    <td><?php echo "$rc[username]"; ?></td>
                                    <td><?php echo "$rc[nm_customer]"; ?></td>
                                    <td><?php echo "$rc[gender]"; ?></td>
                                    <td><?php echo "$rc[email]"; ?></td>
                                    <td><?php echo "$rc[nohp]"; ?></td>
                                    <td><?php echo "$rc[alamat]"; ?></td>
                                    <td>
                                        <a href="<?php echo "index.php?page=data_mahasiswa_update&&idm=$rmhs[id_mhs]"; ?>" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                                        <a href="<?php echo "index.php?page=data_mahasiswa_delete&&idm=$rmhs[id_mhs]"; ?>" onclick="javascript: return confirm(' Apakah Anda Ingin Menghapus data mahasiswa <?php echo "$rmhs[nm_mahasiswa]"; ?>')" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i> </a>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>