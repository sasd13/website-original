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
		<link rel="stylesheet" href="../Styles/style_accueil.css">
		<title>Projet Site Web - Accueil</title>
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
				<h2 class="bienvenue">Bienvenue</h2>
                <p>	
					Le d&eacute;veloppemment de ce site web rentre dans le cadre du Projet de Conception de Site Web Dynamique. La réalisation a n&eacute;cessit&eacute; l'utilisation de "HTML5", "CSS3", "PHP", "POSTGRESQL", et "JAVASCRIPT", .<br><br>
                    Vous trouverez toutes les informations qui me concernent que ce soit CV, Photos, Projets, Tutoriels... ainsi que la plupart de mes réalisations. Un "Espace personnel" est r&eacute;serv&eacute; aux membres du site, et un page "Commentaires" pour poster vos commentaires.<br><br>
                    Toutes les informations disponibles sur ce site sont uniquement réservées à un cadre personnel.<br><br>
					Bonne navigation<br><br>
                    Cordialement,<br>
                    L'administrateur,
                </p> 	
				<h3>Samir SAID ALI</h3>
            </div>
		</div>
        
        <?php
			include("../Page_parties/footer.html");
		?>	
	</body>
</html>
