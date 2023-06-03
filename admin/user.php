<?php

//user.php

include '../database_connection.php';

include '../function.php';

if(!is_admin_login())
{
	header('location:../admin_login.php');
}

if(isset($_GET["action"], $_GET['status'], $_GET['code']) && $_GET["action"] == 'delete')
{
	$user_id = $_GET["code"];
	$status = $_GET["status"];

	

	$query = "
	DELETE from lms_user 
    WHERE user_id = $user_id
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	header('location:user.php?msg='.strtolower($status).'');
}

$query = "
	SELECT * FROM lms_user 
    ORDER BY user_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

include '../header.php';

?>

<div class="container-fluid py-4" style="min-height: 700px;">
	<h1>User Management</h1>
	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">User Management</li>
    </ol>
    <?php 
 	
 	if(isset($_GET["msg"]))
 	{
 		if($_GET["msg"] == 'disable')
 		{
 			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">User Deleted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
 		}

 		if($_GET["msg"] == 'enable')
 		{
 			echo '
 			<div class="alert alert-success alert-dismissible fade show" role="alert">User Deleted <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
 			';
 		}
 	}

    ?>
	<link rel="stylesheet" href="../asset/css/styles.css">
<link rel="stylesheet" href="../asset/css/simple-datatables-style.css">
<link rel="stylesheet" href="../asset/css/select2.min.css">
<link rel="stylesheet" href="../asset/css/vanillaSelectBox.css">
<style>
		table th,td {
	    border : 1px solid black;
		text-align: center;
		padding:8px;

	}
	.table-container{
		overflow-x: auto;

	}


td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

@media (max-width: 1300px) {
  /* Adjust styles for devices with a maximum width of 768px */
  table thead,tfoot{
	display:none;

  }
  table ,table tbody,table tr, table td {
	display:block;
	width:100%;
  }
  table tr{
	margin-bottom:15px
  }
  table tbody tr td{
	text-align:right;
	padding-Left:50%;
	position: relative;

  }
  table td:before{
    content:attr(data-label);
	position:absolute;
	Left:0;
	width:50%;
	padding-left:15px;
	font-weight:700;
	font-size:14px;
	text-align:left;
	
  }
  @media (max-width:460px) {

  


   td {
    white-space: normal;
    overflow: visible;
    text-overflow: clip;

}
}

}
</style>
    <div class="card mb-4">
    	<div class="card-header">
    		<div class="row">
    			<div class="col col-md-6">
    				<i class="fas fa-table me-1"></i> User Management
    			</div>
    			<div class="col col-md-6" align="right">
    			</div>
    		</div>
    	</div>
    	<div class="card-body">
    		<table id="datatablesSimple">
    			<thead>
    				<tr>
    					
                        <th>User Unique ID</th>
                        <th>User Name</th>
                        <th>Email Address</th>
                        <th>Password</th>
                        <th>Contact No.</th>            
                        <th>Created On</th>
                        
                        <th>Action</th>
    				</tr>
    			</thead>
    			<tfoot>
    				<tr>					
                        <th>User Unique ID</th>
                        <th>User Name</th>
                        <th>Email Address</th>
                        <th>Password</th>
                        <th>Contact No.</th>
                        <th>Created On</th>
                        
                        <th>Action</th>
    				</tr>
    			</tfoot>
    			<tbody>
    			<?php 
    			if($statement->rowCount() > 0)
    			{
    				foreach($statement->fetchAll() as $row)
    				{
    					$user_status = '';
    					if($row['user_status'] == 'Enable')
    					{
    						$user_status = '<div class="badge bg-success">Enable</div>';
    					}
    					else
    					{
    						$user_status = '<div class="badge bg-danger">Disable</div>';
    					}
    					echo '
    					<tr>
    						
    						<td data-label="User Unique ID">'.$row["user_unique_id"].'</td>
    						<td data-label="User Name">'.$row["user_name"].'</td>
    						<td data-label="Email Address">'.$row["user_email_address"].'</td>
    						<td data-label="Password">'.$row["user_password"].'</td>
    						<td data-label="Contact no.">'.$row["user_contact_no"].'</td>
    						<td data-label="Creadted on">'.$row["user_created_on"].'</td>
    						
    						<td data-label="Action"><button type="button" name="delete_button" class="btn btn-danger btn-sm" onclick="delete_data(`'.$row["user_id"].'`, `'.$row["user_status"].'`)">Delete</td>
    					</tr>
    					';
    				}
    			}
    			else
    			{
    				echo '

    				<tr>
    					<td colspan="12" class="text-center">No Data Found</td>
    				</tr>
    				';
    			}
    			?>
    			</tbody>
    		</table>
    	</div>
    </div>
</div>

<script>

	function delete_data(code, status)
	{
		var new_status = 'Enable';

		if(status == 'Enable')
		{
			new_status = 'Disable';
		}

		if(confirm("Are you sure you want to delete this User?"))
		{
			window.location.href = "user.php?action=delete&code="+code+"&status="+new_status+"";
		}
	}

</script>

<?php 

include '../footer.php';

?>