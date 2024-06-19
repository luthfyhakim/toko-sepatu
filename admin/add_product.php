<?php
    session_start();

    if (empty($_SESSION['id'])) {
        header("Location: index.php");
    }

    include_once("../koneksi.php");
    include_once("./partials/_head.php");
?>

<body>
    <div class="container-scroller">
        <!-- partial: _sidebar.php -->
        <?php include_once("./partials/_sidebar.php"); ?>
      
        <div class="container-fluid page-body-wrapper">
            <!-- partial: _navbar.php -->
            <?php include_once("./partials/_navbar.php"); ?>
        
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Product </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="product.php">Product</a></li>
                                <li class="breadcrumb-item"><a href="product.php">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Product</h4>
                                    <p class="card-description"> Fill form below </p>
                                    <form class="forms-sample" action="konfirmasi_tambah_produk.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Produk" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Produk" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok Produk" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <select class="form-control" id="kategori" name="kategori" required>
                                                <?php
                                                    $sql = "SELECT id, nama_kategori FROM kategori";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="<?= $row['id']; ?>"><?= $row['nama_kategori']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="rating">Rating</label>
                                            <select class="form-control" id="rating" name="rating" required>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Gambar</label>
                                            <input type="file" name="gambar" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <a href="product.php" class="btn btn-dark">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
                <!-- footer -->
                <?php include_once("./partials/_footer.php") ?>
            </div>
        </div>
    </div>

   <!-- script -->
   <?php include_once("./partials/_script.php"); ?>
</body>
</html>