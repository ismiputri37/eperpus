<h1 class="mt-4">Daftar Buku</h1>
<div class="row">
    <div class="col-md-12">
        <?php
        if ($_SESSION['user']['level'] != 'peminjam') :
        ?>
            <a href="?page=buku_tambah" class="btn btn-primary">Tambah Data</a>
        <?php endif; ?>

        <!-- Search form -->
        <form method="GET" action="">
            <input type="hidden" name="page" value="buku">
            <div class="row mb-3">
                <div class="col-md-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Buku" value="<?= isset($_GET['nama']) ? $_GET['nama'] : '' ?>">
                </div>
                <div class="col-md-3">
                    <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" value="<?= isset($_GET['tahun_terbit']) ? $_GET['tahun_terbit'] : '' ?>">
                </div>
                <div class="col-md-3">
                    <input type="text" name="penulis" class="form-control" placeholder="Penulis" value="<?= isset($_GET['penulis']) ? $_GET['penulis'] : '' ?>">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>

        <!-- tabel list buku -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>ISBN</th>
                <th>Jumlah</th>
                <th>Sinopsis</th>
                <?php
                if ($_SESSION['user']['level'] == 'admin') :
                ?>
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
                <td><?= $data['kategori']; ?></td>
                <td><img src="upload/<?= $data['gambar']; ?>" width="80px" alt=""></td>
                <td><?= $data['judul']; ?></td>
                <td><?= $data['penulis']; ?></td>
                <td><?= $data['penerbit']; ?></td>
                <td><?= $data['tahun_terbit']; ?></td>
                <td><?= $data['isbn']; ?></td>
                <td><?= $data['jumlah']; ?></td>
                <td><?= $data['sinopsis']; ?></td>
                <?php
                if ($_SESSION['user']['level'] != 'peminjam') :
                ?>
                <td>
                    <a href="?page=buku_ubah&&id=<?= $data['id_buku'] ?>" class="btn btn-info">Ubah</a>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini')" href="?page=buku_hapus&&id=<?= $data['id_buku'] ?>" class="btn btn-danger">Hapus</a>
                </td>
                <?php endif; ?>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
