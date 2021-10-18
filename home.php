<?php

	include('inc/functions.php');

	include('partials/css.php')

?>

<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) {
	    $cta_title = $row['cta_title'];
	    $cta_content = $row['cta_content'];
	    $cta_read_more_text = $row['cta_read_more_text'];
	    $cta_read_more_url = $row['cta_read_more_url'];
	    $cta_photo = $row['cta_photo'];
	    $featured_product_title = $row['featured_product_title'];
	    $featured_product_subtitle = $row['featured_product_subtitle'];
	    $latest_product_title = $row['latest_product_title'];
	    $latest_product_subtitle = $row['latest_product_subtitle'];
	    $popular_product_title = $row['popular_product_title'];
	    $popular_product_subtitle = $row['popular_product_subtitle'];
	    $total_featured_product_home = $row['total_featured_product_home'];
	    $total_latest_product_home = $row['total_latest_product_home'];
	    $total_popular_product_home = $row['total_popular_product_home'];
	    $home_service_on_off = $row['home_service_on_off'];
	    $home_welcome_on_off = $row['home_welcome_on_off'];
	    $home_featured_product_on_off = $row['home_featured_product_on_off'];
	    $home_latest_product_on_off = $row['home_latest_product_on_off'];
	    $home_popular_product_on_off = $row['home_popular_product_on_off'];

	}
?>
	<title>STORVAEG - HOME</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Slides -->
		<?php include('partials/slides.php') ?>

		<!-- Banner-Layer -->
	    <div class="banner-layer">
	        <div class="container">
	            <div class="image-banner">
	                <a href="" class="mx-auto banner-hover effect-dark-opacity">
	                    <img class="img-fluid" src="images/banners/bannerlayer-1.jpg" alt="Winter Season Banner">
	                </a>
	            </div>
	        </div>
	    </div>
	    <!-- Banner-Layer /- -->

	    <section class="section-maker">
	        <div class="container">
	            <div class="sec-maker-header text-center">
	                <h3 class="sec-maker-h3"><?php echo $featured_product_title; ?></h3>
	            </div>
	            <div class="wrapper-content">
	                <div class="outer-area-tab">
	                    <div class="tab-content">
	                        <div class="tab-pane active show fade" id="women-latest-products">
	                            <div class="slider-fouc">
	                                <div class="products-slider owl-carousel" data-item="4">
	                                	<?php
						                    $statement = $pdo->prepare("SELECT * FROM tbl_product t1 JOIN tbl_end_category t2 ON t1.ecat_id = t2.ecat_id JOIN tbl_mid_category t3 ON t2.mcat_id = t3.mcat_id JOIN tbl_top_category t4 ON t3.tcat_id = t4.tcat_id WHERE p_is_featured=? AND p_is_active=? ORDER BY RAND()");
						                    $statement->execute(array(1,1));
						                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						                    foreach ($result as $row) { ?>
			                                    <div class="item">
			                                        <div class="image-container">
			                                            <a class="item-img-wrapper-link" href="product.php?id=<?php echo $row['p_id']; ?>">
			                                                <img class="img-fluid" src="assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="Product">
			                                            </a>
			                                        </div>
			                                        <div class="item-content">
			                                            <div class="what-product-is">
			                                                <ul class="bread-crumb">
		                                                        <li class="has-separator">
		                                                            <a href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name']; ?></a>
		                                                        </li>
		                                                        <li class="has-separator">
		                                                            <a href="product-category.php?id=<?php echo $row['mcat_id']; ?>&type=mid-category"><?php echo $row['mcat_name']; ?></a>
		                                                        </li>
		                                                        <li>
		                                                            <a href="product-category.php?id=<?php echo $row['ecat_id']; ?>&type=end-category"><?php echo $row['ecat_name']; ?></a>
		                                                        </li>
		                                                    </ul>
			                                                <h6 class="item-title">
			                                                    <a href="product.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['p_name'] ?></a>
			                                                </h6>
				                                            <div class="price-template">
				                                                <div class="item-new-price">
				                                                    <?php echo number_format($row['p_current_price']); ?> RWF
				                                                </div>
				                                                <?php if($row['p_old_price'] != ''): ?>
					                                                <div class="item-old-price">
					                                                    <?php echo number_format($row['p_old_price']); ?> RWF
					                                                </div>
				                                                <?php endif; ?>
				                                            </div>
			                                            </div>
			                                            <div style="display: flex;">
			                                            	<?php if($row['p_old_price'] != ''): ?>
			                                                    <div class="tag discount">
			                                                        <?php
			                                                            $save = $row['p_old_price'] - $row['p_current_price'];
			                                                            $discount = $save * 100 / $row['p_old_price'];
			                                                        ?>
			                                                        <span>
			                                                            <?php echo number_format($discount); ?>%
			                                                        </span>
			                                                    </div>
			                                                <?php endif; ?>
			                                            </div>
			                                            <div class="price-template">
			                                                <a href="product.php?id=<?php echo $row['p_id']; ?>">
			                                                	<?php if($row['p_qty'] == 0): ?>
				                                                	<button class="button button-secondary w-100">
				                                                		Out of Stock
				                                                	</button>
			                                                	<?php else: ?>
			                                                		<button class="button button-primary w-100">
				                                                		Add to Cart
				                                                	</button>
			                                                	<?php endif; ?>
			                                                </a>
			                                            </div>
			                                        </div>
			                                    </div>
					                        <?php }
					                    ?>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>

	    <div class="banner-image-view-more">
	        <div class="container">
	            <div class="image-banner u-s-m-y-40">
	                <a href="" class="mx-auto banner-hover effect-dark-opacity">
	                    <img class="img-fluid" src="images/banners/ban-men.jpg" alt="Banner Image">
	                </a>
	            </div>
	        </div>
	    </div>

	    <section class="section-maker">
	        <div class="container">
	            <div class="sec-maker-header text-center">
	                <h3 class="sec-maker-h3"><?php echo $latest_product_title; ?></h3>
	            </div>
    			<?php if($home_latest_product_on_off == 1): ?>
		            <div class="wrapper-content">
		                <div class="outer-area-tab">
		                    <div class="tab-content">
		                        <div class="tab-pane active show fade" id="consumer-latest-products">
		                            <div class="row align-items-center">
		                                <div class="col-lg-12 col-md-12">
		                                    <div class="tab-content">
		                                        <div class="tab-pane fade show active" id="laptops">
		                                            <div class="slider-fouc">
		                                                <div class="specific-category-slider owl-carousel" data-item="3">
		                                                    <?php
											                    $statement = $pdo->prepare("SELECT * FROM tbl_product t1 JOIN tbl_end_category t2 ON t1.ecat_id = t2.ecat_id JOIN tbl_mid_category t3 ON t2.mcat_id = t3.mcat_id JOIN tbl_top_category t4 ON t3.tcat_id = t4.tcat_id WHERE p_is_active=? ORDER BY p_id DESC");
											                    $statement->execute(array(1));
											                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
											                    foreach ($result as $row) { ?>
								                                    <div class="item">
								                                        <div class="image-container">
								                                            <a class="item-img-wrapper-link" href="product.php?id=<?php echo $row['p_id']; ?>">
								                                                <img class="img-fluid" src="assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="Product">
								                                            </a>
								                                        </div>
								                                        <div class="item-content">
								                                            <div class="what-product-is">
								                                                <ul class="bread-crumb">
							                                                        <li class="has-separator">
							                                                            <a href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name']; ?></a>
							                                                        </li>
							                                                        <li class="has-separator">
							                                                            <a href="product-category.php?id=<?php echo $row['mcat_id']; ?>&type=mid-category"><?php echo $row['mcat_name']; ?></a>
							                                                        </li>
							                                                        <li>
							                                                            <a href="product-category.php?id=<?php echo $row['ecat_id']; ?>&type=end-category"><?php echo $row['ecat_name']; ?></a>
							                                                        </li>
							                                                    </ul>
								                                                <h6 class="item-title">
								                                                    <a href="product.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['p_name'] ?></a>
								                                                </h6>
									                                            <div class="price-template">
									                                                <div class="item-new-price">
									                                                    <?php echo number_format($row['p_current_price']); ?> RWF
									                                                </div>
									                                                <?php if($row['p_old_price'] != ''): ?>
									                                                <div class="item-old-price">
									                                                    <?php echo number_format($row['p_old_price']); ?> RWF
									                                                </div>
									                                                <?php endif; ?>
									                                            </div>
								                                            </div>
								                                            <?php if($row['p_old_price'] != ''): ?>
							                                                    <div class="tag discount">
							                                                        <?php
							                                                            $save = $row['p_old_price'] - $row['p_current_price'];
							                                                            $discount = $save * 100 / $row['p_old_price'];
							                                                        ?>
							                                                        <span>
							                                                            <?php echo number_format($discount); ?>%
							                                                        </span>
							                                                    </div>
							                                                <?php endif; ?>
								                                            <div class="price-template">
								                                                <a href="product.php?id=<?php echo $row['p_id']; ?>">
								                                                	<?php if($row['p_qty'] == 0): ?>
									                                                	<button class="button button-secondary w-100">
									                                                		Out of Stock
									                                                	</button>
								                                                	<?php else: ?>
								                                                		<button class="button button-primary w-100">
									                                                		Add to Cart
									                                                	</button>
								                                                	<?php endif; ?>
								                                                </a>
								                                            </div>
								                                        </div>
								                                    </div>
										                        <?php }
										                    ?>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="tab-pane fade" id="pc-and-accessories">
		                                            <!-- Product Not Found -->
		                                            <div class="product-not-found">
		                                                <div class="not-found">
		                                                    <h2>SORRY!</h2>
		                                                    <h6>There is not any product in specific catalogue.</h6>
		                                                </div>
		                                            </div>
		                                            <!-- Product Not Found /- -->
		                                        </div>
		                                        <div class="tab-pane fade" id="tv">
		                                            <div class="slider-fouc">
		                                                <div class="specific-category-slider owl-carousel" data-item="3">
		                                                    <div class="item">
		                                                        <div class="image-container">
		                                                            <a class="item-img-wrapper-link" href="single-product.html">
		                                                                <img class="img-fluid" src="images/product/product@3x.jpg" alt="Product">
		                                                            </a>
		                                                            <div class="item-action-behaviors">
		                                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
		                                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
		                                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist
		                                                                </a>
		                                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart
		                                                                </a>
		                                                            </div>
		                                                        </div>
		                                                        <div class="item-content">
		                                                            <div class="what-product-is">
		                                                                <ul class="bread-crumb">
		                                                                    <li class="has-separator">
		                                                                        <a href="shop-v1-root-category.html">Consumer Electronics
		                                                                        </a>
		                                                                    </li>
		                                                                    <li>
		                                                                        <a href="shop-v2-sub-category.html">TV/LCD/LED
		                                                                        </a>
		                                                                    </li>
		                                                                </ul>
		                                                                <h6 class="item-title">
		                                                                    <a href="single-product.html">Hisense 4k LED TV</a>
		                                                                </h6>
		                                                                <div class="item-stars">
		                                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
		                                                                        <span style='width:0'></span>
		                                                                    </div>
		                                                                    <span>(0)</span>
		                                                                </div>
		                                                            </div>
		                                                            <div class="price-template">
		                                                                <div class="item-new-price">
		                                                                    $55.00
		                                                                </div>
		                                                                <div class="item-old-price">
		                                                                    $60.00
		                                                                </div>
		                                                            </div>
		                                                        </div>
		                                                        <div class="tag new">
		                                                            <span>NEW</span>
		                                                        </div>
		                                                    </div>
		                                                    <div class="item">
		                                                        <div class="image-container">
		                                                            <a class="item-img-wrapper-link" href="single-product.html">
		                                                                <img class="img-fluid" src="images/product/product@3x.jpg" alt="Product">
		                                                            </a>
		                                                            <div class="item-action-behaviors">
		                                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
		                                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
		                                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist
		                                                                </a>
		                                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart
		                                                                </a>
		                                                            </div>
		                                                        </div>
		                                                        <div class="item-content">
		                                                            <div class="what-product-is">
		                                                                <ul class="bread-crumb">
		                                                                    <li class="has-separator">
		                                                                        <a href="shop-v1-root-category.html">Consumer Electronics
		                                                                        </a>
		                                                                    </li>
		                                                                    <li>
		                                                                        <a href="shop-v2-sub-category.html">TV/LCD/LED
		                                                                        </a>
		                                                                    </li>
		                                                                </ul>
		                                                                <h6 class="item-title">
		                                                                    <a href="single-product.html">TCL 4k LED TV</a>
		                                                                </h6>
		                                                                <div class="item-stars">
		                                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
		                                                                        <span style='width:0'></span>
		                                                                    </div>
		                                                                    <span>(0)</span>
		                                                                </div>
		                                                            </div>
		                                                            <div class="price-template">
		                                                                <div class="item-new-price">
		                                                                    $55.00
		                                                                </div>
		                                                                <div class="item-old-price">
		                                                                    $60.00
		                                                                </div>
		                                                            </div>
		                                                        </div>
		                                                    </div>
		                                                    <div class="item">
		                                                        <div class="image-container">
		                                                            <a class="item-img-wrapper-link" href="single-product.html">
		                                                                <img class="img-fluid" src="images/product/product@3x.jpg" alt="Product">
		                                                            </a>
		                                                            <div class="item-action-behaviors">
		                                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
		                                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
		                                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist
		                                                                </a>
		                                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart
		                                                                </a>
		                                                            </div>
		                                                        </div>
		                                                        <div class="item-content">
		                                                            <div class="what-product-is">
		                                                                <ul class="bread-crumb">
		                                                                    <li class="has-separator">
		                                                                        <a href="shop-v1-root-category.html">Consumer Electronics
		                                                                        </a>
		                                                                    </li>
		                                                                    <li>
		                                                                        <a href="shop-v2-sub-category.html">TV/LCD/LED
		                                                                        </a>
		                                                                    </li>
		                                                                </ul>
		                                                                <h6 class="item-title">
		                                                                    <a href="single-product.html">Sony 4k LED TV
		                                                                    </a>
		                                                                </h6>
		                                                                <div class="item-stars">
		                                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
		                                                                        <span style='width:0'></span>
		                                                                    </div>
		                                                                    <span>(0)</span>
		                                                                </div>
		                                                            </div>
		                                                            <div class="price-template">
		                                                                <div class="item-new-price">
		                                                                    $55.00
		                                                                </div>
		                                                                <div class="item-old-price">
		                                                                    $60.00
		                                                                </div>
		                                                            </div>
		                                                        </div>
		                                                        <div class="tag sale">
		                                                            <span>SALE</span>
		                                                        </div>
		                                                    </div>
		                                                    <div class="item">
		                                                        <div class="image-container">
		                                                            <a class="item-img-wrapper-link" href="single-product.html">
		                                                                <img class="img-fluid" src="images/product/product@3x.jpg" alt="Product">
		                                                            </a>
		                                                            <div class="item-action-behaviors">
		                                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
		                                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
		                                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist
		                                                                </a>
		                                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart
		                                                                </a>
		                                                            </div>
		                                                        </div>
		                                                        <div class="item-content">
		                                                            <div class="what-product-is">
		                                                                <ul class="bread-crumb">
		                                                                    <li class="has-separator">
		                                                                        <a href="shop-v1-root-category.html">Consumer Electronics
		                                                                        </a>
		                                                                    </li>
		                                                                    <li>
		                                                                        <a href="shop-v2-sub-category.html">TV/LCD/LED
		                                                                        </a>
		                                                                    </li>
		                                                                </ul>
		                                                                <h6 class="item-title">
		                                                                    <a href="single-product.html">China Petrei 4k LED TV</a>
		                                                                </h6>
		                                                                <div class="item-stars">
		                                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
		                                                                        <span style='width:0'></span>
		                                                                    </div>
		                                                                    <span>(0)</span>
		                                                                </div>
		                                                            </div>
		                                                            <div class="price-template">
		                                                                <div class="item-new-price">
		                                                                    $55.00
		                                                                </div>
		                                                                <div class="item-old-price">
		                                                                    $60.00
		                                                                </div>
		                                                            </div>
		                                                        </div>
		                                                        <div class="tag discount">
		                                                            <span>-15%</span>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="tab-pane fade" id="cam-corder">
		                                            <!-- Product Not Found -->
		                                            <div class="product-not-found">
		                                                <div class="not-found">
		                                                    <h2>SORRY!</h2>
		                                                    <h6>There is not any product in specific catalogue.</h6>
		                                                </div>
		                                            </div>
		                                            <!-- Product Not Found /- -->
		                                        </div>
		                                        <div class="tab-pane fade" id="audio-amplifiers">
		                                            <!-- Product Not Found -->
		                                            <div class="product-not-found">
		                                                <div class="not-found">
		                                                    <h2>SORRY!</h2>
		                                                    <h6>There is not any product in specific catalogue.</h6>
		                                                </div>
		                                            </div>
		                                            <!-- Product Not Found /- -->
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
    			<?php endif; ?>
	        </div>
	    </section>

		<div class="banner-image-view-more">
	        <div class="container">
	            <div class="image-banner u-s-m-y-40">
	                <a href="" class="mx-auto banner-hover effect-dark-opacity">
	                    <img class="img-fluid" src="images/banners/ban-men.jpg" alt="Banner Image">
	                </a>
	            </div>
	        </div>
	    </div>

	    <section class="section-maker">
	        <div class="container">
	            <div class="sec-maker-header text-center">
	                <h3 class="sec-maker-h3"><?php echo $popular_product_title; ?></h3>
	            </div>
	            <div class="wrapper-content">
	                <div class="outer-area-tab">
	                    <div class="tab-content">
	                        <div class="tab-pane active show fade" id="men-latest-products">
	                            <div class="slider-fouc">
	                                <div class="products-slider owl-carousel" data-item="4">
	                                	<?php
						                    $statement = $pdo->prepare("SELECT * FROM tbl_product t1 JOIN tbl_end_category t2 ON t1.ecat_id = t2.ecat_id JOIN tbl_mid_category t3 ON t2.mcat_id = t3.mcat_id JOIN tbl_top_category t4 ON t3.tcat_id = t4.tcat_id WHERE p_is_active=?  ORDER BY p_total_view DESC");
						                    $statement->execute(array(1));
						                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
						                    foreach ($result as $row) { ?>
			                                    <div class="item">
			                                        <div class="image-container">
			                                            <a class="item-img-wrapper-link" href="product.php?id=<?php echo $row['p_id']; ?>">
			                                                <img class="img-fluid" src="assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="Product">
			                                            </a>
			                                        </div>
			                                        <div class="item-content">
			                                            <div class="what-product-is">
			                                                <ul class="bread-crumb">
		                                                        <li class="has-separator">
		                                                            <a href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name']; ?></a>
		                                                        </li>
		                                                        <li class="has-separator">
		                                                            <a href="product-category.php?id=<?php echo $row['mcat_id']; ?>&type=mid-category"><?php echo $row['mcat_name']; ?></a>
		                                                        </li>
		                                                        <li>
		                                                            <a href="product-category.php?id=<?php echo $row['ecat_id']; ?>&type=end-category"><?php echo $row['ecat_name']; ?></a>
		                                                        </li>
		                                                    </ul>
			                                                <h6 class="item-title">
			                                                    <a href="product.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['p_name'] ?></a>
			                                                </h6>
				                                            <div class="price-template">
				                                                <div class="item-new-price">
				                                                    <?php echo number_format($row['p_current_price']); ?> RWF
				                                                </div>
				                                                <?php if($row['p_old_price'] != ''): ?>
				                                                <div class="item-old-price">
				                                                    <?php echo number_format($row['p_old_price']); ?> RWF
				                                                </div>
				                                                <?php endif; ?>
				                                            </div>
			                                            </div>
			                                            <?php if($row['p_old_price'] != ''): ?>
		                                                    <div class="tag discount">
		                                                        <?php
		                                                            $save = $row['p_old_price'] - $row['p_current_price'];
		                                                            $discount = $save * 100 / $row['p_old_price'];
		                                                        ?>
		                                                        <span>
		                                                            <?php echo number_format($discount); ?>%
		                                                        </span>
		                                                    </div>
		                                                <?php endif; ?>
			                                            <div class="price-template">
			                                                <a href="product.php?id=<?php echo $row['p_id']; ?>">
			                                                	<?php if($row['p_qty'] == 0): ?>
				                                                	<button class="button button-secondary w-100">
				                                                		Out of Stock
				                                                	</button>
			                                                	<?php else: ?>
			                                                		<button class="button button-primary w-100">
				                                                		Add to Cart
				                                                	</button>
			                                                	<?php endif; ?>
			                                                </a>
			                                            </div>
			                                        </div>
			                                    </div>
					                        <?php }
					                    ?>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>

	    <section class="section-maker">
	        <div class="container">
	            <div class="redirect-link-wrapper text-center u-s-p-t-25 u-s-p-b-80">
	                <a class="redirect-link" href="store-directory.php">
	                    <span>View more on</span>
	                </a>
	            </div>
	        </div>
	    </section>

	    <div class="continue-link-wrapper u-s-p-b-80">
	        <a class="continue-link" href="store-directory.php" title="View all products on site">
	            <i class="ion ion-ios-more"></i>
	        </a>
	    </div>

	    <section class="app-priority">
	        <div class="container">
	            <div class="priority-wrapper u-s-p-b-80">
	                <div class="row">
	                    <div class="col-lg-3 col-md-3 col-sm-3">
	                        <div class="single-item-wrapper">
	                            <div class="single-item-icon">
	                                <i class="ion ion-md-star"></i>
	                            </div>
	                            <h2>
	                                Great Value
	                            </h2>
	                            <p>We offer competitive prices on our 100 million plus product range</p>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-md-3 col-sm-3">
	                        <div class="single-item-wrapper">
	                            <div class="single-item-icon">
	                                <i class="ion ion-md-cash"></i>
	                            </div>
	                            <h2>
	                                Shop with Confidence
	                            </h2>
	                            <p>Our Protection covers your purchase from click to delivery</p>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-md-3 col-sm-3">
	                        <div class="single-item-wrapper">
	                            <div class="single-item-icon">
	                                <i class="ion ion-ios-card"></i>
	                            </div>
	                            <h2>
	                                Safe Payment
	                            </h2>
	                            <p>Pay with the world’s most popular and secure payment methods</p>
	                        </div>
	                    </div>
	                    <div class="col-lg-3 col-md-3 col-sm-3">
	                        <div class="single-item-wrapper">
	                            <div class="single-item-icon">
	                                <i class="ion ion-md-contacts"></i>
	                            </div>
	                            <h2>
	                                24/7 Help Center
	                            </h2>
	                            <p>Round-the-clock assistance for a smooth shopping experience</p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>

        <?php include('partials/footer.php') ?>
		
	</div>
	
	<?php include('partials/js.php') ?>