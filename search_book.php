<?php

//search_book.php

include 'database_connection.php';

include 'function.php';

if(!is_user_login())
{
	header('location:user_login.php');
}

if(isset($_GET["action"], $_GET['status'], $_GET['code']) && $_GET["action"] == 'borrow')
{
	$book_id = $_GET["code"];
	$status = $_GET["status"];

	$total_book_issue_day = get_total_book_issue_day($connect);

	$today_date = get_date_time($connect);

	$expected_return_date = date('Y-m-d H:i:s', strtotime($today_date. ' + '.$total_book_issue_day.' days'));

	$data = array(
		':book_id' => $book_id,
		':user_id' => $_SESSION['user_id'],	
		':issue_date_time' => $today_date,
		':expected_return_date' => $expected_return_date,
		':return_date_time' => '',
		':book_fines' => 0,
		':book_issue_status' => 'Issue',
		':book_status' => 'Disable'
	);
	
	$query = "
		INSERT INTO lms_issue_book 
		(book_id, user_id, issue_date_time, expected_return_date, return_date_time, book_fines, book_issue_status, book_status) 
		VALUES (:book_id, :user_id, :issue_date_time, :expected_return_date, :return_date_time, :book_fines, :book_issue_status, :book_status)
	";
	
	$statement = $connect->prepare($query);
	$statement->execute($data);
	
	$sql = "
		UPDATE lms_book 
		SET book_status = 'Disable' 
		WHERE book_isbn_number = '".$book_id."'
	";
	
	$stmt = $connect->prepare($sql);
	$stmt->execute();
	$_COOKIE["book_id"]='';



}



$query = "
	SELECT * FROM lms_book  
    ORDER BY book_id DESC
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
	.card-body{
	gap:10px;
	justify-content: center;

	}
	.btn1{
		margin:5px;
		border-radius: 12px;
	}
	.btn2{
		color:white;
		
	}
	.btn2:hover{
		cursor: initial;
		color:white;

	}



</style>

<div class="container-fluid py-4" style="min-height: 700px;">

	<h1>Search Book</h1>
	
	

	<div class="card mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">
					<i class="fas fa-table me-1"></i> Book List
				</div>
				<div class="col col-md-6" align="right">

				</div>
			</div>
		</div>
		<div class="card-body" style="with:100%; display:flex ; flex-wrap:wrap ;">
			
				<?php 
					
					

				if($statement->rowCount() > 0)
				{
					foreach($statement->fetchAll() as $row)
					
					{
                       
						
						$book_status = '';
						if($row['book_status'] == 'Enable')

						{
							$book_status = '<div style="display:flex; flex-direction:column;"><div class="badge bg-success" style="height:auto;">Available</div><button type="button" name="issue_book_button"class="btn btn-danger btn-sm btn1" onclick="issue_book(`'.$row["book_isbn_number"].'`, `'.$row["book_status"].'`)">Borrow Now</button></div>';
						
						}
						else
						{
							$query = "
	                     SELECT * FROM lms_issue_book  
						 WHERE book_id = '".$row["book_isbn_number"]."'
                            ";

                            $st = $connect->prepare($query);

                              $st->execute();
							  if($st->rowCount()>0){
								foreach($st->fetchAll()as $rw){
                                  if($rw['book_status']=='Disable'){
									$book_status = '<button class="bg-danger btn btn-sm btn2">Available on '.$rw["expected_return_date"].'</button>';

								      }
								    }

							        }else{
                                   
							  }

						}
						$book_image="";
						if($row["book_image"]){
							$book_image =$row["book_image"];
						}else{
							$book_image= "uploads/sample_book.png";
						}
        

						echo '
						
						<div class="row g-0 shadow-sm rounded" style="width:320px; border:1px solid black">
						   <div class="col-md-6" style="align-items:center; display:flex;">
							<img src="admin/'.$book_image.'" class="img-fluid rounded-start" style="width:150px; height:200px;" alt="'.$row["book_name"].'">
						   </div>
						  <div class="col-md-6">
							<div class="card-body">
							   <h5 class="card-title">'.$row["book_name"].'</h5>
							    <div style="display:flex; flex-wrap:wrap;">
							     <span style="  font-weight:500;">Category: </span>
							      <p class="card-text">'.$row["book_category"].'</p>
							     </div>
							    <div style="display:flex; flex-wrap:wrap;">
							    <span style="  font-weight:500;">Author: </span>
							    <p class="card-text">'.$row["book_author"].'</p>
							    </div>
							  
							    <div style="display:flex; flex-wrap:wrap;">
							    <span style="  font-weight:500;">Publisher: </span>
							    <p class="card-text">'.$row["book_publisher"].'</p>
							    </div>
							    <div style="display:flex; flex-wrap:wrap;">
							     <span style="  font-weight:500;">Category: </span>
							     <p class="card-text">'.$row["book_category"].'</p>
							    </div>
							    <div style="display:flex; flex-wrap:wrap;">
							     <span style="  font-weight:500;">Language: </span>
							     <p class="card-text">'.$row["book_language"].'</p>
							    </div>
							     <div style="display:flex">'.$book_status.'</div>
							</div>
						  </div>
						</div>
					  
						';
						
					
					}
				}
				else
				{
					echo '
					<tr>
						<td colspan="8" class="text-center">No Data Found</td>
					</tr>
					';
				}


				?>
				<!-- </tbody>
			</table> -->
		</div>
		<script>

function issue_book(code, status)

{   if(confirm("Are you sure you want to Borrow this book?"))
		{
			window.location.href = "search_book.php?action=borrow&code="+code+"&status="+status+"";
		}
	
	
}

</script>
	</div>
</div>

<?php 

include 'footer.php';

?>