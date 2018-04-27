<?php
// On recherche le type de requête http (POST, GET, PUT, DELETE)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Vérifier si le formulaire a bien été soumis
	if (isset($_POST['update_profile'])) {

		// On vérifie si les mots de passe sont égaux
		if ($_POST['password_update'] == $_POST['confirm_password'] ) {

			$username_update =  $mysqli->real_escape_string($_POST['username_update']);
			if ($username_update != "") {
			} else {
				$username_update = $_SESSION['username'];
			}
			$pwd_update =  $mysqli->real_escape_string($_POST['password_update']);
			
			$nom_update =  $mysqli->real_escape_string($_POST['nom_update']);
			if ($nom_update != "") {
			} else {
				$nom_update = $_SESSION['nom'];
			}
			$prenom_update =  $mysqli->real_escape_string($_POST['prenom_update']);
			if ($prenom_update != "") {
			} else {
				$prenom_update = $_SESSION['prenom'];
			}
			$adresse_update =  $mysqli->real_escape_string($_POST['adresse_update']);
			if ($adresse_update != "") {
			} else {
				$adresse_update = $_SESSION['adresse'];
			}
			$codePostal_update =  $mysqli->real_escape_string($_POST['codePostal_update']);
			if ($codePostal_update != "") {
			} else {
				$codePostal_update = $_SESSION['codePostal'];
			}
			$ville_update =  $mysqli->real_escape_string($_POST['ville_update']);
			if ($ville_update != "") {
			} else {
				$ville_update = $_SESSION['ville'];
			}
			$portable_update =  $mysqli->real_escape_string($_POST['portable_update']);
			if ($portable_update != "") {
			} else {
				$portable_update = $_SESSION['portable'];
			}
			$sitePerso_update =  $mysqli->real_escape_string($_POST['sitePerso_update']);
			if ($sitePerso_update != "") {
			} else {
				$sitePerso_update = $_SESSION['sitePerso'];
			}
			$linkedin_update =  $mysqli->real_escape_string($_POST['linkedin_update']);
			if ($linkedin_update != "") {
			} else {
				$linkedin_update = $_SESSION['linkedin'];
			}
			$github_update =  $mysqli->real_escape_string($_POST['github_update']);
			if ($github_update != "") {
			} else {
				$github_update = $_SESSION['github'];
			}
			$twitter_update =  $mysqli->real_escape_string($_POST['twitter_update']);
			if ($twitter_update != "") {
			} else {
				$twitter_update = $_SESSION['twitter'];
			}

			$password_update = password_hash($pwd_update, PASSWORD_DEFAULT);

							// Set session variables to display on profil page
							$_SESSION['username'] = $username_update;
							$_SESSION['password'] = $password_update;

							$_SESSION['nom'] = $nom_update;
							$_SESSION['prenom'] = $prenom_update;
							$_SESSION['adresse'] = $adresse_update;
							$_SESSION['codePostal'] = $codePostal_update;
							$_SESSION['ville'] = $ville_update;
							$_SESSION['portable'] = $portable_update;
							$_SESSION['sitePerso'] = $sitePerso_update;
							$_SESSION['linkedin'] = $linkedin_update;
							$_SESSION['github'] = $github_update;
							$_SESSION['twitter'] = $twitter_update;

							// Create a query string for updating data into the database

							// $sql = "UPDATE users SET avatar='$avatar_path' WHERE username='".$_SESSION['username']."'";
							// $sql = "UPDATE users SET username='$username_update', password='$password_update' WHERE email='$_SESSION[email]'";
							$sql = "UPDATE users SET username='$username_update', password='$password_update', nom='$nom_update', prenom='$prenom_update', adresse='$adresse_update', codePostal='$codePostal_update', ville='$ville_update', portable='$portable_update', sitePerso='$sitePerso_update', linkedin='$linkedin_update', github='$github_update', twitter='$twitter_update' WHERE email='$_SESSION[email]'";

							// Check if mysql query as successful
							if ($mysqli->query($sql) == true) {
								// $_SESSION['message'] = "";
								echo "<script>alert(\"Profile updated !\")</script>";

								// Profil
								// session_start();
								// session_unset();
								// session_destroy();

								// header("location: profile_user.php");

							} else {
								// $_SESSION['message'] = "";
								echo "<script>alert(\"1 !\")</script>";
							}
							$mysqli->close();

			} else {
				// $_SESSION['message'] = "";
				echo "<script>alert(\"Password doesn't match !\")</script>";
			}
				
		} else {
			// $_SESSION['message'] = "";
			// echo "<script>alert(\"2 !\")</script>";
		}
	}