<?php
	session_start();
	
	if (isset($_SESSION['login'])) 
	{
		$statut = "En ligne"; 
	}
	else
	{
		$statut = "Hors ligne";
	}
	
	$db = pg_connect("host=localhost dbname=projet user=postgres password=samir") or die('Connexion impossible!!!');	
	$query_allcomments = pg_query($db, "SELECT id_comment, login_comment, date_comment, comment, photo FROM users_comments, users WHERE login_comment=login ORDER BY date_comment DESC") or die('Échec requête : ' . pg_last_error());
	$allcomments = pg_fetch_all($query_allcomments);	
	
	$nbrallcomments = 0;
	if ($allcomments != false)
	{
		foreach($allcomments as $value)
		{
			if($value['comment'] != null)
			{
				$nbrallcomments++;
			}
		}
	}
	
	pg_free_result($query_allcomments);	
	pg_close($db);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="description" content="Projet Site Web">
		<meta name="keywords" content="HTML5,CSS3,JavaScript,PHP">
		<meta name="author" content="Samir SAID ALI">
		<link rel="stylesheet" href="../Styles/style.css">
		<link rel="stylesheet" href="../Styles/style_commentaires.css">
		<title>Projet Site Web - Commentaires</title>
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
				<h2 class="bienvenue" id="postcom">Commentaires</h2>
				<form name="formcomment" id="formcomment" method="POST" action="../Scripts/comments.php">
					<fieldset>
						<?php if (isset($_SESSION['echeccomment'])) { echo $_SESSION['echeccomment']; unset($_SESSION['echeccomment']); } ?>
						<legend><b>Postez vos commentaires</b></legend>
						<table id="tabcomment" cellspacing="10">
							<?php
								if (!isset($_SESSION['login']))
								{
									echo "<tr>\n<td class=\"tablogcel1\"><label for=\"login\">Identifiant : </label></td><td><input type=\"text\" name=\"login\" id=\"login\" placeholder=\"pseudo\" required=\"REQUIRED\"></td>\n</tr>\n";
									echo "<tr>\n<td><label for=\"password\">Mot de passe : </label></td>\n<td><input type=\"password\" name=\"password\" id=\"password\" placeholder=\"mot de passe\" required=\"REQUIRED\"></td>\n</tr>";
								}
								else
								{
									echo "<tr>\n<td class=\"tablogcel1\"><label for=\"login\">Pseudo : </label></td><td><b><span class=\"rougei\">".$_SESSION['login']."</span></b></td>\n</tr>\n";
								}
							?>
							<tr>
								<td>Commentaires : <br><i>(500 caract&egrave;res maximum)</i></td>
								<td><textarea name="comment" maxlength="500"><?php if (isset($_SESSION['recupcomment'])) { echo $_SESSION['recupcomment']; unset($_SESSION['recupcomment']); } ?></textarea></td>
							</tr>
						</table>
						<div id="formboutons"><input type="submit" value="PUBLIER">&nbsp;&nbsp;&nbsp;<input type="reset" value="EFFACER"></div>
					</fieldset>
					<?php
						if(!isset($_SESSION['login']))
						{
							echo "<p>&nbsp;Non membres, inscrivez vous :&nbsp;<a href=\"Inscription.php\">Inscription</a></p>";
						}
					?>
				</form>
				<br><br><br>				
				<?php 
					if (isset($_SESSION['login'])) 
					{
						echo "<hr>\n<br><br>\n<h2 class=\"bienvenue\" id=\"allcomments\">Tous les commentaires</h2>\n";
						echo "<p><b><i>".$nbrallcomments."</i></b> &nbsp;commentaire(s) post&eacute;(s) :</p>\n";
						
						if ($allcomments != false)
						{
							echo "<table id=\"tabmsg\" cellpadding=\"0\" cellspacing=\"0\">\n";
							
							$i = 1;	
							$j = $nbrallcomments;
			
							foreach($allcomments as $value)
							{
								if($value['comment'] != null)
								{
									$allnow = explode(" ", $value['date_comment']);
								
									$alldate = explode("-", $allnow[0]);
									$allannee = $alldate[0];
									$allmois = $alldate[1];
									$alljour = $alldate[2];
				
									$alltime = explode(":", $allnow[1]);
									$allheure = $alltime[0];
									$allminute = $alltime[1];
									$allseconde = $alltime[2];
									
									if($value['photo'] == null)
									{
										$value['photo'] = '../Images/inconnu.gif';
									}
				
									echo "<tr class=\"tabmsgtr".$i."\">\n";
									echo "<td class=\"tabmsgcel1\">".$j.".</td>\n";
									echo "<td class=\"tabmsgcel2\"><span class=\"rougei\"><b>".$value['login_comment']."</b></span>, <b><i>le ".$alljour."-".$allmois."-".$allannee." &agrave; ".$allheure.":".$allminute."</i></b></td>\n";
									echo "</tr>\n";
									echo "<tr class=\"tabmsgtr".$i."\">\n";
									echo "<td class=\"tabmsgcel3\"><img src=\"".$value['photo']."\" alt=\"".$value['login_comment']."\" class=\"mini\"></td>\n";
									echo "<td class=\"tabmsgcel2\">".$value['comment']."</td>\n";
									echo "</tr>\n";	
								
									if ($i == 1) $i = 2;
									else $i = 1;
									$j--;
								}
							}
							
							echo "</table>\n";
						}
					}
				?>
			</div>
		</div>
		<?php
			include("../Page_parties/footer.html");
		?>			
	</body>
</html>
