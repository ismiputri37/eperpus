<h1 class="mt-4">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    <?php 
                        if(isset($_POST['submit'])) {
                            // tangkap data dan ubah data kategori menjadi lowercase
                            $kategori = strtolower($_POST['kategori']);
                            // mengecek data kategori
                            $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE LOWER(kategori)='$kategori'");
                            $check = mysqli_num_rows($cek);                            
                            if ($check > 0){
                                echo "Data yang dimasukkan sama";                                   
                            } else {
                                $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) VALUES('$kategori')");
                                if($query) {
                                    echo '<script>alert("Tambah data berhasil"); </script>';
                                } else {
                                    echo '<script> alert("Tambah data gagal");</script>';
                                }                             
                            }                            
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4">Nama Kategori</div>
                            <div class="col-md-8"><input type="text" class="form-control" name="kategori"></div>
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