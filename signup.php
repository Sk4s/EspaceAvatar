<?php

session_start();

// $_SESSION['message'] = '';

require 'db.php';

require 'header.php';

require 'validate_signup.php';

// require 'validate_login.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Espace membre avec avatar : Sign-up</title>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
	<!-- <link rel="stylesheet" href="css/form.css" type="text/css"> -->
</head>
<body>
	<div class="body-content">
  		<div class="module">
		    <h1>Sign-up</h1>
		    <form class="form" action="#" method="post" enctype="multipart/form-data" autocomplete="on">
		      <div class="alert alert-error"></div>
		      <input type="text" placeholder="User Name" name="username" required />
		      <input type="email" placeholder="Email" name="email" required />
		      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
		      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />

		      <!-- <input type="text" placeholder="Nom" name="nom"  />
		      <input type="text" placeholder="Prénom" name="prenom"  />
		      <input type="text" placeholder="Adresse" name="adresse"  />
		      <input type="text" placeholder="Code postal" name="codePostal"  />
		      <input type="text" placeholder="Ville" name="ville"  />
		      <input type="text" placeholder="Portable" name="portable"  /> -->

		      <!-- <input type="text" placeholder="Site Perso" name="sitePerso"  />
		      <input type="text" placeholder="Linkedin" name="linkedin"  />
		      <input type="text" placeholder="Github" name="github"  />
		      <input type="text" placeholder="Twitter" name="twitter"  /> -->

		      <!-- <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>

		      <div class="cv"><label>Select your cv: </label><input type="file" name="cv" accept="file/*.pdf" required /></div> -->

		      <input type="submit" value="Create my account" name="submit" class="btn btn-block btn-primary" />
		    </form>
  		</div>
	</div>
</body>
</html>