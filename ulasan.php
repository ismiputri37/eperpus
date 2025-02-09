<h1 class="mt-4">Ulasan Buku</h1>
<div class="row">
    <div class="col-md-12">
        <a href="?page=ulasan_tambah" class="btn btn-primary">Tambah Data</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Buku</th>
                <th>Ulasan</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
            
            <?php 
                $i=1;
                $query = mysqli_query($koneksi, "SELECT * FROM ulasan LEFT JOIN user on user.id_user=ulasan.id_user LEFT JOIN buku ON buku.id_buku=ulasan.id_buku");
                while ($data = mysqli_fetch_array($query)) :
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <!-- nama user -->
                <td><?= $data['nama']; ?></td> 
                <td><?= $data['judul']; ?></td> 
                <td><?= $data['ulasan']; ?></td> 
                <td><?= $data['rating']; ?></td> 

                <td>
                    <!-- update kategori by id_kategori -->
                    <a href="?page=ulasan_ubah&&id=<?= $data['id_ulasan']?>" class="btn btn-info">Ubah</a>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini')" href="?page=ulasan_hapus&&id=<?= $data['id_ulasan']?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            
            <?php endwhile; ?>            
            
        </table>
    </div>
</div>