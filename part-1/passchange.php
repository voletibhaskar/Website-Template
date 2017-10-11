<?php
	$username='';

	$old=$_POST['old_pass'];
	$new=$_POST['new_pass'];

	$old = stripslashes($old);
	$old = mysql_real_escape_string($old);

	$new = stripslashes($new);
	$new = mysql_real_escape_string($new);

	session_start();
	$dbc=mysql_connect("localhost","root","");
	$db=mysql_select_db("Music",$dbc);
	if (!empty($_SESSION['log_in']) && !empty($_SESSION['user']))
	{
		$username=$_SESSION['user'];
		$db=mysql_select_db("Music",$dbc);
		$sql="SELECT Password FROM Members WHERE Email_ID LIKE '$username'";
		$result=mysql_query($sql);
		$ro=mysql_fetch_array($result);
		
		if($ro['Password']==$old)
		{
			$cp="UPDATE Members SET Password='$new' WHERE Email_ID LIKE'$username'";
			$ch=mysql_query($cp);
			echo "<script>window.alert('You Have Successfully Changed The Password')</script>";
			echo "<script>window.location='http://localhost/project/profile.php'</script>";
		}
		else
		{
			echo "<script>window.alert('The Old Passwords Do Not Match Please Try Again')</script>";
			echo "<script>window.location='http://localhost/project/changepass.php'</script>";
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
