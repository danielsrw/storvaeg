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
						                    $statement = $pdo->prepare("SELECT * FROM tbl_product t1 JOIN tbl_end_category t2 ON t1.ecat_id = t2.ecat_id JOIN tbl_mid_category t3 ON t2.mcat_id = t3.mcat_id JOIN tbl_top_category t4 ON t3.tcat_id = t4.tcat_id WHERE p_is_featured=? AND p_is_active=?");
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
			                                                <div class="item-stars">
			                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
			                                                        <span style='width:0'></span>
			                                                    </div>
			                                                    <span>(0)</span>
			                                                </div>
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
		                        <div class="tab-pane active show fade" id="men-latest-products">
		                            <div class="slider-fouc">
		                                <div class="products-slider owl-carousel" data-item="4">
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
				                                                <div class="item-stars">
				                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
				                                                        <span style='width:0'></span>
				                                                    </div>
				                                                    <span>(0)</span>
				                                                </div>
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
			                                                <div class="item-stars">
			                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
			                                                        <span style='width:0'></span>
			                                                    </div>
			                                                    <span>(0)</span>
			                                                </div>
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

        <?php include('partials/footer.php') ?>
		
	</div>
	
	<?php include('partials/js.php') ?>