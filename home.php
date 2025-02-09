                <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <?php 
                                        echo mysqli_num_rows(mysqli_query($koneksi, 'SELECT*FROM kategori'));
                                    ?>
                                    <div class="card-body">Total Kategori</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=kategori">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <?php 
                                        echo mysqli_num_rows(mysqli_query($koneksi, 'SELECT*FROM buku'));
                                    ?>
                                    <div class="card-body">Total Buku</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=buku">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <?php 
                                        echo mysqli_num_rows(mysqli_query($koneksi, 'SELECT*FROM ulasan'));
                                    ?>
                                    <div class="card-body">Total Ulasan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=ulasan">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <?php 
                                        echo mysqli_num_rows(mysqli_query($koneksi, 'SELECT*FROM user'));
                                    ?>
                                    <div class="card-body">Total User</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="?page=user">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td width="100">Nama</td>
                                        <td width="1">:</td>
                                        <td><?= $_SESSION['user']['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="100">Level User</td>
                                        <td width="1">:</td>
                                        <td><?= $_SESSION['user']['level']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="100">Tanggal Login</td>
                                        <td width="1">:</td>
                                        <td><?= date('d-m-Y'); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        