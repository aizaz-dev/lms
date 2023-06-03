<?php

//profile.php

include 'database_connection.php';

include 'function.php';

if(!is_user_login())
{
	header('location:user_login.php');
}

$message = '';

$success = '';

if(isset($_POST['save_button']))
{
	$formdata = array();

	if(empty($_POST['user_email_address']))
	{
		$message .= '<li>Email Address is required</li>';
	}
	else
	{
		if(!filter_var($_POST["user_email_address"], FILTER_VALIDATE_EMAIL))
		{
			$message .= '<li>Invalid Email Address</li>';
		}
		else
		{
			$formdata['user_email_address'] = trim($_POST['user_email_address']);
		}
	}

	if(empty($_POST['user_password']))
	{
		$message .= '<li>Password is required</li>';
	}
	else
	{
		$formdata['user_password'] = trim($_POST['user_password']);
	}

	if(empty($_POST['user_name']))
	{
		$message .= '<li>User Name is required</li>';
	}
	else
	{
		$formdata['user_name'] = trim($_POST['user_name']);
	}

	

	if(empty($_POST['user_contact_no']))
	{
		$message .= '<li>User contact is required</li>';
	}
	else
	{
		$formdata['user_contact_no'] = $_POST['user_contact_no'];
	}

	



	if($message == '')
	{
		$data = array(
			':user_name'			=>	$formdata['user_name'],
			
			':user_contact_no'		=>	$formdata['user_contact_no'],
			
			':user_email_address'	=>	$formdata['user_email_address'],
			':user_password'		=>	$formdata['user_password'],
			':user_updated_on'		=>	get_date_time($connect),
			':user_unique_id'		=>	$_SESSION['user_id']
		);

		$query = "
		UPDATE lms_user 
            SET user_name = :user_name, 
            
            user_contact_no = :user_contact_no, 
          
            user_email_address = :user_email_address, 
            user_password = :user_password, 
            user_updated_on = :user_updated_on 
            WHERE user_unique_id = :user_unique_id
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		$success = 'Data Change Successfully';
	}
}


$query = "
	SELECT * FROM lms_user 
	WHERE user_unique_id = '".$_SESSION['user_id']."'
";

$result = $connect->query($query);

include 'header.php';

?>
<link rel="stylesheet" href="./asset/css/styles.css">
<link rel="stylesheet" href="./asset/css/simple-datatables-style.css">
<link rel="stylesheet" href="./asset/css/select2.min.css">
<link rel="stylesheet" href="./asset/css/vanillaSelectBox.css">

<div class="d-flex align-items-center justify-content-center mt-5 mb-5" style="min-height:700px;">
	<div class="col-md-6">
		<?php 
		if($message != '')
		{
			echo '<div class="alert alert-danger"><ul>'.$message.'</ul></div>';
		}

		if($success != '')
		{
			echo '<div class="alert alert-success">'.$success.'</div>';
		}
		?>
		<div class="card">
			<div class="card-header">Profile</div>
			<div class="card-body">
			<?php 
			foreach($result as $row)
			{
			?>
				<form method="POST" enctype="multipart/form-data">
					<div class="mb-3">
						<label class="form-label">Email address</label>
						<input type="text" name="user_email_address" id="user_email_address" class="form-control" value="<?php echo $row['user_email_address']; ?>" />
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="user_password" id="user_password" class="form-control" value="<?php echo $row['user_password']; ?>" />
					</div>
					<div class="mb-3">
						<label class="form-label">User Name</label>
						<input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $row['user_name']; ?>" />
					</div>
					<div class="mb-3">
						<label class="form-label">User Contact No.</label>
						<input type="text" name="user_contact_no" id="user_contact_no" class="form-control" value="<?php echo $row['user_contact_no']; ?>" />
					</div>
					
					
					<div class="text-center mt-4 mb-2">
						<input type="submit" name="save_button" class="btn btn-primary" value="Save" />
					</div>
				</form>

			<?php
			}
			?>
			</div>
		</div>
	</div>
</div>

<?php 

include 'footer.php';

?>