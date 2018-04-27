<?php

// On recherche le type de requête http (POST, GET, PUT, DELETE)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Vérifier si le formulaire a bien été soumis
    if (isset($_POST['submit'])) {

        /* User login process, checks if user exists and password is correct */

        // Escape email to protect against SQL injections

        // $email = $mysqli->escape_string($_POST['email']);
        $email_co = $mysqli->real_escape_string($_POST['email_connect']);
        $pwd_co = $mysqli->real_escape_string($_POST['password_connect']);

        // password_hash hashes password for security
        $password_hashco = password_hash($pwd_co, PASSWORD_DEFAULT);

        $result_co = $mysqli->query("SELECT * FROM users WHERE email='$email_co'");

        if ( $result_co->num_rows == 0 ){ // User doesn't exist
            // $_SESSION['message'] = "User with that email doesn't exist!";
            echo "<script>alert(\"User with that email doesn't exist!\")</script>";
            // echo $_SESSION['message'];
            session_unset();
            // session_destroy();
            // header("location: darkhole.php");
        }
        else { // User exists
            $user_co = $result_co->fetch_assoc();

            if ( password_verify($_POST['password_connect'], $user_co['password']) ) {
                
                $_SESSION['email'] = $user_co['email'];
                $_SESSION['username'] = $user_co['username'];
                $_SESSION['nom'] = $user_co['nom'];
                $_SESSION['prenom'] = $user_co['prenom'];
                $_SESSION['adresse'] = $user_co['adresse'];
                $_SESSION['codePostal'] = $user_co['codePostal'];
                $_SESSION['ville'] = $user_co['ville'];
                $_SESSION['portable'] = $user_co['portable'];
                $_SESSION['sitePerso'] = $user_co['sitePerso'];
                $_SESSION['linkedin'] = $user_co['linkedin'];
                $_SESSION['github'] = $user_co['github'];
                $_SESSION['twitter'] = $user_co['twitter'];
                $_SESSION['avatar'] = $user_co['avatar'];
                $_SESSION['cv'] = $user_co['cv'];
                
                $_SESSION['active'] = $user_connect['active'];
                
                // This is how we'll know the user is logged in
                $_SESSION['message'] = '';

                header("location: profile_user.php");
            }
            else {
                // $_SESSION['message'] = "You have entered wrong password, try again!";
                // header("location: login.php");
                echo "<script>alert(\"Wrong password !\")</script>";
                session_unset();
            }
        }
    }
}

?>