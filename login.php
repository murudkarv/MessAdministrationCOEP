<?php
	function check_login($fname,$lname,$pass)
	{
		$dbc = mysqli_connect("localhost","root","Imthebest88");
		
		if(!$dbc)
			die('NOT CONNECTED:' . mysqli_error());
		else
			echo "bhai ";
		$db_selected = mysqli_select_db($dbc,"management");
		if(!$db_selected)
			die('NOT CONNECTED TO DATABASE:' . mysqli_error());
		$admin = "admin";
		if($fname==$admin && $lname==$admin && $pass==$admin)
		{
			echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=admin.html\">";
		}
		else
		{
			$query = "SELECT * FROM USER WHERE Fname=\"$fname\" and Lname=\"$lname\" and Password=\"$pass\";";
			$res = mysqli_query($dbc,$query);
			$num = mysqli_num_rows($res);
			if($num)
			{
				echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=user.html\">";
			}
			else
			{
				echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=login.html\">";
			}
		}

	}
	check_login(
		$_POST["firstname"],
		$_POST["lastname"],
		$_POST["pass1"]
		);
?>
