<?php
require '../function.php';

// Proses Upload dan Simpan Data ke Database
if (isset($_POST['simpan'])) {
    $namasepatu = $_POST['namasepatu'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Proses Upload Gambar
    $image = $_FILES['image']['name'];
    $target_dir = "../images/"; // Folder tujuan penyimpanan gambar
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;

    // Validasi Ekstensi File
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!in_array($file_type, $allowed_types)) {
        echo "Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Pindahkan File ke Folder dan Simpan ke Database
    if ($uploadOk) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Simpan data ke database
            $sql = "INSERT INTO sepatu (namasepatu, deskripsi, harga, stok, image) 
                    VALUES ('$namasepatu', '$deskripsi', '$harga', '$stok', '$image')";
            $query = mysqli_query($koneksi, $sql);

            if ($query) {
                echo "Data berhasil ditambahkan!";
                header("Location: admin.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        } else {
            echo "Gagal mengupload gambar.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Harga Sepatu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
    <h2 align="center" style="margin-top:5%">Daftar Sepatu</h2>
    <div class="tombol">
        <button class="logout"><a href="../index.php">Log Out</a></button>
        <button class="tambah"><a href="#popup">Tambah</a></button>
    </div>

    <table class="table table-striped">
        <thead align="center">
            <tr>
                <th>No</th>
                <th>Gambar Sepatu</th>
                <th>Nama Sepatu</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        // Menampilkan Data Sepatu
        $sql = "SELECT * FROM sepatu ORDER BY idsepatu DESC";
        $query = mysqli_query($koneksi, $sql);
        $no = 0;
        while ($data = mysqli_fetch_array($query)) {
            $no++;
        ?>
        <tbody align="center">
            <tr>
                <td><?php echo $no; ?></td>
                <td><img style="width:100px" src="../images/<?php echo htmlspecialchars($data['image']); ?>" alt="Gambar Sepatu"></td>
                <td><?php echo $data['namasepatu']; ?></td>
                <td><?php echo $data['deskripsi']; ?></td>
                <td>Rp.<?php echo number_format($data['harga']); ?></td>
                <td><?php echo $data['stok']; ?></td>
                <td style="width:100px;">
                    <a href="edit.php?namasepatu=<?php echo urlencode($data['namasepatu']); ?>" class="btn btn-info">Edit</a>
                    <a href="hapus.php?namasepatu=<?php echo urlencode($data['namasepatu']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a>
                </td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
</div>

<!-- Popup Form Tambah Data -->
<div class="popup" id="popup">
    <form class="form-group" method="post" enctype="multipart/form-data">
        <div class="h4">
            <h4 align="center">Tambah Sepatu</h4>
        </div>
        <div class="file">
            <input type="file" name="image" required>
        </div>
        <div align="center" class="input">
            <input type="text" name="namasepatu" placeholder="Nama Sepatu" required>
        </div>
        <div align="center" class="input">
            <input type="text" name="deskripsi" placeholder="Deskripsi" required>
        </div>
        <div align="center" class="input">
            <input type="number" name="harga" placeholder="Harga" required>
        </div>
        <div align="center" class="input">
            <input type="number" name="stok" placeholder="Stok" required>
        </div>
        <br>
        <div align="center" class="simpan">
            <input type="submit" name="simpan" value="Simpan" class="submit">
            <input type="reset" name="batal" value="Batal" class="batal">
            <a href="#" class="close">&times;</a>
        </div>
    </form>
</div>
</body>
</html>
