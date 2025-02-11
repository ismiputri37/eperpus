<h1 class="mt-4">Daftar Buku</h1>
<div class="row mb-3">
    <div class="col-md-12">
        <?php if ($_SESSION['user']['level'] == 'admin') : ?>
            <a href="?page=buku_tambah" class="btn btn-primary mb-3">Tambah Data</a>
        <?php endif; ?>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <!-- Search form -->
        <form method="GET" action="">
            <input type="hidden" name="page" value="buku">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Buku" value="<?= isset($_GET['nama']) ? $_GET['nama'] : '' ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" value="<?= isset($_GET['tahun_terbit']) ? $_GET['tahun_terbit'] : '' ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <input type="text" name="penulis" class="form-control" placeholder="Penulis" value="<?= isset($_GET['penulis']) ? $_GET['penulis'] : '' ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- tabel list buku -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Nama Kategori</th>
                <th>Gambar</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>ISBN</th>
                <th>Jumlah</th>
                <th>Sinopsis</th>
                <?php if ($_SESSION['user']['level'] == 'admin') : ?>
                <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php
                $i = 1;
                $nama = isset($_GET['nama']) ? $_GET['nama'] : '';
                $tahun_terbit = isset($_GET['tahun_terbit']) ? $_GET['tahun_terbit'] : '';
                $penulis = isset($_GET['penulis']) ? $_GET['penulis'] : '';

                $query = "SELECT buku.*, kategori.kategori FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE 1=1";

                if ($nama != '') {
                    $query .= " AND buku.judul LIKE '%$nama%'";
                }
                if ($tahun_terbit != '') {
                    $query .= " AND buku.tahun_terbit LIKE '%$tahun_terbit%'";
                }
                if ($penulis != '') {
                    $query .= " AND buku.penulis LIKE '%$penulis%'";
                }

                $result = mysqli_query($koneksi, $query);
                while ($data = mysqli_fetch_array($result)) :
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $data['judul']; ?></td>
                <td><?= $data['kategori']; ?></td>
                <td><img src="upload/<?= $data['gambar']; ?>" width="80px" alt=""></td>
                <td><?= $data['penulis']; ?></td>
                <td><?= $data['penerbit']; ?></td>
                <td><?= $data['tahun_terbit']; ?></td>
                <td><?= $data['isbn']; ?></td>
                <td><?= $data['jumlah']; ?></td>
                <td><?= $data['sinopsis']; ?></td>
                <?php if ($_SESSION['user']['level'] != 'peminjam') : ?>
                <td>
                    <div class="d-flex flex-column flex-md-row">
                        <button class="btn btn-primary mb-2 mb-md-0 me-md-2" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="<?= $data['id_buku'] ?>">Detail</button>
                        <a href="?page=buku_ubah&&id=<?= $data['id_buku'] ?>" class="btn btn-info mb-2 mb-md-0 me-md-2">Ubah</a>
                        <a onclick="return confirm('Apakah anda yakin menghapus data ini')" href="?page=buku_hapus&&id=<?= $data['id_buku'] ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </td>
                <?php endif; ?>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Book details will be loaded here -->
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var detailModal = document.getElementById('detailModal');
    detailModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var idBuku = button.getAttribute('data-id');

        var modalBody = detailModal.querySelector('.modal-body');
        modalBody.innerHTML = 'Loading...';

        fetch('buku_detail.php?id=' + idBuku)
            .then(response => response.text())
            .then(data => {
                modalBody.innerHTML = data;
            });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>