<!DOCTYPE html>
<html>
  <head>
    <title>eDiary</title>
	<meta charset="UTF-8">
	<link href="style.css" type="text/css" rel="stylesheet">
	<script type="text/javascript">
	
	</script>
  </head>
  
  <body>
  <div class="form">
	  <div class="h2">
        <h2>LOGIN</h2>
      </div>
  	<form method="POST" action="login.php" name="login_form" id="form" >
		
		<p>Username:</p>
		<input type="text" name="username" id="username" value="<?php if(!empty($_POST)) echo $_POST['username']; ?>">
		<span id="spantagu"></span>
		<p>Password:</p>
		<input type="password" name="password" id="password" value="<?php if(!empty($_POST)) echo $_POST['password']; ?>"><br>
		<span id="spantagp"></span>
		<br>
		<input type="submit" name="submit" value="Login" id="submitLog">
		
	</form>
</div>
 

  </body>
  </html>