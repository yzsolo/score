<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title></title>
	
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->data['base'].$this->data['css']?>admin_login.css" />
</head>
<body>
		<form id="login-form" method="POST">

		<fieldset>
		
			<legend>login</legend>
			
			<label for="login">user</label>
			<input type="text" id="login" name="login"/>
			<div class="clear"></div>
			
			<label for="password">Password</label>
			<input type="password" id="password" name="password"/>
			<div class="clear"></div>
			
			<div class="clear"></div>
			
			<br />
			
			<input type="submit" style="margin: -20px 0 0 300px;" class="btn btn-info" name="commit" value="Log in"/>	
		</fieldset>
	</form>
</body>
</html>