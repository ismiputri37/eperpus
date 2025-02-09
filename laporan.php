<h1 class="mt-4">Laporan Peminjaman</h1>
<div class="row">
    <div class="col-md-12">    
        <?php
        if ($_SESSION['user']['level'] !='peminjam') :
        ?>
        <a href="?page=peminjaman_tambah" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Peminjaman</a>
        <a href="cetak.php" target="blank" class="btn btn-primary">Cetak Data</a>
        <?php endif; ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>User</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Terlambat(hari)</th>
                <th>Denda</th>
                <th>Status Peminjaman</th>
            </tr>            
            <?php
                $i=1;
                if ($_SESSION['user']['level'] == 'peminjam'){
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman JOIN user on
                    user.id_user=peminjaman.id_user JOIN buku ON buku.id_buku=peminjaman.id_buku where peminjaman.id_user=".$_SESSION['user']['id_user']);
                } else {
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman JOIN user on
                    user.id_user=peminjaman.id_user JOIN buku ON buku.id_buku=peminjaman.id_buku");
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
                    $tanggal_sekarang=$data['tanggal_peminjaman'];
                    $tanggal_jatuh_tempo = date('d-m-Y', strtotime($tanggal_sekarang. ' + 5 days'));
                    echo $tanggal_jatuh_tempo;
                ?>
                </td>  
                <td>
                    <?php
                    // $tanggal_jatuh_tempo;
                    $dataTanggalMax = strtotime(str_replace('/', '-', $tanggal_jatuh_tempo));
                    $hariIni = strtotime('today');
                    $selisihHari = ($hariIni - $dataTanggalMax) / (60 * 60 * 24) + 1;
                    $selisihHari = round($selisihHari);
                    if ($selisihHari > 0) {
                        echo $selisihHari;
                    } else {
                        echo "0";
                    }
                   
                    ?>
                </td>           
                <td>
                    <!-- menghitung denda -->
                    <?php
                        
                    //    $data=$datapeminjaman[0];
                    if ($selisihHari > 0) {
                        $totalDenda = $selisihHari * 1000;
                        echo number_format($totalDenda, 0, ',', '.');
                    } else {
                        echo "0";
                    }
                       
                    ?>
                </td> 
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