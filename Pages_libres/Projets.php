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
		<link rel="stylesheet" href="../Styles/style_projets.css">
		<title>Projet Site Web - Projets</title>
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
				<h2 class="bienvenue">Projets</h2><br>
                <h3>Projet de Conception Site Web Dynamique</h3>
				<hr>
				Le site contient : 
				<ol>
					<li>La page d'accueil</li>
					<li>La page personnelle</li>
					<li>Trois pages libres sur une technologie de d&eacute;veloppement web (hors cours): un tutorial sur une technologie web de votre choix, autres que : HTML, CSS, PHP et JavaScript.</li>
					<li>Une page contenant le CV</li>
					<li>Une page contenant un formulaire d'insricption et d'authentification</li>
					<li>Une page pour laisser des commentaires</li>
					<li>Une page des photos avec JavaScript</li>
					<li>Une derni&egrave;re dont le contenu est impos&eacute; (Tableau Piet Mondrian).</li>
				</ol>
				==>&nbsp;<a href="http://www.mi.parisdescartes.fr/~osalem/CSWD/L2CSWD.html" target="_blank">Site web du projet</a>
				<br><br><br><br><br>
				<h3>Projet de Programmation</h3>
				<hr>
				L'objectif du projet de programmation est de permettre aux &eacute;tudiants de d&eacute;passer le simple stade des travaux pratiques en leur donnant une premi&egrave;re exp&eacute;rience de d&eacute;veloppement d'application en &eacute;quipe. Cette exp&eacute;rience doit les sensibiliser aux diff&eacute;rentes phases de la r&eacute;alisation d'un projet : de l'expression du besoin &agrave; la recette. Sauf exception, les projets sont &agrave; r&eacute;aliser par groupes de quatre &eacute;tudiants.<br><br><br>
				<b>Comp&eacute;tences acquises :</b><br>
				<ul>
					<li>Travailler en &eacute;quipe</li>
					<li>Elaborer et r&eacute;diger une documentation &eacute;l&eacute;mentaire (cahier des charges, manuel utilisateur, cahier de recette, rapport technique)</li>
					<li>Faire une soutenance orale</li>
					<li>D&eacute;velopper une application r&eacute;pondant &agrave; un probl&egrave;me de complexit&eacute; moyenne</li>
				</ul><br>
				<b>Programme :</b><br><br>
				Les projets sont encadr&eacute;s sur 12 semaines notamment au travers de r&eacute;unions r&eacute;guli&egrave;res. Ils s'ach&egrave;vent par des soutenances et la remise d'un rapport. Les quatre premi&egrave;res semaines sont r&eacute;serv&eacute;es &agrave; l'&eacute;laboration du cahier des charges. Les 6 suivantes sont d&eacute;di&eacute;es &agrave; la phase de d&eacute;veloppement et finalement les deux derni&egrave;res a la r&eacute;daction du rapport et &agrave; la pr&eacute;paration de la soutenance.<br><br><br>
				<b>D&eacute;tails du projet :</b><br>
				<ul>
					<li><b>Ann&eacute;e :</b> 2011 - 2012</li>
					<li><b>Sujet L2H :</b> Robot ramasseur de balles</li>
					<li><b>Encadrant :</b> Michel Soto</li>
					<li><b>Objectif :</b> L'objectif de ce projet est de construire et de faire fonctionner un robot ramassant des billes d'une m&ecirc;me couleur dispos&eacute;es sur une surface donn&eacute;e.</li>
					<li><b>Travail &agrave; effectuer :</b><br>
						Dans le cadre d'une approche incr&eacute;mentale, le programme d&eacute;velopp&eacute; devra permettre au robot de r&eacute;aliser les t&acirc;ches suivantes:
						<ul>
							<li>Se d&eacute;placer sur la surface donn&eacute;e sans en sortir.</li>
							<li>Rep&eacute;rer les billes de couleur et les ramasser.</li>
							<li>Ranger les billes ramass&eacute;es : autrement dit, les d&eacute;poser dans une zone pr&eacute;vue &agrave; cet effet.</li>
							<li>Evidemment, le robot devra r&eacute;aliser ces t&acirc;ches le plus rapidement possible.</li>
						</ul>
					</li>
					<li><b>Contraintes :</b><br>
						Le langage utilis&eacute; pour r&eacute;aliser le(s) programme(s) sera obligatoirement : C ou Java<br>
						La salle de robotique est petite et il faudra la partager.<br>
						Participer aux &eacute;v&eacute;nements de promotion de la robotique organis&eacute;s par l'UFR.<br>
					</li>
				</ul>
				==>&nbsp;<a href="http://www.ens.math-info.univ-paris5.fr/projets-informatiques/doku.php?id=projets:licence2" target="_blank">Site web du projet</a>
				<br><br><br><br><br>
			</div>
		</div>		
		
		<?php
        	include("../Page_parties/footer.html");
        ?>
	</body>
</html>
