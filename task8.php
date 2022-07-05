<!DOCTYPE html>
<html>
<head>
	<title>Task 8</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script type="text/javascript">
		
		var data = 0;

			document.getElementById("num").innerText = data;

			function increment() 
			{
				data += 1;
				document.getElementById("num").innerText = data;
			}

			function decrement() 
			{
				data -= 1;
				document.getElementById("num").innerText = data;
			}

		// $(document).ready(function(){
		//   	$('#add').on('click',add);
		//   	$('#sub').on('click',remove);
		// });

		// function add()
		// {
		//   	var input = $('#num'),value = input.val();
		      
		//   	input.val(++value);
		// }

		// function remove()
		// {
		//    	var input = $('#num'),value = input.val();
		      
		//     input.val(--value);
		// }

	</script>
</head>
<body>

	<div >

		<h1 style="margin-left: 50px;">Task 8</h1>

		<button class="btn btn-success pull-left" style="margin-right: 1%; margin-top: 1%;" onclick="decrement()">-</button>&nbsp;

		<!-- <input type="text" style="width: 410px;text-align: center;" class="form-control pull-left" id="num">&nbsp; -->

		<h1 id="num" class="pull-left" style="width: 100px; text-align: center;">0</h1>

		<button class="btn btn-success" style="margin-top: 1%;" onclick="increment()">+</button>

	</div>

</body>
</html>