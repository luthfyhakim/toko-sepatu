<?php 
	include("../koneksi.php");
	include("./template/header.php");

	$batas = 6;
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
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Catalog</span></p>
					<h1 class="mb-0 bread">Catalog Products</h1>
				</div>
			</div>
		</div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
						<?php
							$sql = "SELECT p.id, p.nama, p.harga, p.rating, p.gambar, k.nama_kategori
									FROM produk p
									INNER JOIN kategori k
									ON p.id_kategori = k.id
									LIMIT $posisi, $batas";
							
							$result = mysqli_query($conn, $sql);

							$no = 1;
							while($row = mysqli_fetch_row($result)) {
								$id = $row[0];
								$nama = $row[1];
								$harga = $row[2];
								$rating = $row[3];
								$gambar = $row[4];
								$kategori = $row[5];
						?>
						<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
							<div class="product d-flex flex-column">
								<a href="product-single.php?id=<?= $id; ?>" class="img-prod"><img class="img-fluid" src="../public/images/<?= $gambar; ?>" alt="Colorlib Template">
									<div class="overlay"></div>
								</a>
								<div class="text py-3 pb-4 px-3">
									<div class="d-flex">
										<div class="cat">
											<span><?= $kategori; ?></span>
										</div>
										<div class="rating">
											<p class="text-right mb-0">
												<?php
													for ($i = 1; $i <= $rating; $i++) {
												?>
													<a href="#"><span class="ion-ios-star"></span></a>
												<?php } ?>
												
												<?php if ($rating < 5 && $rating < 4) { ?>
													<a href="#"><span class="ion-ios-star-outline"></span></a>
													<a href="#"><span class="ion-ios-star-outline"></span></a>
												<?php } else if ($rating < 5) { ?>
													<a href="#"><span class="ion-ios-star-outline"></span></a>
												<?php } ?>
											</p>
										</div>
									</div>
									
									<h3><a href="#"><?= $nama; ?></a></h3>
									<div class="pricing">
										<p class="price"><span>Rp. <?= $harga; ?></span></p>
									</div>
									
									<p class="bottom-area d-flex px-3">
										<a href="product-single.php?id=<?= $id; ?>" class="buy-now text-center py-2">See product<span></span></a>
									</p>
								</div>
							</div>
						</div>
						
						<?php } ?>
		    		</div>
					
					<div class="row mt-5">
						<div class="col text-center">
							<div class="block-27">
								<ul>
									<?php
										$sql_p = "SELECT p.nama, p.harga, p.rating, p.gambar, k.nama_kategori
												FROM produk p
												INNER JOIN kategori k
												ON p.id_kategori = k.id";
								
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
												echo "<li><a href='catalog.php?halaman=$sebelum'>&lt;</a></li>";
											}

											for ($i = 1; $i <= $jmlh_halaman; $i++) {
												if ($i != $halaman) {
													echo "<li><a href='catalog.php?halaman=$i'>$i</a></li>";
												} else {
													echo "<li class='active'><a href=''>$i</a></li>";
												}
											}

											if ($halaman != $jmlh_halaman) {
												echo "<li><a href='catalog.php?halaman=$setelah'>&gt;</a></li>";
											}
										}
									?>
								</ul>
							</div>
						</div>
					</div>
		    	</div>

		    	<div class="col-md-4 col-lg-2">
		    		<div class="sidebar">
						<div class="sidebar-box-2">
							<h2 class="heading">Categories</h2>
							<div class="fancy-collapse-panel">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingOne">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Men's Shoes
												</a>
											</h4>
										</div>
									
										<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
											<div class="panel-body">
												<ul>
													<li><a href="#">Sport</a></li>
													<li><a href="#">Casual</a></li>
													<li><a href="#">Running</a></li>
													<li><a href="#">Jordan</a></li>
													<li><a href="#">Soccer</a></li>
													<li><a href="#">Football</a></li>
													<li><a href="#">Lifestyle</a></li>
												</ul>
											</div>
										</div>
									</div>
							
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingTwo">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Women's Shoes
												</a>
											</h4>
										</div>
										<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
											<div class="panel-body">
												<ul>
													<li><a href="#">Sport</a></li>
													<li><a href="#">Casual</a></li>
													<li><a href="#">Running</a></li>
													<li><a href="#">Jordan</a></li>
													<li><a href="#">Soccer</a></li>
													<li><a href="#">Football</a></li>
													<li><a href="#">Lifestyle</a></li>
												</ul>
											</div>
										</div>
									</div>
                     
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingThree">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Accessories
												</a>
											</h4>
										</div>
										<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
											<div class="panel-body">
												<ul>
													<li><a href="#">Jeans</a></li>
													<li><a href="#">T-Shirt</a></li>
													<li><a href="#">Jacket</a></li>
													<li><a href="#">Shoes</a></li>
												</ul>
											</div>
										</div>
									</div>
							
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingFour">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Clothing
												</a>
											</h4>
										</div>
										<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
											<div class="panel-body">
												<ul>
													<li><a href="#">Jeans</a></li>
													<li><a href="#">T-Shirt</a></li>
													<li><a href="#">Jacket</a></li>
													<li><a href="#">Shoes</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				
						<div class="sidebar-box-2">
							<h2 class="heading">Price Range</h2>
							<form method="post" class="colorlib-form-2">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="guests">Price from:</label>
											<div class="form-field">
												<i class="icon icon-arrow-down3"></i>
												<select name="people" id="people" class="form-control">
													<option value="#">1</option>
													<option value="#">200</option>
													<option value="#">300</option>
													<option value="#">400</option>
													<option value="#">1000</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="guests">Price to:</label>
											<div class="form-field">
												<i class="icon icon-arrow-down3"></i>
												<select name="people" id="people" class="form-control">
													<option value="#">2000</option>
													<option value="#">4000</option>
													<option value="#">6000</option>
													<option value="#">8000</option>
													<option value="#">10000</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
    			</div>
    		</div>
    	</div>
    </section>
		
	<!-- footer -->
    <?php include("./template/footer.php"); ?>
</body>
</html>