<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Task 10</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
	<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<style type="text/css">
		/*#state-select,#city-select{
			display: none;
		}*/
		#country-select,#state-select,#city-select{
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

	<select id="state-select" class="form-control">
		<option selected>Please Select State</option>
		
	</select><br>

	<select id="city-select" class="form-control" >
		<option selected>Please Select City</option>
	</select>
	<script type="text/javascript">

		function getStatesSelectList(){
			var country_select = document.getElementById("country-select");
			var city_select = document.getElementById("city-select");
			
			var country_id = country_select.options[country_select.selectedIndex].value;
			// console.log('CountryId : ' + country_id);

			var xhr = new XMLHttpRequest();
			var url = 'states.php?country_id=' + country_id;

			xhr.open('GET', url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					var text = xhr.responseText;
					
					var state_select = document.getElementById("state-select");
					state_select.innerHTML = text;
					//state_select.style.display='inline';
					// city_select.style.display='none';
				}
			}

			xhr.send();
		}

		function getCitySelectList(){

			var state_select = document.getElementById("state-select");

			var state_id = state_select.options[state_select.selectedIndex].value;
			// console.log('StateId : ' + state_id);

			var xhr = new XMLHttpRequest();
			var url = 'cities.php?state_id=' + state_id;
			
			xhr.open('GET', url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					var text = xhr.responseText;
					
					var city_select = document.getElementById("city-select");
					city_select.innerHTML = text;
					//city_select.style.display='inline';
				}
			}

			xhr.send();
		}

		var country_select = document.getElementById("country-select");
		country_select.addEventListener("change", getStatesSelectList);

		var state_select = document.getElementById("state-select");
		state_select.addEventListener("change", getCitySelectList);

	</script>
</div>
</body>
</html>