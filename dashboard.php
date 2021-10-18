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
								Welcome to your dashboard
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