<!DOCTYPE html>
<html>
<head>

	<title>Task 7</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>

		$(document).ready(function(){
			$("#btn1").click(function(){
		    	$("#li1").clone().appendTo("#ol1");
		  	});
		  	$("#btn2").click(function(){
		    	$("#li2").clone().appendTo("#ol1");
		  	});
		});

		</script>

</head>
<body>

<div id="div1">

	<ol id="ol1">
		<li>Heet</li>
	    <li>Jeet</li>
	    <li>Meet</li>
	    <li>Geet</li>
	</ol>
	<ul id="ul2">
		<li id="li1">Rahul</li>
	    <li id="li2">Mitesh</li>
	</ul>

	<button id="btn1">Clone First List </button>
	<button id="btn2">Clone Second List </button>

</div>

</body>
</html>