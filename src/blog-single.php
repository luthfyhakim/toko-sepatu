<?php 
	include("../koneksi.php");
	include("./template/header.php");

    if (!isset($_GET['id'])) {
		header("location: blog.php");
	} else {
		$id = $_GET['id'];

		$sql = "SELECT b.id, b.judul, b.isi, b.gambar, DATE_FORMAT(b.tanggal, '%d-%m-%Y'), u.nama
                FROM blog b
                INNER JOIN user u
                ON b.id_user = u.id
                WHERE b.id = $id";

		$result = mysqli_query($conn, $sql);

		while ($data = mysqli_fetch_row($result)) {
            $id = $data[0];
            $judul = $data[1];
            $isi = $data[2];
            $gambar = $data[3];
            $tanggal = $data[4];
            $nama = $data[5];
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
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blog</span></p>
                    <h1 class="mb-0 bread">Single Blog</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <p>
                        <img src="../public/images/<?= $gambar; ?>" alt="" class="img-fluid">
                    </p>
                    <h2 class="mb-3"><?= $judul; ?></h2>
                    <p><?= $isi; ?></p>
                    
                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">Life</a>
                            <a href="#" class="tag-cloud-link">Sport</a>
                            <a href="#" class="tag-cloud-link">Tech</a>
                            <a href="#" class="tag-cloud-link">Travel</a>
                        </div>
                    </div>
                
                    <div class="about-author d-flex p-4 bg-light">
                        <div class="bio align-self-md-center mr-4">
                            <img src="../public/images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                        <div class="desc align-self-md-center">
                            <h3>Lance Smith</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                        </div>
                    </div>

                    <div class="pt-5 mt-5">
                        <h3 class="mb-5">6 Comments</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="../public/images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">June 27, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="../public/images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">June 27, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="../public/images/person_1.jpg" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>John Doe</h3>
                                            <div class="meta">June 27, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>

                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="../public/images/person_1.jpg" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>John Doe</h3>
                                                    <div class="meta">June 27, 2018 at 2:21pm</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                    <p><a href="#" class="reply">Reply</a></p>
                                                </div>

                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard bio">
                                                            <img src="../public/images/person_1.jpg" alt="Image placeholder">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>John Doe</h3>
                                                            <div class="meta">June 27, 2018 at 2:21pm</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                            <p><a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="../public/images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>John Doe</h3>
                                    <div class="meta">June 27, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>
                            </li>
                        </ul>
                        <!-- END comment-list -->
            
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" class="p-5 bg-light">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                </div>
                            </form>
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
                        <h3 CLASS="heading">Categories</h3>
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
                        <h3 CLASS="heading">Recent Blog</h3>
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
                        <h3 CLASS="heading">Tag Cloud</h3>
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