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
                        <h3 class="page-title"> Blog </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
                            </ol>
                        </nav>
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