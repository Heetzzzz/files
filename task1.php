<!DOCTYPE html>
<html>
<head>
	<title>Task1 </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			$("#txt").keyup(function(){
				$("#cptxt").text($(this).val());
			});
		});

	</script>
</head>
<body>

<div align="center" class="form-group">

	<h1>Task:1</h1>

	Enter Something:-<input type="text" name="txt" id="txt">

	<p id="cptxt"> </p>

</div>

</body>
</html>