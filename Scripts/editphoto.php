<?php
	session_start();
	//Le script a besoin de toutes les permissions du repertoire Users et du sous repertoire Images pour s'executer correctement
	
	if(!isset($_SESSION['login']))
	{
		header('Location: ../Pages_libres/Connexion.php');
		exit();
	}
	else
	{
		$statut = "En ligne";
	
		$db = pg_connect("host=localhost dbname=projet user=postgres password=samir") or die('Connexion impossible!!!');	
		$login = pg_escape_string($_SESSION['login']);
		$query_verif_photo = pg_query($db, "SELECT photo FROM users WHERE login='{$login}'") or die('Échec requête : ' . pg_last_error());
		$verif_photo = pg_fetch_array($query_verif_photo);
		
		$suppression = false;
		if (($_SESSION['photo'] == 0) OR ($_SESSION['photo'] == 1))
		{
			$lien_photo = $verif_photo['photo'];
		
			if(($lien_photo != null) AND (file_exists($lien_photo) == true))
			{			
				$delete_file = unlink($lien_photo);
				if($delete_file == true)
				{
					$query_delete_photo = pg_query($db, "UPDATE users SET photo=NULL WHERE login='{$login}'") or die('Échec requête : ' . pg_last_error());
					if($query_delete_photo == true)
					{	
						$msgphoto = "Suppresion r&eacute;ussie<br>";		
						$suppression = true;
					}
					else
					{
						$msgphoto = "Suppression &eacute;chou&eacute;e<br>";
					}
				}
				else
				{
					$msgphoto = "Suppression &eacute;chou&eacute;e<br>";
				}
			}
			else if(($lien_photo == null) AND (file_exists($lien_photo) == false))
			{
				$_SESSION['photo'] = 1;
				$suppression = true;
			}
			else 
			{
				$msgphoto = "<span class=\"red\">Envoi non autoris&eacute;</span>";
			}
		}
		pg_free_result($query_verif_photo);
	
		function upload($database, $userlogin, $file, $maxsize, $extensions)
		{						
			if (isset($_FILES[$file]) && ($_FILES[$file]['error'] == 0))
			{
				$upload = false;
				$upload_dest = '../Users/Images/'.$_SESSION['login'].'.jpg';
				
				if ($_FILES[$file]['size'] <= $maxsize) 
				{
					$infosfichier = pathinfo($_FILES[$file]['name']);
					$extension_upload = $infosfichier['extension'];					
	
					if (in_array($extension_upload, $extensions))
					{
						$upload = move_uploaded_file($_FILES[$file]['tmp_name'], $upload_dest);
					} 
				}
				else
				{
					$msg = "<span class=\"red\">Photo volumineuse</span>";
				}
						
				if($upload == true) 
				{
					$photo = pg_escape_string($upload_dest);
					$query_photo = pg_query($database, "UPDATE users SET photo='{$photo}' WHERE login='{$userlogin}'") or die('Échec requête : ' . pg_last_error());
						
					if($query_photo != false)
					{
						$msg = "Envoi du fichier \"".$_FILES[$file]['name']."\" r&eacute;ussi";
					}
					else
					{
						$msg = "Photo envoy&eacute;e mais non ajout&eacute; &agrave; la base";
					}
					pg_free_result($query_photo);
				}
				else
				{
					$msg = "<span class=\"red\">Envoi du fichier \"".$_FILES[$file]['name']."\" &eacute;chou&eacute;</span>";
				}
			}
			else
			{
				$msg = "Photo de profil supprim&eacute;e";
			}
			return $msg;
		}
	
		$taille = 200000;
		$formats = array('jpg');
		if((($_SESSION['photo']) == 1) AND ($suppression == true)) $msgphoto = upload($db, $login, 'file', $taille, $formats);
		pg_close($db);
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
				<h3>Votre photo</h3>
				<?php
					if (isset($msgphoto))
					{
						echo $msgphoto."... <a href=\"../Pages_libres/Espace_personnel.php\">Retour &agrave; la page Espace Personnel</a>";
					}
				?>
				<br><br><br>
			</div>
		</div>
		
		<?php
        	include("../Page_parties/footer.html");
        ?> 
	</body>
</html>