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

		$s="SELECT * from Songs";
		$r=mysql_query($s);
		$csong=mysql_num_rows($r);

		$sql="SELECT * FROM News";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);

		$start=$count-1;
		$end=$start-2;

		$astart=$csong;
		$search=$_GET['keyword'];
		$search = stripslashes($search);
		$search = mysql_real_escape_string($search);

?>
<html>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
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
			<div id="new_released_section">
            	<h1>Search Results</h1>
			<?php
				$sea="SELECT Song_Name,Album,Artist,Genre,Rating FROM Songs Where Artist like '%$search%' OR Genre like '%$search%' OR Album like '%$search%' OR Song_Name like '%$search%' ORDER By Rating DESC";
				$seaq=mysql_query($sea);
				$seaqcount=mysql_num_rows($seaq);
				if($seaqcount!=0)
				{
					while($searchres=mysql_fetch_array($seaq))
					{
				?>
            	<div class="new_released_box">
                <img src="music/<?php echo $searchres['Song_Name'];?>.jpg" alt="image" />
				<h3><?php echo $searchres['Song_Name']?></h3>
                    <h4><?php echo $searchres['Album']?></h4> 
                    <h4><?php echo $searchres['Artist']?></h4>
				<h4><?php echo $searchres['Genre']?></h4>  
              <div class="rantsection">
                        <label><?php echo $searchres['Rating']?></label><img class="star" src="images/yellowstar.png" alt="star" />
                    </div>
                    <div class="more_button"><a href="a<?php echo $searchres['Song_Name'];?>.php">More</a></div>
				</div>
				<?php
					}
				}
				else
				{
					?>
					<div class="new_released_box">
					<h3>No Songs Found</h3>
					</div>
				<?php
				}			
				?>
			</div>

            
            <div class="music_right_panel_fullwidth">
                <div id="news_section">
                    
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
