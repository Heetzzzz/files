<?php

include 'class.php';

$obj = new Database();

$sql = $obj->view();

?>

<title>View</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="val.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<style type="text/css">
	
	table{
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

</style>
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
    </script>

<h1 align="center">Data of Employee</h1>
			
			<table class="table table-striped table-bordered table-hover">

				<tr>
					<td>ID</td>
					<td>First name</td>
					<td>Last name</td>
					<td>Date of birth</td>
					<td>Phone</td>
					<td>Email</td>
					<td>Country</td>
					<td>Source</td>
					<td>Compaign</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
			
		<?php
			
			while($read1 =  $sql->fetch_object())
			{
		?>			
				<tr>
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
						<a href="editid=<?php echo $read1->id; ?>" class="btn btn-success editbtn" data-toggle="modal" data-target="#myModal">Popop</a></td>
					<td><a href="delete.php?delid=<?php echo $read1->id; ?>" class="btn btn-danger">Delete</a></td>
				</tr>
				
		<?php
		}
		?>
	</table>

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
