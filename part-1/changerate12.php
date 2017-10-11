<?php
	$username='';
	$rates=0;
	session_start();
	$dbc=mysql_connect("localhost","root","");
	$db=mysql_select_db("Music",$dbc);
	if (!empty($_SESSION['log_in']) && !empty($_SESSION['user']))
	{
		$sname="SELECT Song_Name FROM Songs WHERE Song_ID=13";
		$result1=mysql_query($sname);
		$song_name=mysql_fetch_array($result1);

		$songg=$song_name['Song_Name'];
	
		$c="SELECT * From $songg";
		$ct=mysql_query($c);
		$count=mysql_num_rows($ct);

		$username=$_SESSION['user'];
		$comment=$_POST['comments'];
		$comment=stripslashes($comment);
		$comment=mysql_real_escape_string($comment);
		$rating=$_POST['rate'];

		$newcount=0;

		$e="SELECT S_No FROM $songg WHERE Email_ID='$username'";
		$check=mysql_query($e);
		$exist=mysql_num_rows($check);

		if($exist!=1)
		{
			$newcount=$count+1;
			$j="INSERT INTO $songg values('$username',0.0,'$comment',$newcount)";
			mysql_query($j);
		}

		if(!empty($comment))
		{
			$cupdate="UPDATE $songg set Comments='$comment' WHERE Email_ID='$username'";
			mysql_query($cupdate);
		}

		if($rating=="")
		{
			echo "<script>window.location='http://localhost/project/$songg.php'</script>";
		}

		else if($rating=="Worst")
		{
			$i=0.0;
			$update1="UPDATE $songg set Rating=$i WHERE Email_ID='$username'";
			mysql_query($update1);
		}
		else if($rating=="Bad")
		{
			$i=1.0;
			$update1="UPDATE $songg set Rating=$i WHERE Email_ID='$username'";
			mysql_query($update1);
		}
		else if($rating=="OK")
		{
			$i=2.0;
			$update1="UPDATE $songg set Rating=$i WHERE Email_ID='$username'";
			mysql_query($update1);
		}
		else if($rating=="Fair")
		{
			$i=3.0;
			$update1="UPDATE $songg set Rating=$i WHERE Email_ID='$username'";
			mysql_query($update1);
		}
		else if($rating=="Good")
		{
			$i=4.0;
			$update1="UPDATE $songg set Rating=$i WHERE Email_ID='$username'";
			mysql_query($update1);
		}
		else if($rating=="Excellent")
		{
			$i=5.0;
			$update1="UPDATE $songg set Rating=$i WHERE Email_ID='$username'";
			mysql_query($update1);
		}
		$a="SELECT avg(Rating) from $songg";
		$update=mysql_query($a);
		$avg=mysql_fetch_array($update);

		$average=$avg['avg(Rating)'];

		$rupdate="UPDATE Songs set Rating=$average WHERE Song_ID=13";
		mysql_query($rupdate);

		$cupdate="UPDATE $songg set Comments=$comment WHERE Email_ID='$username'";
		mysql_query($cupdate);
		echo "<script>window.location='http://localhost/project/$songg.php'</script>";
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
