<?php
require '../function.php';
//perintah hapus data
$namasepatu = $_GET['namasepatu'];
$hapus = mysqli_query($koneksi, "DELETE FROM sepatu WHERE namasepatu = '$namasepatu'");
if ($hapus) {
    header ('location:../admin');
}else{
    echo "Gagal Hapus Data";
}
?>