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

		$sname="SELECT Song_Name FROM Songs WHERE Song_ID='8'";
		$result1=mysql_query($sname);
		$song_name=mysql_fetch_array($result1);
		$song=$song_name['Song_Name'];
		$songg=$song_name['Song_Name'];

		$alname="SELECT Album FROM Songs WHERE Song_ID='8'";
		$result2=mysql_query($alname);
		$album=mysql_fetch_array($result2);

		$artname="SELECT Artist FROM Songs WHERE Song_ID='8'";
		$result3=mysql_query($artname);
		$artist=mysql_fetch_array($result3);

		$genname="SELECT Genre FROM Songs WHERE Song_ID='8'";
		$result4=mysql_query($genname);
		$genre=mysql_fetch_array($result4);

		$rate="SELECT Rating FROM Songs WHERE Song_ID='8'";
		$result5=mysql_query($rate);
		$rating=mysql_fetch_array($result5);

		$usr="SELECT * From $songg ORDER by S_No DESC";
		$result6=mysql_query($usr);
		$count=mysql_num_rows($result6);

		$songgd=$songg."d";

		$dddd="SELECT * from $songgd";
		$don=mysql_query($dddd);
		$cdown=mysql_num_rows($don);

		$start=$count;
?>
<html>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<head>
		<title>Song</title>
		<link href="music_style.css" rel="stylesheet" type="text/css"/>
	</head>
	<html>
	<head>
		<title>Breadboard Music</title>
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
			<li><a href="admin.php">Home</a></li>
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
            	<h1>&nbsp&nbsp</h1>
                <div class="music_right_panel_fullwidth_content">
                    <img src="music/<?php echo $song; ?>.jpg" alt="image 1" /> 
              </div> 
                
                <div class="music_right_panel_fullwidth_content">
                	<div id="sign_up">
				<table border="0">
				<tr>
					<td class="sign_up_row" height="50"><label>Song:</label></td>
					<td class="sign_up_row" height="50"><label><?php echo $song_name['Song_Name']?></label></td>
				</tr>
				<tr>
					<td class="sign_up_row" height="50"><label>Album:</label></td>
					<td class="sign_up_row" height="50"><label><?php echo $album['Album']?></label></td>
				</tr>
				<tr>
					<td class="sign_up_row" height="50"><label>Artist:</label></td>
					<td class="sign_up_row" height="50"><label><?php echo $artist['Artist']?></label></td>
				</tr>
				<tr>
                    	<td class="sign_up_row" height="50"><label>Genre:</label></td>
					<td class="sign_up_row" height="50"><label><?php echo $genre['Genre']?></label></td>
				</tr>
				<tr>
                    	<td class="sign_up_row" height="50"><label>Rating:</label></td>
					<td class="sign_up_row" height="50"><img class="astar" src="images/yellowstar.png"/><label><?php echo $rating['Rating']?></label></td>
				</tr>
				<?php
				if($cdown>0)
				{
				?>
				<tr>
                    	<td class="sign_up_row" height="50"><label>Downloads:</label></td>
					<td class="sign_up_row" height="50" width="250"><label><?php echo $cdown ?></label></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td height = "50" align="center" colspan="2"><audio controls>
  						<source src="music/<?php echo $song;?>.mp3" type="audio/mpeg">
						</audio>
					</td>
				</tr>
				</table>
				<h1>User Views</h1>
				<?php
					while($randc=mysql_fetch_array($result6))
					{
						$user=$randc['Email_ID'];
						$sqli="SELECT First_Name FROM Members WHERE Email_ID='$user'";
						$resulti=mysql_query($sqli);
						$name=mysql_fetch_array($resulti);

				?>
				<table border="0">
				<tr>
					<th class="sign_up_row" height="50"><?php echo $name['First_Name'] ?></th>
					<td class="sign_up_row" height="50"><img class="astar" src="images/yellowstar.png"/><label><?php echo $randc['Rating']?></label></td>
				</tr>
				</table>
				<table border="0">
				<tr>
					<td height="50" width="400"><?php echo $randc['Comments']?></td>
				</tr>
				</table>
				<div class="blog_box">
                    
				</div>
				<?php
						$start=$start-1;
					}
				?>
				<div class="more_button_d"><a href="adelcom.php">Delete Comment</a></div>
              </div>
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
