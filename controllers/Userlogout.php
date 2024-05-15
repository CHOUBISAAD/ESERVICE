<?php
session_start(); // Démarre la session
session_unset(); // Efface toutes les variables de session
session_destroy(); // Détruit la session

// Redirige l'utilisateur vers la page de connexion par exemple
header("Location:../index.php");
exit();
?>
