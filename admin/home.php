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
                        <h3 class="page-title"> Dashboard </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>

                    <!-- banner info -->
                    <?php include_once("./partials/_banner_info.php"); ?>
                    
                    <!-- card -->
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <h3 class="mb-0">Produk</h3>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        $sql_p = "SELECT count(id) as jumlah FROM produk";
                                        $query_p = mysqli_query($conn, $sql_p);
                                        $data_p = mysqli_fetch_assoc($query_p);
                                    ?>
                                    <h6 class="text-muted text-center font-weight-normal mt-2">Jumlah [<?= $data_p['jumlah'] ?>]</h6>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <h3 class="mb-0">Kategori</h3>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        $sql_k = "SELECT count(id) as jumlah FROM kategori";
                                        $query_k = mysqli_query($conn, $sql_k);
                                        $data_k = mysqli_fetch_assoc($query_k);
                                    ?>
                                    <h6 class="text-muted text-center font-weight-normal mt-2">Jumlah [<?= $data_k['jumlah'] ?>]</h6>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <h3 class="mb-0">Blog</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $sql_b = "SELECT count(id) as jumlah FROM blog";
                                        $query_b = mysqli_query($conn, $sql_b);
                                        $data_b = mysqli_fetch_assoc($query_b);
                                    ?>
                                    <h6 class="text-muted text-center font-weight-normal mt-2">Jumlah [<?= $data_b['jumlah'] ?>]</h6>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <h3 class="mb-0">User</h3>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        $sql_u = "SELECT count(id) as jumlah FROM user";
                                        $query_u = mysqli_query($conn, $sql_u);
                                        $data_u = mysqli_fetch_assoc($query_u);
                                    ?>
                                    <h6 class="text-muted text-center font-weight-normal mt-2">Jumlah [<?= $data_u['jumlah'] ?>]</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-3">List Produk</h4>
                                    </div>
                                    
                                    <div class="row">
                                        <?php
                                            $sql_produk = "SELECT p.nama, p.harga, p.stok, k.nama_kategori
                                                           FROM produk p
                                                           INNER JOIN kategori k 
                                                           ON p.id = k.id 
                                                           ORDER BY p.nama ASC
                                                           LIMIT 4";
                                            
                                            $query_produk = mysqli_query($conn, $sql_produk);

                                            while ($data_produk = mysqli_fetch_row($query_produk)) {
                                                $nama = $data_produk[0];
                                                $harga = $data_produk[1];
                                                $stok = $data_produk[2];
                                                $kategori = $data_produk[3];
                                        ?>
                                        
                                        <div class="col-12">
                                            <div class="preview-list">
                                                <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-success">
                                                            <i class="mdi mdi-tag"></i>
                                                        </div>
                                                    </div>
                                                        
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject"><?= $nama; ?></h6>
                                                            <p class="text-muted mb-0"><?= $kategori; ?></p>
                                                        </div>
                                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                            <p class="text-muted">Stok : <?= $stok ?></p>
                                                            <p class="text-muted mb-0">Rp. <?= $harga ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row ">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Order Status</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </th>
                                                    <th> Client Name </th>
                                                    <th> Order No </th>
                                                    <th> Product Cost </th>
                                                    <th> Project </th>
                                                    <th> Payment Mode </th>
                                                    <th> Start Date </th>
                                                    <th> Payment Status </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="assets/images/faces/face1.jpg" alt="image" />
                                                        <span class="pl-2">Henry Klein</span>
                                                    </td>
                                                    <td> 02312 </td>
                                                    <td> $14,500 </td>
                                                    <td> Dashboard </td>
                                                    <td> Credit card </td>
                                                    <td> 04 Dec 2019 </td>
                                                    <td>
                                                    <div class="badge badge-outline-success">Approved</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <div class="form-check form-check-muted m-0">
                                                        <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                        </label>
                                                    </div>
                                                    </td>
                                                    <td>
                                                    <img src="assets/images/faces/face2.jpg" alt="image" />
                                                    <span class="pl-2">Estella Bryan</span>
                                                    </td>
                                                    <td> 02312 </td>
                                                    <td> $14,500 </td>
                                                    <td> Website </td>
                                                    <td> Cash on delivered </td>
                                                    <td> 04 Dec 2019 </td>
                                                    <td>
                                                    <div class="badge badge-outline-warning">Pending</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <div class="form-check form-check-muted m-0">
                                                        <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                        </label>
                                                    </div>
                                                    </td>
                                                    <td>
                                                    <img src="assets/images/faces/face5.jpg" alt="image" />
                                                    <span class="pl-2">Lucy Abbott</span>
                                                    </td>
                                                    <td> 02312 </td>
                                                    <td> $14,500 </td>
                                                    <td> App design </td>
                                                    <td> Credit card </td>
                                                    <td> 04 Dec 2019 </td>
                                                    <td>
                                                    <div class="badge badge-outline-danger">Rejected</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="assets/images/faces/face3.jpg" alt="image" />
                                                        <span class="pl-2">Peter Gill</span>
                                                    </td>
                                                    <td> 02312 </td>
                                                    <td> $14,500 </td>
                                                    <td> Development </td>
                                                    <td> Online Payment </td>
                                                    <td> 04 Dec 2019 </td>
                                                    <td>
                                                        <div class="badge badge-outline-success">Approved</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-muted m-0">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="assets/images/faces/face4.jpg" alt="image" />
                                                        <span class="pl-2">Sallie Reyes</span>
                                                    </td>
                                                    <td> 02312 </td>
                                                    <td> $14,500 </td>
                                                    <td> Website </td>
                                                    <td> Credit card </td>
                                                    <td> 04 Dec 2019 </td>
                                                    <td>
                                                        <div class="badge badge-outline-success">Approved</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Visitors by Countries</h4>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <i class="flag-icon flag-icon-us"></i>
                                                            </td>
                                                            <td>USA</td>
                                                            <td class="text-right"> 1500 </td>
                                                            <td class="text-right font-weight-medium"> 56.35% </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <i class="flag-icon flag-icon-de"></i>
                                                            </td>
                                                            <td>Germany</td>
                                                            <td class="text-right"> 800 </td>
                                                            <td class="text-right font-weight-medium"> 33.25% </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <i class="flag-icon flag-icon-au"></i>
                                                            </td>
                                                            <td>Australia</td>
                                                            <td class="text-right"> 760 </td>
                                                            <td class="text-right font-weight-medium"> 15.45% </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <i class="flag-icon flag-icon-gb"></i>
                                                            </td>
                                                            <td>United Kingdom</td>
                                                            <td class="text-right"> 450 </td>
                                                            <td class="text-right font-weight-medium"> 25.00% </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <i class="flag-icon flag-icon-ro"></i>
                                                            </td>
                                                            <td>Romania</td>
                                                            <td class="text-right"> 620 </td>
                                                            <td class="text-right font-weight-medium"> 10.25% </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <i class="flag-icon flag-icon-br"></i>
                                                            </td>
                                                            <td>Brasil</td>
                                                            <td class="text-right"> 230 </td>
                                                            <td class="text-right font-weight-medium"> 75.00% </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-7">
                                            <div id="audience-map" class="vector-map"></div>
                                        </div>
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