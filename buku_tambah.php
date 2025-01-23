<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <!-- menyimpan data ke database -->
                <form action="" method="POST">
                    <?php 
                        if(isset($_POST['submit'])) {
                            $buku = $_POST['buku'];
                            $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) VALUES('$kategori')");
                            if($query) {
                                echo '<script>alert("Tambah data berhasil"); </script>';
                            } else {
                                echo '<script> alert("Tambah data gagal");</script>';
                            }
                        }
                    ?>
                    <!-- menampilkan nama kategori -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4">Nama Kategori</div>
                            <div class="col-md-8">
                                <!-- <input type="text" class="form-control" name="kategori"> -->
                                 <select name="id_kategori" class="form-control">
                                    <?php 
                                        $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                        while ($kategori = mysqli_fetch_array($kat)) {
                                    ?>
                                    <option value="<?= $kat['id_kategori']; ?>">
                                        <?= $kat['kategori']; ?>
                                    </option>
                                    <?php } ?>    
                                 </select>
                            </div>
                        </div>
                        <!-- menampilkan judul buku -->
                        <div class="row mb-3">
                            <div class="col-md-2">Judul</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="judul"></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">                                            
                            <div class="col-md-4">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>