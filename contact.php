<?php

	include('inc/functions.php');

	include('partials/css.php')

?>

<?php

	// After form submit checking everything for email sending
	if(isset($_POST['form_contact']))
	{
	    $error_message = '';
	    $success_message = '';
	    $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	    $statement->execute();
	    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
	    foreach ($result as $row) 
	    {
	        $receive_email = $row['receive_email'];
	        $receive_email_subject = $row['receive_email_subject'];
	        $receive_email_thank_you_message = $row['receive_email_thank_you_message'];
	    }

	    $valid = 1;

	    if(empty($_POST['visitor_name']))
	    {
	        $valid = 0;
	        $error_message .= 'Please enter your name.\n';
	    }

	    if(empty($_POST['visitor_phone']))
	    {
	        $valid = 0;
	        $error_message .= 'Please enter your phone number.\n';
	    }


	    if(empty($_POST['visitor_email']))
	    {
	        $valid = 0;
	        $error_message .= 'Please enter your email address.\n';
	    }
	    else
	    {
	        // Email validation check
	        if(!filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL))
	        {
	            $valid = 0;
	            $error_message .= 'Please enter a valid email address.\n';
	        }
	    }

	    if(empty($_POST['visitor_message']))
	    {
	        $valid = 0;
	        $error_message .= 'Please enter your message.\n';
	    }

	    if($valid == 1)
	    {
	        $visitor_name = strip_tags($_POST['visitor_name']);
	        $visitor_email = strip_tags($_POST['visitor_email']);
	        $visitor_phone = strip_tags($_POST['visitor_phone']);
	        $visitor_message = strip_tags($_POST['visitor_message']);
	        // sending email
	        $to_admin = $receive_email;
	        $subject = $receive_email_subject;
	        $message = '
			<html><body>
			<table>
			<tr>
			<td>Name</td>
			<td>'.$visitor_name.'</td>
			</tr>
			<tr>
			<td>Email</td>
			<td>'.$visitor_email.'</td>
			</tr>
			<tr>
			<td>Phone</td>
			<td>'.$visitor_phone.'</td>
			</tr>
			<tr>
			<td>Comment</td>
			<td>'.nl2br($visitor_message).'</td>
			</tr>
			</table>
			</body></html>
			';
	        $headers = 'From: ' . $visitor_email . "\r\n" .
	                   'Reply-To: ' . $visitor_email . "\r\n" .
	                   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
	                   "MIME-Version: 1.0\r\n" . 
	                   "Content-Type: text/html; charset=ISO-8859-1\r\n";
	        // Sending email to admin                  
	        mail($to_admin, $subject, $message, $headers); 
	        $success_message = $receive_email_thank_you_message;
	    }
	}
?>

	<title>STORVAEG - CONTACT</title>
</head>
<body>

	<div id="app">
		<!-- Header -->
		<?php include('partials/header.php') ?>

		<!-- Page Introduction Wrapper -->
	    <div class="page-style-a">
	        <div class="container">
	            <div class="page-intro">
	                <h2>About</h2>
	                <ul class="bread-crumb">
	                    <li class="has-separator">
	                        <i class="ion ion-md-home"></i>
	                        <a href="index.php">Home</a>
	                    </li>
	                    <li class="is-marked">
	                        <a href="contact.php">Contact</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div>
	    <div class="page-contact u-s-p-t-80">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-6 col-md-6 col-sm-12">
	                    <div class="touch-wrapper">
	                        <h1 class="contact-h1">Get In Touch With Us</h1>
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
	                                    <label for="contact-name">Your Name
	                                        <span class="astk">*</span>
	                                    </label>
	                                    <input type="text" id="contact-name" name="visitor_name" class="text-field" placeholder="Name">
	                                </div>
	                                <div class="group-2">
	                                    <label for="contact-email">Your Email
	                                        <span class="astk">*</span>
	                                    </label>
	                                    <input type="text" id="contact-email" name="visitor_email" class="text-field" placeholder="Email">
	                                </div>
	                            </div>
	                            <div class="u-s-m-b-30">
	                                <label for="contact-phone">Phone Number
	                                    <span class="astk">*</span>
	                                </label>
	                                <input type="text" id="contact-phone" name="visitor_phone" class="text-field" placeholder="Phone Number">
	                            </div>
	                            <div class="u-s-m-b-30">
	                                <label for="contact-message">Message:</label>
	                                <textarea class="text-area" name="visitor_message" id="contact-message"></textarea>
	                            </div>
	                            <div class="u-s-m-b-30">
	                                <button type="submit" class="button button-outline-secondary" name="form_contact">Send Message</button>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	                <div class="col-lg-6 col-md-6 col-sm-12">
	                    <div class="information-about-wrapper">
	                        <h1 class="contact-h1">Information About Us</h1>
	                        <p>
	                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, tempora, voluptate. Architecto aspernatur, culpa cupiditate deserunt dolore eos facere in, incidunt omnis quae quam quos, similique sunt tempore vel vero.
	                        </p>
	                        <p>
	                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, tempora, voluptate. Architecto aspernatur, culpa cupiditate deserunt dolore eos facere in, incidunt omnis quae quam quos, similique sunt tempore vel vero.
	                        </p>
	                    </div>
	                    <div class="contact-us-wrapper">
	                        <h1 class="contact-h1">Contact Us</h1>
	                        <!-- <div class="contact-material u-s-m-b-16">
	                            <h6>Location</h6>
	                            <span>4441 Jett Lane</span>
	                            <span>Bellflower, CA 90706</span>
	                        </div> -->
	                        <div class="contact-material u-s-m-b-16">
	                            <h6>Email</h6>
	                            <span>storvaegrwanda@gmail.com</span>
	                        </div>
	                        <div class="contact-material u-s-m-b-16">
	                            <h6>Telephone</h6>
	                            <span>(+250) 781 862 349</span>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="u-s-p-t-80">
	            <div id="map"></div>
	        </div>
	    </div>
	    <!-- Contact-Page /- -->

        <?php include('partials/footer.php') ?>
		
	</div>
	
	<?php include('partials/js.php') ?>