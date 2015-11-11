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
		<title>Projet Site Web - Working</title>
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
				<h2 class="bienvenue">Working</h2><br>
                <h3>Mes Projets</h3>
				<hr>
				Les projets auxquels je suis rattach&eacute; :
				<ol>
					<li>Projet de Conception Site Web Dynamique</li>
					<li>Projet de programmation</li>
				</ol>
				==>&nbsp;<a href="Projets.php">Projets</a>
				<br><br><br>
				<h3>Mes tutoriels</h3>
				<hr>
				Un tutoriel sur le langage <b><u><abbr title="Extensible Markup Language">XML</abbr></u></b>&nbsp;<i>(Extensible Markup Language)</i> est &agrave; votre disposition pour apprendre les bases de ce langage informatique.<br><br>
				==>&nbsp;<a href="Tutoriels1.php">Tutoriels</a>
				<br><br><br>
				<h3>Tableau Piet Mondrian</h3>
				<hr>
				D&eacute;couvrez une oeuvre du c&eacute;l&egrave;bre peintre n&eacute;erlandais <b>Pieter Cornelis Mondrian</b>, appel&eacute; <b>Piet Mondrian</b> &agrave; partir de 1912.<br>
				N&eacute; le 7 mars 1872 &agrave; Amersfoort aux Pays-Bas et mort le 1<sup>er</sup> f&eacute;vrier 1944 &agrave; New York aux &Eacute;tats-Unis, il est reconnu comme un des pionniers de l'abstraction <i>(Art abstrait)</i>.<br><br>
				==>&nbsp;<a href="../Page_tableau/Tableau_Piet_Mondrian.php">Tableau Piet Mondrian</a>
				<br><br><br>
			</div>
		</div>		
		
		<?php
        	include("../Page_parties/footer.html");
        ?>
	</body>
</html>
