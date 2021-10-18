<?php

	// Register user
	if (isset($_POST['signUp'])) {
		$valid = 1;

		if (empty($_POST['cust_name'])) {
			$valid = 0;
			$error_message .= "Names required" . "<br>";
		}

		if (empty($_POST['cust_email'])) {
			$valid = 0;
			$error_message .= "Email required" . "<br>";
		} else {
			if (filter_var($_POST['cust_email'], FILTER_VALIDATE_EMAIL) == false) {
				$valid = 0;
				$error_message .= "Already registered" . "<br>";
			} else {
				$statement = $pdo->prepare("SELECT * FROM tbl_users WHERE cust_email = ?");
				$statement->execute(array($_POST['cust_email']));
				$total = $statement->rowCount();

				if ($total) {
					$valid = 0;
					$error_message .= "Failed try again" . "<br>";
				}
			}
		}

		if (empty($_POST['cust_phone'])) {
			$valid = 0;
			$error_message .= "Phone number required" . "<br>";
		}

		if (empty($_POST['cust_password']) || empty($_POST['cust_re_password'])) {
			$valid = 0;
			$error_message .= "Password required" . "<br>";
		}

		if (!empty($_POST['cust_password']) && !empty($_POST['cust_re_password'])) {
			if ($_POST['cust_password'] != $_POST['cust_re_password']) {
				$valid = 0;
				$error_message .= "Two password do not match";
			}
		}

		if ($valid == 1) {
			$token = md5(time());
	        $cust_datetime = date('Y-m-d h:i:s');
	        $cust_timestamp = time();

			$statement = $pdo->prepare("INSERT INTO tbl_users (cust_name, cust_email, cust_phone, cust_password, cust_token, cust_datetime, cust_timestamp) VALUES(?, ?, ?, ?, ?, ?, ?)");
			$statement->execute(array(
				strip_tags($_POST['cust_name']),
				strip_tags($_POST['cust_email']),
				strip_tags($_POST['cust_phone']),
				md5($_POST['cust_password']),
				$token,
				$cust_datetime,
				$cust_timestamp,
			));

			unset($_POST['cust_name']);
			unset($_POST['cust_email']);
			unset($_POST['cust_phone']);

			$success_message = "Your registration is completed";
		}
	}

	// Login user
	if (isset($_POST['signIn'])) {
		if (empty($_POST['cust_email']) || empty($_POST['cust_password'])) {
			$error_message = "Email required" . "<br>";
		} else {
			$cust_email = strip_tags($_POST['cust_email']);
			$cust_password = strip_tags($_POST['cust_password']);

			$statement = $pdo->prepare("SELECT * FROM tbl_users WHERE cust_email = ?");
			$statement->execute(array($cust_email));
			$total = $statement->rowCount();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($result as $row) {
				$row_password = $row['cust_password'];
			}

			if ($total == 0) {
				$error_message .= "Failed to sign in try again" . "<br>";
			} else {
				if ($row_password != md5($cust_password)) {
					$error_message = "Wrong password" . "<br>";
				} else {
					$_SESSION['customer'] = $row;
					header("location: " . BASE_URL . "home.php");
				}
			}
		}
	}

?>