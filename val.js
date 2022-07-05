function validate()
{
	var count = 0;
	var fname = document.getElementById("fname").value;
	var patt  = /^[a-zA-Z]{2,15}$/;

	if(fname == "")
	{
		document.getElementById("error1").innerHTML = "Please enter first name";
		count++;
	}
	else if(!patt.test(fname))
	{
		document.getElementById("error1").innerHTML = "Please enter valid name";
		count++;
	}
	else
	{
		document.getElementById("error1").innerHTML = "";
	}

	var lname = document.getElementById("lname").value;

	if(lname == "")
	{
		document.getElementById("error2").innerHTML = "Please enter last name";
		count++;
	}
	else if(!patt.test(lname))
	{
		document.getElementById("error2").innerHTML = "Please enter valid name";
		count++;
	}
	else
	{
		document.getElementById("error2").innerHTML = "";
	}

	var date = document.getElementById("dob").value;

	if(date == "")
	{
		document.getElementById("error3").innerHTML = "Please enter DOB";
		count++;
	}
	else
	{
		document.getElementById("error3").innerHTML = "";
	}

	var num = document.getElementById("phone").value;
	var patt2 = /^[0-9]{10}$/;

	if(num == "")
	{
		document.getElementById("error4").innerHTML = "Please enter number";
		count++;
	}
	else if(!patt2.test(num))
	{
		document.getElementById("error4").innerHTML = "Please enter valid number";
		count++;
	}
	else
	{
		document.getElementById("error4").innerHTML = "";
	}

	var email = document.getElementById("email").value;
	var patt3 = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

	if(email == "")
	{
		document.getElementById("error5").innerHTML = "Please enter email";
		count++;
	}
	else if(!patt3.test(email))
	{
		document.getElementById("error5").innerHTML = "Please enter valid email";
		count++;
	}
	else
	{
		document.getElementById("error5").innerHTML = "";
	}

	var country = document.getElementById("country").value;

	if(country == "")
	{
		document.getElementById("error6").innerHTML = "Please select atleast 1";
		count++;
	}
	else
	{
		document.getElementById("error6").innerHTML = "";
	}

	var source = document.getElementById("source").value;

	if(source == "")
	{
		document.getElementById("error7").innerHTML = "Please enter source";
		count++;
	}
	else
	{
		document.getElementById("error7").innerHTML = "";
	}

	var compaign = document.getElementById("compaign").value;

	if(compaign == "")
	{
		document.getElementById("error8").innerHTML = "Please enter compaign";
		count++;
	}
	else
	{
		document.getElementById("error8").innerHTML = "";
	}

	if(count > 0)
	{
		return false;
	}
}