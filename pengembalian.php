<?php
$id_peminjaman = $_GET['id_peminjaman'];
$tanggal_sekarang = date("Y-m-d"); // Use Y-m-d format for consistency

// Retrieve the id_buku from the peminjaman table
$query = mysqli_query($koneksi, "SELECT id_buku FROM peminjaman WHERE id_peminjaman='$id_peminjaman'");
$data = mysqli_fetch_array($query);
$id_buku = $data['id_buku'];

// Update the peminjaman table to set the status to 'dikembalikan' and set the tanggal_pengembalian
$pengembalian = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman='dikembalikan', tanggal_pengembalian='$tanggal_sekarang' WHERE id_peminjaman='$id_peminjaman'");

if ($pengembalian) {
    // Increase the value of buku.jumlah by 1
    $update_buku = mysqli_query($koneksi, "UPDATE buku SET jumlah = jumlah + 1 WHERE id_buku = '$id_buku'");
    if ($update_buku) {
        echo '<script>
            alert("Pengembalian berhasil");
            window.location.href = "?page=peminjaman";
        </script>';
    } else {
        echo '<script>
            alert("Pengembalian berhasil, tetapi gagal menambah jumlah buku");
            window.location.href = "?page=peminjaman";
        </script>';
    }
} else {
    echo '<script>
        alert("Pengembalian gagal");
        window.location.href = "?page=peminjaman";
    </script>';
}
?>