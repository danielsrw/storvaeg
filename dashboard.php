<?php

	include('inc/functions.php');

	include('partials/css.php');

	include('inc/checkLogIn.php')

?>
	<title>STORVAEG - DASHBOARD</title>
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
							<div>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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