<?php

	// Update Billing & Shipping
	if (isset($_POST['updateBillingShipping'])) {

        // update data into the database
        $statement = $pdo->prepare("UPDATE tbl_customer SET 
                                cust_b_name=?, 
                                cust_b_cname=?, 
                                cust_b_phone=?, 
                                cust_b_country=?, 
                                cust_b_address=?, 
                                cust_b_city=?, 
                                cust_b_state=?, 
                                cust_b_zip=?,
                                cust_s_name=?, 
                                cust_s_cname=?, 
                                cust_s_phone=?, 
                                cust_s_country=?, 
                                cust_s_address=?, 
                                cust_s_city=?, 
                                cust_s_state=?, 
                                cust_s_zip=? 

                                WHERE cust_id=?");
        $statement->execute(array(
                                strip_tags($_POST['cust_b_name']),
                                strip_tags($_POST['cust_b_cname']),
                                strip_tags($_POST['cust_b_phone']),
                                strip_tags($_POST['cust_b_country']),
                                strip_tags($_POST['cust_b_address']),
                                strip_tags($_POST['cust_b_city']),
                                strip_tags($_POST['cust_b_state']),
                                strip_tags($_POST['cust_b_zip']),
                                strip_tags($_POST['cust_s_name']),
                                strip_tags($_POST['cust_s_cname']),
                                strip_tags($_POST['cust_s_phone']),
                                strip_tags($_POST['cust_s_country']),
                                strip_tags($_POST['cust_s_address']),
                                strip_tags($_POST['cust_s_city']),
                                strip_tags($_POST['cust_s_state']),
                                strip_tags($_POST['cust_s_zip']),
                                $_SESSION['customer']['cust_id']
                            ));  
       
        $success_message = "Billing and Shipping Information is updated successfully.";

        $_SESSION['customer']['cust_b_name'] = strip_tags($_POST['cust_b_name']);
        $_SESSION['customer']['cust_b_cname'] = strip_tags($_POST['cust_b_cname']);
        $_SESSION['customer']['cust_b_phone'] = strip_tags($_POST['cust_b_phone']);
        $_SESSION['customer']['cust_b_country'] = strip_tags($_POST['cust_b_country']);
        $_SESSION['customer']['cust_b_address'] = strip_tags($_POST['cust_b_address']);
        $_SESSION['customer']['cust_b_city'] = strip_tags($_POST['cust_b_city']);
        $_SESSION['customer']['cust_b_state'] = strip_tags($_POST['cust_b_state']);
        $_SESSION['customer']['cust_b_zip'] = strip_tags($_POST['cust_b_zip']);
        $_SESSION['customer']['cust_s_name'] = strip_tags($_POST['cust_s_name']);
        $_SESSION['customer']['cust_s_cname'] = strip_tags($_POST['cust_s_cname']);
        $_SESSION['customer']['cust_s_phone'] = strip_tags($_POST['cust_s_phone']);
        $_SESSION['customer']['cust_s_country'] = strip_tags($_POST['cust_s_country']);
        $_SESSION['customer']['cust_s_address'] = strip_tags($_POST['cust_s_address']);
        $_SESSION['customer']['cust_s_city'] = strip_tags($_POST['cust_s_city']);
        $_SESSION['customer']['cust_s_state'] = strip_tags($_POST['cust_s_state']);
        $_SESSION['customer']['cust_s_zip'] = strip_tags($_POST['cust_s_zip']);

	}

?>