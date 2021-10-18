<?php
    if(!isset($_REQUEST['id'])) {
        header('location: home.php');
        exit;
    } else {
        // Check the id is valid or not
        $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
        $statement->execute(array($_REQUEST['id']));
        $total = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if( $total == 0 ) {
            header('location: home.php');
            exit;
        }
    }

    foreach($result as $row) {
        $p_name = $row['p_name'];
        $p_old_price = $row['p_old_price'];
        $p_current_price = $row['p_current_price'];
        $p_qty = $row['p_qty'];
        $p_featured_photo = $row['p_featured_photo'];
        $p_description = $row['p_description'];
        $p_short_description = $row['p_short_description'];
        $p_feature = $row['p_feature'];
        $p_condition = $row['p_condition'];
        $p_return_policy = $row['p_return_policy'];
        $p_total_view = $row['p_total_view'];
        $p_is_featured = $row['p_is_featured'];
        $p_is_active = $row['p_is_active'];
        $ecat_id = $row['ecat_id'];
    }

    // Getting all categories name for breadcrumb
    $statement = $pdo->prepare("SELECT
                            t1.ecat_id,
                            t1.ecat_name,
                            t1.mcat_id,

                            t2.mcat_id,
                            t2.mcat_name,
                            t2.tcat_id,

                            t3.tcat_id,
                            t3.tcat_name

                            FROM tbl_end_category t1
                            JOIN tbl_mid_category t2
                            ON t1.mcat_id = t2.mcat_id
                            JOIN tbl_top_category t3
                            ON t2.tcat_id = t3.tcat_id
                            WHERE t1.ecat_id=?");
    $statement->execute(array($ecat_id));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
    foreach ($result as $row) {
        $ecat_name = $row['ecat_name'];
        $mcat_id = $row['mcat_id'];
        $mcat_name = $row['mcat_name'];
        $tcat_id = $row['tcat_id'];
        $tcat_name = $row['tcat_name'];
    }


    $p_total_view = $p_total_view + 1;

    $statement = $pdo->prepare("UPDATE tbl_product SET p_total_view=? WHERE p_id=?");
    $statement->execute(array($p_total_view,$_REQUEST['id']));


    $statement = $pdo->prepare("SELECT * FROM tbl_product_size WHERE p_id=?");
    $statement->execute(array($_REQUEST['id']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
    foreach ($result as $row) {
        $size[] = $row['size_id'];
    }

    $statement = $pdo->prepare("SELECT * FROM tbl_product_color WHERE p_id=?");
    $statement->execute(array($_REQUEST['id']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
    foreach ($result as $row) {
        $color[] = $row['color_id'];
    }


    if(isset($_POST['form_review'])) {
        
        $statement = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=? AND cust_id=?");
        $statement->execute(array($_REQUEST['id'],$_SESSION['customer']['cust_id']));
        $total = $statement->rowCount();
        
        if($total) {
            $error_message = LANG_VALUE_68; 
        } else {
            $statement = $pdo->prepare("INSERT INTO tbl_rating (p_id,cust_id,comment,rating) VALUES (?,?,?,?)");
            $statement->execute(array($_REQUEST['id'],$_SESSION['customer']['cust_id'],$_POST['comment'],$_POST['rating']));
            $success_message = LANG_VALUE_163;    
        }
        
    }

    // Getting the average rating for this product
    $t_rating = 0;
    $statement = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=?");
    $statement->execute(array($_REQUEST['id']));
    $tot_rating = $statement->rowCount();
    if($tot_rating == 0) {
        $avg_rating = 0;
    } else {
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $t_rating = $t_rating + $row['rating'];
        }
        $avg_rating = $t_rating / $tot_rating;
    }

    if(isset($_POST['form_add_to_cart'])) {

        // getting the currect stock of this product
        $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
        $statement->execute(array($_REQUEST['id']));
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
        foreach ($result as $row) {
            $current_p_qty = $row['p_qty'];
        }
        if($_POST['p_qty'] > $current_p_qty):
            $temp_msg = 'Sorry! There are only '.$current_p_qty.' item(s) in stock';
            ?>
            <script type="text/javascript">alert('<?php echo $temp_msg; ?>');</script>
            <?php
        else:
        if(isset($_SESSION['cart_p_id']))
        {
            $arr_cart_p_id = array();
            $arr_cart_size_id = array();
            $arr_cart_color_id = array();
            $arr_cart_p_qty = array();
            $arr_cart_p_current_price = array();

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
            foreach($_SESSION['cart_color_id'] as $key => $value) 
            {
                $i++;
                $arr_cart_color_id[$i] = $value;
            }


            $added = 0;
            if(!isset($_POST['size_id'])) {
                $size_id = 0;
            } else {
                $size_id = $_POST['size_id'];
            }
            if(!isset($_POST['color_id'])) {
                $color_id = 0;
            } else {
                $color_id = $_POST['color_id'];
            }
            for($i=1;$i<=count($arr_cart_p_id);$i++) {
                if( ($arr_cart_p_id[$i]==$_REQUEST['id']) && ($arr_cart_size_id[$i]==$size_id) && ($arr_cart_color_id[$i]==$color_id) ) {
                    $added = 1;
                    break;
                }
            }
            if($added == 1) {
               // $error_message1 = 'This product is already added to the shopping cart.';
               echo "<script type='text/javascript'>alert('This product is already added to the shopping cart');</script>";
            } else {

                $i=0;
                foreach($_SESSION['cart_p_id'] as $key => $res) 
                {
                    $i++;
                }
                $new_key = $i+1;

                if(isset($_POST['size_id'])) {

                    $size_id = $_POST['size_id'];

                    $statement = $pdo->prepare("SELECT * FROM tbl_size WHERE size_id=?");
                    $statement->execute(array($size_id));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        $size_name = $row['size_name'];
                    }
                } else {
                    $size_id = 0;
                    $size_name = '';
                }
                
                if(isset($_POST['color_id'])) {
                    $color_id = $_POST['color_id'];
                    $statement = $pdo->prepare("SELECT * FROM tbl_color WHERE color_id=?");
                    $statement->execute(array($color_id));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        $color_name = $row['color_name'];
                    }
                } else {
                    $color_id = 0;
                    $color_name = '';
                }
              

                $_SESSION['cart_p_id'][$new_key] = $_REQUEST['id'];
                $_SESSION['cart_size_id'][$new_key] = $size_id;
                $_SESSION['cart_size_name'][$new_key] = $size_name;
                $_SESSION['cart_color_id'][$new_key] = $color_id;
                $_SESSION['cart_color_name'][$new_key] = $color_name;
                $_SESSION['cart_p_qty'][$new_key] = $_POST['p_qty'];
                $_SESSION['cart_p_current_price'][$new_key] = $_POST['p_current_price'];
                $_SESSION['cart_p_name'][$new_key] = $_POST['p_name'];
                $_SESSION['cart_p_featured_photo'][$new_key] = $_POST['p_featured_photo'];

                // $success_message1 = 'Product is added to the cart successfully!';
                echo "<script type='text/javascript'>alert('Product is added to the cart successfully!');</script>";
            }
            
        }
        else
        {

            if(isset($_POST['size_id'])) {

                $size_id = $_POST['size_id'];

                $statement = $pdo->prepare("SELECT * FROM tbl_size WHERE size_id=?");
                $statement->execute(array($size_id));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) {
                    $size_name = $row['size_name'];
                }
            } else {
                $size_id = 0;
                $size_name = '';
            }
            
            if(isset($_POST['color_id'])) {
                $color_id = $_POST['color_id'];
                $statement = $pdo->prepare("SELECT * FROM tbl_color WHERE color_id=?");
                $statement->execute(array($color_id));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) {
                    $color_name = $row['color_name'];
                }
            } else {
                $color_id = 0;
                $color_name = '';
            }
            

            $_SESSION['cart_p_id'][1] = $_REQUEST['id'];
            $_SESSION['cart_size_id'][1] = $size_id;
            $_SESSION['cart_size_name'][1] = $size_name;
            $_SESSION['cart_color_id'][1] = $color_id;
            $_SESSION['cart_color_name'][1] = $color_name;
            $_SESSION['cart_p_qty'][1] = $_POST['p_qty'];
            $_SESSION['cart_p_current_price'][1] = $_POST['p_current_price'];
            $_SESSION['cart_p_name'][1] = $_POST['p_name'];
            $_SESSION['cart_p_featured_photo'][1] = $_POST['p_featured_photo'];

            $success_message1 = 'Product is added to the cart successfully!';
        }
        endif;
    }
?>