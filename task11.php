<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Task 11</title>
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">

	<style type="text/css">

		#country-select,#state-select{
			width: 200px;
		}

	</style>
</head>
<body>
<div id="form">
	<h2>Select the Country & State & City</h2>

	<select id="country-select" class="form-control">
		<option selected>Please Select Country</option>
		<?php
			$sql = "SELECT * FROM countries";
			$result = mysqli_query($con, $sql);
			while($row = mysqli_fetch_assoc($result)){
		?>
		<option value="<?php echo $row['id'] ?>"><?php echo $row['name']; ?></option>
		<?php } ?>
	</select><br>

	<select id="state-select" class="mul-select" multiple="multiple">
		<option disabled>Please Select State</option>
		
	</select><br><br>
	<button id="clear" class="btn btn-success" style="margin-left: 60px;">Clear</button>

	<script type="text/javascript">

		function getStatesSelectList(){
			var country_select = document.getElementById("country-select");
			var city_select = document.getElementById("city-select");
			
			var country_id = country_select.options[country_select.selectedIndex].value;
			console.log('CountryId : ' + country_id);

			var xhr = new XMLHttpRequest();
			var url = 'state2.php?country_id=' + country_id;

			xhr.open('GET', url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					var text = xhr.responseText;
					
					var state_select = document.getElementById("state-select");
					state_select.innerHTML = text;
				}
			}
			$('.mul-select').val(null).trigger('change');
			xhr.send();
		}

		var country_select = document.getElementById("country-select");
		country_select.addEventListener("change", getStatesSelectList);

		$(document).ready(function() {
            $(".mul-select").select2({
                placeholder: "select multiple Cities",
                tags: true,
            });
            $("#clear").click(function(){
			  	$(".mul-select").val(null).trigger('change');
			});
        });


	</script>
</div>
</body>
</html>