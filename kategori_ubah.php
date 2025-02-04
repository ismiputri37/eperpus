<h1 class="mt-4">Ubah Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    <?php 
                        $id = $_GET['id'];
                        if(isset($_POST['submit'])) {
                            // $kategori = $_POST['kategori'];
                            $kategori = strtolower($_POST['kategori']);
                            // mengecek data kategori
                            $cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE LOWER(kategori)='$kategori'");
                            $check = mysqli_num_rows($cek);   
                            if ($check > 0){
                                echo "Data yang dimasukkan sama";                                   
                            } else {
                                $query = mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori' WHERE id_kategori=$id");
                                if($query) {
                                    echo '<script> alert("Ubah data berhasil"); </script>';                                
                                } else {
                                    echo '<script> alert("Ubah data gagal");</script>';
                                }
                            }                            
                        }
                        
                        $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori=$id");
                        $data = mysqli_fetch_assoc($query);
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4">Nama Kategori</div>
                            <div class="col-md-8"><input type="text" class="form-control" value="<?= $data['kategori']; ?>" name="kategori"></div>
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