<?php
	session_start();
	
	if(isset($_SESSION['login']))
	{
		header('Location: Espace_perspnnel.php');
		exit();
	}
	else
	{
		$statut = "Hors ligne";
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
		<link rel="stylesheet" href="../Styles/style_connexion.css">
		<title>Projet Site Web - Connexion</title>
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
				<h2 class="bienvenue">Connexion</h2>
				<form name="formlogin" method="POST" action="../Scripts/login.php">
					<fieldset>
						<legend><b>Connectez &agrave; votre espace personnel</b></legend>
						<?php 
							if(isset($_SESSION['echeclogin']))
							{
								echo $_SESSION['echeclogin'];
								unset($_SESSION['echeclogin']);
							}
						?>
						<table id="tablog">
							<tr>
								<td class="tablogcel1"><label for="login">Identifiant (ou pseudo) : </label></td>
								<td><input type="text" name="login" id="login" placeholder="pseudo" required="REQUIRED"></td>
							</tr>
							<tr>
								<td><label for="password">Mot de passe : </label></td>
								<td><input type="password" name="password" id="password" placeholder="mot de passe" required="REQUIRED"></td>
							</tr>
						</table>
						<div id="formboutons"><input type="submit" value="CONNEXION">&nbsp;&nbsp;&nbsp;<input type="reset" value="EFFACER"></div>
					</fieldset>
					<p>&nbsp;Non membres, inscrivez vous :&nbsp;<a href="Inscription.php">Inscription</a></p>
				</form>
			</div>
		</div>	
		
		<?php
        	include("../Page_parties/footer.html");
        ?> 
	</body>
</html>