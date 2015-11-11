<?php
	session_start();
	if(isset($_SESSION['login']))
	{
		$statut = "En ligne";
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
		<link rel="stylesheet" href="../Styles/style_apropos.css">
		<title>Projet Site Web - A propos</title>
	</head>
	
	<body>
		<?php
			include("../Page_parties/header.html");
			include("../Page_parties/navigation.php");
		?>
        
       <!-- Section -->
		<div id="section">			
			<!-- Article 1 -->
			<div id="article">
				<h2 class="bienvenue">&Agrave; propos</h2>
                <table id="tabap">
                	<tr>
                    	<td><img src="../Images/bled.jpg" alt="moi"></td>
                        <td>
							<h2>Samir SAID ALI</h2>
                        	<b>Etudiant en Licence 2 Math&eacute;matiques et Informatique &agrave; l'Universit&eacute; Paris Descartes.</b><br><br>
							Universit&eacute; Paris Descartes<br>UFR Math&eacute;matiques et Informatique<br>45, rue des Saint-P&egrave;res,<br>75006 Paris,<br>FRANCE<br><br>
						</td>
                    </tr>
                </table>
				<br>
				<hr><br>
				<h2 class="bienvenue">Biographie</h2>
				<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N&eacute; aux Comores, archipel de l'Afrique de l'Est, j'ai pass&eacute; toute ma scolarit&eacute; &agrave; l'&eacute;cole Groupe Scolaire Fundi Abdulhamid. Je d&eacute;barque &agrave; Paris en 2010 pour poursuivre mes &eacute;tudes &agrave; l'Universit&eacute; Paris Descartes, avec pour ambition de m'orienter dans le secteur des t&eacute;l&eacute;communications.<br><br>
				</p>
			</div>
		</div>
        
        <?php
			include("../Page_parties/footer.html");
		?>	
	</body>
</html>
