<?php

	include('inc/functions.php');

	include('partials/css.php')

?>
	<title>STORVAEG - WISHLIST</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Page Introduction Wrapper -->
	    <div class="page-style-a">
	        <div class="container">
	            <div class="page-intro">
	                <h2>Wishlist</h2>
	                <ul class="bread-crumb">
	                    <li class="has-separator">
	                        <i class="ion ion-md-home"></i>
	                        <a href="index.php">Home</a>
	                    </li>
	                    <li class="is-marked">
	                        <a href="cart.php">Cart</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>

	    <!-- Wishlist-Page -->
        <div class="page-wishlist u-s-p-t-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Products-List-Wrapper -->
                        <div class="table-wrapper u-s-m-b-60">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Unit Price</th>
                                        <th>Stock Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="cart-anchor-image">
                                                <a href="single-product.html">
                                                    <img src="images/product/product@1x.jpg" alt="Product">
                                                    <h6>Casual Hoodie Full Cotton</h6>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cart-price">
                                                $55.00
                                            </div>
                                        </td>
                                        <td>
                                            <div class="cart-stock">
                                                In Stock
                                            </div>
                                        </td>
                                        <td>
                                            <div class="action-wrapper">
                                                <button class="button button-outline-secondary">Add to Cart</button>
                                                <button class="button button-outline-secondary fas fa-trash"></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Products-List-Wrapper /- -->
                    </div>
                </div>
            </div>
        </div>

        <?php include('partials/footer.php') ?>
	</div>
	
	<?php include('partials/js.php') ?>