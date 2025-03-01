<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko_sepatu");

// Login
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $query = mysqli_query($koneksi, "SELECT * FROM user 
    WHERE username = '$username' AND password = '$password'");
    $cek = mysqli_num_rows($query);
    if ($cek > 0) {
        $ambildatarole = mysqli_fetch_array($query);
        $role = $ambildatarole['role'];
        if ($role == 'admin') {
            $_SESSION['log'] = 'Logged';
            $_SESSION['role'] = 'Admin';
            header('location:admin');
        } else {
            $_SESSION['log'] = 'Logged';
            $_SESSION['role'] = 'User';
            header('location:user');
        }
    } else {
        echo "Data tidak ditemukan";
    }
}

// Perintah tambah sepatu
if (isset($_POST['simpan'])) {
    $file_image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $namasepatu = $_POST['namasepatu'];
    $desc = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = mysqli_query($koneksi, "INSERT INTO sepatu 
    (image, namasepatu, deskripsi, harga, stok) 
    VALUES ('$file_image', '$namasepatu', '$desc', '$harga', '$stok')");
    
    move_uploaded_file($tmp_name, '../images/' . $file_image);
    if ($query) {
        header('location:../admin');
    } else {
        echo "Gagal Tambah Sepatu";
    }
}

// Perintah update sepatu
if (isset($_POST['update'])) {
    $idsepatu = $_POST['idsepatu'];
    $namasepatu = $_POST['namasepatu'];
    $desc = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $update = mysqli_query($koneksi, "UPDATE sepatu SET 
    namasepatu='$namasepatu', deskripsi='$desc', harga='$harga', stok='$stok' 
    WHERE idsepatu='$idsepatu'");

    if ($update) {
        header('location:../admin');
    } else {
        echo "Gagal Update";
    }
}

// Perintah beli sepatu
if (isset($_POST['beli'])) {
    $idsepatu = $_POST['idsepatu'];
    $namasepatu = $_POST['namasepatu'];
    $desc = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    $beli = mysqli_query($koneksi, "INSERT INTO beli 
    (idsepatu, namasepatu, deskripsi, harga, jumlah) 
    VALUES ('$idsepatu', '$namasepatu', '$desc', '$harga', '$jumlah')");

    if ($beli) {
        header('location:../user');
    } else {
        echo "Gagal Beli";
    }
}
?>
