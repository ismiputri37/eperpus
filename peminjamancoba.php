<h1 class="mt-4">Laporan Peminjaman Buku</h1>
<div class="row">
    <div class="col-md-12">
        <a href="?page=peminjaman_tambah" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Peminjaman</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Denda</th>
                <th>Status Peminjaman</th>
                <!-- <th>Aksi</th> -->
            </tr>
            
            <?php 
                $i=1;
                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user on user.id_user=peminjaman.id_user LEFT JOIN buku ON buku.id_buku=peminjaman.id_buku 
                    WHERE peminjaman.id_user=" . $_SESSION['user']['id_user']);
                while ($data = mysqli_fetch_array($query)) :
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <!-- nama user -->
                <td><?= $data['nama']; ?></td> 
                <td><?= $data['judul']; ?></td> 
                <td><?= $data['tanggal_peminjaman']; ?></td> 
                <td><?= $data['tanggal_pengembalian']; ?></td> 
                <td><?= $data['tanggal_jatuh_tempo']; ?></td> 
                <td></td> 
                <td><?= $data['status_peminjaman']; ?></td> 

                <!-- <td>                    
                    <a href="?page=peminjaman_ubah&&id=<?= $data['id_peminjaman']?>" class="btn btn-info">Ubah</a>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini')" href="?page=peminjaman_hapus&&id=<?= $data['id_peminjaman']?>" class="btn btn-danger">Hapus</a>
                </td> -->
            </tr>
            
            <?php endwhile; ?>            
            
        </table>
    </div>
</div>