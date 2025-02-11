<h1 class="mt-4">Tambah Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <!-- menyimpan data ke database -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                        if(isset($_POST['submit'])) {
                            $id_kategori = $_POST['id_kategori'];
                            $judul = ucfirst($_POST['judul']);
                            $penulis = ucfirst($_POST['penulis']);
                            $penerbit = ucfirst($_POST['penerbit']);
                            $tahun_terbit = $_POST['tahun_terbit'];
                            $isbn = $_POST['isbn'];
                            $jumlah = $_POST['jumlah'];
                            $sinopsis = $_POST['sinopsis'];

                            // Proses Upload Gambar
                            $gambar = $_FILES['gambar'];
                            $upload_dir = "upload/"; // Direktori penyimpanan gambar
                            $ext = pathinfo($gambar['name'], PATHINFO_EXTENSION);
                            $filename = time() . "." . $ext; // Rename agar unik
                            $file_path = $upload_dir . $filename;

                            $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
                            if (!in_array(strtolower($ext), $allowed_ext)) {
                                die("Format gambar tidak didukung! Hanya JPG, JPEG, PNG, GIF.");
                            }

                            if (move_uploaded_file($gambar['tmp_name'], $file_path)) {
                                // Cek apakah judul sudah ada
                                $cek = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul='$judul'");
                                $check = mysqli_num_rows($cek);

                                if ($check > 0) {
                                    echo "Data pernah dimasukkan";
                                } else {
                                    // Simpan ke database
                                    $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori, judul, penulis, penerbit, tahun_terbit, isbn, jumlah, sinopsis, gambar)
                                    VALUES('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$isbn', '$jumlah', '$sinopsis', '$filename')");

                                    if($query) {
                                        echo '<script>alert("Tambah data berhasil"); window.location.href ="?page=buku"; </script>';

                                    } else {
                                        echo '<script> alert("Tambah data gagal");</script>';
                                    }
                                }
                            } else {
                                echo "Gagal mengunggah gambar.";
                            }
                        }
                    ?>

                    <div class="row">
                        <div class="row mb-3">
                            <div class="col-md-2">Upload Gambar</div>
                            <div class="col-md-8"><input type="file" class="form-control" name="gambar" required></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Kategori</div>
                            <div class="col-md-8">
                                <select name="id_kategori" class="form-select" aria-label="Pilih Kategori">
                                    <option selected disabled>Pilih Kategori</option>
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
                            <div class="col-md-8"><input type="text" class="form-control" name="judul" required></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penulis</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="penulis" required></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Penerbit</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="penerbit" required></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tahun Terbit</div>
                            <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit" min="1900" max="2025" required></div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">ISBN</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="isbn" required></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Jumlah</div>
                            <div class="col-md-8"><input type="number" class="form-control" name="jumlah" required></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Sinopsis</div>
                            <div class="col-md-8">
                                <textarea name="sinopsis" rows="5" class="form-control" required></textarea>
                            </div>
                        </div>
                        <!-- button submit -->
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <div class="col-md-4">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="?page=buku" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>