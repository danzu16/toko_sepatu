<?php
require '../function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pembelian Sepatu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="user.css">
 
<body>
<div class="">
  <h2 align ="center" style="margin-top:5%">Pembelian Sepatu</h2>            
  <div class="tombol">        
  <button class="logout"><a href="../index.php">Log Out</a></button>
  <button class="tambah"><a href="#popup">Riwayat Pembelian</a></button>
  </div>

      <div class="list">
        <?php
        $sql = "SELECT * FROM sepatu order by idsepatu desc";
        $query = mysqli_query($koneksi, $sql);
        $no=0;
        while ($row = mysqli_fetch_array($query)) {
            $no++;
        
        ?>
        <div class="main">
            <div class="container">
              <img class="image" src="../images/<?php echo $row['image']?>">
              <div class="details">
                <h1><?php echo $row['namasepatu'];?></h1>
                <p><?php echo $row['deskripsi'];?></p>
                <p class="price">Rp.<?php echo number_format($row['harga']);?></p>
                <h3>Stok:<?php echo $row['stok'];?></h3>
                <td>
              <div class="button">
                <a href="beli.php?namasepatu=<?php echo $row['namasepatu']; ?>" class="btn btn-info">Beli</a>
              
              </div>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
      </div>

<div class="popup" id="popup">
<div class="tombol">        
 
  </div>          
  <table class="table table-striped">
    <thead align="center">
      <tr>
        <th>No</th>
        <th>ID Pembelian</th>
        <th>ID Sepatu</th>
        <th>Merek Sepatu</th>
        <th>Deskripsi</th>
        <th>Harga Sepatu</th>
        <th>Jumlah Pembelian</th>
        <a href="#" class="close">&times;</a>
      </tr>
    </thead>
    <?php
    $sql = "SELECT * FROM beli order by idbeli asc";
    $query = mysqli_query($koneksi, $sql);
    $no=0;
    while ($data = mysqli_fetch_array($query)) {
        $no++;
    ?>
    <tbody align="center">
      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $data['idbeli'];?></td>
        <td><?php echo $data['idsepatu'];?></td>
        <td><?php echo $data['namasepatu'];?></td>
        <td><?php echo $data['deskripsi'];?></td>
        <td class="price">Rp.<?php echo number_format ($data['harga']);?></td>
        <td><?php echo $data['jumlah'];?></td>
      </tr>
    </tbody>
    <?php
        }
    ?>
  </table>
</div>
</body>
</html>
