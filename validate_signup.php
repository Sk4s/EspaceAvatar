<?php

// On recherche le type de requête http (POST, GET, PUT, DELETE)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Vérifier si le formulaire a bien été soumis
	if (isset($_POST['submit'])) {

		// On vérifie si les mots de passe sont égaux
		if ($_POST['password'] == $_POST['confirmpassword'] ) {
			$username =  $mysqli->real_escape_string($_POST['username']);
			$email = $mysqli->real_escape_string($_POST['email']);
			$pwd = $mysqli->real_escape_string($_POST['password']);

			$nom =  $mysqli->real_escape_string($_POST['nom']);
			$prenom =  $mysqli->real_escape_string($_POST['prenom']);
			$adresse =  $mysqli->real_escape_string($_POST['adresse']);
			$codePostal =  $mysqli->real_escape_string($_POST['codePostal']);
			$ville =  $mysqli->real_escape_string($_POST['ville']);
			$portable =  $mysqli->real_escape_string($_POST['portable']);
			$sitePerso =  $mysqli->real_escape_string($_POST['sitePerso']);
			$linkedin =  $mysqli->real_escape_string($_POST['linkedin']);
			$github =  $mysqli->real_escape_string($_POST['github']);
			$twitter =  $mysqli->real_escape_string($_POST['twitter']);

			// password_hash hashes password for security
			$password = password_hash($pwd, PASSWORD_DEFAULT);

			// $avatar_path = $mysqli->real_escape_string('images/' . $_FILES['avatar']['name']);
			$avatar_path = $mysqli->real_escape_string('default/default-avatar.png' . $_FILES['avatar']['name']);

			$cv_path = "";
			// $cv_path = $mysqli->real_escape_string('documents/' . $_FILES['cv']['name']);

			// On vérifie que le fichier est de type image
			// if (preg_match("!image!", $_FILES['avatar']['type']) && preg_match("!pdf!", $_FILES['cv']['type'])) {

				// Copier l'image dans le dossier /images
				// if (copy($_FILES['avatar']['tmp_name'], $avatar_path) && copy($_FILES['cv']['tmp_name'], $cv_path)) {

								// Set session variables to display on welcome page
								$_SESSION['username'] = $username;
								$_SESSION['email'] = $email;
								$_SESSION['avatar'] = $avatar_path;

								$_SESSION['nom'] = $nom;
								$_SESSION['prenom'] = $prenom;
								$_SESSION['adresse'] = $adresse;
								$_SESSION['codePostal'] = $codePostal;
								$_SESSION['ville'] = $ville;
								$_SESSION['portable'] = $portable;
								$_SESSION['sitePerso'] = $sitePerso;
								$_SESSION['linkedin'] = $linkedin;
								$_SESSION['github'] = $github;
								$_SESSION['twitter'] = $twitter;
								$_SESSION['cv'] = $cv_path;

								// Create a query string for inserting data into the database
								$sql = "INSERT INTO users (username, email, password, avatar, nom, prenom, adresse, codePostal, ville, portable, sitePerso, linkedin, github, twitter, cv) VALUES ('$username', '$email', '$password', '$avatar_path', '$nom', '$prenom', '$adresse', '$codePostal', '$ville', '$portable', '$sitePerso', '$linkedin', '$github', '$twitter', '$cv_path')";
						
								// Check if mysql query as successful
								if ($mysqli->query($sql) == true) {

									// !!!! WARNING !!!! => NECESSAIRE CAR DANS LE HEADER ON CONDITIONNE AVEC SESSION MESSAGE AFIN D'AFFICHER LE LOGOUT!
									$_SESSION['message'] = "Registration successful ! Added $username to the database !"; 
									// !!!! WARNING !!!! => NECESSAIRE CAR DANS LE HEADER ON CONDITIONNE AVEC SESSION MESSAGE AFIN D'AFFICHER LE LOGOUT!

									// echo "<script>alert(\"Registration successful ! Added $username to the database !\")</script>";
									
									// Profil 
									header("location: profile_user.php");

								} else {
									// $_SESSION['message'] = "User could not be added to the database !";
									echo "<script>alert(\"User could not be added to the database !\")</script>";
								}
								$mysqli->close();

				// } else {
				// 	// $_SESSION['message'] = "File upload failed !";
				// 	echo "<script>alert(\"File upload failed !\")</script>";
				// }
				
			// } else {
			// 	// $_SESSION['message'] = "Please only upload GIF, JPG or PNG images and PDF document !";
			// 	echo "<script>alert(\"Please only upload GIF, JPG or PNG images and PDF document !\")</script>";
			// }

		} else {
			// $_SESSION['message'] = "Password doesn't match !";
			echo "<script>alert(\"Password doesn't match !\")</script>";
		}
	}
}