<html>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type"/>
	<head>
		<title>Sign-Up</title>
		<script type="text/javascript">
		function validateMinimumLength (control, length, errormessage)
		{
			var error="";
			if(control.value.length < length)
			{
				error = errormessage;
				(control).setCustomValidity(error);
				var error="";
			}
			return error;
		}

		function validateConfirmPassword(password1, password2, errormessage)
		{
			var error="";
			if(password1.value != password2.value)
			{
				error = errormessage;
				window.alert(error);
				password1.value="";
				password2.value="";
			}
			return error;
		}

		function validate(form)
		{
			var returnValue = "";
			var why="";
			returnValue += validateConfirmPassword(form.password, form.con_password, 'Your password did not match');
			why += validateMinimumLength(form.password, 6, 'Your password must be a minimum of 6 characters');
			if (why != "")
			{
				return false;
			}
			if (returnValue!="");
			{
				return false;
			}
			return true;
		}
		</script>
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
            	<h1 align="center">Sign-Up Form</h1>
                <div id="sign_up">
				Enter the following details.</br></br>
                    <form name="sign_up_frm" method="post" action=sign_up.php>
				<table border="0" align="center">
				<tr>
					<td class="sign_up_row" height="50"><label>First Name:</label></td>
					<td><input class="inputfield" name="First_Name" type="text" id="First_Name" size="50" required oninvalid="this.setCustomValidity('Please Enter Your First Name')" oninput="setCustomValidity('')"/></td>
				</tr>
				<tr>
					<td class="sign_up_row" height="50"><label>Surname:</label></td>
					<td><input class="inputfield" name="Surname" type="text" id="Surname" size="50" required oninvalid="this.setCustomValidity('Please Enter Your Surname')" oninput="setCustomValidity('')"/></td>
				</tr>
				<tr>
					<td class="sign_up_row" height="50"><label>Email-Id:</label></td>
					<td><input class="inputfield" name="Username" type="text" id="Username" size="50" required oninvalid="this.setCustomValidity('Please Enter Your Email-ID')" oninput="setCustomValidity('')"/></td>
				</tr>
				<tr>
                    	<td class="sign_up_row" height="50"><label>Password:</label></td>
					<td><input class="inputfield" name="password" type="password" id="password" oninvalid="validateMinimumLength(this, 6, 'Your password must be a minimum of 6 characters');"  oninput="setCustomValidity('')" size="50" required/></td>
				</tr>
				<tr>
                    	<td class="sign_up_row" height="50"><label>Confirm Password:</label></td>
					<td><input class="inputfield" name="con_password" type="password" id="con_password1" size="50" required/><span class="message"></span></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input class="button" type="submit" name="Submit" value="Confirm"/></td>
				</tr>
				<tr>
					<td colspan="2" align="center">Please Re-Enter the Form</td>
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
