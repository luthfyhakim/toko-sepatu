<?php 
	include("../koneksi.php");
	include("./template/header.php");
?>
  
<body class="goto-here">
	<!-- banner info -->
	<?php include("./template/banner_info.php") ?>
    
	<!-- navbar -->
	<?php include("./template/navbar.php") ?>

    <section id="home-section" class="hero">
		<div class="home-slider owl-carousel">
	      	<div class="slider-item js-fullheight">
	      		<div class="overlay">
					<div class="container-fluid p-0">
	          			<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          				<img class="one-third order-md-last img-fluid" src="../public/images/bg_1.png" alt="">
							<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
								<div class="text">
									<span class="subheading">#New Arrival</span>
									<div class="horizontal">
										<h1 class="mb-4 mt-3">Shoes Collection 2019</h1>
										<p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>
				            
										<p><a href="catalog.php" class="btn-custom">Discover Now</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item js-fullheight">
				<div class="overlay">
					<div class="container-fluid p-0">
						<div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
							<img class="one-third order-md-last img-fluid" src="../public/images/bg_2.png" alt="">
							<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
								<div class="text">
									<span class="subheading">#New Arrival</span>
									<div class="horizontal">
										<h1 class="mb-4 mt-3">New Shoes Winter Collection</h1>
										<p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>
										
										<p><a href="catalog.php" class="btn-custom">Discover Now</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
    </section>

    <!-- services -->
	<?php include("./template/services.php") ?>

    <section class="ftco-section bg-light">
    	<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 class="mb-4">New Shoes Arrival</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>	
    	</div>
    	
		<div class="container">
    		<div class="row">
				<?php
					$sql = "SELECT p.id, p.nama, p.harga, p.rating, p.gambar, k.nama_kategori
							FROM produk p
							INNER JOIN kategori k
							ON p.id_kategori = k.id
							ORDER BY RAND() LIMIT 4";
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
    			<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="product-single.php?id=<?= $id; ?>" class="img-prod">
							<img class="img-fluid" src="../public/images/<?= $gambar; ?>" alt="Colorlib Template">
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
    							<a href="product-single.php?id=<?= $id; ?>" class="buy-now text-center py-2">See Product<span></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
				
				<?php $no++; } ?>
    			
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
    	<div class="container py-5">
			<div class="row no-gutters">
				<div class="col-lg-4">
					<div class="choose-wrap divider-one img p-5 d-flex align-items-end" style="background-image: url(../public/images/choose-1.jpg);">
						<div class="text text-center text-white px-2">
							<span class="subheading">Men's Shoes</span>
							<h2>Men's Collection</h2>
							<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
							<p><a href="#" class="btn btn-black px-3 py-2">Shop now</a></p>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
    				<div class="row no-gutters choose-wrap divider-two align-items-stretch">
    					<div class="col-md-12">
	    					<div class="choose-wrap full-wrap img align-self-stretch d-flex align-item-center justify-content-end" style="background-image: url(../public/images/choose-2.jpg);">
	    						<div class="col-md-7 d-flex align-items-center">
	    							<div class="text text-white px-5">
	    								<span class="subheading">Women's Shoes</span>
			    						<h2>Women's Collection</h2>
			    						<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
			    						<p><a href="#" class="btn btn-black px-3 py-2">Shop now</a></p>
			    					</div>
	    						</div>
	    					</div>
	    				</div>
    					<div class="col-md-12">
    						<div class="row no-gutters">
    							<div class="col-md-6">
		    						<div class="choose-wrap wrap img align-self-stretch bg-light d-flex align-items-center">
		    							<div class="text text-center px-5">
		    								<span class="subheading">Summer Sale</span>
				    						<h2>Extra 50% Off</h2>
				    						<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				    						<p><a href="#" class="btn btn-black px-3 py-2">Shop now</a></p>
				    					</div>
		    						</div>
	    						</div>
	    						<div class="col-md-6">
		    						<div class="choose-wrap wrap img align-self-stretch d-flex align-items-center" style="background-image: url(../public/images/choose-3.jpg);">
		    							<div class="text text-center text-white px-5">
		    								<span class="subheading">Shoes</span>
				    						<h2>Best Sellers</h2>
				    						<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				    						<p><a href="#" class="btn btn-black px-3 py-2">Shop now</a></p>
				    					</div>
		    						</div>
	    						</div>
	    					</div>
    					</div>
    				</div>
    			</div>
  			</div>
    	</div>
    </section>

    <section class="ftco-section ftco-deal bg-primary">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6">
    				<img src="../public/images/prod-1.png" class="img-fluid" alt="">
    			</div>
    			
				<div class="col-md-6">
    				<div class="heading-section heading-section-white">
    					<span class="subheading">Deal of the month</span>
						<h2 class="mb-3">Deal of the month</h2>
					</div>
    				
					<div id="timer" class="d-flex mb-4">
						<div class="time" id="days"></div>
						<div class="time pl-4" id="hours"></div>
						<div class="time pl-4" id="minutes"></div>
						<div class="time pl-4" id="seconds"></div>
					</div>
					<div class="text-deal">
						<h2><a href="#">Nike Free RN 2019 iD</a></h2>
						<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
						<ul class="thumb-deal d-flex mt-4">
							<li class="img" style="background-image: url(../public/images/product-6.png);"></li>
							<li class="img" style="background-image: url(../public/images/product-2.png);"></li>
							<li class="img" style="background-image: url(../public/images/product-4.png);"></li>
						</ul>
					</div>
    			</div>
    		</div>
    	</div>
    </section>

    <!-- testimoni -->
    <?php include("./template/testimoni.php"); ?>
    
	<!-- footer -->
    <?php include("./template/footer.php"); ?>
</body>
</html>