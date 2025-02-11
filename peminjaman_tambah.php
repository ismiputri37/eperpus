<h1 class="mt-4">Tambah Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <!-- menyimpan data ke database -->
                <form action="" method="POST">
                    <?php
                    // $id = $_GET['id'];
                    // $maxPinjam = 2;
                        if(isset($_POST['submit'])) {
                            $id_buku = $_POST["id_buku"];
                            $id_user = $_POST['id_user'];

                            $tanggal_sekarang = date("d/m/Y");
                            $tanggal_jatuh_tempo = date('d/m/Y', strtotime(date("Y-m-d"). ' + 5 days'));

                            $cek = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_user='$id_user' AND status_peminjaman='dipinjam'");
                            $check = mysqli_num_rows($cek);
                            if ($check >= 2) {
                                echo "User sudah melebihi maksimal peminjaman";
                            } else {
                                $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku, id_user, tanggal_peminjaman, tanggal_jatuh_tempo, status_peminjaman)
                                VALUES('$id_buku', '$id_user', '$tanggal_sekarang', '$tanggal_jatuh_tempo', 'dipinjam')");
                                if($query) {
                                    // Reduce the value of buku.jumlah by 1
                                    $update_buku = mysqli_query($koneksi, "UPDATE buku SET jumlah = jumlah - 1 WHERE id_buku = '$id_buku'");
                                    if($update_buku) {
                                        echo '<script>
                                        alert("Peminjaman berhasil");
                                        window.location.href = "?page=peminjaman";
                                        </script>';
                                    } else {
                                        echo '<script> alert("Peminjaman berhasil, tetapi gagal mengurangi jumlah buku"); </script>';
                                    }
                                } else {
                                    echo '<script> alert("Peminjaman gagal"); </script>';
                                }
                            }
                        }
                    ?>
                    <!-- menampilkan nama Peminjam -->
                    <div class="row">
                        <div class="row mb-3">
                            <div class="col-md-2">Peminjam</div>
                            <div class="col-md-8">
                            <input type="text" id="cariPeminjam" class="form-control" placeholder="Cari peminjam">
                            <div id="dropdownPeminjam" class="dropdown-menu"></div>
                            <input type="hidden" id="id_user" name="id_user">

                            <script>
                                document.getElementById('cariPeminjam').addEventListener('input', function () {
                                    var query = this.value;
                                    var dropdown = document.getElementById('dropdownPeminjam');

                                    if (query.length > 0) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('GET', 'cari_peminjam.php?q=' + encodeURIComponent(query), true);
                                        xhr.onload = function () {
                                            if (this.status == 200) {
                                                var peminjams = JSON.parse(this.responseText);
                                                dropdown.innerHTML = '';

                                                if (peminjams.length > 0) {
                                                    peminjams.forEach(function (peminjam) {
                                                        var item = document.createElement('div');
                                                        item.className = 'dropdown-item';
                                                        item.textContent = peminjam.nama;
                                                        item.dataset.id = peminjam.id_user;

                                                        item.addEventListener('click', function () {
                                                            document.getElementById('cariPeminjam').value = peminjam.nama;
                                                            document.getElementById('id_user').value = peminjam.id_user;
                                                            dropdown.style.display = 'none';
                                                        });

                                                        dropdown.appendChild(item);
                                                    });

                                                    dropdown.style.display = 'block';
                                                } else {
                                                    dropdown.style.display = 'none';
                                                }
                                            }
                                        };
                                        xhr.send();
                                    } else {
                                        dropdown.style.display = 'none';
                                    }
                                });

                                document.addEventListener('click', function (event) {
                                    var dropdown = document.getElementById('dropdownPeminjam');
                                    var input = document.getElementById('cariPeminjam');

                                    if (!input.contains(event.target) && !dropdown.contains(event.target)) {
                                        dropdown.style.display = 'none';
                                    }
                                });
                            </script>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Buku</div>
                            <div class="col-md-8">
                            <input type="text" id="cariBuku" class="form-control" placeholder="Cari buku">
                            <div id="dropdownBuku" class="dropdown-menu"></div>
                            <input type="hidden" id="id_buku" name="id_buku">

                            <script>
                                document.getElementById('cariBuku').addEventListener('input', function () {
                                    var query = this.value;
                                    var dropdown = document.getElementById('dropdownBuku');

                                    if (query.length > 0) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('GET', 'cari_buku.php?q=' + encodeURIComponent(query), true);
                                        xhr.onload = function () {
                                            if (this.status == 200) {
                                                var bukus = JSON.parse(this.responseText);
                                                dropdown.innerHTML = '';

                                                if (bukus.length > 0) {
                                                    bukus.forEach(function (buku) {
                                                        var item = document.createElement('div');
                                                        item.className = 'dropdown-item';
                                                        item.textContent = buku.judul;
                                                        item.dataset.id = buku.id_buku;

                                                        item.addEventListener('click', function () {
                                                            document.getElementById('cariBuku').value = buku.judul;
                                                            document.getElementById('id_buku').value = buku.id_buku;
                                                            dropdown.style.display = 'none';
                                                        });

                                                        dropdown.appendChild(item);
                                                    });

                                                    dropdown.style.display = 'block';
                                                } else {
                                                    dropdown.style.display = 'none';
                                                }
                                            }
                                        };
                                        xhr.send();
                                    } else {
                                        dropdown.style.display = 'none';
                                    }
                                });

                                document.addEventListener('click', function (event) {
                                    var dropdown = document.getElementById('dropdownBuku');
                                    var input = document.getElementById('cariBuku');

                                    if (!input.contains(event.target) && !dropdown.contains(event.target)) {
                                        dropdown.style.display = 'none';
                                    }
                                });
                            </script>
                            </div>
                        </div>
                        <!-- button submit -->
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <div class="col-md-4">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>