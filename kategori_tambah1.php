<h1 class="mt-4">Tambah Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <!-- form input nama kategori -->
                <form method="POST">
                    <?php
                        //jika tombol submit ditekan
                        if (isset($_POST['submit'])) {   
                            // semua data kategori diubah menjadi huruf kecil  
                            $kategori = strtolower($_POST['kategori']);    
                            // cek duplikasi data
                            $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE LOWER(kategori)='$kategori'");
                            // meghitung baris di dalam tabel
                            $check = mysqli_num_rows($cek);                           
                            if ($check > 0) {
                                echo "Data yang dimasukkan sama. Masukkan data baru.";                            
                            } else {
                                $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) VALUES('$kategori')");
                                if ($query) {
                                    echo "<script> alert('Tambah data berhasil'); </script>";
                                } else {
                                    echo "<script> alert('Tambah data gagal'); </script>";                                
                                }
                            }                                                
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4">Nama Kategori</div>
                            <div class="col-md-8"><input type="text" name="kategori" class="form-control"></div>
                        </div>
                    </div>
                    <!-- tombol submit, reset, kembali -->
                    <div class="d-flex align-items-center justifiy-content-between mt-4 mb-0">
                        <div class="col-md-4">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>