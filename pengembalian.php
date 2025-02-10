<?php
$id_peminjaman = $_GET['id_peminjaman'];
$tanggal_sekarang = date("Y-m-d"); // Use Y-m-d format for consistency
$pengembalian = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman='dikembalikan', tanggal_pengembalian='$tanggal_sekarang' WHERE id_peminjaman='$id_peminjaman'");

if ($pengembalian) {
    echo '<script>
        alert("Pengembalian berhasil");
        window.location.href = "?page=peminjaman";
    </script>';
} else {
    echo '<script>
        alert("Pengembalian gagal");
        window.location.href = "?page=peminjaman";
    </script>';
}

