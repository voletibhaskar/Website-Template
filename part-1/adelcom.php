<?php
	$username='';
	session_start();
	$dbc=mysql_connect("localhost","root","");
	$db=mysql_select_db("Music",$dbc);
	if (!empty($_SESSION['admin']))
	{
		$username=$_SESSION['admin'];

		$sql="SELECT First_Name FROM Admin WHERE Email_ID='$username'";
		$result=mysql_query($sql);
		$ro=mysql_fetch_array($result);

		$sql1="SELECT Surname FROM Admin WHERE Email_ID='$username'";
		$result1=mysql_query($sql1);
		$ro1=mysql_fetch_array($result1);
?>
<html>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<head>
		<title>Delete Comment</title>
		<link href="music_style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="music_container">
		
			<div id="music_header">
    			<div id="music_title">
				<div id="music_sitetitle">Breadboard Music</div>
        		</div>
        
        	<div id="music_search">
        	<form method="get" action="asearch.php">
                <label>Search:</label><input class="input_search" name="keyword" type="text" id="keyword" oninvalid="this.setCustomValidity('Please Enter Something To Search For')" oninput="setCustomValidity('')" required/>
                <input class="button b_sign_up" type="submit" name="Search" value="Search"/>
            </form>
        </div>
    </div>

	<div id="music_banner">
       	<div id="music_banner_text">
            <div id="banner_title">Welcome To The Music Store</div>
            <p>
            Just listen and feel the music
            </p>
            <div class="more_button"><a href="ahistory.php">Read More</a></div>
    	</div>
	</div>
        
    <div id="music_menu">
     	<ul>
			<li><a href="home.php">Home</a></li>
            <li><a href="asong.php">Songs</a></li>
            <li><a href="aalbum.php">Albums</a></li>  
            <li><a href="aartist.php">Artists</a></li>                      
            <li><a href="acontacts.php" class="lastmenu">Contacts</a></li>        
        </ul>  
    </div>
    
    <div id="music_content">
    
    	<div id="music_left_column">
            <h2>Admin Profile</h2>
            <div class="left_col_box">
                <form method="post" action="logout.php">
                  <div class="Member"><label><?php echo $ro['First_Name'];?></label></div>
				<a href="aprofile.php"><input class="button b_sign_up" type="button" name="Sign Up" value="View Profile"></a>
				<input class="button" type="submit" name="Submit" value="Logout" /></br></br>
				<a href="amembers.php"><input class="button b_sign_up" type="button" name="Sign Up" value="Members"></a>
                </form>
			</div>
            
            <div class="left_col_box">
                <div class="blog_box">
                    
				</div>
                
                <div class="more_button"></div>                                              
			</div>
		</div>
        
        <div id="music_right_column">
        	<div class="music_right_panel_fullwidth">
            	<h1 align="center">Delete User Comment For A Song</h1>
                <div id="sign_up">
                <form name="sign_up_frm" method="post" action="adelingcom.php">
				<table border="0" align="center">
				<tr>
					<td class="sign_up_row" height="50"><label>Song Name:</label></td>
					<td><input class="inputfield" name="song_name" type="text" id="song_name" size="50" value= "" required oninvalid="this.setCustomValidity('Please Enter A Name Of a Song')" oninput="setCustomValidity('')"/></td>
				</tr>
				<tr>
					<td class="sign_up_row" height="50"><label>Email-ID:</label></td>
					<td><input class="inputfield" name="Email_ID" type="text" id="Email_ID" size="50" value= ""required oninvalid="this.setCustomValidity('Please Enter An Email_ID')" oninput="setCustomValidity('')"/></td>
				</tr>
				<tr>
					<td><input class="button b_sign_up" type="submit" name="edit" value="Confirm"/></td>
					<td><a href="admin.php"><input class="button b_sign_up" type="button" name="edit" value="Cancel"/></a></td>
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
