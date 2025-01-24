<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <!-- menyimpan data ke database -->
                <form action="" method="POST">
                    <?php
                        if(isset($_POST['submit'])) {
                            // $buku = $_POST['buku'];
                            $id_kategori = $_POST['id_kategori'];
                            $judul = $_POST['judul'];
                            $penulis = $_POST['penulis'];
                            $penerbit = $_POST['penerbit'];
                            $tahun_terbit = $_POST['tahun_terbit'];
                            $deskripsi = $_POST['deskripsi'];

                            $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi)
                                VALUES('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");
                            if($query) {
                                echo '<script>alert("Tambah data berhasil"); </script>';
                            } else {
                                echo '<script> alert("Tambah data gagal");</script>';
                            }
                        }
                    ?>
                    <!-- menampilkan nama kategori -->
                    <div class="row">
                        <div class="row mb-3">
                            <div class="col-md-2">Kategori</div>
                            <div class="col-md-8">
                                <!-- <input type="text" class="form-control" name="kategori"> -->
                                 <select name="id_kategori" class="form-control">
                                    <?php
                                        $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                        while ($kategori = mysqli_fetch_array($kat)) :
                                    ?>
                                    <option value="<?= $kategori['id_kategori']; ?>">
                                        <?= $kategori['kategori']; ?>
                                    </option>
                                    <?php endwhile; ?>
                                 </select>
                            </div>
                        </div>
                        <!-- menampilkan judul buku -->
                        <div class="row mb-3">
                            <div class="col-md-2">Judul</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="judul"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penulis</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="penulis"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penerbit</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="penerbit"></div>
                        </div><div class="row mb-3">
                            <div class="col-md-2">Tahun Terbit</div>
                            <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit" min="1900" max="2025"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Deskripsi</div>
                            <div class="col-md-8">
                                <textarea name="deskripsi" rows="5" class="form-control"></textarea>
                            </div>
                        </div>


                        <!-- button submit -->
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