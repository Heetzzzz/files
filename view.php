<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'class.php';
// include 'db.php';

$obj = new Database();

 [$sql, $total_pages, $asc_or_desc, $up_or_down, $column, $rowperpage, $search] = $obj->view();

 // var_dump($up_or_down);

// $obj->mulDel();

// $row = 0;
?>

<title>View</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"> -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="val.js"></script>

<script>
    $(document).ready(function () {

        $('.editbtn').on('click', function () {

            $('#myModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#upid').val(data[1]);
            $('#fname').val(data[2]);
            $('#lname').val(data[3]);
            $('#dob').val(data[4]);
            $('#phone').val(data[5]);
            $('#email').val(data[6]);
            $('#country').val(data[7]);
            $('#source').val(data[8]);
            $('#compaign').val(data[9]);
        });
    });

	$(document).ready(function(){
	    $("#num_rows").change(function(){
	        $("#form").submit();
	    });
	});

// function myFunction() {
//   // Declare variables
//   var input, filter, table, tr, td, i, txtValue;
//   input = document.getElementById("search");
//   filter = input.value.toUpperCase();
//   table = document.getElementById("myTable");
//   tr = table.getElementsByTagName("tr");

//   // Loop through all table rows, and hide those who don't match the search query
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("td")[0];
//     if (td) {
//       txtValue = td.textContent || td.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }
//   }
// }


// $(document).ready(function(){
    //   	$("#search").keyup(function() {
    //   	var searchid = $(this).val();
    //   	var dataString = 'search='+ searchid;
    //   	if(searchid!='') {
    //     	$.ajax({ 
    //       		type: "GET",
    //       		url: "search.php",
    //       		data: dataString,
    //       		cache: false,
    //       		success: function(html) {
    //         	$("#myTable").html(html).show();
    //       		}
    //     	});
    //   	}
    //   		return false;
    // 	});
    // });
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
	#pagi{
		text-align: center;
	}

</style>

	<h1 align="center">Data of Employee</h1>

<form action="view.php" id="form">

	<div id='ser'>

	Search:<input type="text" name="search" id="search" placeholder="Search Data" value="<?php echo $search; ?>">
	</div>
	<div>
		Select rows:-<select id="num_rows" name="num_rows">
			<option hidden><?php echo $rowperpage; ?></option>
			<option value="5">5</option>
			<option value="10">10</option>
			<option value="25">25</option>
			<option value="50">50</option>
		</select>
	</div>

		<table class="table" id="myTable">

			<tr>
				<th><button value='Delete' name='but_delete' id="but_delete" class="btn btn-danger">Delete</button></th>

				<th><a href="view.php?search=<?php echo $search; ?>&column=id&order=<?php echo $asc_or_desc; ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo "1"; ?>">ID<i class="fas fa-sort<?php echo $column == 'id' ? '-' . $up_or_down : ''; ?>"></i></a></th>

				<th><a href="view.php?search=<?php echo $search; ?>&column=fname&order=<?php echo $asc_or_desc; ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo "1"; ?>">First name<i class="fas fa-sort<?php echo $column == 'fname' ? '-' . $up_or_down : ''; ?>"></i></a></th>

				<th><a href="view.php?search=<?php echo $search; ?>&column=lname&order=<?php echo $asc_or_desc; ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo "1"; ?>">Last name<i class="fas fa-sort<?php echo $column == 'lname' ? '-' . $up_or_down : ''; ?>"></i></a></th>

				<th><a href="view.php?search=<?php echo $search; ?>&column=dob&order=<?php echo $asc_or_desc; ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo "1"; ?>">Date of birth<i class="fas fa-sort<?php echo $column == 'dob' ? '-' . $up_or_down : ''; ?>"></i></a></th>

				<th><a href="view.php?search=<?php echo $search; ?>&column=phone&order=<?php echo $asc_or_desc; ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo "1"; ?>">Phone<i class="fas fa-sort<?php echo $column == 'phone' ? '-' . $up_or_down : ''; ?>"></i></a></th>

				<th><a href="view.php?search=<?php echo $search; ?>&column=email&order=<?php echo $asc_or_desc; ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo "1"; ?>">Email<i class="fas fa-sort<?php echo $column == 'email' ? '-' . $up_or_down : ''; ?>"></i></a></th>

				<th><a href="view.php?search=<?php echo $search; ?>&column=country&order=<?php echo $asc_or_desc; ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo "1"; ?>">Country<i class="fas fa-sort<?php echo $column == 'country' ? '-' . $up_or_down : ''; ?>"></i></a></th>

				<th><a href="view.php?search=<?php echo $search; ?>&column=source&order=<?php echo $asc_or_desc; ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo "1"; ?>">Source<i class="fas fa-sort<?php echo $column == 'source' ? '-' . $up_or_down : ''; ?>"></i></a></th>

				<th><a href="view.php?search=<?php echo $search; ?>&column=compaign&order=<?php echo $asc_or_desc; ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo "1"; ?>">Compaign<i class="fas fa-sort<?php echo $column == 'compaign' ? '-' . $up_or_down : ''; ?>"></i></a></th>

				<th>Edit</th>

				<th>Delete</th>	
			</tr>
			
		<?php
			
			while($read1 =  $sql->fetch_object())
			{
		?>			
				<tr>
					<td>
						<input type='checkbox' name='delete[]' id="delete" value='<?= $read1->id; ?>'>
					</td>
					<td><?php echo $read1->id; ?></td>
					<td><?php echo $read1->fname; ?></td>
					<td><?php echo $read1->lname; ?></td>
					<td><?php echo $read1->dob; ?></td>
					<td><?php echo $read1->phone; ?></td>
					<td><?php echo $read1->email; ?></td>
					<td><?php echo $read1->country; ?></td>
					<td><?php echo $read1->source; ?></td>
					<td><?php echo $read1->compaign; ?></td>
					<td><a href="edit.php?editid=<?php echo $read1->id; ?>" class="btn btn-info">Edit</a>
						<a href="" class="btn btn-success editbtn" data-toggle="modal" data-target="#myModal">Popup</a></td>
					<td><a href="delete.php?delid=<?php echo $read1->id; ?>" class="btn btn-danger">Delete</a></td>
				</tr>
		<?php
		
		}

		?>
	</table>
		<?php
		echo "<div id='pagi'>";

			for($page_number = 1; $page_number <= $total_pages; $page_number++) 
			{  
				if($column == 'id')
				{
					?>
						<a href = "view.php?search=<?php echo $search; ?>&column=id&order=<?php if($asc_or_desc == 'asc'){ echo 'desc'; } 
						else {echo 'asc';} ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo $page_number; ?>"  class="btn"><?php echo $page_number; ?> </a>
					<?php
				}
				else if($column == 'fname')
				{
					?>
						<a href = "view.php?search=<?php echo $search; ?>&column=fname&order=<?php if($asc_or_desc == 'asc'){ echo 'desc'; } 
						else {echo 'asc';} ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo $page_number; ?>"  class="btn"><?php  echo $page_number; ?> </a>
					<?php
				}
				else if($column == 'lname')
				{
					?>
						<a href = "view.php?search=<?php echo $search; ?>&column=lname&order=<?php if($asc_or_desc == 'asc'){ echo 'desc'; } 
						else {echo 'asc';} ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo $page_number;?>"  class="btn"><?php  echo $page_number; ?> </a>
					<?php
				}
				else if($column == 'dob')
				{
					?>
						<a href = "view.php?search=<?php echo $search; ?>&column=dob&order=<?php if($asc_or_desc == 'asc'){ echo 'desc'; } 
						else {echo 'asc';} ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo $page_number;?>"  class="btn"><?php  echo $page_number; ?> </a>
					<?php
				}
				else if($column == 'phone')
				{
					?>
						<a href = "view.php?search=<?php echo $search; ?>&column=phone&order=<?php if($asc_or_desc == 'asc'){ echo 'desc'; } 
						else {echo 'asc';} ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo $page_number;?>"  class="btn"><?php  echo $page_number; ?> </a>
					<?php
				}
				else if($column == 'email')
				{
					?>
						<a href = "view.php?search=<?php echo $search; ?>&column=email&order=<?php if($asc_or_desc == 'asc'){ echo 'desc'; } 
						else {echo 'asc';} ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo $page_number;?>"  class="btn"><?php  echo $page_number; ?> </a>
					<?php
				}
				else if($column == 'country')
				{
					?>
						<a href = "view.php?search=<?php echo $search; ?>&column=country&order=<?php if($asc_or_desc == 'asc'){ echo 'desc'; } 
						else {echo 'asc';} ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo $page_number;?>"  class="btn"><?php  echo $page_number; ?> </a>
					<?php
				}
				else if($column == 'source')
				{
					?>
						<a href = "view.php?search=<?php echo $search; ?>&column=source&order=<?php if($asc_or_desc == 'asc'){ echo 'desc'; } 
						else {echo 'asc';} ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo $page_number;?>"  class="btn"><?php  echo $page_number; ?> </a>
					<?php
				}
				else if($column == 'compaign')
				{
					?>
						<a href = "view.php?search=<?php echo $search; ?>&column=compaign&order=<?php if($asc_or_desc == 'asc'){ echo 'desc'; } 
						else {echo 'asc';} ?>&num_rows=<?php echo $rowperpage; ?>&page=<?php echo $page_number;?>"  class="btn"><?php  echo $page_number; ?> </a>
					<?php
				}
				?>

				<?php  
			} 
		// echo '<input type="submit" class="btn" name="but_next" value="Next">';
		echo "</div>";
		//echo "Showing 1 to ",$rowperpage," of ", $total_rows , " Entries";
		?>   
	</form>

<div class="container">

  	<div class="modal fade" id="myModal" role="dialog">
      	<div class="modal-dialog">
    
	      
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
						<input type="text" class="form-control" name="fname" id="fname" >
						<b id="error1"></b><br><br>

						<label class="lable">Participant's last name</label>
						<input type="text" class="form-control" name="lname" id="lname" >
						<b id="error2"></b><br><br>

						<label class="lable">Participant's date of birth</label>
						<input type="date" class="form-control" name="dob" id="dob" >
						<b id="error3"></b><br><br>

						<label class="lable">Participant's phone:(best # to call)</label>
						<input type="text" class="form-control" name="phone" id="phone" >
						<b id="error4"></b><br><br>
					</div>

						<div class="col-6">
						
						<label class="lable">Participant's email</label>
						<input type="text" class="form-control" name="email" id="email" >
						<b id="error5"></b><br><br>

						<label class="lable">Participant's Country</label>

						<select class="form-control" id="country" name="country">
							<option value="">Select Country</option>
							<option value="India">India</option>
							<option value="Us">Us</option>
							<option value="Uk">Uk</option>
							<option value="Chaina">Chaina</option>
						</select><b id="error6"></b><br><br>

						<label class="lable">Participant's source</label>
						<input type="text" class="form-control" name="source" id="source" >
						<b id="error7"></b><br><br>

						<label class="lable">Participant's compaign</label>
						<input type="text" class="form-control" name="compaign" id="compaign">
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
