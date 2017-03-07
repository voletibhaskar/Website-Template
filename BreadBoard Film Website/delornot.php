
<html>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<head>
		<title>Delete Account</title>
		<link href="music_style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="music_container">
		
			<div id="music_header">
    			<div id="music_title">
				<div id="music_sitetitle">Breadboard Music</div>
        		</div>
        
        	<div id="music_search">
        	<form method="get" action="#">
                <label>Search:</label><input class="inputfield" name="keyword" type="text" id="keyword"/>
                <input class="button" type="submit" name="Search" value="Search" />
            </form>
        </div>
    </div>

	<div id="music_banner">
       	<div id="music_banner_text">
            <div id="banner_title">Welcome To The Music Store</div>
            <p>
            Just listen and feel the music
            </p>
            <div class="more_button"><a href="history.php">Read More</a></div>
    	</div>
	</div>
        
    <div id="music_menu">
     	<ul>
			<li><a href="home.php">Home</a></li>
            <li><a href="subpage.php">Songs</a></li>
            <li><a href="subpage.php">Albums</a></li>  
            <li><a href="subpage.php">Artists</a></li>                      
            <li><a href="contacts.php" class="lastmenu">Contacts</a></li>        
        </ul>  
    </div>
    
    <div id="music_content">
    
    	<div id="music_left_column">
            <h2>Member Profile</h2>
            <div class="left_col_box">
                <form method="post" action="logout.php">
                  <div class="Member"><label><?php echo $ro['First_Name'];?></label></div>
				<a href="home.html"><input class="b_sign_up" type="button" name="Sign Up" value="View Profile"></a>
				<input class="button" type="submit" name="Submit" value="Logout" />
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
            	<h1 align="center">Delete Account</h1>
                <div id="sign_up">
                <form method="post" action="delete.php">
				<table border="0" align="center">
				<tr>
					<td class="sign_up_row" height="50" colspan="2">Are you sure?</td>
				</tr>
				<tr>
					<td><input class="Ebutton" type="submit" name="edit" value="Yes"/></td>
					<td><a href="profile.php"><input class="Ebutton" type="button" name="edit" value="No"/></a></td>
				</tr>
				</table>
                                    
            </div>
  			</div>
		</div>
    </div>
    
	<div id="music_footer">
     		   <a href="home.php">Home</a> | <a href="subpage.php">Videos</a> | <a href="subpage.php">Audios</a> | <a href="subpage.php">Albums</a> | <a href="subpage.php">Artists</a> | <a href="contacts.php">Contact</a><br />
    		    Copyright 2016 <a href="#"><strong>Breadboard Studios</strong></a>
   	</div>
</div>
  </body>
</html>