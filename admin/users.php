<?php
    session_start();

    if (empty($_SESSION['id'])) {
        header("Location: index.php");
    }

    if ($_SESSION['level'] != "admin" && $_SESSION['level'] != "owner") {
        header("Location: home.php");
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
                        <h3 class="page-title"> Users </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">List Users</h4>
                                    <p class="card-description"> List Data <code>User</code></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="add_user.php" type="button" class="btn btn-inverse-success btn-fw my-3"> + Add </a>
                                        <form action="users.php" method="get" class="search-form">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="user" name="user" placeholder="Search User">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Username</th>
                                                    <th>Level</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = "SELECT * FROM user";
                                                    
                                                    if (isset($_GET['user'])) {
                                                        $user = $_GET['user'];
                                                        $sql .= " WHERE nama LIKE '%$user%'";
                                                    }

                                                    $sql .= " ORDER BY id ASC LIMIT $posisi, $batas";

                                                    $result = mysqli_query($conn, $sql);

                                                    while ($data = mysqli_fetch_array($result)) {
                                                        $id = $data['id'];
                                                        $nama = $data['nama'];
                                                        $email = $data['email'];
                                                        $username = $data['username'];
                                                        $level = $data['level'];
                                                ?>
                                                <tr>
                                                    <td width="10%"><?= $id; ?></td>
                                                    <td width="20%"><?= $nama; ?></td>
                                                    <td width="25%"><?= $email; ?></td>
                                                    <td width="20%"><?= $username; ?></td>
                                                    <td width="15%"><?= $level; ?></td>
                                                    <td width="25%">
                                                        <a href="edit_user.php?id=<?= $id; ?>" type="button" class="btn btn-inverse-info">Edit</a>
                                                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $nama; ?>?')) window.location.href = 'user.php?aksi=hapus&id=<?= $id; ?>'" type="button" class="btn btn-inverse-danger">Delete</a>
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
                                                    $sql_p = "SELECT * FROM user";
                                            
                                                    if (isset($_GET['user'])) {
                                                        $user = $_GET['user'];
                                                        $sql .= " WHERE nama LIKE '%$user%'";
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

                                                        if (isset($_GET['user'])) {
                                                            $user = $_GET['user'];

                                                            if ($halaman != 1) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='user.php?user=$user&halaman=$sebelum' aria-label='Previous'>
                                                                            <span aria-hidden='true'>&laquo;</span>
                                                                        </a>
                                                                    </li>
                                                                ";
                                                            }

                                                            for ($i = 1; $i <= $jmlh_halaman; $i++) {
                                                                if ($i != $halaman) {
                                                                    echo "<li class='page-item'><a class='page-link' href='user.php?user=$user&halaman=$i'>$i</a></li>";
                                                                } else {
                                                                    echo "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                                                                }
                                                            }

                                                            if ($halaman != $jmlh_halaman) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='user.php?user=$user&halaman=$setelah' aria-label='Next'>
                                                                            <span aria-hidden='true'>&raquo;</span>
                                                                        </a>
                                                                    </li>
                                                                ";
                                                            }
                                                        } else {
                                                            if ($halaman != 1) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='user.php?halaman=$sebelum' aria-label='Previous'>
                                                                            <span aria-hidden='true'>&laquo;</span>
                                                                        </a>
                                                                    </li>
                                                                ";
                                                            }

                                                            for ($i = 1; $i <= $jmlh_halaman; $i++) {
                                                                if ($i != $halaman) {
                                                                    echo "<li class='page-item'><a class='page-link' href='user.php?halaman=$i'>$i</a></li>";
                                                                } else {
                                                                    echo "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                                                                }
                                                            }

                                                            if ($halaman != $jmlh_halaman) {
                                                                echo "
                                                                    <li class='page-item'>
                                                                        <a class='page-link' href='user.php?halaman=$setelah' aria-label='Next'>
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