<?php

	include('inc/functions.php');

	include('partials/css.php')

?>

	<title>STORVAEG - STORE DIRECTORY</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Page Introduction Wrapper -->
        <div class="page-style-a">
            <div class="container">
                <div class="page-intro">
                    <h2>Directory</h2>
                    <ul class="bread-crumb">
                        <li class="has-separator">
                            <i class="ion ion-md-home"></i>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="is-marked">
                            <a href="store-directory.php">Directory</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Introduction Wrapper /- -->
        <!-- Store-Directory-Page -->
        <div class="page-directory u-s-p-t-80">
            <div class="container">
                <?php
                    $i=0;
                    $statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        $i++;
                        ?>
                        <div class="directory-wrapper">
                            <h2>
                                <a href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category">
                                    <?php echo $row['tcat_name']; ?>
                                </a>
                            </h2>
                            <div class="row">
                                <?php
                                    $j=0;
                                    $statement1 = $pdo->prepare("SELECT * FROM tbl_mid_category WHERE tcat_id=?");
                                    $statement1->execute(array($row['tcat_id']));
                                    $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result1 as $row1) {
                                        $j++;
                                        ?>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                            <ul class="dir-list-wrap">
                                                <li>
                                                    <a class="dir-list-main" href="product-category.php?id=<?php echo $row1['mcat_id']; ?>&type=mid-category">
                                                        <?php echo $row1['mcat_name']; ?>
                                                    </a>
                                                </li>
                                                <?php
                                                    $k=0;
                                                    $statement2 = $pdo->prepare("SELECT * FROM tbl_end_category WHERE mcat_id=?");
                                                    $statement2->execute(array($row1['mcat_id']));
                                                    $result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($result2 as $row2) {
                                                        $k++;
                                                        ?>
                                                        <li>
                                                            <a href="product-category.php?id=<?php echo $row2['ecat_id']; ?>&type=end-category">
                                                                <?php echo $row2['ecat_name']; ?>
                                                            </a>
                                                        </li>
                                                    <?php }
                                                ?>
                                            </ul>
                                            <br>
                                        </div>
                                    <?php }
                                ?>
                            </div>
                        </div>
                    <?php }
                ?>
            </div>
        </div>
        <!-- Store-Directory-Page /- -->

        <?php include('partials/footer.php') ?>
	</div>
	
	<?php include('partials/js.php') ?>