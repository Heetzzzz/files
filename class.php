<?php

class Database
{
	public function insert()
	{
		include 'db.php';

		$check = $con->query("select * from crud");

		$check1 = $check->fetch_object();

		// for($i=1;$i<=10;$i++)
		// {
		if(isset($_POST["submit"]))
		{
			$fname    = $_POST['fname'];
			$lname    = $_POST['lname'];
			$dob      = $_POST['dob'];
			$phone    = $_POST['phone'];
			$email    = $_POST['email'];
			$country  = $_POST['country'];
			$source   = $_POST['source'];
			$compaign = $_POST['compaign'];

			if($check1->email != $email)
			{
				$ins = $con->query("insert into crud(fname,lname,dob,phone,email,country,source,compaign) 
									values('$fname','$lname','$dob','$phone','$email','$country','$source','$compaign')");
				if($ins)
				{
					echo "<script>alert('Insert successfull')</script>";
					header("location:view.php");
				}
				else
				{
					echo "<script>alert('Error')</script>";
				}
			}
			else
			{
				echo "<script>alert('Email already exist!')</script>";
			}
 		}
 		//}
	}

	public function delete()
	{
		include 'db.php';

		$id = $_REQUEST["delid"];

		$del = $con->query("delete from crud where id = $id");
		header("location: view.php");
	}

	public function view()
	{
		include 'db.php';

		$limit = 5; 
		$limit2 = 10;  

		$read = $con->query("select * from crud");

		$total_rows = mysqli_num_rows($read); 

    	$total_pages = ceil ($total_rows / $limit);
    	$total_pages2 = ceil ($total_rows / $limit2);

    	if (!isset ($_GET['page']) ) {  

		   $page_number = 1;  
		} 
		else 
		{
		   $page_number = $_GET['page'];  
		} 
		$initial_page = ($page_number-1) * $limit;
		$initial_page2 = ($page_number-1) * $limit2; 

    	$getQuery = $con->query("SELECT *FROM crud LIMIT " . $initial_page . ',' . $limit); 
    	$getQuery2 = $con->query("SELECT *FROM crud LIMIT " . $initial_page2 . ',' . $limit2);  

	    //$result = mysqli_query($conn, $getQuery);      

	    //display the retrieved result on the webpage  

	      // show page number with link   

    // 	  for($page_number = 1; $page_number<= $total_pages; $page_number++) {  

    //     echo '<a href = "index.php?page=' . $page_number . '">' . $page_number . ' </a>';  

    // }  
		
		return [$getQuery,$total_pages,$total_rows,$getQuery2];
	}

	public function edit()
	{
		include 'db.php';

		$id = $_REQUEST["editid"];

		$change = $con->query("select * from crud where id = $id");

		return $change;
	}

	public function update()
	{
		include 'db.php';
		$id = $_REQUEST["editid"];

		$check = $con->query("select * from crud where id = $id");

		$check1 = $check->fetch_object();

		$fname    = $_POST['fname'];
		$lname    = $_POST['lname'];
		$dob      = $_POST['dob'];
		$phone    = $_POST['phone'];
		$email    = $_POST['email'];
		$country  = $_POST['country'];
		$source   = $_POST['source'];
		$compaign = $_POST['compaign'];

		if($check1->email != $email)
		{

			$newData = $con->query("update crud set fname = '$fname',lname = '$lname',dob = '$dob',phone = '$phone',email = '$email',
									country = '$country',source = '$source',compaign = '$compaign' where id = '$id'");
			if($newData)
			{
				header('location:view.php');
			}
			else
			{
				echo "<script>alert('Error!!')</script>";
			}
		}
		else
		{
			echo "<script>alert('Email already exist!')</script>";
		}
	}
}
?>