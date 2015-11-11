<?php
	session_start();	
	if(!isset($_SESSION['login']))
	{
		header('Location: ../Pages_libres/Connexion.php');
		exit();
	}
	else
	{
		$statut = "En ligne";
	}	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Projet Site Web">
		<meta name="keywords" content="HTML5,CSS3,JavaScript,PHP">
		<meta name="author" content="Samir SAID ALI">
		<link rel="stylesheet" href="../Styles/style.css">
		<link rel="stylesheet" href="../Styles/style_change.css">
		<title>Projet Site Web - Modification</title>
	</head>
	
	<body>
		<?php
			include("../Page_parties/header.html");
			include("../Page_parties/navigation.php");
		?>		  
        
		<!-- Section -->
        <div id="section">
			<!-- Article -->
			<div id="article">
				<h3>Nouvelles informations</h3>
				<table id="tab1fgt">
					<tr>
						<td class="tab1fgtcel1">Nom actuel :</td>
						<td><b><i><?php if (isset($_SESSION['nom'])) echo $_SESSION['nom']; ?></i></b></td>
					</tr>
					<tr>
						<td class="tab1fgtcel1">Pr&eacute;nom actuel :</td>
						<td><b><i><?php if (isset($_SESSION['prenom'])) echo $_SESSION['prenom']; ?></i></b></td>
					</tr>
					<tr>
						<td class="tab1fgtcel1">Email actuel :</td>
						<td><b><i><?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?></i></b></td>
					</tr>						
				</table>
				<br>
				<a href="../Pages_libres/Espace_personnel.php">Retour &agrave; la page Espace Personnel</a>
			</div>
		</div>	

		<?php
        	include("../Page_parties/footer.html");
        ?> 
	</body>
</html>