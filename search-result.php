<?php

	include('inc/functions.php');

	include('partials/css.php')

?>

<?php
    if(!isset($_REQUEST['search_text'])) {
        header('location: index.php');
        exit;
    } else {
        if($_REQUEST['search_text']=='') {
            header('location: index.php');
            exit;
        }
    }
?>

	<title>STORVAEG - SEARCH RESULT</title>
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
                <!-- Search-Results -->
                <div class="search-results-wrapper u-s-p-b-80">
                    <h4>WE FOUND RESULTS FOR
                        <i>
                            “<?php 
                                $search_text = strip_tags($_REQUEST['search_text']); 
                                echo $search_text; 
                            ?>”
                        </i>
                    </h4>
                    <h4>Related searches:
                        <a href="">men's clothing</a> ,
                        <a href="">mobiles & tablets</a> ,
                        <a href="">books & audible</a>
                    </h4>
                </div>
                <!-- Search-Results /- -->
                <div class="row">
                    <!-- Shop-Left-Side-Bar-Wrapper -->
                    <?php include('partials/categories.php') ?>
                    <!-- Shop-Left-Side-Bar-Wrapper /- -->

                    <?php
                        $search_text = '%'.$search_text.'%';
                    ?>
                    <?php include('controllers/PaginationController.php') ?>

                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="page-bar clearfix">
                            <div class="shop-settings">
                                <a id="list-anchor" class="active">
                                    <i class="fas fa-th-list"></i>
                                </a>
                                <a id="grid-anchor">
                                    <i class="fas fa-th"></i>
                                </a>
                            </div>
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
                        </div>
                        <div class="row product-container list-style">
                            <div class="product-item col-lg-4 col-md-6 col-sm-6">
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="">
                                            <img class="img-fluid" src="images/product/product@3x.jpg" alt="Product">
                                        </a>
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li class="has-separator">
                                                    <a href="">Men's</a>
                                                </li>
                                                <li class="has-separator">
                                                    <a href="">Tops</a>
                                                </li>
                                                <li>
                                                    <a href="">Hoodies</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="">Casual Hoodie Full Cotton</a>
                                            </h6>
                                            <div class="item-description">
                                                <p>This hoodie is full cotton. It includes a muff sewn onto the lower front, and (usually) a drawstring to adjust the hood opening. Throughout the U.S., it is common for middle-school, high-school, and college students to wear this sweatshirts—with or without hoods—that display their respective school names or mascots across the chest, either as part of a uniform or personal preference.
                                                </p>
                                            </div>
                                            <div class="item-stars">
                                                <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                    <span style='width:67px'></span>
                                                </div>
                                                <span>(23)</span>
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
                            </div>
                        </div>
                    </div>
                    <div class="pagination-area">
                        <div class="pagination-number">
                            <ul>
                                <li style="display: none">
                                    <a href="" title="Previous">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="">1</a>
                                </li>
                                <li>
                                    <a href="">2</a>
                                </li>
                                <li>
                                    <a href="">3</a>
                                </li>
                                <li>
                                    <a href="">...</a>
                                </li>
                                <li>
                                    <a href="">10</a>
                                </li>
                                <li>
                                    <a href="" title="Next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php include('partials/footer.php') ?>
	</div>
	
	<?php include('partials/js.php') ?>