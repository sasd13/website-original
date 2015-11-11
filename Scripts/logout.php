<?php
	session_start();
	session_destroy();
	header('Location: ../Pages_libres/Connexion.php');
	exit();
?>