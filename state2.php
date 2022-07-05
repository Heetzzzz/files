<?php
include 'db.php';

	$country_id = (int) $_GET['country_id'];

	$sql = "SELECT * FROM states WHERE country_id = $country_id";

	$result = mysqli_query($con, $sql);
		echo "<option disabled>Please Select State</option>";

	while($row = mysqli_fetch_assoc($result)){
		echo "<option value='" . $row['id'] . "'>" . $row['name'] ."</option>";
	}
	 
?>