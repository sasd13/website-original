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
		if ((isset($_POST['oldpassword'])) AND (!empty($_POST['oldpassword'])) AND (isset($_POST['newpassword'])) AND (!empty($_POST['newpassword'])) AND (isset($_POST['confirmnewpassword'])) AND (!empty($_POST['confirmnewpassword'])))
		{
			$oldpassword = $_POST['oldpassword'];
			$newpassword = $_POST['newpassword'];
			$confirmnewpassword = $_POST['confirmnewpassword'];

			$db = pg_connect("host=localhost dbname=projet user=postgres password=samir") or die('Connexion impossible!!!');
			$login = $_SESSION['login'];
			$query_pwd = pg_query($db, "SELECT password FROM users WHERE login='{$login}'");
			$pwd = pg_fetch_array($query_pwd);
			$verif_pwd = $pwd['password'];
		
			if ((strcmp($oldpassword, $verif_pwd) == 0) AND (strcmp($newpassword, $confirmnewpassword) == 0) AND (strlen($newpassword) >= 6))
			{
				$query_editpwd = pg_query($db, "UPDATE users SET password = '{$newpassword}' WHERE login='{$login}'") or die('Échec requête : ' . pg_last_error());
				if ($query_editpwd == false)
				{
					$msgeditpwd = "<span class=\"red\">&nbsp;Modification &eacute;chou&eacute;e</span><br><br>";									
				}	
				else 
				{
					$msgeditpwd = "Modifications r&eacute;alis&eacute;es avec succ&egrave;s... <a href=\"../Pages_libres/Espace_personnel.php\">Retour &agrave; la page Espace Personnel</a>";
				}	
			pg_free_result($query_editpwd);
			}
			else
			{
				$msgeditpwd = "<span class=\"red\">&nbsp;Erreur Mot de passe</span>";
			}
			
			pg_free_result($query_pwd);
			pg_close($db);
		}
		else
		{
			$msgeditpwd = "<span class=\"red\">Remplir le formulaire pr&eacute;c&eacute;dent</span><br><br>";
		}
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
				<h3>R&eacute;ponse du formulaire</h3>
				<?php
					if(isset($msgeditpwd))
					{
						echo $msgeditpwd;
					}
				?>
			</div>
		</div>	
		
		<?php
        	include("../Page_parties/footer.html");
        ?> 
	</body>
</html>