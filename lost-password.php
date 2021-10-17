<?php

	include('inc/functions.php');

	include('partials/css.php');

	include('controllers/ForgetPasswordController.php')

?>
	<title>STORVAEG - Forget Password</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Page Introduction Wrapper -->
	    <div class="page-style-a">
	        <div class="container">
	            <div class="page-intro">
	                <h2>Lost Password</h2>
	                <ul class="bread-crumb">
	                    <li class="has-separator">
	                        <i class="ion ion-md-home"></i>
	                        <a href="index.php">Home</a>
	                    </li>
	                    <li class="is-marked">
	                        <a href="lost-password.php">Lost Password</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>
	    <!-- Page Introduction Wrapper /- -->
	    <!-- Lost-password-Page -->
	    <div class="page-lost-password u-s-p-t-80">
	        <div class="container">
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
	            <div class="page-lostpassword">
	                <h2 class="account-h2 u-s-m-b-20">Forgot Password ?</h2>
	                <h6 class="account-h6 u-s-m-b-30">Enter your email below and we will send you a link to reset your password.</h6>
	                <form action="" method="post">
                        <?php $csrf->echoInputField(); ?>
	                    <div class="w-50">
	                        <div class="u-s-m-b-13">
	                            <label for="user-name-email">Email
	                                <span class="astk">*</span>
	                            </label>
	                            <input type="text" id="email" name="cust_email" class="text-field" placeholder="Email">
	                        </div>
	                        <div class="u-s-m-b-13">
	                            <button type="submit" class="button button-outline-secondary" name="frgPswd">
	                            	Get Reset Link
	                            </button>
	                        </div>
	                    </div>
	                    <div class="page-anchor">
	                        <a href="account.php">
	                            <i class="fas fa-long-arrow-alt-left u-s-m-r-9"></i>
	                            Back to Login
	                        </a>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	    <!-- Lost-Password-Page /- -->

        <?php include('partials/footer.php') ?>
		
	</div>
	
	<?php include('partials/js.php') ?>