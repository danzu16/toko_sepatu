<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Sepatu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="edit.css">
</head>
<body>
  <h4 align="center">Update Sepatu</h4>
  <?php
  require '../function.php';
  $namasepatu = $_GET['namasepatu'];
  $data = mysqli_query($koneksi, "SELECT * FROM sepatu WHERE namasepatu ='$namasepatu'");
  while ($row = mysqli_fetch_array($data)) {
  ?>
  <div class="container">
    <form method="post">
      <input type="hidden" name="idsepatu" value="<?php echo $row['idsepatu']; ?>" class="form-control">
      <div class="form-group">
        <label for="namasepatu">Nama Sepatu:</label>
        <input type="text" value="<?php echo $row['namasepatu'];?>" name="namasepatu" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <input type="text" value="<?php echo $row['deskripsi'];?>" name="deskripsi" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="harga">Harga:</label>
        <input type="number" value="<?php echo $row['harga'];?>" name="harga" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="stok">Stok:</label>
        <input type="number" value="<?php echo $row['stok'];?>" name="stok" class="form-control" required>
      </div>
      <div class="form-buttons">
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-info"><a href="index.php">Batal</a></button>
      </div>
    </form>
  </div>
  <?php
  }
  ?>
</body>
</html>