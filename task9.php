<!DOCTYPE html>
<html>
<head>
	<title>Task 9</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script type="text/javascript">

		function add(className)
		{	
			var arr = className.split(' ');
			var demodata=$('#'+arr[3]).text();

			$('#'+arr[3]).text(parseInt(demodata)+1);	
		}

		function min(className)
		{
			var arr = className.split(' ');
			var demodata=$('#'+arr[3]).text();
			$('#'+arr[3]).text(parseInt(demodata)-1);
		}
		var PClevel = 1;

		function add_div()
		{
			var block = $("#copy").clone();

			block.children("#btn1").attr("class", "counter-minus btn btn-primary sm_new_id"+PClevel+" pull-left");

			block.children("#res").attr("id", "sm_new_id"+PClevel);

			block.children("#sm_new_id").attr("class", "pull-left");

			block.children("#btn2").attr("class", "counter-minus btn btn-primary sm_new_id"+PClevel);

			block.children("#sm_new_id"+PClevel).text(0);

			block.show().appendTo("body");
			PClevel = PClevel+1;
		}
		
	</script>
</head>
<body>

	<div>
		<br>
		<div id="copy">

  			<button id="btn1" class="counter-minus btn btn-primary res pull-left" onclick="add(this.className)"> + </button>

  			<h4 id="res" style="text-align: center;width: 30px;" class="pull-left">0</h2>

  			<button id="btn2" class="counter-plus btn btn-primary res" onclick="min(this.className)"> - </button><br><br>
  		</div>

  		<button id="btn_add_div" class="counter-plus btn btn-success" onclick="add_div()">Add Div</button><br><br>

	</div>

</body>
</html>