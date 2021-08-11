<?php

	include('inc/functions.php');

	include('partials/css.php');

	include('inc/checkLogIn.php');

	// include('controllers/ProfileController.php');

?>

	<title>STORVAEG - MY PROFILE</title>
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
                        <div class="page-bar clearfix">
                            <h6 class="title-name">Manage My Account</h6>
							<div class="row">
				                <div class="col-lg-12 col-md-12 col-sm-12">
				                    <div class="touch-wrapper">
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
				                        <form action="" method="post">
                                			<?php $csrf->echoInputField(); ?>
				                            <div class="group-inline u-s-m-b-30">
				                                <div class="group-1 u-s-p-r-16">
			                                        <label for="fullname">Full Name
			                                            <span class="astk">*</span>
			                                        </label>
			                                        <input type="text" id="fullname" name="cust_name" class="text-field" value="<?php echo $_SESSION['customer']['cust_name']; ?>">
			                                    </div>
			                                    <div class="group-2">
			                                        <label for="email">Email
			                                            <span class="astk">*</span>
			                                        </label>
			                                        <input type="text" id="email" name="cust_email" class="text-field" value="<?php echo $_SESSION['customer']['cust_email']; ?>" disabled>
			                                    </div>
				                            </div>
				                            <div class="group-inline u-s-m-b-30">
				                                <div class="group-1 u-s-p-r-16">
			                                        <label for="company">Company Name
			                                            <span class="astk">*</span>
			                                        </label>
			                                        <input type="text" id="company" name="cust_cname" class="text-field"  value="<?php echo $_SESSION['customer']['cust_cname']; ?>">
			                                    </div>
			                                    <div class="group-2">
			                                        <label for="phone">Phone Number
			                                            <span class="astk">*</span>
			                                        </label>
			                                        <input type="text" id="phone" name="cust_phone" class="text-field" value="<?php echo $_SESSION['customer']['cust_phone']; ?>">
			                                    </div>
				                            </div>
				                            <div class="u-s-m-b-30">
			                                    <label for="address">Address
			                                        <span class="astk">*</span>
			                                    </label>
			                                    <textarea class="text-area" id="address" name="cust_address"><?php echo $_SESSION['customer']['cust_address']; ?></textarea>
			                                </div>
				                            <div class="group-inline u-s-m-b-30">
				                                <div class="group-1 u-s-p-r-16">
			                                        <label for="country">Country
			                                            <span class="astk">*</span>
			                                        </label>
			                                        <select id="country" name="cust_country" class="text-field">
			                                        	<?php
							                                $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
							                                $statement->execute();
							                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
							                                foreach ($result as $row) { ?>
				                                            	<option value="<?php echo $row['country_id']; ?>" <?php if($row['country_id'] == $_SESSION['customer']['cust_country']) {echo 'selected';} ?>><?php echo $row['country_name']; ?></option>
					                                        <?php }
				                                        ?>
			                                        </select>
			                                    </div>
			                                    <div class="group-2">
			                                        <label for="city">City
			                                            <span class="astk">*</span>
			                                        </label>
			                                        <input type="text" id="city" name="cust_city" class="text-field" value="<?php echo $_SESSION['customer']['cust_city']; ?>">
			                                    </div>
				                            </div>
				                            <div class="group-inline u-s-m-b-30">
				                                <div class="group-1 u-s-p-r-16">
			                                        <label for="state">State
			                                            <span class="astk">*</span>
			                                        </label>
			                                        <input type="text" id="state" name="cust_state" class="text-field" value="<?php echo $_SESSION['customer']['cust_state']; ?>">
			                                    </div>
			                                    <div class="group-2">
			                                        <label for="zip">Zip Code
			                                            <span class="astk">*</span>
			                                        </label>
			                                        <input type="text" id="zip" name="cust_zip" class="text-field" value="<?php echo $_SESSION['customer']['cust_zip']; ?>">
			                                    </div>
				                            </div>
				                            <div class="u-s-m-b-30">
				                                <button type="submit" name="updateProfile" class="button button-outline-secondary">Update Profile</button>
				                            </div>
				                        </form>
				                    </div>
				                </div>
				            </div>
                        </div>
                        <!-- Page-Bar /- -->
                    </div>
                    <!-- Dashboard-Right-Wrapper /- -->
                </div>
            </div>
        </div>

        <?php include('partials/footer.php') ?>
	</div>
	
	<?php include('partials/js.php') ?>