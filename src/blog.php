<?php 
	include("../koneksi.php");
	include("./template/header.php");

	$batas = 5;
	if (!isset($_GET['halaman'])) {
		$posisi = 0;
		$halaman = 1;
	} else {
		$halaman = $_GET['halaman'];
		$posisi = ($halaman - 1) * $batas;
	}
?>

<body class="goto-here">
	<!-- banner info -->
	<?php include("./template/banner_info.php") ?>
    
	<!-- navbar -->
	<?php include("./template/navbar.php") ?>

    <div class="hero-wrap hero-bread" style="background-image: url('../public/images/bg_6.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blog</span></p>
					<h1 class="mb-0 bread">Blog</h1>
				</div>
			</div>
		</div>
    </div>

    <section class="ftco-section ftco-degree-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-lg-last ftco-animate">
					<div class="row">
						<?php
							$sql = "SELECT b.id, b.judul, b.isi, b.gambar, DATE_FORMAT(b.tanggal, '%d-%m-%Y'), u.nama
									FROM blog b
									INNER JOIN user u
									ON b.id_user = u.id
									ORDER BY b.id
									LIMIT $posisi, $batas";
							
							$result = mysqli_query($conn, $sql);

							while ($row = mysqli_fetch_row($result)) {
								$id = $row[0];
								$judul = $row[1];
								$isi = $row[2];
								$gambar = $row[3];
								$tanggal = $row[4];
								$nama = $row[5];
						?>
						<div class="col-md-12 d-flex ftco-animate">
							<div class="blog-entry align-self-stretch d-md-flex">
								<a href="blog-single.php" class="block-20" style="background-image: url('../public/images/<?= $gambar; ?>');"></a>
								<div class="text d-block pl-md-4">
									<div class="meta mb-3">
										<div><a href="#"><?= $tanggal; ?></a></div>
										<div><a href="#"><?= $nama; ?></a></div>
										<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
									</div>
									<h3 class="heading"><a href="blog-single.php?id=<?= $id; ?>"><?= $judul; ?></a></h3>
									<p><?= $judul; ?>.</p>
									<p><a href="blog-single.php?id=<?= $id; ?>" class="btn btn-primary py-2 px-3">Read more</a></p>
								</div>
							</div>
						</div>
						
						<?php } ?>
					</div>
					
					<div class="row mt-2">
						<div class="col">
							<div class="block-27">
								<ul>
									<?php
										$sql_p = "SELECT b.id, b.judul, b.isi, b.gambar, DATE_FORMAT(b.tanggal, '%d-%m-%Y'), u.nama 
												  FROM blog b
												  INNER JOIN user u
												  ON b.id_user = u.id";
								
										$query = mysqli_query($conn, $sql_p);
										$jmlh_data = mysqli_num_rows($query);
										$jmlh_halaman = ceil($jmlh_data / $batas);

										if ($jmlh_halaman == 0) {

										} else if ($jmlh_halaman == 1) {
											echo "<li><a href=''>&lt;</a></li>";
											echo "<li class='active'><span>1</span></li>";
											echo "<li><a href=''>&gt;</a></li>";
										} else {
											$sebelum = $halaman - 1;
											$setelah = $halaman + 1;

											if ($halaman != 1) {
												echo "<li><a href='blog.php?halaman=$sebelum'>&lt;</a></li>";
											}

											for ($i = 1; $i <= $jmlh_halaman; $i++) {
												if ($i != $halaman) {
													echo "<li><a href='blog.php?halaman=$i'>$i</a></li>";
												} else {
													echo "<li class='active'><a href=''>$i</a></li>";
												}
											}

											if ($halaman != $jmlh_halaman) {
												echo "<li><a href='blog.php?halaman=$setelah'>&gt;</a></li>";
											}
										}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
          
				<div class="col-lg-4 sidebar ftco-animate">
					<div class="sidebar-box">
						<form action="#" class="search-form">
							<div class="form-group">
								<span class="icon ion-ios-search"></span>
								<input type="text" class="form-control" placeholder="Type a keyword and hit enter">
							</div>
						</form>
					</div>
            
					<div class="sidebar-box ftco-animate">
						<h3 class="heading">Categories</h3>
						<ul class="categories">
						<?php
							$sql = "SELECT nama_kategori, count(nama_sub_kategori) as jumlah 
									FROM kategori
									INNER JOIN sub_kategori
									ON kategori.id = sub_kategori.id_kategori
									GROUP BY nama_kategori
									ORDER BY nama_kategori ASC";
							
							$result = mysqli_query($conn, $sql);

							while ($data = mysqli_fetch_row($result)) {
								$nama = $data[0];
								$jumlah = $data[1];
						?>
                                <li><a href="#"><?= $nama; ?> <span>(<?= $jumlah; ?>)</span></a></li>
                            <?php } ?>
						</ul>
					</div>

					<div class="sidebar-box ftco-animate">
						<h3 class="heading">Recent Blog</h3>
						<?php
                            $sql = "SELECT b.id, b.judul, b.gambar, DATE_FORMAT(b.tanggal, '%d-%m-%Y'), u.nama
                                    FROM blog b
                                    INNER JOIN user u
                                    ON b.id_user = u.id
                                    ORDER BY b.tanggal ASC
                                    LIMIT 3";
                            
                            $result = mysqli_query($conn, $sql);

                            while ($data = mysqli_fetch_row($result)) {
                                $id = $data[0];
                                $judul = $data[1];
                                $gambar = $data[2];
                                $tanggal = $data[3];
                                $nama = $data[4];
                        ?>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(../public/images/<?= $gambar; ?>);"></a>
                            <div class="text">
                                <h3 class="heading-1"><a href="blog-single.php?id=<?= $id; ?>"><?= $judul; ?></a></h3>
                                <div class="meta">
                                    <div><a href=""><span class="icon-calendar"></span> <?= $tanggal; ?></a></div>
                                    <div><a href=""><span class="icon-person"></span> <?= $nama; ?></a></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
					</div>

					<div class="sidebar-box ftco-animate">
						<h3 class="heading">Tag Cloud</h3>
						<div class="tagcloud">
							<a href="#" class="tag-cloud-link">shop</a>
							<a href="#" class="tag-cloud-link">products</a>
							<a href="#" class="tag-cloud-link">shirt</a>
							<a href="#" class="tag-cloud-link">jeans</a>
							<a href="#" class="tag-cloud-link">shoes</a>
							<a href="#" class="tag-cloud-link">dress</a>
							<a href="#" class="tag-cloud-link">coats</a>
							<a href="#" class="tag-cloud-link">jumpsuits</a>
						</div>
					</div>

					<div class="sidebar-box ftco-animate">
						<h3 class="heading">Paragraph</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
					</div>
				</div>
			</div>
		</div>
    </section>

    <!-- footer -->
    <?php include("./template/footer.php"); ?>
</body>
</html>