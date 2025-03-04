<h1 class="mt-4">Kategori Buku</h1>
<div class="row">
    <div class="col-md-12">
        <a href="?page=kategori_tambah" class="btn btn-primary">Tambah Data</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
            <?php
                $i = 1;
                // tampilkan data yang ada di tabel kategori
                $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                // ambil data dari tabel kategori ubah menjadi array
                while ($data = mysqli_fetch_array($query)) :
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $data['kategori']; ?></td>
                <td> 
                    <a href="?page=kategori_ubah&&id=<?= $data['id_kategori']?>" class="btn btn-info">Ubah</a>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini')" 
                        href="?page=kategori_hapus&&id=<?= $data['id_kategori']?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
           
        </table>
    </div>
</div>