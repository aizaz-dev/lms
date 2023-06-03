<?php

//index.php

include '../database_connection.php';

include '../function.php';

if(!is_admin_login())
{
	header('location:../admin_login.php');
}


include '../header.php';

?>
<link rel="stylesheet" href="../asset/css/styles.css">
<link rel="stylesheet" href="../asset/css/simple-datatables-style.css">
<link rel="stylesheet" href="../asset/css/select2.min.css">
<link rel="stylesheet" href="../asset/css/vanillaSelectBox.css">

<div class="container-fluid py-4">
	<h1 class="mb-5">Dashboard</h1>
	<div class="row">
		<div class="col-xl-3 col-md-6">
			<div class="card bg-primary text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_issue_book_number($connect); ?></h1>
					<h5 class="text-center">Total Book Issue</h5>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-warning text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_returned_book_number($connect); ?></h1>
					<h5 class="text-center">Total Book Returned</h5>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-danger text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_not_returned_book_number($connect); ?></h1>
					<h5 class="text-center">Total Book Not Return</h5>
				</div>
			</div>
		</div>
		
		<div class="col-xl-3 col-md-6">
			<div class="card bg-success text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_book_number($connect); ?></h1>
					<h5 class="text-center">Total Book</h5>
				</div>
			</div>
		</div>
		
		<div class="col-xl-3 col-md-6">
			<div class="card bg-warning text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_category_number($connect); ?></h1>
					<h5 class="text-center">Total Category</h5>
				</div>
			</div>
		</div>
		
	</div>
</div>

<?php

include '../footer.php';

?>