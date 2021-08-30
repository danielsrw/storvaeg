<?php

	include('inc/functions.php');

	include('partials/css.php')

?>

<?php
	// Check if the customer is logged in or not
	if(!isset($_SESSION['customer'])) {
	    header('location: '.BASE_URL.'logout.php');
	    exit;
	} else {
	    // If customer is logged in, but admin make him inactive, then force logout this user.
	    $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=? AND cust_status=?");
	    $statement->execute(array($_SESSION['customer']['cust_id'],0));
	    $total = $statement->rowCount();
	    if($total) {
	        header('location: '.BASE_URL.'logout.php');
	        exit;
	    }
	}
?>

	<title>STORVAEG - ORDERs</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Orders -->
		<div class="page-shop u-s-p-t-80">
            <div class="container">
                <div class="row">
                    <!-- Dashboard-Left-Side-Bar-Wrapper -->
                    <?php include('partials/sidebar.php') ?>
                    <!-- Dashboard-Left-Side-Bar-Wrapper /- -->

                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <!-- Page-Bar -->
                        <div class="page-bar clearfix">
                            <h6 class="title-name">Order history</h6>
							<div class="row">
				                <div class="col-lg-12 col-md-12 col-sm-12">
				                    <div class="touch-wrapper">
				                        <div class="table-wrapper u-s-m-b-60">
				                            <table>
				                                <thead>
				                                    <tr>
				                                        <th>ID</th>
				                                        <th>Product</th>
				                                        <th>Amout</th>
				                                        <th>Status</th>
				                                        <th>Method</th>
				                                        <th>Payment ID</th>
				                                        <th>Date</th>
				                                    </tr>
				                                </thead>
				                                <?php
									                /* ===================== Pagination Code Starts ================== */
									                $adjacents = 5;

									                $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? ORDER BY id DESC");
									                $statement->execute(array($_SESSION['customer']['cust_email']));
									                $total_pages = $statement->rowCount();

									                $targetpage = BASE_URL.'customer-order.php';
									                $limit = 10;
									                $page = @$_GET['page'];
									                if($page) 
									                    $start = ($page - 1) * $limit;
									                else
									                    $start = 0;
									                
									                
									                $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE customer_email=? ORDER BY id DESC LIMIT $start, $limit");
									                $statement->execute(array($_SESSION['customer']['cust_email']));
									                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
									               
									                
									                if ($page == 0) $page = 1;
									                $prev = $page - 1;
									                $next = $page + 1;
									                $lastpage = ceil($total_pages/$limit);
									                $lpm1 = $lastpage - 1;   
									                $pagination = "";
									                if($lastpage > 1)
									                {   
									                    $pagination .= "<div class=\"pagination\">";
									                    if ($page > 1) 
									                        $pagination.= "<a href=\"$targetpage?page=$prev\">&#171; previous</a>";
									                    else
									                        $pagination.= "<span class=\"disabled\">&#171; previous</span>";    
									                    if ($lastpage < 7 + ($adjacents * 2))
									                    {   
									                        for ($counter = 1; $counter <= $lastpage; $counter++)
									                        {
									                            if ($counter == $page)
									                                $pagination.= "<span class=\"current\">$counter</span>";
									                            else
									                                $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
									                        }
									                    }
									                    elseif($lastpage > 5 + ($adjacents * 2))
									                    {
									                        if($page < 1 + ($adjacents * 2))        
									                        {
									                            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
									                            {
									                                if ($counter == $page)
									                                    $pagination.= "<span class=\"current\">$counter</span>";
									                                else
									                                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
									                            }
									                            $pagination.= "...";
									                            $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
									                            $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
									                        }
									                        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
									                        {
									                            $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
									                            $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
									                            $pagination.= "...";
									                            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
									                            {
									                                if ($counter == $page)
									                                    $pagination.= "<span class=\"current\">$counter</span>";
									                                else
									                                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
									                            }
									                            $pagination.= "...";
									                            $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
									                            $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
									                        }
									                        else
									                        {
									                            $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
									                            $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
									                            $pagination.= "...";
									                            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
									                            {
									                                if ($counter == $page)
									                                    $pagination.= "<span class=\"current\">$counter</span>";
									                                else
									                                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
									                            }
									                        }
									                    }
									                    if ($page < $counter - 1) 
									                        $pagination.= "<a href=\"$targetpage?page=$next\">next &#187;</a>";
									                    else
									                        $pagination.= "<span class=\"disabled\">next &#187;</span>";
									                    $pagination.= "</div>\n";       
									                }
									                /* ===================== Pagination Code Ends ================== */
									            ?>
				                                <tbody>
				                                	<?php
		                                                $tip = $page*10-10;
					                                    foreach ($result as $row) {
					                                        $tip++;
					                                        ?>
						                                    <tr>
						                                        <td>
						                                            <div class="cart-stock">
						                                                <?php echo $row['id']; ?>
						                                            </div>
						                                        </td>
						                                        <td>
						                                        	<?php
						                                                $statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
						                                                $statement1->execute(array($row['payment_id']));
						                                                $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
						                                                foreach ($result1 as $row1) {
						                                                	echo "<div class='cart-anchor-image'>";
						                                                		echo "<a href=''>";
						                                                			echo "<h6>" . $row1['product_name'] ."</h6>";
						                                                		echo "</a>";
						                                                	echo "</div>";
								                                        }
								                                    ?>
						                                        </td>
						                                        <td>
						                                            <div class="cart-price">
						                                                <?php echo number_format($row['paid_amount']); ?> RWF
						                                            </div>
						                                        </td>
						                                        <td>
						                                            <div class="cart-stock">
						                                                <span class="badge badge-success">
						                                                	<?php echo $row['payment_status']; ?>
						                                                </span>
						                                            </div>
						                                        </td>
						                                        <td>
						                                            <div class="cart-stock">
						                                                <?php echo $row['payment_method']; ?>
						                                            </div>
						                                        </td>
						                                        <td>
						                                            <div class="cart-stock">
						                                                <?php echo $row['payment_id']; ?>
						                                            </div>
						                                        </td>
						                                        <td>
						                                            <div class="cart-stock">
						                                                <?php
																			$date=date_create($row['payment_date']);
																			echo date_format($date,"Y/m/d H:i:s");
																		?>
						                                            </div>
						                                        </td>
						                                    </tr>
						                                <?php }
				                                	?>
				                                </tbody>
				                            </table>
				                        </div>
				                    </div>
				                </div>
				            </div>
                        </div>
                        <!-- Page-Bar /- -->
                    </div>
                </div>
            </div>
        </div>

        <?php include('partials/footer.php') ?>
		
	</div>
	
	<?php include('partials/js.php') ?>