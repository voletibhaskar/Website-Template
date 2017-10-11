<?php
	$dbc=mysql_connect("localhost","root","");
	$db=mysql_select_db("Music",$dbc);
	$name=$_POST['First_Name'];
	$surname=$_POST['Surname'];
	$username=$_POST['Username'];
	$password=$_POST['password'];
	$cpassword=$_POST['con_password'];
	if($password!=$cpassword)
	{
		echo "<script>window.alert('Your Passwords do not match')</script>";
		echo "<script>window.location='http://localhost/project/resignup.php'</script>";
	}
	else
	{
		$enter="INSERT INTO Members VALUES('$name','$surname','$username','$password')";
		mysql_query($enter);
		$enter1="INSERT INTO Favorite VALUES('$username',' ',' ')";
		mysql_query($enter1);
		$r="SELECT First_Name,Surname,Email_ID,Password FROM Members";
		$res=mysql_query($r);
		while($ro=mysql_fetch_array($res))
		{   
		    echo "success"."<br>";
		}
		session_start();
		$_SESSION['log_in']=$username;
		$_SESSION['user']=$username;
		echo "<script>window.location='http://localhost/project/home.php'</script>";
	}
?>
