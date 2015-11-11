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
		<link rel="stylesheet" href="../Styles/style_tutoriels.css">
		<title>Projet Site Web - Tutoriels Page 2</title>
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
				<h2 class="bienvenue">Tutoriels</h2>
				<h3 class="bienvenue">Page 2</h3>
				<h4>Dans le détail...</h4>
				<p>Bon nombre des notions que nous allons aborder seront familières aux habitués de HTML... Éléments, attributs, commentaires et sections CDATA sont couramment appelés des «&nbsp;<dfn>nœuds</dfn>&nbsp;».</p>
				<h5>Le prologue</h5>
				<pre>&lt;?xml version="1.0" encoding="UTF-8"?&gt;</pre>
				<p>Cette première ligne est le <em>prologue</em> du fichier. Il indique la version de la recommandation <abbr>XML</abbr> qui sert de base à l'écriture du fichier (il n'y a eu à cette date qu'une seule version, la version 1.0), ainsi que l'<a href="http://forum.alsacreations.com/faq/faq-98-S039y-retrouver-entre-ASCII-ANSI-Latin1-ISO-8859-1-MacRoman-Windows-1252-etc.html">encodage de caractères</a> utilisé. Cette ligne est facultative, mais cela ne coûte (presque) rien de l'ajouter... d'autant plus que cela permet de spécifier explicitement l'encodage. Par défaut, il s'agit de l'UTF-8.</p>
				<h5>Les commentaires</h5>
				<pre>&lt;!-- Quelques physiciens importants --&gt;</pre>
				<p>Un commentaire, comme en <abbr lang="en" title="HyperText Markup Language">HTML</abbr>, commence par la chaîne de caractères <code>&lt;!--</code> et se termine par <code>--&gt;</code>. Tout ce qui est entre ces deux chaînes de caractères n'est pas une donnée du document, mais un commentaire laissé par le développeur et tout comme en HTML, la visualisation du document <abbr>XML</abbr> dans un navigateur ne fait pas apparaître ce texte. Attention, il est interdit à l'intérieur d'un commentaire de placer la chaîne «&nbsp;<kbd>--</kbd>&nbsp;».</p>
				<h5>Les éléments et attributs</h5>
				<p>Nous abordons là les étiquettes dont nous avons parlé en guise d'introduction. Ce sont les éléments et attributs qui permettent de qualifier les données, et de leur conférer un sens.</p>
				<h6>Les éléments</h6>
				<p>Il existe deux types d'éléments&nbsp;: les éléments vides... et ceux qui ne le sont pas.</p>
				<ul>
					<li>Un élément non vide commence par une balise ouvrante et se termine par une balise fermante. Dans le document précédent, des exemples de balises ouvrantes sont <code>&lt;savants&gt;</code> ou <code>&lt;contributions&gt;</code>&nbsp;; les balises fermantes correspondantes sont respectivement <code>&lt;/savants&gt;</code> et <code>&lt;/contributions&gt;</code>.</li>
					<li>Un élément vide ne comporte qu'une seule balise, dite «&nbsp;auto-fermante&nbsp;». C'est le cas de l'élément <code>identité</code>&nbsp;: il est caractérisé par la balise <code>&lt;identité...</code>&nbsp;: vous noterez qu'elle se termine par <code>/&gt;</code>.</li>
				</ul>
				<p>Entre les balises ouvrante et fermante d'un élément non vide peuvent se trouver d'autres éléments. C'est le cas ici de la plupart des éléments, comme par exemple <code>savant</code>&nbsp;: l'indentation du code met en évidence la relation hiérarchique des éléments. Cette structure hiérarchique forme une arborescence.</p>
				<p>Dans un document <abbr>XML</abbr>, un élément joue un rôle particulier&nbsp;: il s'agit de l'<dfn>élément racine</dfn>, qui doit être unique et contenir tous les autres éléments de l'arborescence. Ici, il s'agit de l'élément <code>savants</code>.</p>
				<h6>Les attributs</h6>
				<p>Quand on veut préciser ce que contient un élément, on peut placer un attribut sur la balise ouvrante. Par exemple, l'élément <code>date</code> comporte deux attributs, nommés <code>naissance</code> et <code>décès</code>. Un attribut possède un nom, ainsi qu'une valeur. Par exemple, l'attribut <code>prénom</code> du deuxième savant a pour valeur <code>Isaac</code>. Les attributs <em>ne sont jamais repris</em> dans la balise fermante&nbsp;: l'attribut <code>id</code> présent dans la balise ouvrante de l'élément <code>savant</code> est absent de la balise fermante <code>&lt;/savant&gt;</code>.</p>
				<p>Enfin, l'ordre dans lequel les attributs sont écrits dans une balise ouvrante n'a aucune importance&nbsp;: les attributs du dernier élément <code>savant</code> sont inversés par rapport aux deux premiers, mais les deux formes sont strictement équivalentes.</p>
				<h5>Les entités</h5>
				<p>Vous aurez noté que certains caractères ont une signification en <abbr>XML</abbr>&nbsp;: c'est le cas par exemple des caractères <code>&lt;</code> ou <code>&gt;</code>. Quand on doit les utiliser, il faut donc trouver une parade pour qu'ils ne soient pas interprétés. Pour cela, on utilise des <dfn>entités</dfn>, qui codent ces caractères par des chaînes de caractères les représentant ou des nombres. Une entité commence par le caractère <code>&amp;</code> et se termine par un point-virgule <code>;</code>. Par exemple, le caractère <code>&lt;</code> doit être écrit <code>&amp;lt;</code> ou <code>&amp;#060;</code>. En particulier, le caractère <code>&amp;</code> doit lui-même être codé comme une entité sous la forme <code>&amp;amp;</code>.</p>
				<p><abbr>XML</abbr> ne définit que cinq entités, au contraire de HTML où plusieurs dizaines existent. Les entités prédéfinies de <abbr>XML</abbr> sont&nbsp;:</p>
				<ul>
					<li><code>&amp;lt;</code> pour <code>&lt;</code></li>
					<li><code>&amp;gt;</code> pour <code>&gt;</code></li>
					<li><code>&amp;amp;</code> pour <code>&amp;</code></li>
					<li><code>&amp;quote;</code> pour <code>"</code></li>
					<li><code>&amp;aquote;</code> pour <code>'</code></li>
				</ul>
				<p>Les deux dernières entités peuvent par exemple être utilisées dans des valeurs d'attributs.</p>
				<h5>Les sections CDATA</h5>
				<p>Lorsqu'un contenu est susceptible de contenir plusieurs entités, il peut être fastidieux de les écrire. On utilise alors ce que l'on appelle une «&nbsp;<dfn>section CDATA</dfn>&nbsp;», qui est destinée à contenir des informations affichées telles quelles, sans traitement par l'outil de consultation (navigateur Internet ou tout autre type d'application chargée de traiter le document XML). C'est le cas dans notre exemple où l'on a écrit <code>&lt;![CDATA[Relativités restreinte &amp; générale, nature corpusculaire de la lumière &amp; effet photoélectrique]]&gt;</code>&nbsp;: il n'a pas été nécessaire de remplacer chaque occurrence de <code>&amp;</code> par l'entité correspondante <code>&amp;amp;</code>.</p>
				<h4>Normes d'écriture</h4>
				<p>Un document <abbr>XML</abbr> doit répondre à un certain nombre de règles... sinon ce n'est pas un document <abbr>XML</abbr>. Ces règles sont les suivantes&nbsp;:</p>
				<ul>
					<li>Les majuscules et les minuscules sont différenciées et <code>toto</code> désigne un autre élément ou attribut que <code>Toto</code>&nbsp;;</li>
					<li>Un nom d’élément ne peut pas commencer par un chiffre&nbsp;;</li>
					<li>Si un nom d'élément n'est constitué que d'un seul caractère, alors ce caractère doit être une lettre&nbsp;;</li>
					<li>Si le nom contient au moins deux caractères, le premier peut être un tiret&nbsp;«&nbsp;-&nbsp;» ou un tiret bas&nbsp;«&nbsp;_&nbsp;». Le nom peut ensuite être composé de lettres, chiffres, tiret &nbsp;«&nbsp;-&nbsp;»&nbsp;, tirets bas&nbsp;«&nbsp;_&nbsp;» ou deux-points&nbsp;«&nbsp;:&nbsp;».</li>
					<li>Tous les éléments doivent être fermés, et ce, dans l'ordre de leur ouverture&nbsp;: <code>&lt;elt1&gt;&lt;elt2&gt;blabla&lt;/elt2&gt;&lt;/elt1&gt;</code> est correct, mais <code>&lt;elt1&gt;&lt;elt2&gt;blabla&lt;/elt1&gt;&lt;/elt2&gt;</code> ne l'est pas.</li>
					<li>Les valeurs des attributs doivent être entre guillemets&nbsp;;</li>
					<li>L'élément racine doit être unique.</li>
				</ul>
				<p>Un document <abbr>XML</abbr> qui respecte ces quelques règles est dit «&nbsp;<dfn>bien formé</dfn>&nbsp;».</p>
				<br><br>
				<a href="Tutoriels1.php">Page pr&eacute;c&eacute;dente</a>&nbsp;<a href="Tutoriels3.php">Page suivante</a><br><br>
				<a href="Tutoriels1.php">Page 1</a>&nbsp;<a href="Tutoriels2.php">Page 2</a>&nbsp;<a href="Tutoriels3.php">Page 3</a>
				<br><br><br>
			</div>
		</div>		
		
		<?php
        	include("../Page_parties/footer.html");
        ?>
	</body>
</html>
