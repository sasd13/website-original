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
		<link rel="stylesheet" href="../Styles/style_changepwd.css">
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
				<h3>Veuillez remplir le formulaire ci-dessous :</h3>
				<form name="formregister" method="POST" action="changepwd2.php">
					<fieldset>
						<legend><b>Modification</b></legend>
						<table id="tab1reg">
							<tr>
								<td class="tab1regcel1"><label for="password">Saisir Actuel mot de passe: </label></td>
								<td><input type="password" name="oldpassword" id="oldpassword" pattern="[A-Za-z0-9]+" placeholder="ancien mot de passe" required="REQUIRED"></td>
							</tr>
							<tr>
								<td><label for="password">Nouveau mot de passe : </label></td>
								<td><input type="password" name="newpassword" id="newpassword" pattern="[A-Za-z0-9]+" placeholder="nouveau mot de passe" required="REQUIRED">&nbsp;&nbsp;(6 caract&egrave;res minimum)</td>
							</tr>
							<tr>
								<td><label for="confirmpassword">Confirmez le nouveau mot de passe : </label></td>
								<td><input type="password" name="confirmnewpassword" id="confirmnewpassword" pattern="[A-Za-z0-9]+" placeholder="confirmez nouveau mot de passe" required="REQUIRED"></td>
							</tr>
						</table>
					</fieldset>
					<div id="formboutons"><input type="submit" value="MODIFIER">&nbsp;&nbsp;&nbsp;<a href="../Pages_libres/Espace_personnel.php"><input type="button" value="ANNULER"></a></div>
				</form>
			</div>
		</div>	
		
		<?php
        	include("../Page_parties/footer.html");
        ?> 
	</body>
</html>