<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-white-75 small">Total Kategori</div>
                        <div class="text-lg fw-bold">
                            <?php echo mysqli_num_rows(mysqli_query($koneksi, 'SELECT * FROM kategori')); ?>
                        </div>
                    </div>
                    <i class="fas fa-tags fa-2x text-white-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=kategori">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-white-75 small">Total Buku</div>
                        <div class="text-lg fw-bold">
                            <?php echo mysqli_num_rows(mysqli_query($koneksi, 'SELECT * FROM buku')); ?>
                        </div>
                    </div>
                    <i class="fas fa-book fa-2x text-white-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=buku">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-white-75 small">Total Ulasan</div>
                        <div class="text-lg fw-bold">
                            <?php echo mysqli_num_rows(mysqli_query($koneksi, 'SELECT * FROM ulasan')); ?>
                        </div>
                    </div>
                    <i class="fas fa-comments fa-2x text-white-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=ulasan">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="me-3">
                        <div class="text-white-75 small">Total User</div>
                        <div class="text-lg fw-bold">
                            <?php echo mysqli_num_rows(mysqli_query($koneksi, 'SELECT * FROM user')); ?>
                        </div>
                    </div>
                    <i class="fas fa-users fa-2x text-white-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=user">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td width="150"><strong>Nama</strong></td>
                <td width="1">:</td>
                <td><?= $_SESSION['user']['nama']; ?></td>
            </tr>
            <tr>
                <td width="150"><strong>Level User</strong></td>
                <td width="1">:</td>
                <td><?= $_SESSION['user']['level']; ?></td>
            </tr>
            <tr>
                <td width="150"><strong>Tanggal Login</strong></td>
                <td width="1">:</td>
                <td><?= date('d-m-Y'); ?></td>
            </tr>
        </table>
    </div>
</div>