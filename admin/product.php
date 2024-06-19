<?php
    session_start();

    if (empty($_SESSION['id'])) {
        header("Location: index.php");
    }

    include_once("../koneksi.php");
    include_once("./partials/_head.php");

    $batas = 5;
	if (!isset($_GET['halaman'])) {
		$posisi = 0;
		$halaman = 1;
	} else {
		$halaman = $_GET['halaman'];
		$posisi = ($halaman - 1) * $batas;
	}

    if (isset($_GET['aksi'])) {
        $aksi = $_GET['aksi'];
        $id_d = $_GET['id'];

        if ($aksi == "hapus") {
            $sql_d = "SELECT * FROM produk WHERE id = '$id_d'";
            $query_d = mysqli_query($conn, $sql_d);
            $data = mysqli_fetch_array($query_d);
            $gambar_d = $data['gambar'];
            unlink("../public/images/" . $gambar_d);

            $sql_delete = "DELETE FROM produk WHERE id = '$id_d'";
            mysqli_query($conn, $sql_delete);
        }
    }
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
                                <li class="breadcrumb-item active" aria-current="page">Product</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">List Products</h4>
                                    <p class="card-description"> Add class <code>.table-hover</code></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="add_product.php" type="button" class="btn btn-inverse-success btn-fw my-3"> + Add </a>
                                        <form action="product.php" method="get" class="search-form">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="product" name="product" placeholder="Search Product">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                    <th>Kategori</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = "SELECT p.id, p.nama, p.harga, p.stok, k.nama_kategori 
                                                            FROM produk p
                                                            INNER JOIN kategori k
                                                            ON p.id_kategori = k.id";
                                                    
                                                    if (isset($_GET['product'])) {
                                                        $product = $_GET['product'];
                                                        $sql .= " WHERE p.nama LIKE '%$product%'";
                                                    }

                                                    $sql .= " ORDER BY p.nama LIMIT $posisi, $batas";

                                                    $result = mysqli_query($conn, $sql);

                                                    while ($row = mysqli_fetch_row($result)) {
                                                        $id = $row[0];
                                                        $nama = $row[1];
                                                        $harga = $row[2];
                                                        $stok = $row[3];
                                                        $kategori = $row[4];
                                                ?>
                                                <tr>
                                                    <td width="25%"><?= $nama; ?></td>
                                                    <td width="20%"><?= $harga; ?></td>
                                                    <td width="15%"><?= $stok; ?></td>
                                                    <td width="20%"><?= $kategori; ?></td>
                                                    <td width="20%">
                                                        <a href="edit_product.php?id=<?= $id; ?>" type="button" class="btn btn-inverse-info">Edit</a>
                                                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $nama; ?>?')) window.location.href = 'product.php?aksi=hapus&id=<?= $id; ?>'" type="button" class="btn btn-inverse-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex flex-row-reverse mt-2">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <?php
                                                    $sql_p = "SELECT p.id, p.nama, p.harga, p.stok, k.nama_kategori 
                                                              FROM produk p
                                                              INNER JOIN kategori k
                                                              ON p.id_kategori = k.id";
                                            
                                                    if (isset($_GET['product'])) {
                                                        $product = $_GET['product'];
                                                        $sql_p .= " WHERE p.nama LIKE '%$product%'";
                                                    }

                                                    $sql_p .= " ORDER BY p.nama";

                                                    $query = mysqli_query($conn, $sql_p);
                                                    $jmlh_data = mysqli_num_rows($query);
                                                    $jmlh_halaman = ceil($jmlh_data / $batas);

                                                    if ($jmlh_data == 0) {

                                                    } else if ($jmlh_data == 1) {
                                                        echo "
                                                            <li class='page-item disabled'>
                                                                <a class='page-link' href='' aria-label='Previous'>
                                                                    <span aria-hidden='true'>&laquo;</span>
                                                                </a>
                                                            </li>
                                                            <li class='page-item active'><a class='page-link' href=''>1</a></li>
                                                            <li class='page-item disabled'>
                                                                <a class='page-link' href='' aria-label='Next'>
                                                                    <span aria-hidden='true'>&raquo;</span>
                                                                </a>
                                                            </li>
                                                        ";
                                                    } else {
                                                        $sebelum = $halaman - 1;
                                                        $setelah = $halaman + 1;

                                                        if (isset($_GET['product'])) {
                                                            $product = $_GET['product'];

                                                            if ($halaman != 1) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='product.php?product=$product&halaman=$sebelum' aria-label='Previous'>
                                                                            <span aria-hidden='true'>&laquo;</span>
                                                                        </a>
                                                                    </li>
                                                                ";
                                                            }

                                                            for ($i = 1; $i <= $jmlh_halaman; $i++) {
                                                                if ($i != $halaman) {
                                                                    echo "<li class='page-item'><a class='page-link' href='product.php?product=$product&halaman=$i'>$i</a></li>";
                                                                } else {
                                                                    echo "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                                                                }
                                                            }

                                                            if ($halaman != $jmlh_halaman) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='product.php?product=$producthalaman=$setelah' aria-label='Next'>
                                                                            <span aria-hidden='true'>&raquo;</span>
                                                                        </a>
                                                                    </li>
                                                                ";
                                                            }
                                                        } else {
                                                            if ($halaman != 1) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='product.php?halaman=$sebelum' aria-label='Previous'>
                                                                            <span aria-hidden='true'>&laquo;</span>
                                                                        </a>
                                                                    </li>
                                                                ";
                                                            }

                                                            for ($i = 1; $i <= $jmlh_halaman; $i++) {
                                                                if ($i != $halaman) {
                                                                    echo "<li class='page-item'><a class='page-link' href='product.php?halaman=$i'>$i</a></li>";
                                                                } else {
                                                                    echo "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                                                                }
                                                            }

                                                            if ($halaman != $jmlh_halaman) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='product.php?halaman=$setelah' aria-label='Next'>
                                                                            <span aria-hidden='true'>&raquo;</span>
                                                                        </a>
                                                                    </li>
                                                                ";
                                                            }
                                                        }
                                                    }

                                                    // for ($i = 1; $i <= $jmlh_halaman; $i++) {
                                                    //     if ($i > $halaman - 5 and $i < $halaman + 5) {
                                                    //         if ($i != $halaman) {
                                                    //             echo "<li class='page-item'><a class='page-link' href='product.php?product=$product&halaman=$i'>$i</a></li>";
                                                    //         } else {
                                                    //             echo "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                                                    //         }
                                                    //     }
                                                    // }
                                                ?>
                                            </ul>
                                        </nav>
                                    </div>
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