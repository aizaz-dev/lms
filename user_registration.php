<?php

//user_registration.php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

include 'database_connection.php';

include 'function.php';

if (is_user_login()) {
	header('location:issue_book_details.php');
}

$message = '';

$success = '';

if (isset($_POST["register_button"])) {
	$formdata = array();

	if (empty($_POST["user_email_address"])) {
		$message .= '<li>Email Address is required</li>';
	} else {
		if (!filter_var($_POST["user_email_address"], FILTER_VALIDATE_EMAIL)) {
			$message .= '<li>Invalid Email Address</li>';
		} else {
			$formdata['user_email_address'] = trim($_POST['user_email_address']);
		}
	}

	if (empty($_POST["user_password"])) {
		$message .= '<li>Password is required</li>';
	} else {
		$formdata['user_password'] = trim($_POST['user_password']);
	}

	if (empty($_POST['user_name'])) {
		$message .= '<li>User Name is required</li>';
	} else {
		$formdata['user_name'] = trim($_POST['user_name']);
	}

	if (empty($_POST['user_contact_no'])) {
		$message .= '<li>User Contact Number Detail is required</li>';
	} else {
		$formdata['user_contact_no'] = trim($_POST['user_contact_no']);
	}

	if ($message == '') {
		$data = array(
			':user_email_address' =>	$formdata['user_email_address']
		);

		$query = "
		SELECT * FROM lms_user 
        WHERE user_email_address = :user_email_address
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		if ($statement->rowCount() > 0) {
			$message = '<li>Email Already Register</li>';
		} else {


			$user_unique_id = 'U' . rand(10000000, 99999999);

			$data = array(
				':user_name'			=>	$formdata['user_name'],
				':user_contact_no'		=>	$formdata['user_contact_no'],
				':user_email_address'	=>	$formdata['user_email_address'],
				':user_password'		=>	$formdata['user_password'],

				':user_unique_id'		=>	$user_unique_id,
				':user_status'			=>	'Enable',
				':user_created_on'		=>	get_date_time($connect)
			);

			$query = "
			INSERT INTO lms_user 
            (user_name, user_contact_no, user_email_address, user_password, user_unique_id, user_status, user_created_on) 
            VALUES (:user_name, :user_contact_no,:user_email_address, :user_password, :user_unique_id, :user_status, :user_created_on)
			";

			$statement = $connect->prepare($query);

			$statement->execute($data);

			if ($statement) {
				header('location:user_login.php');
			}
		}
	}
}

include 'header.php';

?>
<link rel="stylesheet" href="./asset/css/styles.css">
<link rel="stylesheet" href="./asset/css/simple-datatables-style.css">
<link rel="stylesheet" href="./asset/css/select2.min.css">
<link rel="stylesheet" href="./asset/css/vanillaSelectBox.css">


<div class="d-flex align-items-center justify-content-center mt-5 mb-5" style="min-height:700px;">
	<div class="col-md-6">
		<?php

		if ($message != '') {
			echo '<div class="alert alert-danger"><ul>' . $message . '</ul></div>';
		}

		if ($success != '') {
			echo '<div class="alert alert-success">' . $success . '</div>';
		}

		?>
		<div class="card">
			<div class="card-header">New User Registration</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="mb-3">
						<label class="form-label">Email address</label>
						<input type="text" name="user_email_address" id="user_email_address" class="form-control" />
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="user_password" id="user_password" class="form-control" />
					</div>
					<div class="mb-3">
						<label class="form-label">User Name</label>
						<input type="text" name="user_name" class="form-control" id="user_name" value="" />
					</div>
					<div class="mb-3">
						<label class="form-label">User Contact No.</label>
						<input type="text" name="user_contact_no" id="user_contact_no" class="form-control" />
					</div>

					<div class="text-center mt-4 mb-2">
						<input type="submit" name="register_button" class="btn btn-primary" value="Register" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php


include 'footer.php';

?>