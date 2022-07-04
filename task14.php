<?php 
		
include 'class.php';

$obj = new Database();
$obj->insert();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Task 14</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="val.js"></script>
	<script type="text/javascript">
		
		$( "#myForm" ).validate({
		  	rules: {
		    	email: {
		      	required: true,
		      	email: true,
		      	remote: "task14.php"
		    	}
		 	}
		});

	</script>
	<style type="text/css">
		
		.container{
			text-align: center;
			width: 40%;
		}
		.col-6{
			
		}
		.form-control{
			width: 300px;
			text-align: center;
		}
		.lable{
			margin-right: 400px;
			width: 300px;
		}
		.sub{
			margin-left: 400px;
		}
		b{
			color: red;
			margin-right: 20px;
		}

	</style>
</head>
<body>

	<form method="POST" id="myForm">
		<div class="container">

			<h3>Add New Participant For DSM</h3><hr>
			<div class="row">
				<div class="col-6">

					<label class="lable">Participant's first name</label>
					<input type="text" class="form-control" name="fname" id="fname" placeholder="First name">
					<b id="error1"></b><br><br>

					<label class="lable">Participant's date of birth</label>
					<input type="date" class="form-control" name="dob" id="dob" placeholder="Date of birth">
					<b id="error3"></b><br><br>

					<label class="lable">Participant's email</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
					<b id="error5"></b><br><br>

					<label class="lable">Participant's source</label>
					<input type="text" class="form-control" name="source" id="source">
					<b id="error7"></b><br><br>

				</div>

				<div class="col-6">
					
					<label class="lable">Participant's last name</label>
					<input type="text" class="form-control" name="lname" id="lname" placeholder="Last name">
					<b id="error2"></b><br><br>

					<label class="lable">Participant's phone:(best # to call)</label>
					<input type="text" class="form-control" name="phone" id="phone" placeholder="+91 903-303-8083">
					<b id="error4"></b><br><br>

					<label class="lable">Participant's Country</label>

					<select class="form-control" id="country" name="country">
						<option value="">Select Country</option>
						<option value="India">India</option>
						<option value="Us">Us</option>
						<option value="Uk">Uk</option>
						<option value="Chaina">Chaina</option>
					</select><b id="error6"></b><br><br>

					<label class="lable">Participant's compaign</label>
					<input type="text" class="form-control" name="compaign" id="compaign">
					<b id="error8"></b><br><br>

				</div>
			</div><hr>
					<input type="submit" class="btn btn-success" name="submit" id="submit" value="Submit" onclick="return validate()">
		</div>
	</form>

</body>
</html>