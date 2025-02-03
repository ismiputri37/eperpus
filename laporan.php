<h1 class="mt-4">Kategori Buku</h1>
<div class="row">
    <div class="col-md-12">
        <a href="?page=peminjaman_tambah" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Peminjaman</a>
        <a href="cetak.php" target="blank" class="btn btn-primary">Cetak Data</a>
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
            </tr>

            <?php
                $i=1;
                if ($_SESSION['user']['level'] == 'peminjam'){
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman JOIN user on
                    user.id_user=peminjaman.id_user JOIN buku ON buku.id_buku=peminjaman.id_buku");
                } else {
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman JOIN user on
                    user.id_user=peminjaman.id_user JOIN buku ON buku.id_buku=peminjaman.id_buku where peminjaman.id_user=".$_SESSION['user']['id_user']);
                }
                while ($data = mysqli_fetch_array($query)) :
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <!-- nama user -->
                <td><?= $data['nama']; ?></td>
                <td><?= $data['judul']; ?></td>
                <td><?= $data['tanggal_peminjaman']; ?></td>
                <td><?= $data['tanggal_pengembalian']; ?></td>
                <td>
                    <?php

                        $tanggal_sekarang = date("d/m/Y");
                        $tanggal_jatuh_tempo = date('d/m/Y', strtotime(date("Y-m-d"). ' + 5 days'));
                        echo $tanggal_jatuh_tempo;
                    ?>
                </td>
                <td></td>
                <td><?= $data['status_peminjaman']; ?></td>


                <td>
                    <!-- update kategori by id_kategori -->
                    <a href="?page=peminjaman_ubah&&id=<?= $data['id_peminjaman']?>" class="btn btn-info">Ubah</a>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini')" href="?page=peminjaman_hapus&&id=<?= $data['id_peminjaman']?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>

            <?php endwhile; ?>

        </table>
    </div>
</div>