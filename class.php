<?php
class Database
{
	public function __construct()
	{
		$this->con = mysqli_connect("localhost", "root", "matrix@1","Employee");
	}

	public function insert()
	{
		$query = ("select * from crud");

		$check = mysqli_query($this->con,$query);

		$check1 = $check->fetch_object();

		// for($i=1;$i<=10;$i++)
		// {

		if(isset($_REQUEST["submit"]))
		{
			$fname    = $_REQUEST['fname'];
			$lname    = $_REQUEST['lname'];
			$dob      = $_REQUEST['dob'];
			$phone    = $_REQUEST['phone'];
			$email    = $_REQUEST['email'];
			$country  = $_REQUEST['country'];
			$source   = $_REQUEST['source'];
			$compaign = $_REQUEST['compaign'];

			if($check1->email != $email)
			{
				$query1 = ("insert into crud(fname,lname,dob,phone,email,country,source,compaign) 
									values('$fname','$lname','$dob','$phone','$email','$country','$source','$compaign')");

				$ins = mysqli_query($this->con,$query1);

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
		$id = $_REQUEST["delid"];

		$del = ("delete from crud where id = $id");

		$delete = mysqli_query($this->con,$del);

		header("location: view.php");
	}

	public function view()
	{
		
		$rowperpage = 5;

		if(isset($_REQUEST['num_rows']))
		{
		    $rowperpage = $_REQUEST['num_rows'];
		}

		$limit = $rowperpage;

		$merge = "select * from crud";

		$read1 = mysqli_query($this->con,$merge);

		$total_rows = mysqli_num_rows($read1); 

    	$total_pages = ceil ($total_rows / $limit);

    	if (!isset ($_GET['page']) ) 
    	{  
		   $page_number = 1;  
		} 
		else 
		{
		   $page_number = $_GET['page'];  
		}

		$initial_page = ($page_number-1) * $limit;

		$columns = array('id','fname','lname','dob','phone','email','country','source','compaign');

		$column = isset($_REQUEST['column']) && in_array($_REQUEST['column'], $columns) ? $_REQUEST['column'] : $columns[0];

		$sort_order = isset($_REQUEST['order']) && strtolower($_REQUEST['order']) == 'desc' ? 'DESC' : 'ASC';

		$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 

		$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
		
		$search = "";

		if(isset($_REQUEST['search']))
		{
			$search = $_REQUEST['search'];
			$merge .= " where id like '%$search%' or
							fname like '%$search%' or
						  	lname like '%$search%' or
							dob like '%$search%' or
							phone like '%$search%' or
							email like '%$search%' or
							country like '%$search%' or
							source like '%$search%' or
							compaign like '%$search%' ";
		}

		$read1 = mysqli_query($this->con,$merge);

		$total_rows = mysqli_num_rows($read1); 

			$total_pages = ceil ($total_rows / $limit);

		if(isset($_REQUEST['order']) && isset($_REQUEST['column']))
		{
			$merge .= " ORDER BY " .  $column . ' ' . $sort_order;
		}

		$merge .= " limit " . $initial_page . ',' . $limit;
			
		$query = mysqli_query($this->con,$merge);

		// var_dump($merge);

		return [$query,$total_pages,$asc_or_desc,$up_or_down,$column,$rowperpage, $search];
	}

	public function edit()
	{
		$id = $_REQUEST["editid"];

		$query = ("select * from crud where id = $id");

		$change = mysqli_query($this->con,$query);

		return $change;
	}

	public function update()
	{
		$id = $_REQUEST["editid"];

		$query = ("select * from crud where id = $id");
		$check = mysqli_query($this->con,$query);

		$check1 = $check->fetch_object();

		$fname    = $_REQUEST['fname'];
		$lname    = $_REQUEST['lname'];
		$dob      = $_REQUEST['dob'];
		$phone    = $_REQUEST['phone'];
		$email    = $_REQUEST['email'];
		$country  = $_REQUEST['country'];
		$source   = $_REQUEST['source'];
		$compaign = $_REQUEST['compaign'];

		if($check1->email != $email)
		{

			$query1 = ("update crud set fname = '$fname',lname = '$lname',dob = '$dob',phone = '$phone',email = '$email',
									   country = '$country',source = '$source',compaign = '$compaign' where id = '$id'");

			$newData = mysqli_query($this->con,$query1);

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

	public function mulDel()
	{
		if(isset($_REQUEST['but_delete']))
		{
			if(isset($_REQUEST['delete']))
			{
				foreach($_REQUEST['delete'] as $deleteid)
				{
			  		$deleteUser = ("delete from crud where id = $deleteid");
			  		$sql = mysqli_query($this->con,$deleteUser);
				}
			}
			else
			{
				echo "<script>alert('Select check atleast one checkbox')</script>";
			}
		}
	}
}
?>
