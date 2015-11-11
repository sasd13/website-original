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
				<h3>Veuillez remplir le formulaire ci-dessous :</h3>
				<p><i>Remplir la nouvelle information dans la case correspondante, les cases qui seront inchang&eacute;es peuvent rester vides</i></p><br>
				<form id="formfgt1" name="formfgt1" method="POST" action="editpersonal.php">
					<fieldset>
						<legend>Modifier Nom/Pr&eacute;nom</legend>
						<?php
							if(isset($_SESSION['msgeditnom']))
							{
								echo "<span class=\"red\">".$_SESSION['msgeditnom']."</span><br>\n";
								unset($_SESSION['msgeditnom']);
							}
							if(isset($_SESSION['msgeditprenom']))
							{
								echo "<span class=\"red\">".$_SESSION['msgeditprenom']."</span><br>\n";
								unset($_SESSION['msgeditprenom']);
							}
						?>
						<table class="tab1fgt">
							<tr>
								<td class="tab1fgtcel1">Nom actuel : </td>									
								<td><b><i><?php echo $_SESSION['nom']; ?></i></b></td>
							</tr>
							<tr>
								<td class="tab1fgtcel1"><label for="newnom">Nouveau nom : </label></td>
								<td><input type="text" name="newnom" id="newnom" pattern="[A-Za-z]+" placeholder="nouveau nom"></td>
							</tr>
							<tr>
								<td class="tab1fgtcel1">Pr&eacute;nom actuel : </td>									
								<td><b><i><?php echo $_SESSION['prenom']; ?></i></b></td>
							</tr>
							<tr>
								<td class="tab1fgtcel1"><label for="newprenom">Nouveau pr&eacute;nom : </label></td>
								<td><input type="text" name="newprenom" id="newprenom" pattern="[A-Za-z]+" placeholder="nouveau pr&eacute;nom"></td>
							</tr>
						</table>
					</fieldset>
					<fieldset>
						<legend>Modifier e-mail</legend>
						<?php
							if(isset($_SESSION['msgeditemail']))
							{
								echo "<span class=\"red\">".$_SESSION['msgeditemail']."</span>\n";
							}
						?>
						<table class="tab1fgt">
							<tr>
								<td class="tab1fgtcel1">Email actuel : </td>
								<td><b><i><?php echo $_SESSION['email']; ?></i></b></td>
							</tr>
							<tr>
								<td class="tab1fgtcel1"><label for="newemail">Nouveau email : </label></td>
								<td><input type="email" name="newemail" id="newemail" pattern="[^ @]+@[^ @]+" placeholder="nouveau email"></td>
							</tr>
						</table>
					</fieldset>
					<div class="formboutons"><input type="submit" value="MODIFIER">&nbsp;&nbsp;<a href="../Pages_libres/Espace_personnel.php"><input type="button" value="ANNULER"></a></div>
				</form>
				<a href="changepwd1.php">Modifier le mot de passe</a><br><br><br>		
			</div>
		</div>	

		<?php
        	include("../Page_parties/footer.html");
        ?> 
	</body>
</html>