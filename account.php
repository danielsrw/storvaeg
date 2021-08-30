<?php

	include('inc/functions.php');

	include('partials/css.php');

    include('controllers/AuthController.php')

?>

	<title>STORVAEG - BUSINESS ACCOUNT</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Page Introduction Wrapper -->
	    <div class="page-style-a">
	        <div class="container">
	            <div class="page-intro">
	                <h2>Business Account</h2>
	                <ul class="bread-crumb">
	                    <li class="has-separator">
	                        <i class="ion ion-md-home"></i>
	                        <a href="index.php">Home</a>
	                    </li>
	                    <li class="is-marked">
	                        <a href="account.php">Business Account</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>

        <!-- Account-Page -->
        <div class="page-account u-s-p-t-80">
            <div class="container">
                <div class="row">
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
                </div>
                <div class="row">
                    <!-- Login -->
                    <div class="col-lg-6">
                        <div class="login-wrapper">
                            <h2 class="account-h2 u-s-m-b-20">Login</h2>
                            <form action="" method="post">
                                <?php $csrf->echoInputField(); ?>
                                <div class="u-s-m-b-30">
                                    <label for="email">Email
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="email" id="email" name="cust_email" class="text-field" placeholder="Username / Email">
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="password">Password
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="password" name="cust_password" class="text-field" placeholder="Password">
                                </div>
                                <div class="group-inline u-s-m-b-30">
                                    <div class="group-1">
                                        <input type="checkbox" class="check-box" id="remember-me-token">
                                        <label class="label-text" for="remember-me-token">Remember me</label>
                                    </div>
                                    <div class="group-2 text-right">
                                        <div class="page-anchor">
                                            <a href="lost-password.php">
                                                <i class="fas fa-circle-o-notch u-s-m-r-9"></i>Lost your password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-b-45">
                                    <button class="button button-outline-secondary w-100" name="signIn">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login /- -->
                    <!-- Register -->
                    <div class="col-lg-6">
                        <div class="reg-wrapper">
                            <h2 class="account-h2 u-s-m-b-20">Register</h2>
                            <form action="" method="post">
                                <?php $csrf->echoInputField(); ?>
                                
                                <div class="group-inline u-s-m-b-30">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="fullname">Full Name
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="fullname" name="cust_name" class="text-field" placeholder="Name">
                                    </div>
                                    <div class="group-2">
                                        <label for="email">Email
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="email" name="cust_email" class="text-field" placeholder="Email">
                                    </div>
                                </div>
                                <div class="group-inline u-s-m-b-30">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="company">Company Name
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="company" name="cust_cname" class="text-field" placeholder="Company Name">
                                    </div>
                                    <div class="group-2">
                                        <label for="phone">Phone Number
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="phone" name="cust_phone" class="text-field" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="u-s-m-b-30">
                                    <label for="address">Address
                                        <span class="astk">*</span>
                                    </label>
                                    <textarea class="text-area" id="address" name="cust_address"></textarea>
                                </div>
                                <div class="group-inline u-s-m-b-30">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="country">Country
                                            <span class="astk">*</span>
                                        </label>
                                        <select id="country" name="cust_country" class="text-field">
                                            <option>Choose country</option>
                                            <?php
                                                $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
                                                $statement->execute();
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                                                foreach ($result as $row) { ?>
                                                    <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
                                                <?php }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <div class="group-2">
                                        <label for="city">City
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="city" name="cust_city" class="text-field" placeholder="City">
                                    </div>
                                </div>
                                <div class="group-inline u-s-m-b-30">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="state">State
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="state" name="cust_state" class="text-field" placeholder="State">
                                    </div>
                                    <div class="group-2">
                                        <label for="zip">Zip Code
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="text" id="zip" name="cust_zip" class="text-field" placeholder="Zip Code">
                                    </div>
                                </div>
                                <div class="group-inline u-s-m-b-30">
                                    <div class="group-1 u-s-p-r-16">
                                        <label for="password">Password
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="password" id="password" name="cust_password" class="text-field" placeholder="Password">
                                    </div>
                                    <div class="group-2">
                                        <label for="confirm_password">Confirm Password
                                            <span class="astk">*</span>
                                        </label>
                                        <input type="password" id="confirm_password" name="cust_re_password" class="text-field" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="u-s-m-b-45">
                                    <button class="button button-primary w-100" name="signUp">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Register /- -->
                </div>
            </div>
        </div>

        <?php include('partials/footer.php') ?>
	</div>
	
	<?php include('partials/js.php') ?>