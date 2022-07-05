<!DOCTYPE html>
<html>
<head>
	<title>Task2</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script type="text/javascript">
		
		$(document).ready(function(){
			$("#btn1").click(function(){
				$("#p1").hide();
			});
			$("#btn2").click(function(){
				$("#p1").show();
			});
		});
	</script>
</head>
<body>

<div align="center">

	<h1>Task:2</h1>

	<p id="p1" style="color: red;">Hello You can hide and show me with this buttons</p>

	<button id="btn1" class="btn btn-success">Hide</button>
	<button id="btn2" class="btn btn-success">Show</button>

</div>

</body>
</html>