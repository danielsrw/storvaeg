<?php

	include('inc/functions.php');

	include('partials/css.php');

	include('inc/checkLogIn.php');

	include('controllers/BillingShippingController.php')

?>
	<title>STORVAEG - BILLING & SHIPPING</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Dashboard -->
		<div class="page-shop u-s-p-t-80">
            <div class="container">
                <div class="row">
                    <!-- Dashboard-Left-Side-Bar-Wrapper -->
                    <?php include('partials/sidebar.php') ?>
                    <!-- Dashboard-Left-Side-Bar-Wrapper /- -->

                    <!-- Dashboard-Right-Wrapper -->
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <!-- Page-Bar -->
                        <form action="" method="post">
                        	<?php $csrf->echoInputField(); ?>
                        	<h6 class="account-h6 u-s-m-b-30">
                                <?php
                                    if($error_message != '') {
                                        echo "<div style='color: red;'>".$error_message."</div>";
                                    }
                                    if($success_message != '') {
                                        echo "<div style='color: green;'>".$success_message."</div>";
                                    }
                                ?>
                            </h6>
	                        <div class="row">
				                <!-- Billing Address -->
				                <div class="col-lg-6">
				                    <div class="login-wrapper">
				                        <h2 class="account-h2 u-s-m-b-20">Billing Address</h2>
				                        <div>
				                            <div class="u-s-m-b-30">
				                                <label for="fullname">Full Name
				                                    <span class="astk">*</span>
				                                </label>
				                                <input type="text" id="fullname" class="text-field" name="cust_b_name" value="<?php echo $_SESSION['customer']['cust_b_name']; ?>">
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="company">Company Name
				                                    <span class="astk">*</span>
				                                </label>
				                                <input type="text" id="company" class="text-field" name="cust_b_cname" value="<?php echo $_SESSION['customer']['cust_b_cname']; ?>">
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="phone">Phone Number
				                                    <span class="astk">*</span>
				                                </label>
				                                <input type="text" id="phone" class="text-field" name="cust_b_phone" value="<?php echo $_SESSION['customer']['cust_b_phone']; ?>">
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="country">Country
				                                    <span class="astk">*</span>
				                                </label>
				                                <select id="country" name="cust_b_country" class="text-field">
		                                        	<?php
						                                $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
				                                        $statement->execute();
				                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
				                                        foreach ($result as $row) { ?>
				                                            <option value="<?php echo $row['country_id']; ?>" <?php if($row['country_id'] == $_SESSION['customer']['cust_b_country']) {echo 'selected';} ?>><?php echo $row['country_name']; ?></option>
				                                        <?php }
			                                        ?>
		                                        </select>
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="city">City
				                                    <span class="astk">*</span>
				                                </label>
				                                <select id="city" class="text-field" name="cust_b_city">
				                                	<option>Choose City</option>
				                                	<?php
						                                $statement = $pdo->prepare("SELECT * FROM tbl_city ORDER BY city_id ASC");
				                                        $statement->execute();
				                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
				                                        foreach ($result as $row) { ?>
				                                            <option value="<?php echo $row['city_id']; ?>" <?php if($row['city_id'] == $_SESSION['customer']['cust_b_city']) {echo 'selected';} ?>><?php echo $row['city_name']; ?></option>
				                                        <?php }
			                                        ?>
				                                </select>
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="state">District
				                                    <span class="astk">*</span>
				                                </label>
				                                <select id="state" class="text-field" name="cust_b_state">
				                                	<option>Choose District</option>
				                                	<?php
						                                $statement = $pdo->prepare("SELECT * FROM tbl_districts ORDER BY district_id ASC");
				                                        $statement->execute();
				                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
				                                        foreach ($result as $row) { ?>
				                                            <option value="<?php echo $row['district_id']; ?>" <?php if($row['district_id'] == $_SESSION['customer']['cust_b_state']) {echo 'selected';} ?>><?php echo $row['district_name']; ?></option>
				                                        <?php }
			                                        ?>
				                                </select>
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="address">Address
				                                    <span class="astk">*</span>
				                                </label>
				                                <textarea class="text-area" id="address" name="cust_b_address"><?php echo $_SESSION['customer']['cust_b_address']; ?></textarea>
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="zip">Zip Code
				                                    <span class="astk">*</span>
				                                </label>
				                                <input type="text" id="zip" class="text-field" name="cust_b_zip" value="<?php echo $_SESSION['customer']['cust_b_zip']; ?>">
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <!-- Billing Address /- -->
				                <!-- Update Shipping Address -->
				                <div class="col-lg-6">
				                    <div class="reg-wrapper">
				                        <h2 class="account-h2 u-s-m-b-20">Shipping Address</h2>
				                        <div>
				                            <div class="u-s-m-b-30">
				                                <label for="fullname">Full Name
				                                    <span class="astk">*</span>
				                                </label>
				                                <input type="text" id="fullname" class="text-field" name="cust_s_name" value="<?php echo $_SESSION['customer']['cust_s_name']; ?>">
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="company">Company Name
				                                    <span class="astk">*</span>
				                                </label>
				                                <input type="text" id="company" class="text-field" name="cust_s_cname" value="<?php echo $_SESSION['customer']['cust_s_cname']; ?>">
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="phone">Phone Number
				                                    <span class="astk">*</span>
				                                </label>
				                                <input type="text" id="phone" class="text-field" name="cust_s_phone" value="<?php echo $_SESSION['customer']['cust_s_phone']; ?>">
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="country">Country
				                                    <span class="astk">*</span>
				                                </label>
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
				                            <div class="u-s-m-b-30">
				                                <label for="city">City
				                                    <span class="astk">*</span>
				                                </label>
				                                <select  id="city" class="text-field" name="cust_s_city">
				                                	<option>Choose City</option>
				                                	<?php
						                                $statement = $pdo->prepare("SELECT * FROM tbl_city ORDER BY city_id ASC");
				                                        $statement->execute();
				                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
				                                        foreach ($result as $row) { ?>
				                                            <option value="<?php echo $row['city_id']; ?>" <?php if($row['city_id'] == $_SESSION['customer']['cust_s_city']) {echo 'selected';} ?>><?php echo $row['city_name']; ?></option>
				                                        <?php }
			                                        ?>
				                                </select>
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="state">District
				                                    <span class="astk">*</span>
				                                </label>
				                                <select id="state" class="text-field" name="cust_s_state">
				                                	<option>Choose District</option>
				                                	<?php
						                                $statement = $pdo->prepare("SELECT * FROM tbl_districts ORDER BY district_id ASC");
				                                        $statement->execute();
				                                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
				                                        foreach ($result as $row) { ?>
				                                            <option value="<?php echo $row['district_id']; ?>" <?php if($row['district_id'] == $_SESSION['customer']['cust_s_state']) {echo 'selected';} ?>><?php echo $row['district_name']; ?></option>
				                                        <?php }
			                                        ?>
				                                </select>
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="address">Address
				                                    <span class="astk">*</span>
				                                </label>
				                                <textarea class="text-area" id="address" name="cust_s_address"><?php echo $_SESSION['customer']['cust_s_address']; ?></textarea>
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <label for="zip">Zip Code
				                                    <span class="astk">*</span>
				                                </label>
				                                <input type="text" id="zip" class="text-field" name="cust_s_zip" value="<?php echo $_SESSION['customer']['cust_s_zip']; ?>">
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <!-- Update Shipping Address /- -->
				                <div class="u-s-m-b-45">
                                    <button class="button button-primary w-100" name="updateBillingShipping">Update</button>
                                </div>
				            </div>
			            </form>
                        <!-- Page-Bar /- -->
                    </div>
                    <!-- Dashboard-Right-Wrapper /- -->
                </div>
            </div>
        </div>

        <?php include('partials/footer.php') ?>
	</div>
	
	<?php include('partials/js.php') ?>