<h1 class="mt-4">Kategori Buku</h1>

<div class="row mb-3">
    <div class="col-md-12">
        <?php if ($_SESSION['user']['level'] == 'admin') : ?>
            <a href="?page=kategori_tambah" class="btn btn-primary">Tambah Data</a>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
                <?php if ($_SESSION['user']['level'] == 'admin') : ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </tr>

            <?php
                $i=1;
                $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                while ($data = mysqli_fetch_array($query)) :
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $data['kategori']; ?></td>
                <?php if ($_SESSION['user']['level'] == 'admin') : ?>
                    <td>
                        <!-- update kategori by id_kategori -->
                        <a href="?page=kategori_ubah&&id=<?= $data['id_kategori']?>" class="btn btn-info">Ubah</a>
                        <a onclick="return confirm('Apakah anda yakin menghapus data ini')" href="?page=kategori_hapus&&id=<?= $data['id_kategori']?>" class="btn btn-danger">Hapus</a>
                    </td>
                <?php endif; ?>
            </tr>

            <?php endwhile; ?>

        </table>
    </div>
</div>
