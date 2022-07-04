<?php

include 'class.php';

$obj = new Database();

$sql = $obj->edit();

$edit1 =  $sql->fetch_object();

if(isset($_POST['submit']))
{
	$obj->update();
}
?>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="val.js"></script>
	<style type="text/css">
		
		.container{
			text-align: center;
			width: 40%;

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

	<form method="POST">
		<div class="container">

			<h3>Update Participant For DSM</h3><hr>
			<div class="row">
				<div class="col-6">

					<label class="lable">Participant's first name</label>
					<input type="text" class="form-control" name="fname" id="fname" value="<?php echo $edit1->fname; ?>">
					<b id="error1"></b><br><br>

					<label class="lable">Participant's date of birth</label>
					<input type="date" class="form-control" name="dob" id="dob" value="<?php echo $edit1->dob; ?>">
					<b id="error3"></b><br><br>

					<label class="lable">Participant's email</label>
					<input type="text" class="form-control" name="email" id="email" value="<?php echo $edit1->email; ?>">
					<b id="error5"></b><br><br>

					<label class="lable">Participant's source</label>
					<input type="text" class="form-control" name="source" id="source" value="<?php echo $edit1->source; ?>">
					<b id="error7"></b><br><br>

				</div>

				<div class="col-6">
					
					<label class="lable">Participant's last name</label>
					<input type="text" class="form-control" name="lname" id="lname" value="<?php echo $edit1->lname; ?>">
					<b id="error2"></b><br><br>

					<label class="lable">Participant's phone:(best # to call)</label>
					<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $edit1->phone; ?>">
					<b id="error4"></b><br><br>

					<label class="lable">Participant's Country</label>

					<select class="form-control" id="country" name="country">
						<option value="">Select Country</option>
						<option value="India" <?php if($edit1->country == 'India') echo 'selected'; ?>>India</option>
						<option value="Us" <?php if($edit1->country == 'Us') echo 'selected'; ?>>Us</option>
						<option value="Uk" <?php if($edit1->country == 'Uk') echo 'selected'; ?>>Uk</option>
						<option value="Chaina" <?php if($edit1->country == 'Chaina') echo 'selected'; ?>>Chaina</option>
					</select><b id="error6"></b><br><br>

					<label class="lable">Participant's compaign</label>
					<input type="text" class="form-control" name="compaign" id="compaign" value="<?php echo $edit1->compaign; ?>">
					<b id="error8"></b><br><br>

				</div>
			</div><hr>
					<input type="submit" class="btn btn-success" name="submit" id="submit" value="Update" onclick="return validate()">
					<a href="view.php"><input type="button" class="btn btn-primary" name="back" id="back" value="Back"></a>
		</div>
	</form>

</body>