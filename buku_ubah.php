<h1 class="mt-4">Ubah Data Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <!-- menyimpan data ke database -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php                   
                    $id = $_GET['id'];                    
                    // Proses update
                    if (isset($_POST['submit'])) {
                        $id_kategori = $_POST['id_kategori'];
                        $judul = $_POST['judul'];
                        $penulis = $_POST['penulis'];
                        $penerbit = $_POST['penerbit'];
                        $tahun_terbit = $_POST['tahun_terbit'];
                        $isbn=$_POST['isbn'];
                        $jumlah = $_POST['jumlah'];
                        $sinopsis = $_POST['sinopsis'];
                        
                        // Menghandle upload gambar
                        $gambar_lama = $_POST['gambar_lama']; // Simpan gambar lama
                        if ($_FILES['gambar']['name'] != "") {
                            $gambar = $_FILES['gambar']['name'];
                            $tmp = $_FILES['gambar']['tmp_name'];
                            move_uploaded_file($tmp, "upload/" . $gambar);
                        } else {
                            $gambar = $gambar_lama;
                        }

                        // Query update
                        $query = mysqli_query($koneksi, "UPDATE buku SET 
                            id_kategori='$id_kategori', 
                            gambar='$gambar', 
                            judul='$judul', 
                            penulis='$penulis', 
                            penerbit='$penerbit', 
                            tahun_terbit='$tahun_terbit', 
                            isbn='$isbn',
                            jumlah='$jumlah', 
                            sinopsis='$sinopsis' 
                            WHERE id_buku='$id'");

                        if ($query) {
                            echo '<script>alert("Update data berhasil"); window.location.href="?page=buku";</script>';
                        } else {
                            echo '<script>alert("Update data gagal: ' . mysqli_error($koneksi) . '");</script>';
                        }
                    }

                    // Mengambil data buku berdasarkan ID
                    $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
                    $data = mysqli_fetch_array($query);
                    ?>
                    
                    <input type="hidden" name="gambar_lama" value="<?= $data['gambar']; ?>">

                    <!-- menampilkan kategori -->
                    <div class="row mb-3">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-8">
                            <select name="id_kategori" class="form-control">
                                <?php
                                $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($kategori = mysqli_fetch_array($kat)) :
                                ?>
                                <option <?= $kategori['id_kategori'] == $data['id_kategori'] ? 'selected' : ''; ?> value="<?= $kategori['id_kategori']; ?>">
                                    <?= $kategori['kategori']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <!-- menampilkan gambar -->
                    <div class="row mb-3">
                        <div class="col-md-2">Gambar</div>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="gambar">
                            <?php if ($data['gambar']) : ?>
                                <img src="upload/<?= $data['gambar']; ?>" width="100">
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- menampilkan judul buku -->
                    <div class="row mb-3">
                        <div class="col-md-2">Judul</div>
                        <div class="col-md-8"><input type="text" value="<?= $data['judul']; ?>" class="form-control" name="judul"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penulis</div>
                        <div class="col-md-8"><input type="text" value="<?= $data['penulis']; ?>" class="form-control" name="penulis"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penerbit</div>
                        <div class="col-md-8"><input type="text" value="<?= $data['penerbit']; ?>" class="form-control" name="penerbit"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tahun Terbit</div>
                        <div class="col-md-8"><input type="number" value="<?= $data['tahun_terbit']; ?>" class="form-control" name="tahun_terbit" min="1900" max="2025"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">ISBN</div>
                        <div class="col-md-8"><input type="text" value="<?= $data['isbn']; ?>" class="form-control" name="isbn"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Jumlah</div>
                        <div class="col-md-8"><input type="number" value="<?= $data['jumlah']; ?>" class="form-control" name="jumlah"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">sinopsis</div>
                        <div class="col-md-8">
                            <textarea name="sinopsis" rows="5" class="form-control"><?= $data['sinopsis']; ?></textarea>
                        </div>
                    </div>

                    <!-- button submit -->
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <div class="col-md-4">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="?page=buku" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
