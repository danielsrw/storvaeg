<?php

	include('inc/functions.php');

	include('partials/css.php')

?>

<?php
	// Check if the customer is logged in or not
	if(!isset($_SESSION['customer'])) {
	    header('location: '.BASE_URL.'logout.php');
	    exit;
	} else {
	    // If customer is logged in, but admin make him inactive, then force logout this user.
	    $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=? AND cust_status=?");
	    $statement->execute(array($_SESSION['customer']['cust_id'],0));
	    $total = $statement->rowCount();
	    if($total) {
	        header('location: '.BASE_URL.'logout.php');
	        exit;
	    }
	}
?>

	<title>STORVAEG - ORDERs</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Orders -->
		<div class="page-shop u-s-p-t-80">
            <div class="container">
                <div class="row">
                    <!-- Dashboard-Left-Side-Bar-Wrapper -->
                    <?php include('partials/sidebar.php') ?>
                    <!-- Dashboard-Left-Side-Bar-Wrapper /- -->

                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <!-- Page-Bar -->
                        <div class="page-bar clearfix">
                            <h6 class="title-name">Order history</h6>
							<div class="row">
				                <div class="col-lg-12 col-md-12 col-sm-12">
				                    <div class="touch-wrapper">
				                        <div class="table-wrapper u-s-m-b-60">
				                            <table>
				                                <thead>
				                                    <tr>
				                                        <th>Product</th>
				                                        <th>Amout</th>
				                                        <th>Status</th>
				                                        <th>Method</th>
				                                        <th>ID</th>
				                                        <th>Date</th>
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
				                                                100, 000 RWF
				                                            </div>
				                                        </td>
				                                        <td>
				                                            <div class="cart-stock">
				                                                <span class="badge badge-success">Pending</span>
				                                            </div>
				                                        </td>
				                                        <td>
				                                            <div class="cart-stock">
				                                                Bank deposit
				                                            </div>
				                                        </td>
				                                        <td>
				                                            <div class="cart-stock">
				                                                1628663508
				                                            </div>
				                                        </td>
				                                        <td>
				                                            <div class="cart-stock">
				                                                2021-08-11 10:31:48
				                                            </div>
				                                        </td>
				                                    </tr>
				                                </tbody>
				                            </table>
				                        </div>
				                    </div>
				                </div>
				            </div>
                        </div>
                        <!-- Page-Bar /- -->
                    </div>
                </div>
            </div>
        </div>

        <?php include('partials/footer.php') ?>
		
	</div>
	
	<?php include('partials/js.php') ?>