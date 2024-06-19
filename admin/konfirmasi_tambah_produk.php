<?php
    session_start();
    include_once("../koneksi.php");

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

    $sql = "INSERT INTO produk (nama, deskripsi, harga, stok, id_kategori, rating, gambar) 
            VALUES ('$nama', '$deskripsi', '$harga', '$stok', '$kategori', '$rating', '$gambar')";
    
    mysqli_query($conn, $sql);

    header("Location: product.php");
?>