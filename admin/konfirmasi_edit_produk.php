<?php
    session_start();
    include_once("../koneksi.php");

    $id = $_SESSION['id_product'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];
    $rating = $_POST['rating'];
    $lokasi_gambar = $_FILES['gambar']['tmp_name'];
    $gambar = $_FILES['gambar']['name'];
    $direktori = "../public/images/" . $gambar;

    move_uploaded_file($lokasi_gambar, $direktori);
    if (!empty($gambar)) {
        $sql = "SELECT * FROM produk WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($query);
        $gambar = $data['gambar'];
        unlink("../public/images/" . $gambar);
    } else {
        $sql = "SELECT * FROM produk WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($query);
        $gambar = $data['gambar'];
    }

    $sql = "UPDATE produk SET nama = '$nama', deskripsi = '$deskripsi', harga = '$harga', stok = '$stok', gambar = '$gambar', rating = '$rating', id_kategori = '$kategori' WHERE id = '$id'";
    
    mysqli_query($conn, $sql);

    header("Location: product.php");
?>