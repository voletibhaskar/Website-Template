<?php
	$username='';
	session_start();
	$dbc=mysql_connect("localhost","root","");
	$db=mysql_select_db("Music",$dbc);
	if (!empty($_SESSION['admin']))
	{
?>
<?php

		//Folder to save to
		$target_path = 'news/';
	
		//Build the stored file path
		$target_path = $target_path . basename( $_FILES['uploadedfile3']['name'] );
		if( move_uploaded_file( $_FILES['uploadedfile3']['tmp_name'], $target_path ) )
		{
			 echo '<p>The file was uploaded</p>';
		}
		else
		{
			echo '<p>There was an error uploading your file. Please try again.</p>';
		}
	
?>
<?php
		$dbc=mysql_connect("localhost","root","");
		$db=mysql_select_db("Music",$dbc);

		$nt=$_POST['News_Title'];
		$nt=stripslashes($nt);
		$nt=mysql_real_escape_string($nt);

		$nd=$_POST['N_Date'];

		$nc=$_POST['ncontent'];
		$nc=stripslashes($nc);
		$nc=mysql_real_escape_string($nc);

		$sql="SELECT * FROM News";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);

		$update1="UPDATE News set News_Title='$nt' WHERE S_No = $count";
		mysql_query($update1);

		$update2="UPDATE News set News_Details='$nc' WHERE S_No = $count";
		mysql_query($update2);

		$update3="UPDATE News set N_Date='$nd' WHERE S_No = $count";
		mysql_query($update3);

		$count=$count+1;

		$sql1="INSERT INTO News VALUES($count,'   ','   ','   ')";
		mysql_query($sql1);
		echo "<script>window.location='http://localhost/project/admin.php'</script>";
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
