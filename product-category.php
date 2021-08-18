<?php

	include('inc/functions.php');

	include('partials/css.php');

	include('controllers/productCategoryController.php')

?>
	<title>STORVAEG - SHOP</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Page Introduction Wrapper -->
	    <div class="page-style-a">
	        <div class="container">
	            <div class="page-intro">
	                <h2>Shop</h2>
	                <ul class="bread-crumb">
	                    <li class="has-separator">
	                        <i class="ion ion-md-home"></i>
	                        <a href="index.php">Home</a>
	                    </li>
	                    <li class="is-marked">
	                        <a href="shop.php">Shop</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>

	    <!-- Shop-Page -->
        <div class="page-shop u-s-p-t-80">
            <div class="container">
            	 <!-- Shop-Intro -->
	            <div class="shop-intro">
	                <h3><?php echo $title; ?></h3>
	            </div>
	            <!-- Shop-Intro /- -->
                <div class="row">
                    <!-- Shop-Left-Side-Bar-Wrapper -->
                    <?php include('partials/categories.php') ?>
                    <!-- Shop-Left-Side-Bar-Wrapper /- -->

                    <!-- Shop-Right-Wrapper -->
                    <div class="col-lg-9 col-md-9 col-sm-12">
	                    <!-- Page-Bar -->
	                    <div class="page-bar clearfix">
	                        <div class="shop-settings">
	                            <a id="list-anchor" class="active">
	                                <i class="fas fa-th-list"></i>
	                            </a>
	                            <a id="grid-anchor">
	                                <i class="fas fa-th"></i>
	                            </a>
	                        </div>
	                        <!-- Toolbar Sorter 1  -->
	                        <div class="toolbar-sorter">
	                            <div class="select-box-wrapper">
	                                <label class="sr-only" for="sort-by">Sort By</label>
	                                <select class="select-box" id="sort-by">
	                                    <option selected="selected" value="">Sort By: Best Selling</option>
	                                    <option value="">Sort By: Latest</option>
	                                    <option value="">Sort By: Lowest Price</option>
	                                    <option value="">Sort By: Highest Price</option>
	                                    <option value="">Sort By: Best Rating</option>
	                                </select>
	                            </div>
	                        </div>
	                        <!-- //end Toolbar Sorter 1  -->
	                        <!-- Toolbar Sorter 2  -->
	                        <div class="toolbar-sorter-2">
	                            <div class="select-box-wrapper">
	                                <label class="sr-only" for="show-records">Show Records Per Page</label>
	                                <select class="select-box" id="show-records">
	                                    <option selected="selected" value="">Show: 8</option>
	                                    <option value="">Show: 16</option>
	                                    <option value="">Show: 28</option>
	                                </select>
	                            </div>
	                        </div>
	                        <!-- //end Toolbar Sorter 2  -->
	                    </div>
	                    <!-- Page-Bar /- -->
	                    <!-- Row-of-Product-Container -->
	                    <div class="row product-container list-style">
	                    	<?php
		                        // Checking if any product is available or not
		                        $prod_count = 0;
		                        $statement = $pdo->prepare("SELECT * FROM tbl_product");
		                        $statement->execute();
		                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
		                        foreach ($result as $row) {
		                            $prod_table_ecat_ids[] = $row['ecat_id'];
		                        }

		                        for($ii=0;$ii<count($final_ecat_ids);$ii++):
		                            if(in_array($final_ecat_ids[$ii],$prod_table_ecat_ids)) {
		                                $prod_count++;
		                            }
		                        endfor;

		                        if($prod_count==0) {
		                            echo '<div class="shop-intro">No products found</div>';
		                        } else {
		                            for($ii=0;$ii<count($final_ecat_ids);$ii++) {
		                                $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE ecat_id=? AND p_is_active=?");
		                                $statement->execute(array($final_ecat_ids[$ii],1));
		                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
		                                foreach ($result as $row) {
		                                    ?>
					                        <div class="product-item col-lg-4 col-md-6 col-sm-6">
					                            <div class="item">
					                                <div class="image-container">
					                                    <a class="item-img-wrapper-link" href="product.php?id=<?php echo $row['p_id']; ?>">
					                                        <img class="img-fluid" src="assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="Product">
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
					                                        <h6 class="item-title">
					                                            <a href="product.php?id=<?php echo $row['p_id']; ?>">
					                                            	<?php echo $row['p_name']; ?>
					                                            </a>
					                                        </h6>
					                                        <div class="item-description">
					                                            <p>
					                                            	<?php echo $row['p_short_description']; ?>
					                                            </p>
					                                        </div>
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
					                        </div>
					                    <?php }
					                }
					            }
					        ?>
	                    </div>
	                    <!-- Row-of-Product-Container /- -->
	                </div>
                    <!-- Shop-Right-Wrapper /- -->
                    <!-- Shop-Pagination -->
                    <div class="pagination-area">
                        <div class="pagination-number">
                            <ul>
                                <li style="display: none">
                                    <a href="shop-v1-root-category.html" title="Previous">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="shop-v1-root-category.html">1</a>
                                </li>
                                <li>
                                    <a href="shop-v1-root-category.html">2</a>
                                </li>
                                <li>
                                    <a href="shop-v1-root-category.html">3</a>
                                </li>
                                <li>
                                    <a href="shop-v1-root-category.html">...</a>
                                </li>
                                <li>
                                    <a href="shop-v1-root-category.html">10</a>
                                </li>
                                <li>
                                    <a href="shop-v1-root-category.html" title="Next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Shop-Pagination /- -->
                </div>
            </div>
        </div>

        <?php include('partials/footer.php') ?>
	</div>
	
	<?php include('partials/js.php') ?>