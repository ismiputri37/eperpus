<?php
include 'koneksi.php'; // Adjust the path as needed

$q = $_GET['q'];
$query = mysqli_query($koneksi, "SELECT id_user, nama FROM user WHERE nama LIKE '%$q%'");
$users = [];
while ($user = mysqli_fetch_array($query)) {
    $users[] = $user;
}
echo json_encode($users);
?>
