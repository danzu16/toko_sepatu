<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pembelian Sepatu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="beli.css">
</head>
<h4 align="center">Pembelian Sepatu</h4>
<?php
require '../function.php';
$namasepatu = $_GET['namasepatu'];
$data = mysqli_query($koneksi,"SELECT * FROM sepatu where namasepatu ='$namasepatu'");
while ($row = mysqli_fetch_array($data)){
?>  
<div class="container">
<form method="post">
    <div class="form-group" align ="center" style="margin-top:2%">
    <input type="hidden" name="idbeli" class="form-control">
    <input type="text" value="<?php echo $row['idsepatu'];?>" name ="idsepatu" class="form-control" style="width: 50%;"readonly>
    <input type="text" value="<?php echo $row['namasepatu'];?>" name ="namasepatu" class="form-control" style="width: 50%;"readonly>
    <input type="text" value="<?php echo $row['deskripsi'];?>"name ="deskripsi" class="form-control" style="width: 50%;"readonly>
    <input type="number" value="<?php echo $row['harga'];?>"name ="harga" class="form-control" style="width: 50%;"readonly>
    <input type="number" name ="jumlah" placeholder="Jumlah Pembelian" class="form-control" style="width: 50%;">
    <br>
    <button type="submit" name="beli" class="btn btn-primary">Beli</button>
    <button><a href="index.php" class="btn btn-warning">Kembali</a></button>
    </div>
</form>
<?php
}
?>
</div>