<?php
	session_start();	
	if(isset($_SESSION['login']))
	{
		header('Location: Espace_personnel.php');
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
		<link rel="stylesheet" href="../Styles/style_inscription.css">
		<title>Projet Site Web - Inscription</title>
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
				<h2 class="bienvenue">Formulaire d'inscription</h2>
				<form name="formregister" method="POST" action="../Scripts/register.php">
					<fieldset>
						<legend><b>Informations indispensables</b></legend>
						<?php
							if(isset($_SESSION['echecregister']))
							{
								echo $_SESSION['echecregister'];
								unset($_SESSION['echecregister']);
							}
						?>
						<table id="tab1reg">
							<tr>
								<td class="tab1regcel1"><label for="nom">Nom : </label></td>
								<td><input type="text" name="nom" id="nom" pattern="[A-Za-z]+" placeholder="nom" required="REQUIRED"></td>
							</tr>
							<tr>
								<td class="tab1regcel1"><label for="prenom">Pr&eacute;nom : </label></td>
								<td><input type="text" name="prenom" id="prenom" pattern="[A-Za-z]+" placeholder="pr&eacute;nom" required="REQUIRED"></td>
							</tr>
							<tr>
								<td>Sexe : </td>
								<td><input type="radio" name="sexe" id="homme" value="homme" checked>&nbsp;Homme&nbsp;<input type="radio" name="sexe" id="femme" value="femme">&nbsp;Femme&nbsp;</td>
							</tr>
							<tr>
								<td><label for="naissance">Ann&eacute;e de naissance : </label></td>
								<td><select name="naissance" id="naissance">
										<?php
											$annee = date("Y");
											$i = $annee - 10;
											$limite = $annee - 70;
											for($i; $i>=$limite; $i--)
											{
												echo "\t\t\t\t\t\t\t\t\t\t<option value=\"".$i."\">".$i."</option>\n";
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><label for="email">E-mail : </label></td>
								<td>
									<input type="email" name="email" id="email" pattern="[^ @]+@[^ @]+" placeholder="email" required="REQUIRED">
									<?php 
										if(isset($_SESSION['echecemail']))
										{
											echo $_SESSION['echecemail'];
											unset($_SESSION['echecemail']);
										}
									?>
								</td>
							</tr>
							<tr>
								<td><label for="login">Identifiant (ou pseudo) : </label></td>
								<td>
									<input type="text" name="login" id="login" pattern="[A-Za-z0-9]+" placeholder="pseudo" required="REQUIRED">
									<?php 
										if(isset($_SESSION['echeclogin']))
										{
											echo $_SESSION['echeclogin'];
											unset($_SESSION['echeclogin']);
										}
									?>
								</td>
							</tr>
							<tr>
								<td><label for="password">Mot de passe : </label></td>
								<td><input type="password" name="password" id="password" pattern="[A-Za-z0-9]+" placeholder="mot de passe" required="REQUIRED">&nbsp;&nbsp;(6 caract&egrave;res minimum)</td>
							</tr>
							<tr>
								<td><label for="confirmpassword">Confirmez le mot de passe : </label></td>
								<td>
									<input type="password" name="confirmpassword" id="confirmpassword" pattern="[A-Za-z0-9]+" placeholder="confirmez mot de passe" required="REQUIRED">
									<?php 
										if(isset($_SESSION['echecpassword']))
										{
											echo $_SESSION['echecpassword'];
											unset($_SESSION['echecpassword']);
										}
									?>
								</td>
							</tr>
						</table>
					</fieldset>
					<div id="formboutons"><input type="submit" value="ENVOYER">&nbsp;&nbsp;&nbsp;<input type="reset" value="EFFACER"></div>
				</form>
			</div>
		</div>	
		
		<?php
        	include("../Page_parties/footer.html");
        ?> 
	</body>
</html>