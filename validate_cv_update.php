<?php
// On recherche le type de requête http (POST, GET, PUT, DELETE)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Vérifier si le formulaire a bien été soumis
	if (isset($_POST['update_cv'])) {

		$cv_path = $mysqli->real_escape_string('documents/' . $_FILES['cv']['name']);

		// On vérifie que le fichier est de type pdf
		if (preg_match("!pdf!", $_FILES['cv']['type'])) {

			// Copier le pdf dans le dossier /images
			if (copy($_FILES['cv']['tmp_name'], $cv_path)) {

							// Set session variables to display on profil page
							$_SESSION['cv'] = $cv_path;

							// Create a query string for updating data into the database

							// $sql = "UPDATE users SET avatar='$avatar_path' WHERE username='".$_SESSION['username']."'";
							$sql = "UPDATE users SET cv='$cv_path' WHERE email='$_SESSION[email]'";

							// Check if mysql query as successful
							if ($mysqli->query($sql) == true) {
								// $_SESSION['message'] = "Registration successful ! Update $cv to the database !";
								echo "<script>alert(\"CV updated !\")</script>";

								// Profil 
								// header("location: profile_user.php");

							} else {
								// $_SESSION['message'] = "Cv could not be added to the database !";
								echo "<script>alert(\"Error : File couldn't be added to the database !\")</script>";
							}
							$mysqli->close();

			} else {
				// $_SESSION['message'] = "File upload failed !";
				echo "<script>alert(\"Error : File upload failed !\")</script>";
			}
				
		} else {
			// $_SESSION['message'] = "Please only upload PDF document !";
			echo "<script>alert(\"Error : Please only upload PDF document !\")</script>";
		}
	}
}