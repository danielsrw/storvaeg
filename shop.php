<?php

	include('inc/functions.php');

	include('partials/css.php')

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
                                $i=0;
                                $statement = $pdo->prepare("SELECT * FROM tbl_product t1 JOIN tbl_end_category t2 ON t1.ecat_id = t2.ecat_id JOIN tbl_mid_category t3 ON t2.mcat_id = t3.mcat_id JOIN tbl_top_category t4 ON t3.tcat_id = t4.tcat_id ORDER BY t1.p_id DESC ");
                                $statement->execute();
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                    $i++;
                                    ?>
                                    <div class="product-item col-lg-4 col-md-6 col-sm-6">
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
                                                            <a href="product-category.php?id=<?php echo $row1['mcat_id']; ?>&type=mid-category"><?php echo $row['mcat_name']; ?></a>
                                                        </li>
                                                        <li>
                                                            <a href="product-category.php?id=<?php echo $row2['ecat_id']; ?>&type=end-category"><?php echo $row['ecat_name']; ?></a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="product.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?></a>
                                                    </h6>
                                                    <div class="item-description">
                                                        <?php echo $row['p_short_description']; ?>
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