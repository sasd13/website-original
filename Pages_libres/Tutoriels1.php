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
		<title>Projet Site Web - Tutoriels Page 1</title>
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
				<h3 class="bienvenue">Page 1</h3>
				<h2>XML en quelques mots</h2>
				<div>Ce tutoriel expose les bases de ce qu'il est nécessaire de connaître quand on doit aborder un document XML. Nous allons commencer par décrire en quoi consiste le format, continuer en décrivant quelles sont les briques qui constituent un document XML, voir quels sont les formats qui permettent de définir de nouveaux langages XML et enfin décrire le principe de la transformation d'XML, un processus qui est au cœur de la portabilité de ce format.</div>
				<div>
				<h3>Sommaire du document</h3>
				<ol>
					<li><a href="#intro">Qu'est-ce qu'<abbr>XML</abbr>&nbsp;?</a></li>
					<li><a href="#ressemble">À quoi ça ressemble ?</a></li>
					<li><a href="Tutoriels3.php#definir-contenu">Comment définir le contenu d'un document XML ?</a></li>
					<li><a href="Tutoriels3.php#transformer-contenu">Transformer un document XML en... quelque chose d'autre avec XSL</a></li>
					<li><a href="Tutoriels3.php#conclusion">Conclusion</a></li>
				</ol>
				<h3 id="intro">Qu'est-ce qu'<abbr>XML</abbr>&nbsp;?</h3>
				<p><img alt="XML" class="right" src="../Images/xml1.jpg" /></p>
				<p><dfn>XML</dfn> signifie eXtensible Markup Language &nbsp;: en français, c'est un <em>langage de balisage extensible</em>.</p>
				<dl>
					<dt>C'est un <em>langage</em>&nbsp;:</dt>
					<dd>Cela signifie que ce format de fichier est conçu pour transmettre des informations. À ce titre, il ne faut pas se limiter aux échanges d'informations entre humains, ou entre une application et un humain&nbsp;: <abbr>XML</abbr> est tout aussi bien conçu, si ce n'est mieux, pour des échanges entre applications informatiques.</dd>
					<dt>C'est un langage <em>de balisage</em>&nbsp;:</dt>
					<dd>Cela signifie qu'on accole aux données des «&nbsp;étiquettes&nbsp;» qui qualifient leur contenu. Par exemple, dans Émile Zola, on étiquettera «&nbsp;Émile&nbsp;» comme étant un prénom, et «&nbsp;Zola&nbsp;» comme étant un nom de famille.</dd>
					<dt>C'est un langage <em>extensible</em>&nbsp;:</dt>
					<dd>Cela signifie deux choses en fait&nbsp;:
						<ul>
							<li>selon ses besoins, on peut définir et utiliser les «&nbsp;étiquettes&nbsp;» que l'on souhaite&nbsp;;</li>
							<li>une fois qu'un jeu d'étiquettes est défini, même par quelqu'un d'autre, on peut l'étendre en y ajoutant ses propres créations.</li>
						</ul>
					</dd>
				</dl>
				<p>Il ne faut en fait pas parler de langage <abbr>XML</abbr> au singulier, mais bien de langages au pluriel. En effet, <abbr>XML</abbr> désigne un certain type de fichier texte, respectant des règles d'écriture. À partir de ces règles, il est possible de définir de nouveaux langages, comme par exemple <a href="http://www.w3.org/MarkUp/" hreflang="en">XHTML</a>, <a href="/tuto/lire/1421-svg-initiation-syntaxe-outils.html" hreflang="en">SVG</a>, <a href="http://www.docbook.org/" hreflang="en">Docbook</a>, <a href="http://www.w3.org/Math/" hreflang="en">MathML</a>...</p>
				<h3 id="ressemble">À quoi ça ressemble&nbsp;?</h3>
				<h4>Exemple de fichier XML</h4>
				<p>Voici un petit exemple de fichier <abbr>XML</abbr>... Nous allons passer en revue ses différents constituants.</p>
				<pre>					
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;savants&gt;
  &lt;!-- Quelques physiciens importants --&gt;
  &lt;savant id="phys0"&gt;
    &lt;identité prénom="Galileo" nom="Galilei"/&gt;
    &lt;dates naissance="1564-02-15" décès="1642-01-08"/&gt;
    &lt;contributions&gt;Relativité du mouvement &amp;amp; système héliocentrique&lt;/contributions&gt;
  &lt;/savant&gt;
  &lt;savant id="phys1"&gt;
    &lt;identité prénom="Isaac" nom="Newton"/&gt;
    &lt;dates naissance="1643-01-04" décès="1727-03-31"/&gt;
    &lt;contributions&gt;Gravitation universelle, principe d'inertie, décomposition de la lumière &amp;amp; calcul infinitésimal&lt;/contributions&gt;
  &lt;/savant&gt;
  &lt;savant id="phys2"&gt;
    &lt;identité nom="Einstein" prénom="Albert"/&gt;
    &lt;dates naissance="1879-03-14" décès="1955-04-18"/&gt;
    &lt;contributions&gt;&lt;![CDATA[Relativités restreinte &amp; générale, nature corpusculaire de la lumière &amp; effet photoélectrique]]&gt;&lt;/contributions&gt;
  &lt;/savant&gt;
&lt;/savants&gt;
</pre>
	<br><br>
	<a href="Tutoriels2.php">Page suivante</a><br><br>
	<a href="Tutoriels1.php">Page 1</a>&nbsp;<a href="Tutoriels2.php">Page 2</a>&nbsp;<a href="Tutoriels3.php">Page 3</a>
	<br><br><br>
			</div>
		</div>	
		</div>
		
		<?php
        	include("../Page_parties/footer.html");
        ?>
	</body>
</html>
