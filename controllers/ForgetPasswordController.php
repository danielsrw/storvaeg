<?php
    if(isset($_POST['frgPswd'])) {

        $valid = 1;
            
        if(empty($_POST['cust_email'])) {
            $valid = 0;
            $error_message .= "Email field required";
        } else {
            if (filter_var($_POST['cust_email'], FILTER_VALIDATE_EMAIL) === false) {
                $valid = 0;
                $error_message .= LANG_VALUE_134."\\n";
            } else {
                $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
                $statement->execute(array($_POST['cust_email']));
                $total = $statement->rowCount();
                if(!$total) {
                    $valid = 0;
                    $error_message .= "That email is unknown to our database please try again";
                }
            }
        }

        if($valid == 1) {

            $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $forget_password_message = $row['forget_password_message'];
            }

            $token = md5(rand());
            $now = time();

            $statement = $pdo->prepare("UPDATE tbl_customer SET cust_token=?,cust_timestamp=? WHERE cust_email=?");
            $statement->execute(array($token,$now,strip_tags($_POST['cust_email'])));
            
            $message = '<p>'.'sindabimeny'.'<br> <a href="'.BASE_URL.'reset-password.php?email='.$_POST['cust_email'].'&token='.$token.'">Click here</a>';
            
            $to      = $_POST['cust_email'];
            $subject = "Sinzi nange ubu nihebye";
            $headers = "From: noreply@" . BASE_URL . "\r\n" .
                       "Reply-To: noreply@" . BASE_URL . "\r\n" .
                       "X-Mailer: PHP/" . phpversion() . "\r\n" . 
                       "MIME-Version: 1.0\r\n" . 
                       "Content-Type: text/html; charset=ISO-8859-1\r\n";

            mail($to, $subject, $message, $headers);

            $success_message = $forget_password_message;
        }
    }
?>