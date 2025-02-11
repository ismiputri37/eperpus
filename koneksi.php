<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$koneksi = mysqli_connect("localhost", "root", "", "eperpus");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
