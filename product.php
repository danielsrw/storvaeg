<?php

	include('inc/functions.php');

	include('partials/css.php');

	include('controllers/ProductController.php');

?>

<?php
    if($error_message1 != '') {
        echo "<script>alert('".$error_message1."')</script>";
    }
    if($success_message1 != '') {
        echo "<script>alert('".$success_message1."')</script>";
        header('location: product.php?id='.$_REQUEST['id']);
    }
?>

	<title>STORVAEG - <?php echo $p_name; ?></title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Page Introduction Wrapper -->
	    <div class="page-style-a">
	        <div class="container">
	            <div class="page-intro">
	                <h2>Detail</h2>
	                <ul class="bread-crumb">
	                    <li class="has-separator">
	                        <i class="ion ion-md-home"></i>
	                        <a href="index.php">Home</a>
	                    </li>
	                    <li class="is-marked">
	                        <a href="product.php">Detail</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>
	    <!-- Page Introduction Wrapper /- -->

	    <!-- Single-Product-Full-Width-Page -->
	    <div class="page-detail u-s-p-t-80">
	        <div class="container">
	            <!-- Product-Detail -->
	            <div class="row">
	                <div class="col-lg-6 col-md-6 col-sm-12">
	                    <!-- Product-zoom-area -->
	                    <div class="zoom-area">
	                        <img id="zoom-pro" class="img-fluid" src="assets/uploads/<?php echo $p_featured_photo; ?>" alt="Zoom Image">
	                        <div id="gallery" class="u-s-m-t-10">
	                        	<a data-image="assets/uploads/<?php echo $p_featured_photo; ?>" data-zoom-image="assets/uploads/<?php echo $p_featured_photo; ?>">
	                                <img src="assets/uploads/<?php echo $p_featured_photo; ?>" alt="Product">
	                            </a>
	                        	<?php
	                                $statement = $pdo->prepare("SELECT * FROM tbl_product_photo WHERE p_id=?");
	                                $statement->execute(array($_REQUEST['id']));
	                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
	                                foreach ($result as $row) { ?>
			                            <a data-image="assets/uploads/product_photos/<?php echo $row['photo']; ?>" data-zoom-image="assets/uploads/product_photos/<?php echo $row['photo']; ?>">
			                                <img src="assets/uploads/product_photos/<?php echo $row['photo']; ?>" alt="Product">
			                            </a>
			                        <?php }
			                    ?>
	                        </div>
	                    </div>
	                    <!-- Product-zoom-area /- -->
	                </div>
	                <div class="col-lg-6 col-md-6 col-sm-12">
	                    <!-- Product-details -->
	                    <div class="all-information-wrapper">
	                        <div class="section-1-title-breadcrumb-rating">
	                            <div class="product-title">
	                                <h1>
	                                    <a href="product.php?id=<?php echo $row['p_id']; ?>"><?php echo $p_name; ?></a>
	                                </h1>
	                            </div>
	                            <ul class="bread-crumb">
	                                <li class="has-separator">
	                                    <a href="home.html">Home</a>
	                                </li>
	                                <li class="has-separator">
	                                    <a href="<?php echo BASE_URL.'product-category.php?id='.$tcat_id.'&type=top-category' ?>"><?php echo $tcat_name; ?></a>
	                                </li>
	                                <li class="has-separator">
	                                    <a href="<?php echo BASE_URL.'product-category.php?id='.$mcat_id.'&type=mid-category' ?>"><?php echo $mcat_name; ?></a>
	                                </li>
	                                <li class="is-marked">
	                                    <a href="<?php echo BASE_URL.'product-category.php?id='.$ecat_id.'&type=end-category' ?>"><?php echo $ecat_name; ?></a>
	                                </li>
	                            </ul>
	                            <div class="product-rating">
	                                <?php
                                        if($avg_rating == 0) {
                                            echo '';
                                        }
                                        elseif($avg_rating == 1.5) {
                                            echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            ';
                                        } 
                                        elseif($avg_rating == 2.5) {
                                            echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            ';
                                        }
                                        elseif($avg_rating == 3.5) {
                                            echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            ';
                                        }
                                        elseif($avg_rating == 4.5) {
                                            echo '
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            ';
                                        }
                                        else {
                                            for($i=1;$i<=5;$i++) {
                                                ?>
                                                <?php if($i>$avg_rating): ?>
                                                    <i class="fa fa-star-o"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-star"></i>
                                                <?php endif; ?>
                                                <?php
                                            }
                                        }                                    
                                    ?>
	                            </div>
	                        </div>
	                        <div class="section-2-short-description u-s-p-y-14">
	                            <h6 class="information-heading u-s-m-b-8">Description:</h6>
	                            <p><?php echo $p_short_description; ?>
	                            </p>
	                        </div>
	                        <form action="" method="post">
		                        <div class="section-3-price-original-discount u-s-p-y-14">
		                            <div class="price">
		                                <h4><?php echo number_format($p_current_price); ?> RWF</h4>
		                            </div>
		                        	<?php if($p_old_price!=''): ?>
			                            <div class="original-price">
			                                <span>Original Price:</span>
			                                <span><?php echo number_format($p_old_price); ?> RWF</span>
			                            </div>
		                            <?php endif; ?>
		                        </div>
		                        <div class="section-5-product-variants u-s-p-y-14">
		                            <h6 class="information-heading u-s-m-b-8">Product Variants:</h6>
		                            <div class="color u-s-m-b-11">
		                        		<?php if(isset($color)): ?>
			                                <span><?php echo "Available color:"; ?></span>
			                                <div class="color-variant select-box-wrapper">
			                                    <select class="select-box product-color" name="color_id">
			                                    	<?php
			                                            $statement = $pdo->prepare("SELECT * FROM tbl_color");
			                                            $statement->execute();
			                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
			                                            foreach ($result as $row) {
			                                                if(in_array($row['color_id'],$color)) { ?>
			                                        			<option value="<?php echo $row['color_id']; ?>"><?php echo $row['color_name']; ?></option>
			                                        		<?php }
			                                        	}
			                                        ?>
			                                    </select>
			                                </div>
			                            <?php endif; ?>
		                            </div>
			                        <div class="sizes u-s-m-b-11">
		                            	<?php if(isset($size)): ?>
		                                	<span><?php echo "Available size:"; ?></span>
			                                <div class="size-variant select-box-wrapper">
			                                    <select class="select-box product-size" name="size_id">
			                                    	<?php
			                                            $statement = $pdo->prepare("SELECT * FROM tbl_size");
			                                            $statement->execute();
			                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
			                                            foreach ($result as $row) {
			                                                if(in_array($row['size_id'],$size)) { ?>
			                                        			<option value="<?php echo $row['size_id']; ?>">
			                                        				<?php echo $row['size_name']; ?>
			                                        			</option>
			                                        	<?php }
			                                        	}
			                                        ?>
			                                    </select>
			                                </div>
	                                	<?php endif; ?>
			                        </div>
		                        </div>
		                        <div class="section-6-social-media-quantity-actions u-s-p-y-14">
	                                <div class="quick-social-media-wrapper u-s-m-b-22">
	                                    <span>Share:</span>
	                                    <ul class="social-media-list">
	                                        <li>
	                                            <a href="#">
	                                                <i class="fab fa-facebook-f"></i>
	                                            </a>
	                                        </li>
	                                        <li>
	                                            <a href="#">
	                                                <i class="fab fa-twitter"></i>
	                                            </a>
	                                        </li>
	                                        <li>
	                                            <a href="#">
	                                                <i class="fab fa-google-plus-g"></i>
	                                            </a>
	                                        </li>
	                                        <li>
	                                            <a href="#">
	                                                <i class="fas fa-rss"></i>
	                                            </a>
	                                        </li>
	                                        <li>
	                                            <a href="#">
	                                                <i class="fab fa-pinterest"></i>
	                                            </a>
	                                        </li>
	                                    </ul>
	                                </div>
	                                <div class="quantity-wrapper u-s-m-b-22">
	                                    <span>Quantity:</span>
	                                    <div class="quantity">
	                                        <input type="text" class="quantity-text-field" value="1" name="p_qty">
	                                        <a class="plus-a" data-max="1000">&#43;</a>
	                                        <a class="minus-a" data-min="1">&#45;</a>
	                                    </div>
	                                </div>
	                                <input type="hidden" name="p_current_price" value="<?php echo $p_current_price; ?>">
	                                <input type="hidden" name="p_name" value="<?php echo $p_name; ?>">
	                                <input type="hidden" name="p_featured_photo" value="<?php echo $p_featured_photo; ?>">
	                                <div>
	                                    <button class="button button-outline-secondary" name="form_add_to_cart" type="submit">Add to cart</button>
	                                    <form>
	                                    	<script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
	                                    	<button class="button button-outline-secondary" type="button" onClick="payWithRave()">Pay Now</button>
	                                    </form>
	                                </div>
		                        </div>
	                        </form>
	                    </div>
	                    <!-- Product-details /- -->
	                </div>
	            </div>
	            <!-- Product-Detail /- -->
	            <!-- Detail-Tabs -->
	            <div class="row">
	                <div class="col-lg-12 col-md-12 col-sm-12">
	                    <div class="detail-tabs-wrapper u-s-p-t-80">
	                        <div class="detail-nav-wrapper u-s-m-b-30">
	                            <ul class="nav single-product-nav justify-content-center">
	                                <li class="nav-item">
	                                    <a class="nav-link active" data-toggle="tab" href="#description">Description</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a class="nav-link" data-toggle="tab" href="#specification">Specifications</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a class="nav-link" data-toggle="tab" href="#review">Reviews (15)</a>
	                                </li>
	                            </ul>
	                        </div>
	                        <div class="tab-content">
	                            <!-- Description-Tab -->
	                            <div class="tab-pane fade active show" id="description">
	                                <div class="description-whole-container">
	                                    <p class="desc-p u-s-m-b-26">This hoodie is full cotton. It includes a muff sewn onto the lower front, and (usually) a drawstring to adjust the hood opening. Throughout the U.S., it is common for middle-school, high-school, and college students to wear this sweatshirts—with or without hoods—that display their respective school names or mascots across the chest, either as part of a uniform or personal preference.
	                                    </p>
	                                    <img class="desc-img img-fluid u-s-m-b-26" src="images/product/product@3x.jpg" alt="Product">
	                                    <iframe class="desc-iframe u-s-m-b-45" width="710" height="400" src="images/product/iframe-youtube.jpg" allowfullscreen></iframe>
	                                </div>
	                            </div>
	                            <!-- Description-Tab /- -->
	                            <!-- Specifications-Tab -->
	                            <div class="tab-pane fade" id="specification">
	                                <div class="specification-whole-container">
	                                    <div class="spec-ul u-s-m-b-50">
	                                        <h4 class="spec-heading">Key Features</h4>
	                                        <ul>
	                                            <li>Heather Grey</li>
	                                            <li>Black</li>
	                                            <li>White</li>
	                                        </ul>
	                                    </div>
	                                    <div class="u-s-m-b-50">
	                                        <h4 class="spec-heading">What's in the Box?</h4>
	                                        <h3 class="spec-answer">1 x hoodie</h3>
	                                    </div>
	                                    <div class="spec-table u-s-m-b-50">
	                                        <h4 class="spec-heading">General Information</h4>
	                                        <table>
	                                            <tr>
	                                                <td>Sku</td>
	                                                <td>AY536FA08JT86NAFAMZ</td>
	                                            </tr>
	                                        </table>
	                                    </div>
	                                    <div class="spec-table u-s-m-b-50">
	                                        <h4 class="spec-heading">Product Information</h4>
	                                        <table>
	                                            <tr>
	                                                <td>Main Material</td>
	                                                <td>Cotton</td>
	                                            </tr>
	                                            <tr>
	                                                <td>Color</td>
	                                                <td>Heather Grey, Black, White</td>
	                                            </tr>
	                                            <tr>
	                                                <td>Sleeves</td>
	                                                <td>Long Sleeve</td>
	                                            </tr>
	                                            <tr>
	                                                <td>Top Fit</td>
	                                                <td>Regular</td>
	                                            </tr>
	                                            <tr>
	                                                <td>Print</td>
	                                                <td>Not Printed</td>
	                                            </tr>
	                                            <tr>
	                                                <td>Neck</td>
	                                                <td>Round Neck</td>
	                                            </tr>
	                                            <tr>
	                                                <td>Pieces Count</td>
	                                                <td>1 piece</td>
	                                            </tr>
	                                            <tr>
	                                                <td>Occasion</td>
	                                                <td>Casual</td>
	                                            </tr>
	                                            <tr>
	                                                <td>Shipping Weight (kg)</td>
	                                                <td>0.5</td>
	                                            </tr>
	                                        </table>
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- Specifications-Tab /- -->
	                            <!-- Reviews-Tab -->
	                            <div class="tab-pane fade" id="review">
	                                <div class="review-whole-container">
	                                    <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
	                                        <div class="col-lg-6 col-md-6">
	                                            <div class="total-score-wrapper">
	                                                <h6 class="review-h6">Average Rating</h6>
	                                                <div class="circle-wrapper">
	                                                    <h1>4.5</h1>
	                                                </div>
	                                                <h6 class="review-h6">Based on 23 Reviews</h6>
	                                            </div>
	                                        </div>
	                                        <div class="col-lg-6 col-md-6">
	                                            <div class="total-star-meter">
	                                                <div class="star-wrapper">
	                                                    <span>5 Stars</span>
	                                                    <div class="star">
	                                                        <span style='width:0'></span>
	                                                    </div>
	                                                    <span>(0)</span>
	                                                </div>
	                                                <div class="star-wrapper">
	                                                    <span>4 Stars</span>
	                                                    <div class="star">
	                                                        <span style='width:67px'></span>
	                                                    </div>
	                                                    <span>(23)</span>
	                                                </div>
	                                                <div class="star-wrapper">
	                                                    <span>3 Stars</span>
	                                                    <div class="star">
	                                                        <span style='width:0'></span>
	                                                    </div>
	                                                    <span>(0)</span>
	                                                </div>
	                                                <div class="star-wrapper">
	                                                    <span>2 Stars</span>
	                                                    <div class="star">
	                                                        <span style='width:0'></span>
	                                                    </div>
	                                                    <span>(0)</span>
	                                                </div>
	                                                <div class="star-wrapper">
	                                                    <span>1 Star</span>
	                                                    <div class="star">
	                                                        <span style='width:0'></span>
	                                                    </div>
	                                                    <span>(0)</span>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
	                                        <div class="col-lg-12">
	                                            <div class="your-rating-wrapper">
	                                                <h6 class="review-h6">Your Review is matter.</h6>
	                                                <h6 class="review-h6">Have you used this product before?</h6>
	                                                <div class="star-wrapper u-s-m-b-8">
	                                                    <div class="star">
	                                                        <span id="your-stars" style='width:0'></span>
	                                                    </div>
	                                                    <label for="your-rating-value"></label>
	                                                    <input id="your-rating-value" type="text" class="text-field" placeholder="0.0">
	                                                    <span id="star-comment"></span>
	                                                </div>
	                                                <form>
	                                                    <label for="your-name">Name
	                                                        <span class="astk"> *</span>
	                                                    </label>
	                                                    <input id="your-name" type="text" class="text-field" placeholder="Your Name">
	                                                    <label for="your-email">Email
	                                                        <span class="astk"> *</span>
	                                                    </label>
	                                                    <input id="your-email" type="text" class="text-field" placeholder="Your Email">
	                                                    <label for="review-title">Review Title
	                                                        <span class="astk"> *</span>
	                                                    </label>
	                                                    <input id="review-title" type="text" class="text-field" placeholder="Review Title">
	                                                    <label for="review-text-area">Review
	                                                        <span class="astk"> *</span>
	                                                    </label>
	                                                    <textarea class="text-area u-s-m-b-8" id="review-text-area" placeholder="Review"></textarea>
	                                                    <button class="button button-outline-secondary">Submit Review</button>
	                                                </form>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <!-- Get-Reviews -->
	                                    <div class="get-reviews u-s-p-b-22">
	                                        <!-- Review-Options -->
	                                        <div class="review-options u-s-m-b-16">
	                                            <div class="review-option-heading">
	                                                <h6>Reviews
	                                                    <span> (15) </span>
	                                                </h6>
	                                            </div>
	                                            <div class="review-option-box">
	                                                <div class="select-box-wrapper">
	                                                    <label class="sr-only" for="review-sort">Review Sorter</label>
	                                                    <select class="select-box" id="review-sort">
	                                                        <option value="">Sort by: Best Rating</option>
	                                                        <option value="">Sort by: Worst Rating</option>
	                                                    </select>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <!-- Review-Options /- -->
	                                        <!-- All-Reviews -->
	                                        <div class="reviewers">
	                                            <div class="review-data">
	                                                <div class="reviewer-name-and-date">
	                                                    <h6 class="reviewer-name">John</h6>
	                                                    <h6 class="review-posted-date">10 May 2018</h6>
	                                                </div>
	                                                <div class="reviewer-stars-title-body">
	                                                    <div class="reviewer-stars">
	                                                        <div class="star">
	                                                            <span style='width:67px'></span>
	                                                        </div>
	                                                        <span class="review-title">Good!</span>
	                                                    </div>
	                                                    <p class="review-body">
	                                                        Good Quality...!
	                                                    </p>
	                                                </div>
	                                            </div>
	                                            <div class="review-data">
	                                                <div class="reviewer-name-and-date">
	                                                    <h6 class="reviewer-name">Doe</h6>
	                                                    <h6 class="review-posted-date">10 June 2018</h6>
	                                                </div>
	                                                <div class="reviewer-stars-title-body">
	                                                    <div class="reviewer-stars">
	                                                        <div class="star">
	                                                            <span style='width:67px'></span>
	                                                        </div>
	                                                        <span class="review-title">Well done!</span>
	                                                    </div>
	                                                    <p class="review-body">
	                                                        Cotton is good.
	                                                    </p>
	                                                </div>
	                                            </div>
	                                            <div class="review-data">
	                                                <div class="reviewer-name-and-date">
	                                                    <h6 class="reviewer-name">Tim</h6>
	                                                    <h6 class="review-posted-date">10 July 2018</h6>
	                                                </div>
	                                                <div class="reviewer-stars-title-body">
	                                                    <div class="reviewer-stars">
	                                                        <div class="star">
	                                                            <span style='width:67px'></span>
	                                                        </div>
	                                                        <span class="review-title">Well done!</span>
	                                                    </div>
	                                                    <p class="review-body">
	                                                        Excellent condition
	                                                    </p>
	                                                </div>
	                                            </div>
	                                            <div class="review-data">
	                                                <div class="reviewer-name-and-date">
	                                                    <h6 class="reviewer-name">Johnny</h6>
	                                                    <h6 class="review-posted-date">10 March 2018</h6>
	                                                </div>
	                                                <div class="reviewer-stars-title-body">
	                                                    <div class="reviewer-stars">
	                                                        <div class="star">
	                                                            <span style='width:67px'></span>
	                                                        </div>
	                                                        <span class="review-title">Bright!</span>
	                                                    </div>
	                                                    <p class="review-body">
	                                                        Cotton
	                                                    </p>
	                                                </div>
	                                            </div>
	                                            <div class="review-data">
	                                                <div class="reviewer-name-and-date">
	                                                    <h6 class="reviewer-name">Alexia C. Marshall</h6>
	                                                    <h6 class="review-posted-date">12 May 2018</h6>
	                                                </div>
	                                                <div class="reviewer-stars-title-body">
	                                                    <div class="reviewer-stars">
	                                                        <div class="star">
	                                                            <span style='width:67px'></span>
	                                                        </div>
	                                                        <span class="review-title">Well done!</span>
	                                                    </div>
	                                                    <p class="review-body">
	                                                        Good polyester Cotton
	                                                    </p>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <!-- All-Reviews /- -->
	                                        <!-- Pagination-Review -->
	                                        <div class="pagination-review-area">
	                                            <div class="pagination-review-number">
	                                                <ul>
	                                                    <li style="display: none">
	                                                        <a href="product.php?id=<?php echo $row['p_id']; ?>" title="Previous">
	                                                            <i class="fas fa-angle-left"></i>
	                                                        </a>
	                                                    </li>
	                                                    <li class="active">
	                                                        <a href="product.php?id=<?php echo $row['p_id']; ?>">1</a>
	                                                    </li>
	                                                    <li>
	                                                        <a href="product.php?id=<?php echo $row['p_id']; ?>">2</a>
	                                                    </li>
	                                                    <li>
	                                                        <a href="product.php?id=<?php echo $row['p_id']; ?>">3</a>
	                                                    </li>
	                                                    <li>
	                                                        <a href="product.php?id=<?php echo $row['p_id']; ?>">...</a>
	                                                    </li>
	                                                    <li>
	                                                        <a href="product.php?id=<?php echo $row['p_id']; ?>">10</a>
	                                                    </li>
	                                                    <li>
	                                                        <a href="product.php?id=<?php echo $row['p_id']; ?>" title="Next">
	                                                            <i class="fas fa-angle-right"></i>
	                                                        </a>
	                                                    </li>
	                                                </ul>
	                                            </div>
	                                        </div>
	                                        <!-- Pagination-Review /- -->
	                                    </div>
	                                    <!-- Get-Reviews /- -->
	                                </div>
	                            </div>
	                            <!-- Reviews-Tab /- -->
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- Detail-Tabs /- -->
	            <!-- Different-Product-Section -->
	            <div class="detail-different-product-section u-s-p-t-80">
	                <!-- Similar-Products -->
	                <section class="section-maker">
	                    <div class="container">
	                        <div class="sec-maker-header text-center">
	                            <h3 class="sec-maker-h3">Similar Products</h3>
	                        </div>
	                        <div class="slider-fouc">
	                            <div class="products-slider owl-carousel" data-item="4">
	                            	<?php
				                    	$statement = $pdo->prepare("SELECT * FROM tbl_product t1 JOIN tbl_end_category t2 ON t1.ecat_id = t2.ecat_id JOIN tbl_mid_category t3 ON t2.mcat_id = t3.mcat_id JOIN tbl_top_category t4 ON t3.tcat_id = t4.tcat_id ORDER BY t1.p_id DESC");
		                                $statement->execute();
		                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
		                                foreach ($result as $row) {
		                                    $i++; ?>
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
	                                                        <a href="product.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?></a>
	                                                    </h6>
			                                        </div>
			                                        <div class="price-template">
			                                            <div class="item-new-price">
			                                                <?php echo number_format($row['p_current_price']); ?> RWF
			                                            </div>
			                                            <div class="item-old-price">
			                                                <?php if($row['p_old_price'] != ''): ?>
	                                                            <?php echo number_format($row['p_old_price']); ?> RWF
	                                                        <?php endif; ?>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
				                        <?php }
				                    ?>
	                            </div>
	                        </div>
	                    </div>
	                </section>
	                <!-- Similar-Products /- -->
	                <!-- Recently-View-Products  -->
	                <section class="section-maker">
	                    <div class="container">
	                        <div class="sec-maker-header text-center">
	                            <h3 class="sec-maker-h3">Recently View</h3>
	                        </div>
	                        <div class="slider-fouc">
	                            <div class="products-slider owl-carousel" data-item="4">
	                                <div class="item">
	                                    <div class="image-container">
	                                        <a class="item-img-wrapper-link" href="product.php?id=<?php echo $row['p_id']; ?>">
	                                            <img class="img-fluid" src="images/product/product@3x.jpg" alt="Product">
	                                        </a>
	                                        <div class="item-action-behaviors">
	                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
	                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
	                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
	                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
	                                        </div>
	                                    </div>
	                                    <div class="item-content">
	                                        <div class="what-product-is">
	                                            <ul class="bread-crumb">
	                                                <li class="has-separator">
	                                                    <a href="shop-v1-root-category.html">Men's</a>
	                                                </li>
	                                                <li class="has-separator">
	                                                    <a href="shop-v2-sub-category.html">Outwear</a>
	                                                </li>
	                                                <li>
	                                                    <a href="shop-v3-sub-sub-category.html">Jackets</a>
	                                                </li>
	                                            </ul>
	                                            <h6 class="item-title">
	                                                <a href="product.php?id=<?php echo $row['p_id']; ?>">Maire Battlefield Jeep Men's Jacket</a>
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
	                                    <div class="tag hot">
	                                        <span>HOT</span>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </section>
	                <!-- Recently-View-Products /- -->
	            </div>
	            <!-- Different-Product-Section /- -->
	        </div>
	    </div>
	    <!-- Single-Product-Full-Width-Page /- -->

        <?php include('partials/footer.php') ?>
		
	</div>

	<script>
	    const API_publicKey = "FLWPUBK-16ebf60c396c9d675e0c511133b052ae-X";

	    function payWithRave() {
	        var x = getpaidSetup({
	            PBFPubKey: API_publicKey,
	            customer_email: "user@example.com",
	            amount: 2000,
	            currency: "RWF",
	            txref: "rave-123456",
	            subaccounts: [
	              {
	                id: "RS_D87A9EE339AE28BFA2AE86041C6DE70E" // This assumes you have setup your commission on the dashboard.
	              }
	            ],
	            meta: [{
	                metaname: "flightID",
	                metavalue: "AP1234"
	            }],
	            onclose: function() {},
	            callback: function(response) {
	                var txref = response.data.txRef; // collect flwRef returned and pass to a                   server page to complete status check.
	                console.log("This is the response returned after a charge", response);
	                if (
	                    response.data.chargeResponseCode == "00" ||
	                    response.data.chargeResponseCode == "0"
	                ) {
	                    // redirect to a success page
	                } else {
	                    // redirect to a failure page.
	                }

	                x.close(); // use this to close the modal immediately after payment.
	            }
	        });
	    }
	</script>
	
	<?php include('partials/js.php') ?>