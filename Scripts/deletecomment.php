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
		$login = pg_escape_string($_SESSION['login']);
		
		if(isset($_POST['deletecomment']))
		{
			$db = pg_connect("host=localhost dbname=projet user=postgres password=samir") or die('Connexion impossible!!!');
			$tab_id = array();
			$delete = '';
	
			$taille = sizeof($_POST['deletecomment']);			
			
			if ($taille == 1)
			{
				$element = array_shift($_POST['deletecomment']);
				$delete = 'id_comment = '.$element;
				array_push($tab_id, $element);
			}
			else
			{
				$i = 0;
				while($i < $taille)
				{
					if($i == $taille - 1)
					{
						$element = array_shift($_POST['deletecomment']);
						$delete = $delete.'id_comment = '.$element;
						array_push($tab_id, $element);
						$i++;
					}
					else
					{
						$element = array_shift($_POST['deletecomment']);
						$delete = $delete.'id_comment = '.$element.' AND ';
						array_push($tab_id, $element);
						$i++;
					}
				}
			}
			
			$delete_comment = pg_escape_string($delete);
			$query = "UPDATE users_comments SET comment=NULL WHERE ".$delete_comment;
			$query_delete_comment = pg_query($query);
			
			if($query_delete_comment != false)
			{
				$msgdelete = "<i>Suppression &eacute;ffectu&eacute;e<i>";
			}
			else
			{
				$msgdelete = "<span class=\"red\">Suppression &eacute;chou&eacute;e</span>";
			}
			pg_free_result($query_delete_comment);
			pg_close($db);
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
				<h3>Suppression de commentaires</h3>
				<p>
					<?php 
						if(isset($msgdelete))
						{
							echo $msgdelete."... <a href=\"../Pages_libres/Espace_personnel.php\">Retour &agrave; la page Espace Personnel</a>";							
						}
						else
						{
							echo "<i>Selectionnez les commentaires &agrave; supprimer...<i><a href=\"../Pages_libres/Espace_personnel.php\">Retour &agrave; la page Espace Personnel</a>";
						}
					?>
				</p>				
			</div>
		</div>	

		<?php
        	include("../Page_parties/footer.html");
        ?> 
	</body>
</html>