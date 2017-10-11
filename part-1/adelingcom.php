<?php
	$username='';

	$songg=$_POST['song_name'];
	$email_id=$_POST['Email_ID'];

	$songg = stripslashes($songg);
	$songg = mysql_real_escape_string($songg);

	$email_id = stripslashes($email_id);
	$email_id = mysql_real_escape_string($email_id);

	session_start();
	$dbc=mysql_connect("localhost","root","");
	$db=mysql_select_db("Music",$dbc);
	if (!empty($_SESSION['admin']))
	{
		$username=$_SESSION['admin'];

		$db=mysql_select_db("Music",$dbc);

		$sql="SELECT Song_ID FROM Songs WHERE Song_Name='$songg'";
		$result=mysql_query($sql);

		$sql1="SELECT Email_ID FROM $songg WHERE Email_ID='$email_id'";
		$result1=mysql_query($sql1);

		if(!$result)
		{
			echo "<script>window.alert('This Song Does Not Exist')</script>";
			echo "<script>window.location='http://localhost/project/adelcom.php'</script>";
		}
		else if(!$result1)
		{
			echo "<script>window.alert('This Member Has Not Reviewed Yet')</script>";
			echo "<script>window.location='http://localhost/project/adelcom.php'</script>";
		}
		else
		{
			$sql2="DELETE FROM $songg WHERE Email_ID='$email_id'";
			$delres=mysql_query($sql2);
		}

		if($delres)
		{
			echo "<script>window.alert('The comment by this member is deleted from this song')</script>";
			echo "<script>window.location='http://localhost/project/admin.php'</script>";
		}
	}
	else
	{
?>
<html>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type"/>
	<head>
		<title>Breadboard Music</title>
		<link href="home_style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="music_container">
		
			<div id="music_header">
    			<div id="music_title">
				<div id="music_sitetitle">Breadboard Music</div>
        		</div>
        
    </div>

	<div id="music_banner">
       	<div id="music_banner_text">
            <div id="banner_title">Welcome To The Music Store</div>
            <p>
            Just listen and feel the music
            </p>
    	</div>
	</div>
        
    
    
    <div id="music_content"> 
    	
        
        <div id="music_right_column">
        	<div class="music_right_panel_fullwidth">
            	<h1 align="center">Member Login</h1>
                <div id="sign_up">
                    <form method="post" action="http://localhost/project/login_success.php">
				<table border="0" align="center">
				<tr>
					<td class="sign_up_row" height="50"><label>Email-ID</label></td>
					<td><input class="inputfield" name="Username" type="text" id="Username" required oninvalid="this.setCustomValidity('Please Enter valid Email-ID')" oninput="setCustomValidity('')"/></td>
				</tr>
				<tr>
                    	<td class="sign_up_row" height="50"><label>Password</label></td>
					<td><input class="inputfield" name="password" type="password" id="password" required oninvalid="this.setCustomValidity('Please Enter the password')" oninput="setCustomValidity('')"/></td>
				</tr>
				<tr>
					<td colspan="2" class="sign_up_row" height="50" align="center"><input class="button" type="submit" name="Submit" value="Login"/></td>
				</tr>
				<tr>
					<td class="sign_up_row" height="50"><label>Not a Member then </label></td>
					<td align="right"><a href="signup.php"><input class="b_sign_up" type="button" name="Sign Up" value="Sign Up"></a></td>
				</tr>
				<tr>
					<td colspan="2" class="sign_up_row" height="50" align="center">You are not logged in.</td>
				</tr>
				</table>
				</form>
              </div>                                     
            </div>
		</div>
    </div>
    
	<div id="music_footer">
    		    Copyright 2016 <a href="#"><strong>Breadboard Studios</strong></a>
   	</div>
</div>
  </body>
</html>

<?php
	}
?>
?>
