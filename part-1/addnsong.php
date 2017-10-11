<?php
	$username='';
	$rates=0;
	session_start();
	$dbc=mysql_connect("localhost","root","");
	$db=mysql_select_db("Music",$dbc);
	if (!empty($_SESSION['admin']))
	{
		$username=$_SESSION['admin'];
		$sql="SELECT First_Name FROM Admin WHERE Email_ID='$username'";
		$result=mysql_query($sql);
		$ro=mysql_fetch_array($result);
?>
<?php
	//Folder to save to
	$target_path = 'music/';
	
	//Build the stored file path
	$target_path = $target_path . basename( $_FILES['uploadedfile1']['name'] );
	if ( move_uploaded_file( $_FILES['uploadedfile1']['tmp_name'], $target_path ) )
	{
		 echo '<p>The file was uploaded</p>';
	}
	else
	{
		echo '<p>There was an error uploading your file. Please try again.</p>';
	} 
?>

<?php
	//Folder to save to
	$target_path = 'music/';
	
	//Build the stored file path
	$target_path = $target_path . basename( $_FILES['uploadedfile2']['name'] );
	if ( move_uploaded_file( $_FILES['uploadedfile2']['tmp_name'], $target_path ) )
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

	$song_name=$_POST['Song_Name'];
	$album=$_POST['Album'];
	$artist=$_POST['Artist'];
	$genre=$_POST['Genre'];

	$c="SELECT * FROM Songs";
	$ct=mysql_query($c);
	$count=mysql_num_rows($ct);

	$id=$count+1;

	$sql1="INSERT INTO Songs VALUES($id,'$song_name','$album','$artist','$genre',0.0,0)";
	mysql_query($sql1);
	$sresult=mysql_query($sql1);
	if(!$sresult)
	{
		echo "error"."</br>";
	}

	$create="CREATE TABLE $song_name(Email_ID varchar(40) primary key,Rating decimal(2,1),Comments longtext,S_No int(10))";

	$download=$song_name."d";

	$create1="CREATE TABLE $download(Email_ID varchar(40) primary key,downloaded int(2))";
	$result=mysql_query($create);
	$result1=mysql_query($create1);
	if($result && $result1)
	{
		echo "<script>window.alert('The Song Was Uploaded Successfully')</script>";
		echo "<script>window.location='http://localhost/project/admin.php'</script>";
	}
	else
	{
		echo "error";
	}
?>
<?php
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
