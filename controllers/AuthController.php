<?php

	// Register user
	if (isset($_POST['signUp'])) {

	    $valid = 1;

	    if(empty($_POST['cust_name'])) {
	        $valid = 0;
	        $error_message .= "Name required"."<br>";
	    }

	    if(empty($_POST['cust_email'])) {
	        $valid = 0;
	        $error_message .= "Email required"."<br>";
	    } else {
	        if (filter_var($_POST['cust_email'], FILTER_VALIDATE_EMAIL) === false) {
	            $valid = 0;
	            $error_message .= "Already registered"."<br>";
	        } else {
	            $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
	            $statement->execute(array($_POST['cust_email']));
	            $total = $statement->rowCount();                            
	            if($total) {
	                $valid = 0;
	                $error_message .= "Failed try again"."<br>";
	            }
	        }
	    }

	    if(empty($_POST['cust_phone'])) {
	        $valid = 0;
	        $error_message .= "Phone number required"."<br>";
	    }

	    if(empty($_POST['cust_address'])) {
	        $valid = 0;
	        $error_message .= "Address"."<br>";
	    }

	    if(empty($_POST['cust_country'])) {
	        $valid = 0;
	        $error_message .= "Address required"."<br>";
	    }

	    if(empty($_POST['cust_city'])) {
	        $valid = 0;
	        $error_message .= "City required"."<br>";
	    }

	    if(empty($_POST['cust_state'])) {
	        $valid = 0;
	        $error_message .= "State required"."<br>";
	    }

	    if(empty($_POST['cust_zip'])) {
	        $valid = 0;
	        $error_message .= "Zip code required"."<br>";
	    }

	    if( empty($_POST['cust_password']) || empty($_POST['cust_re_password']) ) {
	        $valid = 0;
	        $error_message .= "Password required"."<br>";
	    }

	    if( !empty($_POST['cust_password']) && !empty($_POST['cust_re_password']) ) {
	        if($_POST['cust_password'] != $_POST['cust_re_password']) {
	            $valid = 0;
	            $error_message .= "Two password do not match"."<br>";
	        }
	    }

	    if($valid == 1) {

	        $token = md5(time());
	        $cust_datetime = date('Y-m-d h:i:s');
	        $cust_timestamp = time();

	        // saving into the database
	        $statement = $pdo->prepare("INSERT INTO tbl_customer (
	                                        cust_name,
	                                        cust_cname,
	                                        cust_email,
	                                        cust_phone,
	                                        cust_country,
	                                        cust_address,
	                                        cust_city,
	                                        cust_state,
	                                        cust_zip,
	                                        cust_b_name,
	                                        cust_b_cname,
	                                        cust_b_phone,
	                                        cust_b_country,
	                                        cust_b_address,
	                                        cust_b_city,
	                                        cust_b_state,
	                                        cust_b_zip,
	                                        cust_s_name,
	                                        cust_s_cname,
	                                        cust_s_phone,
	                                        cust_s_country,
	                                        cust_s_address,
	                                        cust_s_city,
	                                        cust_s_state,
	                                        cust_s_zip,
	                                        cust_password,
	                                        cust_token,
	                                        cust_datetime,
	                                        cust_timestamp,
	                                        cust_status
	                                    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	        $statement->execute(array(
	                                        strip_tags($_POST['cust_name']),
	                                        strip_tags($_POST['cust_cname']),
	                                        strip_tags($_POST['cust_email']),
	                                        strip_tags($_POST['cust_phone']),
	                                        strip_tags($_POST['cust_country']),
	                                        strip_tags($_POST['cust_address']),
	                                        strip_tags($_POST['cust_city']),
	                                        strip_tags($_POST['cust_state']),
	                                        strip_tags($_POST['cust_zip']),
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        '',
	                                        md5($_POST['cust_password']),
	                                        $token,
	                                        $cust_datetime,
	                                        $cust_timestamp,
	                                        0
	                                    ));


	        unset($_POST['cust_name']);
	        unset($_POST['cust_cname']);
	        unset($_POST['cust_email']);
	        unset($_POST['cust_phone']);
	        unset($_POST['cust_address']);
	        unset($_POST['cust_city']);
	        unset($_POST['cust_state']);
	        unset($_POST['cust_zip']);

	        $success_message = "Your registration is completed.";
	    }
	}

	// Login user
	if(isset($_POST['signIn'])) {
        
	    if(empty($_POST['cust_email']) || empty($_POST['cust_password'])) {
	        $error_message = "Email required".'<br>';
	    } else {
	        
	        $cust_email = strip_tags($_POST['cust_email']);
	        $cust_password = strip_tags($_POST['cust_password']);

	        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
	        $statement->execute(array($cust_email));
	        $total = $statement->rowCount();
	        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
	        foreach($result as $row) {
	            $cust_status = $row['cust_status'];
	            $row_password = $row['cust_password'];
	        }

	        if($total==0) {
	            $error_message .= "Wrong email".'<br>';
	        } else {
	            //using MD5 form
	            if( $row_password != md5($cust_password) ) {
	                $error_message .= "Wrong password".'<br>';
	            } else {
	                if($cust_status == 0) {
	                    $error_message .= "Sorry! Your account is inactive. Please contact to the administrator.".'<br>';
	                } else {
	                    $_SESSION['customer'] = $row;
	                    header("location: ".BASE_URL."dashboard.php");
	                }
	            }
	            
	        }
	    }
	}

?>