<?php

	include('inc/functions.php');

	include('partials/css.php');

    include('controllers/CartController.php');

    include('inc/checkLogIn.php')

?>
	<title>STORVAEG - CART</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Page Introduction Wrapper -->
	    <div class="page-style-a">
	        <div class="container">
	            <div class="page-intro">
	                <h2>cart</h2>
	                <ul class="bread-crumb">
	                    <li class="has-separator">
	                        <i class="ion ion-md-home"></i>
	                        <a href="home.php">Home</a>
	                    </li>
	                    <li class="is-marked">
	                        <a href="cart.php">Cart</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>

        <?php if(!isset($_SESSION['cart_p_id'])): ?>
            <div class="container">
                <div class="text-center">
                    <h1>Em
                        <i class="fas fa-child"></i>ty!
                    </h1>
                    <?php echo '<h5>Your cart is currently empty.</h5>'; ?>
                    <div class="redirect-link-wrapper u-s-p-t-25">
                        <a class="redirect-link" href="shop.php">
                            <span>Return to Shop</span>
                        </a>
                    </div>
                </div>
            </div>
        <?php else: ?>

            <!-- Cart-Page -->
            <div class="page-cart u-s-p-t-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="" method="post">
                                <?php $csrf->echoInputField(); ?>
                                <!-- Products-List-Wrapper -->
                                <div class="table-wrapper u-s-m-b-60">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Size</th>
                                                <th>Color</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $table_total_price = 0;

                                            $i=0;
                                            foreach($_SESSION['cart_p_id'] as $key => $value) 
                                            {
                                                $i++;
                                                $arr_cart_p_id[$i] = $value;
                                            }

                                            $i=0;
                                            foreach($_SESSION['cart_size_id'] as $key => $value) 
                                            {
                                                $i++;
                                                $arr_cart_size_id[$i] = $value;
                                            }

                                            $i=0;
                                            foreach($_SESSION['cart_size_name'] as $key => $value) 
                                            {
                                                $i++;
                                                $arr_cart_size_name[$i] = $value;
                                            }

                                            $i=0;
                                            foreach($_SESSION['cart_color_id'] as $key => $value) 
                                            {
                                                $i++;
                                                $arr_cart_color_id[$i] = $value;
                                            }

                                            $i=0;
                                            foreach($_SESSION['cart_color_name'] as $key => $value) 
                                            {
                                                $i++;
                                                $arr_cart_color_name[$i] = $value;
                                            }

                                            $i=0;
                                            foreach($_SESSION['cart_p_qty'] as $key => $value) 
                                            {
                                                $i++;
                                                $arr_cart_p_qty[$i] = $value;
                                            }

                                            $i=0;
                                            foreach($_SESSION['cart_p_current_price'] as $key => $value) 
                                            {
                                                $i++;
                                                $arr_cart_p_current_price[$i] = $value;
                                            }

                                            $i=0;
                                            foreach($_SESSION['cart_p_name'] as $key => $value) 
                                            {
                                                $i++;
                                                $arr_cart_p_name[$i] = $value;
                                            }

                                            $i=0;
                                            foreach($_SESSION['cart_p_featured_photo'] as $key => $value) 
                                            {
                                                $i++;
                                                $arr_cart_p_featured_photo[$i] = $value;
                                            }
                                        ?>
                                        <tbody>
                                            <?php for($i=1;$i<=count($arr_cart_p_id);$i++): ?>
                                                <tr>
                                                    <td>
                                                        <div class="cart-anchor-image">
                                                            <a href="product.php?id=<?php echo $row['p_id']; ?>">
                                                                <img src="assets/uploads/<?php echo $arr_cart_p_featured_photo[$i]; ?>" alt="Product">
                                                                <h6><?php echo $arr_cart_p_name[$i]; ?></h6>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cart-price">
                                                            <?php echo $arr_cart_size_name[$i]; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cart-price">
                                                            <?php echo $arr_cart_color_name[$i]; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cart-price">
                                                            <?php echo number_format($arr_cart_p_current_price[$i]); ?> RWF
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cart-quantity">
                                                            <div class="quantity">
                                                                <input type="hidden" name="product_id[]" value="<?php echo $arr_cart_p_id[$i]; ?>">
                                                                <input type="hidden" name="product_name[]" value="<?php echo $arr_cart_p_name[$i]; ?>">
                                                                <input type="text" class="quantity-text-field"name="quantity[]" value="<?php echo $arr_cart_p_qty[$i]; ?>">
                                                                <a class="plus-a" data-max="1000">&#43;</a>
                                                                <a class="minus-a" data-min="1">&#45;</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="cart-price">
                                                            <?php
                                                                $row_total_price = $arr_cart_p_current_price[$i]*$arr_cart_p_qty[$i];
                                                                $table_total_price = $table_total_price + $row_total_price;
                                                            ?>
                                                            <?php echo number_format($row_total_price); ?> RWF
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="action-wrapper">
                                                            <a onclick="return confirmDelete();" href="cart-item-delete.php?id=<?php echo $arr_cart_p_id[$i]; ?>&size=<?php echo $arr_cart_size_id[$i]; ?>&color=<?php echo $arr_cart_color_id[$i]; ?>" class="button button-outline-secondary fas fa-trash"></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Products-List-Wrapper /- -->
                                <!-- Coupon -->
                                <div class="coupon-continue-checkout u-s-m-b-60">
                                    <div class="button-area">
                                        <input type="submit" name="form1" class="continue" value="Update Cart" style="background: transparent;">
                                        <a href="shop.php" class="continue">Continue Shopping</a>
                                        <a href="checkout.php" class="checkout">Proceed to Checkout</a>
                                    </div>
                                </div>
                                <!-- Coupon /- -->
                            </form>
                            <!-- Billing -->
                            <div class="calculation u-s-m-b-60">
                                <div class="table-wrapper-2">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th colspan="2">Cart Totals</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h3 class="calc-h3 u-s-m-b-0">Total</h3>
                                                </td>
                                                <td>
                                                    <span class="calc-text">
                                                        <?php echo number_format($table_total_price); ?> RWF
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Billing /- -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cart-Page /- -->
        <?php endif; ?>

        <?php include('partials/footer.php') ?>
	</div>
	
	<?php include('partials/js.php') ?>