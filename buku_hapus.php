<?php
$id = $_GET['id'];

// Retrieve the image filename from the database
$query = mysqli_query($koneksi, "SELECT gambar FROM buku WHERE id_buku=$id");
$data = mysqli_fetch_array($query);
$gambar = $data['gambar'];

// Delete the book record from the database
$query = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku=$id");

// Delete the image file from the upload directory
if ($gambar && file_exists("upload/" . $gambar)) {
    unlink("upload/" . $gambar);
}
?>
<script>
    alert('Hapus data berhasil');
    location.href = "index.php?page=buku";
</script>
