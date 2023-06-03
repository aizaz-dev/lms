<?php

//issue_book_details.php

include 'database_connection.php';

include 'function.php';

if(!is_user_login())
{
	header('location:user_login.php');
}

$query = "
	SELECT * FROM lms_issue_book 
	INNER JOIN lms_book 
	ON lms_book.book_isbn_number = lms_issue_book.book_id 
	WHERE lms_issue_book.user_id = '".$_SESSION['user_id']."' 
	ORDER BY lms_issue_book.issue_book_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

include 'header.php';

?>
<link rel="stylesheet" href="./asset/css/styles.css">
<link rel="stylesheet" href="./asset/css/simple-datatables-style.css">
<link rel="stylesheet" href="./asset/css/select2.min.css">
<link rel="stylesheet" href="./asset/css/vanillaSelectBox.css">
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

@media (max-width: 1000px) {
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

<div class="container-fluid py-4" style="min-height: 700px;">
	<h1>Issue Book Detail</h1>
	<div class="card mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">
					<i class="fas fa-table me-1"></i> Issue Book Detail
				</div>
				<div class="col col-md-6" align="right">
				</div>
			</div>
		</div>
		<div class="card-body table-container">
			<table id="datatablesSimple">
				<thead>
					<tr>
						<th class="th">Book ISBN No.</th>
						<th>Book Name</th>
						<th>Issue Date</th>
						<th>Return book till</th>
						
						<th>Status</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Book ISBN No.</th>
						<th>Book Name</th>
						<th>Issue Date</th>
						<th>Return book till</th>
						<th>Status</th>
					</tr>
				</tfoot>
				<tbody>
				<?php 
				if($statement->rowCount() > 0)
				{
					foreach($statement->fetchAll() as $row)
					{
						$status = $row["book_issue_status"];
						if($status == 'Issue')
						{
							$status = '<span class="badge bg-warning">Issue</span>';
						}

						if($status == 'Not Return')
						{
							$status = '<span class="badge bg-danger">Not Return</span>';
						}

						if($status == 'Return')
						{
							$status = '<span class="badge bg-primary">Return</span>';
						}

						echo '
						<tr>
							<td data-label="Book Isbn No.">'.$row["book_isbn_number"].'</td>
							<td data-label="Book Name">'.$row["book_name"].'</td>
							<td data-label="Issue Date">'.$row["issue_date_time"].'</td>
							<td data-label="Return Book till">'.$row["expected_return_date"].'</td>
							
							<td data-label="Status">'.$status.'</td>
						</tr>
						';
					}
				}
				?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<?php 

include 'footer.php';

?>