<?php
// On recherche le type de requête http (POST, GET, PUT, DELETE)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Vérifier si le formulaire a bien été soumis
	if (isset($_POST['update_avatar'])) {

		$avatar_path = $mysqli->real_escape_string('images/' . $_FILES['avatar']['name']);

		// On vérifie que le fichier est de type image
		if (preg_match("!image!", $_FILES['avatar']['type'])) {

			// Copier l'image dans le dossier /images
			if (copy($_FILES['avatar']['tmp_name'], $avatar_path)) {

							// Set session variables to display on profil page
							$_SESSION['avatar'] = $avatar_path;

							// Create a query string for updating data into the database

							// $sql = "UPDATE users SET avatar='$avatar_path' WHERE username='".$_SESSION['username']."'";
							$sql = "UPDATE users SET avatar='$avatar_path' WHERE email='$_SESSION[email]'";

							// Check if mysql query as successful
							if ($mysqli->query($sql) == true) {
								// $_SESSION['message'] = "Registration successful ! Update $avatar to the database !";
								echo "<script>alert(\"Avatar updated !\")</script>";

								// Profil 
								// header("location: profile_user.php");

							} else {
								// $_SESSION['message'] = "Avatar could not be added to the database !";
								echo "<script>alert(\"Avatar couldn't be added to the database !\")</script>";
							}
							$mysqli->close();

			} else {
				// $_SESSION['message'] = "File upload failed !";
				echo "<script>alert(\"File upload failed !\")</script>";
			}
				
		} else {
			// $_SESSION['message'] = "Please only upload GIF, JPG or PNG images and PDF document !";
			echo "<script>alert(\"Please only upload GIF, JPG or PNG images and PDF document !\")</script>";
		}
	}
}