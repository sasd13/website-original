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
				<h3>Selectionner photo de profil</h3>
				<p><i>L'image sera r&eacute;duite si elle d&eacute;passe les dimensions</i></p>
				<form id="formfgt1" name="formulaire" action="editphoto.php" method="POST" enctype="multipart/form-data">
					<fieldset>
						<legend>Chargement de votre photo</legend>
						<?php
							if((isset($_SESSION['photo'])) AND ($_SESSION['photo'] == 1))
							{
								echo "<span class=\"rougei\">Vous avez d&eacute;j&agrave; une photo de profil... Ajouter une nouvelle photo remplacera automatiquement la photo pr&eacute;sente</span>\n";
							}
						?>
						<table id="#tab1fgt">
							<tr>
								<td class="tab1fgtcel1">Format requis : </td>
								<td>JPEG (.jpg)</td>
							</tr>
							<tr>
								<td class="tab1fgtcel1">Taille maximale : </td>
								<td>200 Ko</td>
							</tr>
							<tr>
								<td class="tab1fgtcel1">Dimensions (en pixels)</td>
								<td>150x150</td>
							</tr>
							<tr>
								<td class="tab1fgtcel1"><label for="file">Photo : </label></td>
								<td><input type="hidden" name="MAX_FILE_SIZE" value="200000"/><input type="file" name="file" id="file" required="REQUIRED"/></td>
							</tr>
						</table>	
						<input type="submit" value="ENVOYER">
					</fieldset>					
				</form>
				<br>
				<h3>Supprimer photo de profil</h3>
				<form id="formfgt1" name="formulaire" action="editphoto.php" method="POST" enctype="multipart/form-data">
					<fieldset>
						<legend>Suppression</legend>
						<?php
							if ((isset($_SESSION['photo'])) AND ($_SESSION['photo'] == 0))
							{
								echo "<i>Vous n'avez pas de photo de profil</i>";
							}
							else
							{
								echo "<i>Apr&egrave;s suppresion il sera impossible de r&eacute;cup&eacute;rer la photo de profil</i><br><br>";
								echo "<input type=\"button\" value=\"SUPPRIMER\" onClick=\"if(confirm('Proc&eacute;dure irr&eacute;versible. Voulez-vous continuer ?')) this.form.submit()\">";
							}
						?>						
					</fieldset>					
				</form>
			</div>
		</div>	

		<?php
        	include("../Page_parties/footer.html");
        ?> 
	</body>
</html>