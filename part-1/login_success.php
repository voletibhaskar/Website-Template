<?php
	$dbc=mysql_connect("localhost","root","");
	$db=mysql_select_db("Music",$dbc);
	$username=$_POST['Username'];
	$password=$_POST['password'];
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	$sql="SELECT * FROM Members WHERE Email_ID='$username'";
	$sql1="SELECT * FROM Members WHERE Email_ID='$username' and Password='$password'";

	$a="SELECT Email_ID,Password FROM Admin";	

	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	$result1=mysql_query($sql1);
	$count1=mysql_num_rows($result1);

	$adm=mysql_query($a);
	$admin=mysql_fetch_array($adm);

	session_start();

	if($admin['Email_ID']==$username)
	{
		if($admin['Password']==$password)
		{
			$_SESSION['admin'] = $username;
			echo "<script>window.location='http://localhost/project/admin.php'</script>";
		}
		else
		{
			echo "<script>window.location='http://localhost/project/inpass.php'</script>";
		}
	}
	else
	{
		if($count!=1)
		{
			echo "<script>window.location='http://localhost/project/invaliduser.php'</script>";
		}
		else if($count==1 && $count1!=1)
		{
			echo "<script>window.location='http://localhost/project/inpass.php'</script>";
		}
		else
		{
			$_SESSION['log_in'] = $username;
			$_SESSION['user']=$username;
			echo "<script>window.location='http://localhost/project/home.php'</script>";
		}
	}
?>
