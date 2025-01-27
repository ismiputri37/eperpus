<h2 align="centers">Laporan Peminjaman Buku</h2>
<table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status Peminjaman</th>
            </tr>
            
            <?php 
            include "koneksi.php";
                $i=1;
                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user on user.id_user=peminjaman.id_user LEFT JOIN buku ON buku.id_buku=peminjaman.id_buku");
                while ($data = mysqli_fetch_array($query)) :
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <!-- nama user -->
                <td><?= $data['nama']; ?></td> 
                <td><?= $data['judul']; ?></td> 
                <td><?= $data['tanggal_peminjaman']; ?></td> 
                <td><?= $data['tanggal_pengembalian']; ?></td> 
                <td><?= $data['status_peminjaman']; ?></td> 


                <td>
                    <!-- update kategori by id_kategori -->
                    <a href="?page=ulasan_ubah&&id=<?= $data['id_ulasan']?>" class="btn btn-info">Ubah</a>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini')" href="?page=ulasan_hapus&&id=<?= $data['id_ulasan']?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>            
            <?php endwhile; ?>         
</table>
<script>
    window.print();
    setTimeout(function() {
        window.close();
    }, 100);
</script>