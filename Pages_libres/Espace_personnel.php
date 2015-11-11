<?php
	session_start();
	
	if(!isset($_SESSION['login']))
	{
		header('Location: Connexion.php');
		exit();
	}
	else
	{
		$statut = "En ligne";	
		
		$db = pg_connect("host=localhost dbname=projet user=postgres password=samir") or die('Connexion impossible!!!');	
		$login = pg_escape_string($_SESSION['login']);
		$query_personal = pg_query($db, "SELECT nom, prenom, sexe, naissance, email, photo FROM users WHERE login='{$login}'") or die('Échec requête : ' . pg_last_error());
		$personal = pg_fetch_array($query_personal);
	
		$personal['login'] = $_SESSION['login'];
		
		if ($personal == false)
		{
			$echecpersonal = "<span class=\"rougei\">Impossible de r&eacute;cup&eacute;rer les informations personnelles</span><br>";
			$personal['nom'] = '';
			$personal['prenom'] = '';
			$personal['sexe'] = '';
			$age = '';
			$personal['email'] = '';
			$personnal['photo'] = '../Images/inconnu.gif';
			$_SESSION['photo'] = 0;
		}	
		else
		{
			$_SESSION['nom'] = $personal['nom'];
			$_SESSION['prenom'] = $personal['prenom'];
			$_SESSION['email'] = $personal['email'];
			$annee = date("Y"); 
			$age = $annee - $personal['naissance'];
			$age = $age."&nbsp; an(s)";
			if(($personal['photo'] == null) OR (file_exists($personal['photo']) == false))
			{
				$_SESSION['photo'] = 0;
				$personal['photo'] = '../Images/inconnu.gif';
			}
			else
			{
				$_SESSION['photo'] = 1;
			}	
		}	
		pg_free_result($query_personal);
	
		$query_comments = pg_query($db, "SELECT id_comment, date_comment, comment FROM users_comments WHERE login_comment='{$login}' ORDER BY date_comment DESC") or die('Échec requête : ' . pg_last_error());
		$comments = pg_fetch_all($query_comments);
		
		$nbrcomments = 0;
		if ($comments != false)
		{
			foreach($comments as $value)
			{
				if($value['comment'] != null)
				{
					$nbrcomments++;
				}
			}
		}
		pg_free_result($query_comments);	
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
		<link rel="stylesheet" href="../Styles/style_espace_personnel.css">
		<title>Projet Site Web - Espace personnel</title>
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
				<h2 class="bienvenue">Espace personnel</h2>	

				<!-- Personnalisation -->
				<table id="tabep">
					<tr>
						<td class="tabeeptd">
							<div id="aside">
							<!-- Information -->				
								<?php 
									if(isset($echecpersonal)) echo $echecpersonal; 				
								?>	
								<div>
									<h3 class="titreep1">Personnalisation</h3>
									<table class="tabinfo1">
										<tr>
											<td><h3>Photo de profil</h3></td>
										</tr>
										<tr>
											<td><?php echo "<img class=\"photo\" src=\"".$personal['photo']."\" alt=\"photo".$_SESSION['login']."\">"; ?></td>
										</tr>
										<tr>
											<td class="bouton"><br><a href="../Scripts/upload.php"><input type="button" value="MODIFIER PHOTO"></a></td>
										</tr>
									</table>											
									<table class="tabinfo2">
										<tr>
											<td colspan="2"><h3>Informations</h3></td>
										</tr>
										<tr>
											<td>Pseudo : </td>
											<td class="descrinfo"><span class="rougei"><b><?php echo $personal['login']; ?></b></span></td>
										</tr>
										<tr>
											<td>Nom : </td>
											<td class="descrinfo"><i><?php echo $personal['nom']; ?></i></td>
										</tr>
										<tr>
											<td>Pr&eacute;nom : </td>
											<td class="descrinfo"><i><?php echo $personal['prenom']; ?></i></td>
										</tr>
										<tr>
											<td>Sexe : </td>
											<td class="descrinfo"><i><?php echo $personal['sexe']; ?> </i></td>
										</tr>
										<tr>
											<td>&Acirc;ge : </td>
											<td class="descrinfo"><i><?php echo $age; ?></i></td>
										</tr>
										<tr>
											<td>E-mail : </td>
											<td class="descrinfo"><i><?php echo $personal['email']; ?></i></td>
										</tr>
										<tr>
											<td colspan="2" class="bouton"><br><a href="../Scripts/change1.php"><input type="button" value="MODIFIER"></a></td>
										</tr>
									</table>
								</div>
							</div>	
						</td>
						<td class="tabeeptd">
							<!-- Commentaires -->
							<div id="comments">
								<h3 class="titreep2">Commentaires</h3>
								<div id="tabcoms">
									<form name="formcomment" id="formcomment" method="POST" action="../Scripts/comments.php">
										<fieldset>
											<legend><b>Postez vos commentaires</b></legend>
											<table id="tabcomment" cellspacing="10">
												<tr>
													<td class="tablogcel1"><label for="login">Pseudo : </label></td>
													<td><b><span class="rougei"><?php echo $_SESSION['login']; ?></span></b></td>
												</tr>
												<tr>
													<td>Commentaires : <br><i>(500 caract&egrave;res maximum)</i></td>
													<td><textarea name="comment" maxlength="500"><?php if (isset($_SESSION['comment'])) { echo $_SESSION['comment']; unset($_SESSION['comment']); } ?></textarea></td>
												</tr>
											</table>
											<div id="formboutons"><input type="button" value="PUBLIER" onClick="if(confirm('Publier le commentaire ?')) this.form.submit()">&nbsp;&nbsp;&nbsp;<input type="reset" value="EFFACER"></div>
										</fieldset>
									</form>
									<br><br>
									<table>
										<tr>
											<td class="linkcoms1">Vous avez&nbsp;<b><i><?php echo $nbrcomments; ?></i></b>&nbsp;commentaire(s) post&eacute;(s) :</td>
											<td class="linkcoms2"><a href="Commentaires.php#allcomments">Voir tous les commentaires post&eacute;s</a></td>
										</tr>
									</table>
									<?php 
										if ($comments != false)
										{		
											echo "<form name=\"formmsg\" id=\"formmsg\" action=\"../Scripts/deletecomment.php\" method=\"POST\">\n";
											echo "<input type=\"button\" class=\"bmodif4\" value=\"SUPPRIMER\" onClick=\"if(confirm('Proc&eacute;dure irr&eacute;versible. Voulez-vous continuer ?')) this.form.submit()\">";
											echo "<table id=\"tabmsg\" cellpadding=\"0\" cellspacing=\"0\">\n";
																	
											$i = 1;	
											$j = $nbrcomments;
							
											foreach($comments as $value)
											{
												if($value['comment'] != null)
												{
													$now = explode(" ", $value['date_comment']);
				
													$date = explode("-", $now[0]);
													$annee = $date[0];
													$mois = $date[1];													
													$jour = $date[2];
					
													$time = explode(":", $now[1]);
													$heure = $time[0];
													$minute = $time[1];
													$seconde = $time[2];
							
													echo "<tr class=\"tabmsgtr".$i."\">\n";
													echo "<td class=\"tabmsgcel1\">".$j.".</td>\n";
													echo "<td class=\"tabmsgcel2\"><span class=\"rougei\"><b>".$_SESSION['login']."</b></span>, <b><i>le ".$jour."-".$mois."-".$annee." &agrave; ".$heure.":".$minute."</i></b></td>\n";
													echo "</tr>\n";
													echo "<tr class=\"tabmsgtr".$i."\">\n";
													echo "<td class=\"tabmsgcel1\"><input type=\"checkbox\" name=\"deletecomment[]\" value=\"".$value['id_comment']."\"></td>\n";
													echo "<td class=\"tabmsgcel2\">".$value['comment']."</td>\n";
													echo "</tr>\n";
						
													if ($i == 1) $i = 2;
													else $i = 1;
													$j--;
												}
											}	
						
											echo "</table>\n";
											echo "</form>";						
										}
									?>
								</div>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>		
		
		<?php
        	include("../Page_parties/footer.html");
        ?>
	</body>
</html>