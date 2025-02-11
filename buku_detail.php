<?php
include "koneksi.php";

$id_buku = $_GET['id'];

// Retrieve the book details from the database
$query = mysqli_query($koneksi, "SELECT buku.*, kategori.kategori FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE id_buku='$id_buku'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .book-detail {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }
        .book-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .book-info {
            margin-top: 20px;
        }
        .book-info h3 {
            font-size: 1.75rem;
            margin-bottom: 20px;
        }
        .book-info p {
            font-size: 1rem;
            margin-bottom: 10px;
        }
        .book-info p strong {
            font-weight: bold;
        }
        .back-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Detail Buku</h1>
        <div class="book-detail">
            <div class="row">
                <div class="col-md-4">
                    <?php if ($data['gambar']) : ?>
                        <img src="upload/<?= $data['gambar']; ?>" class="book-image" alt="Gambar Buku">
                    <?php else : ?>
                        <p>Tidak ada gambar</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-8 book-info">
                    <h3><?= $data['judul']; ?></h3>
                    <p><strong>Penulis:</strong> <?= $data['penulis']; ?></p>
                    <p><strong>Penerbit:</strong> <?= $data['penerbit']; ?></p>
                    <p><strong>Tahun Terbit:</strong> <?= $data['tahun_terbit']; ?></p>
                    <p><strong>ISBN:</strong> <?= $data['isbn']; ?></p>
                    <p><strong>Jumlah:</strong> <?= $data['jumlah']; ?></p>
                    <p><strong>Kategori:</strong> <?= $data['kategori']; ?></p>
                    <p><strong>Sinopsis:</strong> <?= $data['sinopsis']; ?></p>
                    <a href="?page=buku" class="btn btn-primary back-button">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>