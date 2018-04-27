<?php

session_start();

// $_SESSION['message'] = '';

require 'db.php';

require 'header.php';

require 'validate_login.php';

// require 'validate_signup.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Espace membre avec avatar : Login</title>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="body-content">
  		<div class="module">
		    <h1>Login</h1>
		    <form class="form" action="#" method="post">
		      <div class="alert alert-error"></div>
		      
		      <input type="email" placeholder="Email" name="email_connect" required />
		      <input type="password" placeholder="Password" name="password_connect" required />

		      <input type="submit" value="Let's go !" name="submit" class="btn btn-block btn-primary" /> 
		    </form>
  		</div>
	</div>
</body>
</html>