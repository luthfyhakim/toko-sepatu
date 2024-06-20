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
                        <h3 class="page-title"> Category </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="product.php">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Category</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">List Categories</h4>
                                    <p class="card-description"> List Data <code>Category</code></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="add_category.php" type="button" class="btn btn-inverse-success btn-fw my-3"> + Add </a>
                                        <form action="category.php" method="get" class="search-form">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="category" name="category" placeholder="Search Category">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama Kategori</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = "SELECT id, nama_kategori FROM kategori";
                                                    
                                                    if (isset($_GET['category'])) {
                                                        $category = $_GET['category'];
                                                        $sql .= " WHERE nama_kategori LIKE '%$category%'";
                                                    }

                                                    $sql .= " ORDER BY id ASC LIMIT $posisi, $batas";

                                                    $result = mysqli_query($conn, $sql);

                                                    while ($row = mysqli_fetch_row($result)) {
                                                        $id = $row[0];
                                                        $kategori = $row[1];
                                                ?>
                                                <tr>
                                                    <td width="20%"><?= $id; ?></td>
                                                    <td width="35%"><?= $kategori; ?></td>
                                                    <td width="15%">
                                                        <a href="edit_category.php?id=<?= $id; ?>" type="button" class="btn btn-inverse-info">Edit</a>
                                                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $nama; ?>?')) window.location.href = 'category.php?aksi=hapus&id=<?= $id; ?>'" type="button" class="btn btn-inverse-danger">Delete</a>
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
                                                    $sql_p = "SELECT id, nama_kategori FROM kategori";
                                            
                                                    if (isset($_GET['category'])) {
                                                        $category = $_GET['category'];
                                                        $sql_p .= " WHERE p.nama LIKE '%$category%'";
                                                    }

                                                    $sql_p .= " ORDER BY id ASC";

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

                                                        if (isset($_GET['category'])) {
                                                            $category = $_GET['category'];

                                                            if ($halaman != 1) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='category.php?category=$category&halaman=$sebelum' aria-label='Previous'>
                                                                            <span aria-hidden='true'>&laquo;</span>
                                                                        </a>
                                                                    </li>
                                                                ";
                                                            }

                                                            for ($i = 1; $i <= $jmlh_halaman; $i++) {
                                                                if ($i != $halaman) {
                                                                    echo "<li class='page-item'><a class='page-link' href='category.php?category=$category&halaman=$i'>$i</a></li>";
                                                                } else {
                                                                    echo "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                                                                }
                                                            }

                                                            if ($halaman != $jmlh_halaman) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='category.php?category=$category&halaman=$setelah' aria-label='Next'>
                                                                            <span aria-hidden='true'>&raquo;</span>
                                                                        </a>
                                                                    </li>
                                                                ";
                                                            }
                                                        } else {
                                                            if ($halaman != 1) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='category.php?halaman=$sebelum' aria-label='Previous'>
                                                                            <span aria-hidden='true'>&laquo;</span>
                                                                        </a>
                                                                    </li>
                                                                ";
                                                            }

                                                            for ($i = 1; $i <= $jmlh_halaman; $i++) {
                                                                if ($i != $halaman) {
                                                                    echo "<li class='page-item'><a class='page-link' href='category.php?halaman=$i'>$i</a></li>";
                                                                } else {
                                                                    echo "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                                                                }
                                                            }

                                                            if ($halaman != $jmlh_halaman) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='category.php?halaman=$setelah' aria-label='Next'>
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