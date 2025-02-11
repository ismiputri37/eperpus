<h1 class="mt-4">Peminjaman Buku</h1>
<div class="row mb-3">
    <div class="col-md-12">
        <a href="?page=peminjaman_tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Denda</th>
                <th>Aksi</th>
            </tr>

            <?php
                $i=1;
                if ($_SESSION['user']['level'] == 'peminjam') {
                    $query = mysqli_query($koneksi, "SELECT user.nama, buku.judul, peminjaman.tanggal_peminjaman, peminjaman.tanggal_jatuh_tempo FROM peminjaman JOIN user on user.id_user=peminjaman.id_user JOIN buku ON buku.id_buku=peminjaman.id_buku
                        WHERE peminjaman.status_peminjaman = 'dipinjam' and peminjaman.id_user=" . $_SESSION['user']['id_user']);
                }
                else {
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman JOIN user on user.id_user=peminjaman.id_user JOIN buku ON buku.id_buku=peminjaman.id_buku
                        WHERE peminjaman.status_peminjaman = 'dipinjam'");
                }
                while ($data = mysqli_fetch_array($query)) :
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <!-- nama user -->
                <td><?= $data['nama']; ?></td>
                <td><?= $data['judul']; ?></td>
                <td><?= $data['tanggal_peminjaman']; ?></td>
                <td><?= $data['tanggal_jatuh_tempo']; ?></td>
                <td>
                    <?php
                        $tanggal_sekarang = date("Y-m-d");
                        $tanggal_jatuh_tempo = date("Y-m-d", strtotime(str_replace('/', '-', $data["tanggal_jatuh_tempo"]))); // 14/02/2025
                        $selisihHari = (strtotime($tanggal_sekarang) - strtotime($tanggal_jatuh_tempo)) / (60 * 60 * 24);
                        $selisihHari = round($selisihHari);
                        if ($selisihHari > 0) {
                            $totalDenda = $selisihHari * 1000;
                        } else {
                            $totalDenda = 0;
                        }
                        echo $totalDenda;
                    ?>
                </td>
                <td>
                    <a onclick="return confirm('Apakah denda sudah lunas?')" href="?page=pengembalian&id_peminjaman=<?= $data['id_peminjaman']?>" class="btn btn-info">Pengembalian</a>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini')" href="?page=peminjaman_hapus&&id=<?= $data['id_peminjaman']?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>

            <?php endwhile; ?>

        </table>
    </div>
</div>