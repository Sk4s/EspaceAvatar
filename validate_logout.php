<?php 
session_start();
session_unset(); // Free all session variables. Détruit toutes les variables d'une session.
session_destroy(); // Destroys all data registered to a session
header('Location: login.php');
exit();
?>