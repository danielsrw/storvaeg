<?php

	include('inc/functions.php');

	include('partials/css.php')

?>

<?php
    if(!isset($_SESSION['cart_p_id'])) {
        header('location: cart.php');
        exit;
    }
?>

	<title>STORVAEG - CHECKOUT</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Page Introduction Wrapper -->
	    <div class="page-style-a">
	        <div class="container">
	            <div class="page-intro">
	                <h2>Checkout</h2>
	                <ul class="bread-crumb">
	                    <li class="has-separator">
	                        <i class="ion ion-md-home"></i>
	                        <a href="index.php">Home</a>
	                    </li>
	                    <li class="is-marked">
	                        <a href="checkout.php">Checkout</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>

	    <!-- Checkout-Page -->
        <div class="page-checkout u-s-p-t-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <?php if(!isset($_SESSION['customer'])): ?>
                            <!-- First-Accordion -->
                            <div>
                                <div class="message-open u-s-m-b-24">
                                    <strong>
                                        <a class="u-c-brand" href="account.php">Please sign in as a customer to checkout
                                        </a>
                                    </strong>
                                </div>
                            </div>
                            <!-- First-Accordion /- -->
                        <?php else: ?>
                            <div class="row">
                                <!-- Billing-&-Shipping-Details -->
                                <div class="col-lg-6">
                                    <h4 class="section-h4">Billing Details</h4>
                                    <!-- Form-Fields -->
                                    <div class="group-inline u-s-m-b-13">
                                        <div class="group-1 u-s-p-r-16">
                                            <label for="fullname">Full Name
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="fullname" class="text-field" value="<?php echo $_SESSION['customer']['cust_b_name']; ?>" disabled>
                                        </div>
                                        <div class="group-2">
                                            <label for="company">Company Name
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="company" class="text-field" value="<?php echo $_SESSION['customer']['cust_b_cname']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="street-address u-s-m-b-13">
                                        <label for="phone">Phone Number
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="phone" class="text-field" value="<?php echo $_SESSION['customer']['cust_b_phone']; ?>" disabled>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <label for="select-country">Country
                                            <span class="astk">*</span>
                                        </label>
                                        <div class="select-box-wrapper">
                                            <select id="country" name="cust_b_country" class="text-field">
                                                <?php
                                                    $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
                                                    $statement->execute();
                                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($result as $row) {
                                                        ?>
                                                        <option value="<?php echo $row['country_id']; ?>" <?php if($row['country_id'] == $_SESSION['customer']['cust_b_country']) {echo 'selected';} ?>><?php echo $row['country_name']; ?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <label for="address">Address
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="address" class="text-field" value="<?php echo nl2br($_SESSION['customer']['cust_b_address']); ?>" disabled>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <label for="city">City
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="city" class="text-field" value="<?php echo $_SESSION['customer']['cust_b_city']; ?>" disabled>
                                    </div>
                                    <div class="group-inline u-s-m-b-13">
                                        <div class="group-1 u-s-p-r-16">
                                            <label for="state">State
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="state" class="text-field" value="<?php echo $_SESSION['customer']['cust_b_state']; ?>" disabled>
                                        </div>
                                        <div class="group-2">
                                            <label for="zip">Zip Code
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="zip" class="text-field" value="<?php echo $_SESSION['customer']['cust_b_zip']; ?>" disabled>
                                        </div>
                                    </div>
                                    <h4 class="section-h4">Shipping Details</h4>
                                    <div class="u-s-m-b-24">
                                        <input type="checkbox" class="check-box" id="ship-to-different-address" data-toggle="collapse" data-target="#showdifferent">
                                        <label class="label-text" for="ship-to-different-address">Shipping address</label>
                                    </div>
                                    <div class="collapse" id="showdifferent">
                                    <!-- Form-Fields -->
                                    <div class="group-inline u-s-m-b-13">
                                        <div class="group-1 u-s-p-r-16">
                                            <label for="fullname">Full Name
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="fullname" class="text-field" value="<?php echo $_SESSION['customer']['cust_b_name']; ?>" disabled>
                                        </div>
                                        <div class="group-2">
                                            <label for="company">Company Name
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="company" class="text-field" value="<?php echo $_SESSION['customer']['cust_b_cname']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="street-address u-s-m-b-13">
                                        <label for="phone">Phone Number
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="phone" class="text-field" value="<?php echo $_SESSION['customer']['cust_b_phone']; ?>" disabled>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <label for="select-country">Country
                                            <span class="astk">*</span>
                                        </label>
                                        <div class="select-box-wrapper">
                                            <select id="country" name="cust_s_country" class="text-field">
                                                <?php
                                                    $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
                                                    $statement->execute();
                                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($result as $row) {
                                                        ?>
                                                        <option value="<?php echo $row['country_id']; ?>" <?php if($row['country_id'] == $_SESSION['customer']['cust_s_country']) {echo 'selected';} ?>><?php echo $row['country_name']; ?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <label for="address">Address
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="address" class="text-field" value="<?php echo nl2br($_SESSION['customer']['cust_s_address']); ?>" disabled>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <label for="city">City
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="city" class="text-field" value="<?php echo $_SESSION['customer']['cust_s_city']; ?>" disabled>
                                    </div>
                                    <div class="group-inline u-s-m-b-13">
                                        <div class="group-1 u-s-p-r-16">
                                            <label for="state">State
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="state" class="text-field" value="<?php echo $_SESSION['customer']['cust_s_state']; ?>" disabled>
                                        </div>
                                        <div class="group-2">
                                            <label for="zip">Zip Code
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="zip" class="text-field" value="<?php echo $_SESSION['customer']['cust_s_zip']; ?>" disabled>
                                        </div>
                                    </div>
                                    <!-- Form-Fields /- -->
                                </div>
                                </div>
                                <!-- Billing-&-Shipping-Details /- -->
                                <!-- Checkout -->
                                <div class="col-lg-6">
                                    <h4 class="section-h4">Your Order</h4>
                                    <div class="order-table">
                                        <table class="u-s-m-b-13">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Size</th>
                                                    <th>Color</th>
                                                    <th>Total</th>
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
                                                            <img src="assets/uploads/<?php echo $arr_cart_p_featured_photo[$i]; ?>" style="width: 80px;">
                                                            <h6 class="order-h6"><?php echo $arr_cart_p_name[$i]; ?></h6>
                                                            <span class="order-span-quantity">x <?php echo $arr_cart_p_qty[$i]; ?></span>
                                                        </td>
                                                        <td>
                                                            <h6 class="order-h6">
                                                                <?php echo $arr_cart_size_name[$i]; ?>
                                                            </h6>
                                                        </td>
                                                        <td>
                                                            <h6 class="order-h6">
                                                                <?php echo $arr_cart_color_name[$i]; ?>
                                                            </h6>
                                                        </td>
                                                        <td>
                                                            <h6 class="order-h6">
                                                                <?php
                                                                    $row_total_price = $arr_cart_p_current_price[$i]*$arr_cart_p_qty[$i];
                                                                    $table_total_price = $table_total_price + $row_total_price;
                                                                ?>
                                                                <?php echo $row_total_price; ?> RWF
                                                            </h6>
                                                        </td>
                                                    </tr>
                                                <?php endfor; ?>
                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">Subtotal</h3>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <h3 class="order-h3"><?php echo $table_total_price; ?> RWF</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                        $statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost WHERE country_id=?");
                                                        $statement->execute(array($_SESSION['customer']['cust_country']));
                                                        $total = $statement->rowCount();
                                                        if($total) {
                                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($result as $row) {
                                                                $shipping_cost = $row['amount'];
                                                            }
                                                        } else {
                                                            $statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost_all WHERE sca_id=1");
                                                            $statement->execute();
                                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach ($result as $row) {
                                                                $shipping_cost = $row['amount'];
                                                            }
                                                        }
                                                    ?>
                                                    <td>
                                                        <h3 class="order-h3">Shipping</h3>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <h3 class="order-h3">
                                                            <?php echo $shipping_cost; ?> RWF
                                                        </h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">Total</h3>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <h3 class="order-h3">
                                                            <?php
                                                                $final_total = $table_total_price+$shipping_cost;
                                                            ?>
                                                            <?php echo $final_total; ?> RWF
                                                        </h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php
                                            $checkout_access = 1;
                                            if(
                                                ($_SESSION['customer']['cust_b_name']=='') ||
                                                ($_SESSION['customer']['cust_b_cname']=='') ||
                                                ($_SESSION['customer']['cust_b_phone']=='') ||
                                                ($_SESSION['customer']['cust_b_country']=='') ||
                                                ($_SESSION['customer']['cust_b_address']=='') ||
                                                ($_SESSION['customer']['cust_b_city']=='') ||
                                                ($_SESSION['customer']['cust_b_state']=='') ||
                                                ($_SESSION['customer']['cust_b_zip']=='') ||
                                                ($_SESSION['customer']['cust_s_name']=='') ||
                                                ($_SESSION['customer']['cust_s_cname']=='') ||
                                                ($_SESSION['customer']['cust_s_phone']=='') ||
                                                ($_SESSION['customer']['cust_s_country']=='') ||
                                                ($_SESSION['customer']['cust_s_address']=='') ||
                                                ($_SESSION['customer']['cust_s_city']=='') ||
                                                ($_SESSION['customer']['cust_s_state']=='') ||
                                                ($_SESSION['customer']['cust_s_zip']=='')
                                            ) {
                                                $checkout_access = 0;
                                            }
                                        ?>
                                        <?php if($checkout_access == 0): ?>
                                            <h6 class="collapse-h6">
                                                You must have to fill up all the billing and shipping information from your dashboard panel in order to checkout the order. Please fill up the information going to <a href="billing-shipping.php" style="color: red;">this link.</a>
                                            </h6>
                                        <?php else: ?>
                                            <div>
                                                <label for="payment-method">Select Payment method
                                                    <span class="astk">*</span>
                                                </label>
                                                <div class="select-box-wrapper">
                                                    <select class="select-box" id="payment-method">
                                                        <option selected="selected" value="">Choose payment method</option>
                                                        <option value="PayPal">PayPal</option>
                                                        <option value="Bank Deposit">Bank Deposit</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <br>
                                                <form action="payment/bank/init.php" method="post" id="bank_form">
                                                    <input type="hidden" name="amount" value="<?php echo $final_total; ?>">
                                                    <label for="order-notes">Send to this Details</label>
                                                    <br>
                                                    <?php
                                                        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
                                                        $statement->execute();
                                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach ($result as $row) {
                                                            echo nl2br($row['bank_detail']);
                                                        }
                                                    ?>
                                                    <div>
                                                        <label for="order-notes">Transaction Info</label>
                                                        <textarea class="text-area" id="order-notes" name="transaction_info" name="form3"></textarea>
                                                    </div>
                                                </form>
                                                <br>
                                                <br>
                                                <input type="submit" name="form3" class="button button-outline-secondary" value="Place Order">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Checkout /- -->
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include('partials/footer.php') ?>
	</div>
	
	<?php include('partials/js.php') ?>