<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'class.php';
include 'db.php';

$obj = new Database();

// $sql = $obj->view();
// [$sql, $t2, $l2] = $obj->view10();
[$sql, $t] = $obj->view();

$row = 0;

// number of rows per page
$rowperpage = 5;

	if(isset($_POST['num_rows']))
	{
	    $rowperpage = $_POST['num_rows'];
	}

	if(isset($_POST['but_delete']))
	{
		if(isset($_POST['delete']))
		{
		foreach($_POST['delete'] as $deleteid)
		{
	  		$deleteUser = $con->query("DELETE from crud WHERE id=".$deleteid);
	  		// mysqli_query($con,$deleteUser);
		}
	}
	else
	{
		echo "<script>alert('Select check atleast one checkbox')</script>";
	}

}

$merge = "select * from crud";
// $res = $con->query($merge);
// $merge1 = (" limit $row,".$rowperpage);
// $t_row = mysqli_num_rows($res);

if($_REQUEST['search'])
{
	$search = $_REQUEST['search'];
	// print_r($search);exit;
	$merge .= " where fname like '%$search%' or
					  	lname like '%$search%' or
						dob like '%$search%' or
						phone like '%$search%' or
						email like '%$search%' or
						country like '%$search%' or
						source like '%$search%' or
						compaign like '%$search%' ";
	// print_r($merge);
}	
$merge1 = $con->query($merge);
// $search2 = $con->query("select * from crud where id like '%$search%' or
// 												 fname like '%$search%' or
// 												 lname like '%$search%' or
// 												 dob like '%$search%' or
// 												 phone like '%$search%' or
// 												 email like '%$search%' or
// 												 country like '%$search%' or
// 												 source like '%$search%' or
// 												 compaign like '%$search%' ");

?>

<title>View</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="val.js"></script>
  	<!-- <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script> -->
<script>
    $(document).ready(function () {

        $('.editbtn').on('click', function () {

            $('#myModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#upid').val(data[0]);
            $('#fname').val(data[1]);
            $('#lname').val(data[2]);
            $('#dob').val(data[3]);
            $('#phone').val(data[4]);
            $('#email').val(data[1]);
            $('#country').val(data[2]);
            $('#source').val(data[3]);
            $('#compaign').val(data[4]);
        });
    });

// function myFunction() 
// {
// 	var input, filter, table, tr, td, i, txtValue;

// 	input = document.getElementById("search");

// 	filter = input.value.toUpperCase();

// 	table = document.getElementById("myTable");

// 	tr = table.getElementsByTagName("tr");

//   	for (i = 0; i < tr.length; i++) 
//   	{
//     	td = tr[i].getElementsByTagName("td")[0];

// 	    if (td) 
// 	    {
// 	      	txtValue = td.textContent || td.innerText;
// 		    if (txtValue.toUpperCase().indexOf(filter) > -1) 
// 		    {
// 		      	tr[i].style.display = "";
// 		    } 
// 		    else 
// 		    {
// 	        	tr[i].style.display = "none";
// 	      	}
// 	    }       
//   	}
// }

$(document).ready(function(){
    // Number of rows selection
    $("#num_rows").change(function(){

        // Submitting form
        $("#form").submit();
    });
});
</script>

<style type="text/css">
	
	table,th{
		text-align: center;
	}
	.container{
		text-align: center;
		width: 40%;
	}
	.form-control{
		text-align: center;
	}
	.lable{
		width: 300px;
	}
	b{
		color: red;
	}
	#ser{
		float: right;
	}

</style>

	<h1 align="center">Data of Employee</h1>
    <form method="post" action="" id="form">
            <div>

                <!-- Number of rows -->
                <div class="divnum_rows">
                <span>Number of rows:</span>&nbsp;
                <select id="num_rows" name="num_rows">
                    <?php
                    	
                    $numrows_arr = array("5","10","25","50");

                    foreach($numrows_arr as $nrow)
                    {
                        if(isset($_POST['num_rows']) && $_POST['num_rows'] == $nrow)
                        {
                            echo '<option value="'.$nrow.'" selected="selected">'.$nrow.'</option>';

                        }else{
                            echo '<option value="'.$nrow.'">'.$nrow.'</option>';
                        }
                    }
                    	// count total number of rows
			            // $sql3 = $con->query("SELECT COUNT(*) AS cntrows FROM crud");
			            // // $result = mysqli_query($con,$sql);
			            // $fetchresult = mysqli_fetch_array($sql3);
			            // $allcount = $fetchresult['cntrows'];

			            // selecting rows

                    		// var_dump($merge);
							// $row = $result->fetch_object();	
							// $con->next_result();
							// $result1 = $con->store_result();
							// $row = $result->fetch_assoc();
							// var_dump($row);	
                    	
              
			            // $sno = $row + 1;

                    ?>
                </select>
            </div>
        </div>
    </form>

<!--     <button onclick="sortTable()" class="btn btn-success">Sort</button> -->

<form action="view.php" method="get">
	<input type='submit' value='Delete' name='but_delete' class="btn btn-danger" style="margin-left: 30px;">
	<div id='ser'>
	Search:<input type="text" name="search" id="search" placeholder="Search Data">
	</div>
<?php

$columns = array('fname','lname','dob','phone','email','country','source','compaign');

$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

if ($result = $con->query('SELECT * FROM crud ORDER BY ' .  $column . ' ' . $sort_order)) 
{
	$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
	$add_class = ' class="highlight"';

?>
		<table class="table table-striped table-bordered table-hover" id="myTable">

			<tr>
				<th>Multi Delete</th>
				<th>ID</th>
				<th><a href="view.php?column=fname&order=<?php echo $asc_or_desc; ?>">First name<i class="fas fa-sort<?php echo $column == 'fname' ? '-' . $up_or_down : ''; ?>"></i></a></th>
				<th>Last name</th>
				<th>Date of birth</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Country</th>
				<th>Source</th>
				<th>Compaign</th>
				<th>Edit</th>
				<th>Delete</th>
				
			</tr>
			
		<?php
			
			while($read1 =  $merge1->fetch_object())
			{
		?>			
				<tr>
					<td>
						<input type='checkbox' name='delete[]' value='<?= $read1->id; ?>'>
					</td>
					<td><?php echo $read1->id; ?></td>
					<td <?php echo $column == 'fname' ? $add_class : ''; ?>><?php echo $read1->fname; ?></td>
					<td><?php echo $read1->lname; ?></td>
					<td><?php echo $read1->dob; ?></td>
					<td><?php echo $read1->phone; ?></td>
					<td><?php echo $read1->email; ?></td>
					<td><?php echo $read1->country; ?></td>
					<td><?php echo $read1->source; ?></td>
					<td><?php echo $read1->compaign; ?></td>
					<td><a href="edit.php?editid=<?php echo $read1->id; ?>" class="btn btn-info">Edit</a>
						<a href="editid=<?php echo $read1->id; ?>" class="btn btn-success editbtn" data-toggle="modal" data-target="#myModal">Popop</a></td>
					<td><a href="delete.php?delid=<?php echo $read1->id; ?>" class="btn btn-danger">Delete</a></td>
					
				</tr>
		<?php
		}
		?>
	</table>
		<?php
		echo "<center>";
			for($page_number = 1; $page_number <= $t; $page_number++) 
			{  
				echo '<a class="btn" href = "view.php?page=' . $page_number . '">' . $page_number . ' </a>';  
			} 
		echo "</center>";
		?>
	</form>
	<?php
	$result->free();
}
?>

<div class="container">
  <!-- <h2>Modal Example</h2> -->
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
  	<div class="modal fade" id="myModal" role="dialog">
      	<div class="modal-dialog">
    
	      	<!-- Modal content-->
	        <div class="modal-content">
	          	<div class="modal-header">
	          	<button type="button" class="close" data-dismiss="modal">&times;</button>
	          	<h4 class="modal-title">Update Participant For DSM</h4>
		        </div>
		        <div class="modal-body">
		          	
		          	<div class="container">	
			<div class="row">
				<div class="col-6">

					<input type="hidden" name="upid" id="upid">

					<label class="lable">Participant's first name</label>
					<input type="text" class="form-control" name="fname" id="fname" value="<?php echo $read1->fname; ?>">
					<b id="error1"></b><br><br>

					<label class="lable">Participant's last name</label>
					<input type="text" class="form-control" name="lname" id="lname" value="<?php echo $edit1->lname; ?>">
					<b id="error2"></b><br><br>

					<label class="lable">Participant's date of birth</label>
					<input type="date" class="form-control" name="dob" id="dob" value="<?php echo $edit1->dob; ?>">
					<b id="error3"></b><br><br>

					<label class="lable">Participant's phone:(best # to call)</label>
					<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $edit1->phone; ?>">
					<b id="error4"></b><br><br>
				</div>

				<div class="col-6">
					
					<label class="lable">Participant's email</label>
					<input type="text" class="form-control" name="email" id="email" value="<?php echo $edit1->email; ?>">
					<b id="error5"></b><br><br>

					<label class="lable">Participant's Country</label>

					<select class="form-control" id="country" name="country">
						<option value="">Select Country</option>
						<option value="India" <?php if($edit1->country == 'India') echo 'selected'; ?>>India</option>
						<option value="Us" <?php if($edit1->country == 'Us') echo 'selected'; ?>>Us</option>
						<option value="Uk" <?php if($edit1->country == 'Uk') echo 'selected'; ?>>Uk</option>
						<option value="Chaina" <?php if($edit1->country == 'Chaina') echo 'selected'; ?>>Chaina</option>
					</select><b id="error6"></b><br><br>

					<label class="lable">Participant's source</label>
					<input type="text" class="form-control" name="source" id="source" value="<?php echo $edit1->source; ?>">
					<b id="error7"></b><br><br>

					<label class="lable">Participant's compaign</label>
					<input type="text" class="form-control" name="compaign" id="compaign" value="<?php echo $edit1->compaign; ?>">
					<b id="error8"></b><br><br>

				</div>
			</div>
					<input type="submit" class="btn btn-success" name="submit" id="submit" value="Update" onclick="return validate()">
		</div>

		        </div>
		        <div class="modal-footer">
		          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
      		</div>
      
    	</div>
  	</div>
  
</div>
