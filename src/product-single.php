<?php 
	include("../koneksi.php");
	include("./template/header.php");

	if (!isset($_GET['id'])) {
		header("location: catalog.php");
	} else {
		$id = $_GET['id'];

		$sql = "SELECT p.nama, p.deskripsi, p.harga, p.stok, p.rating, p.gambar, k.nama_kategori
				FROM produk p
				INNER JOIN kategori k
				ON p.id_kategori = k.id
				WHERE p.id = $id";

		$result = mysqli_query($conn, $sql);

		while ($data = mysqli_fetch_row($result)) {
			$nama = $data[0];
			$deskripsi = $data[1];
			$harga = $data[2];
			$stok = $data[3];
			$rating = $data[4];
			$gambar = $data[5];
			$kategori = $data[6];
		}
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
					<h1 class="mb-0 bread">Product Details</h1>
				</div>
			</div>
		</div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-4 mb-5 ftco-animate">
    				<a href="../public/images/<?= $gambar; ?>" class="image-popup prod-img-bg"><img src="../public/images/<?= $gambar; ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			
				<div class="col-lg-8 product-details pl-md-5 ftco-animate">
    				<h3><?= $nama; ?></h3>
    				<div class="rating d-flex">
						<p class="text-left mr-4">
							<a href="#" class="mr-2"><?= $rating; ?>.0</a>
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
						
						<p class="text-left mr-4">
							<span style="color: #bbb;"><?= $kategori; ?></span></a>
						</p>
					</div>
    				
					<p class="price"><span>Rp. <?= $harga; ?></span></p>
    				<p><?= $deskripsi; ?></p>
					
					<div class="row mt-4">
						<div class="col-md-6">
							<div class="form-group d-flex">
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="" id="" class="form-control">
										<option value="">Small</option>
										<option value="">Medium</option>
										<option value="">Large</option>
										<option value="">Extra Large</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="w-100"></div>
						
						<div class="input-group col-md-4 d-flex mb-3">
							<span class="input-group-btn mr-2">
								<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
									<i class="ion-ios-remove"></i>
								</button>
							</span>
							<input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
							<span class="input-group-btn ml-2">
								<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
									<i class="ion-ios-add"></i>
								</button>
							</span>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<p style="color: #000;"><?= $stok; ?> piece available</p>
						</div>
					</div>
					<p><a href="catalog.php" class="btn btn-black py-3 px-5 mr-2">Back to Catalog</a><a href="catalog.php" class="btn btn-primary py-3 px-5">Buy now</a></p>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-md-12 nav-link-wrap">
					<div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>
						<a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Manufacturer</a>
						<a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>
					</div>
				</div>
				
				<div class="col-md-12 tab-wrap">
					<div class="tab-content bg-light" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
							<div class="p-4">
								<h3 class="mb-4"><?= $nama; ?></h3>
								<p><?= $deskripsi; ?></p>
							</div>
						</div>

						<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
							<div class="p-4">
								<h3 class="mb-4">Manufactured By Nike</h3>
								<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
							</div>
						</div>
			
						<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
							<div class="row p-4">
								<div class="col-md-7">
									<h3 class="mb-4">23 Reviews</h3>
									<div class="review">
										<div class="user-img" style="background-image: url(../public/images/person_1.jpg)"></div>
										<div class="desc">
											<h4>
												<span class="text-left">Jacob Webb</span>
												<span class="text-right">14 March 2018</span>
											</h4>
											<p class="star">
												<span>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
												</span>
												<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
											</p>
											<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										</div>
									</div>
										
									<div class="review">
										<div class="user-img" style="background-image: url(../public/images/person_2.jpg)"></div>
										<div class="desc">
											<h4>
												<span class="text-left">Jacob Webb</span>
												<span class="text-right">14 March 2018</span>
											</h4>
											<p class="star">
												<span>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
												</span>
												<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
											</p>
											<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										</div>
									</div>
							
									<div class="review">
										<div class="user-img" style="background-image: url(../public/images/person_3.jpg)"></div>
										<div class="desc">
											<h4>
												<span class="text-left">Jacob Webb</span>
												<span class="text-right">14 March 2018</span>
											</h4>
											<p class="star">
												<span>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
													<i class="ion-ios-star-outline"></i>
												</span>
												<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
											</p>
											<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										</div>
									</div>
								</div>
							
								<div class="col-md-4">
									<div class="rating-wrap">
										<h3 class="mb-4">Give a Review</h3>
										<p class="star">
											<span>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												(98%)
											</span>
											<span>20 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												(85%)
											</span>
											<span>10 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												(98%)
											</span>
											<span>5 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												(98%)
											</span>
											<span>0 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												<i class="ion-ios-star-outline"></i>
												(98%)
											</span>
											<span>0 Reviews</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
    <!-- footer -->
    <?php include("./template/footer.php"); ?>

	<script>
		$(document).ready(function() {

			var quantitiy = 0;
			
			$('.quantity-right-plus').click(function(e) {
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
				$('#quantity').val(quantity + 1);

				// Increment		        
		    });

			$('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
				// Increment
				if(quantity>0) {
		            $('#quantity').val(quantity - 1);
				}
		    });
		    
		});
	</script>
</body>
</html>