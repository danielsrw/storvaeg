<?php

	include('inc/functions.php');

	include('partials/css.php')

?>
	<title>STORVAEG - ABOUT</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Page Introduction Wrapper -->
	    <div class="page-style-a">
	        <div class="container">
	            <div class="page-intro">
	                <h2>Track Order</h2>
	                <ul class="bread-crumb">
	                    <li class="has-separator">
	                        <i class="ion ion-md-home"></i>
	                        <a href="home.php">Home</a>
	                    </li>
	                    <li class="is-marked">
	                        <a href="track-order.php">Track Order</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>
	    <!-- Page Introduction Wrapper /- -->
	    <!-- Track-Order-Page -->
	    <div class="page-track-order u-s-p-t-80">
	        <div class="container">
	            <div class="track-order-wrapper">
	                <h2 class="track-order-h2 u-s-m-b-20 text-center">Track Your Order</h2>
	                <h6 class="track-order-h6 u-s-m-b-30">To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</h6>
	                <form>
	                    <div class="u-s-m-b-30">
	                        <label for="order-id">Order ID
	                            <span class="astk">*</span>
	                        </label>
	                        <input type="text" id="order-id" class="text-field" placeholder="Found in your order confirmation email">
	                    </div>
	                    <div class="u-s-m-b-30">
	                        <label for="billing-email">Billing Email
	                            <span class="astk">*</span>
	                        </label>
	                        <input type="text" id="billing-email" class="text-field" placeholder="Email you used during checkout.">
	                    </div>
	                    <div class="u-s-m-b-30">
	                        <button class="button button-outline-secondary w-100">TRACK</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	    <!-- Track-Order-Page /- -->

        <?php include('partials/footer.php') ?>
		
	</div>
	
	<?php include('partials/js.php') ?>