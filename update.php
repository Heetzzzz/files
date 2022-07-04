<?php 

include('db.php');

$allData = $_POST['allData'];

$i = 1;

foreach ($allData as $key => $value) 
{
    $sql = $con->query("UPDATE list SET position_order=".$i." WHERE id=".$value);
    if($sql){
    	echo "yes";
    }
    $i++;
}
?>