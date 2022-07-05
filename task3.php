<!DOCTYPE html>
<html>
<head>
	<title>Task3</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			$("#price,#qty").keyup(function(){
				$('#p1').text($('#price').val() * $('#qty').val());
			});
		});

	</script>
</head>
<body>

<div align="center">

	<h1>Task:3</h1>

	Price:-<input type="text" name="price" id="price">
	X Qty:-<input type="text" name="qty" id="qty">

	<p id="p1"></p>

</div>

</body>
</html>