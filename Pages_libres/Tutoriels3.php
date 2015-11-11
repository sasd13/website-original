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
		<title>Projet Site Web - Tutoriels Page 3</title>
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
				<h3 class="bienvenue">Page 3</h3>
				<h3 id="definir-contenu">Comment définir le contenu d'un document <abbr>XML</abbr>&nbsp;?</h3>
				<p>Ce n'est pas parce qu'on sait comment écrire un document <abbr>XML</abbr> qu'on peut être sûr de savoir écrire un document similaire par la suite si le besoin s'en fait sentir. De plus, on peut souhaiter diffuser un type de document, ou bien être amené à travailler en parallèle sur un document donné. Pour ces raisons, il est nécessaire d'établir des règles communes qui définissent précisément les éléments et attributs autorisés, ainsi que leur hiérarchie -autrement dit, des règles de «&nbsp;grammaire&nbsp;». Il existe trois grandes méthodes pour ce faire. Quand un document suit une telle grammaire et qu'il l'indique, il est dit «&nbsp;valide&nbsp;».</p>
				<h4>Par une DTD</h4>
				<p>DTD signifie Document Type Definition, définition de type de document. Il s'agit du plus ancien langage qui permette de décrire un format <abbr>XML</abbr> (il est tiré de SGML, l'«&nbsp;ancêtre&nbsp;» de XML) et d'ailleurs c'est ainsi que les divers langages HTML ont été définis. Une DTD respecte une syntaxe particulière. Par exemple, pour définir un élément <code>élémentParent</code> qui contient un autre élément <code>élémentEnfant</code> au moins une fois et un attribut obligatoire <code>attr</code>, on écrit...</p>
<pre>
&lt;!ELEMENT élémentParent (élémentEnfant)+&gt;
&lt;!ATTLIST élémentParent attr CDATA #REQUIRED&gt;
&lt;!ELEMENT élémentEnfant (#PCDATA)&gt;</pre>
				<p>On peut déclarer que le document <abbr>XML</abbr> est conforme à cette DTD en insérant juste après son prologue une ligne qui spécifie la DTD et son type (publique, c'est-à-dire qu'elle est disponible pour tous sur Internet, système quand elle réside forcément sur la machine sur la laquelle le document <abbr>XML</abbr> est visualisé, ou interne quand elle est incorporée au document <abbr>XML</abbr> lui-même)&nbsp;:</p>
				<ul>
					<li>Pour une DTD système&nbsp;: <code>&lt;!DOCTYPE élémentRacine SYSTEM "cheminVersLaDTD"&gt;</code></li>
					<li>Pour une DTD publique&nbsp;: <code>&lt;!DOCTYPE élémentRacine PUBLIC "identificationNormaliséeDeLaDTD" "URLDeLaDTD"&gt;</code></li>
					<li>Pour une DTD interne&nbsp;: <code>&lt;!DOCTYPE élémentRacine[Liste des déclarations...]&gt;</code></li>
				</ul>
				<p>Voici par exemple la DTD de XHTML strict&nbsp;:</p>
				<pre>&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"&gt;</pre>
				<p>Une DTD permet aussi de définir de nouvelles entités réutilisables dans le document <abbr>XML</abbr>.</p>
				<h4>Par un <abbr>XML</abbr> Schema</h4>
				<p>Les DTD sont faciles à écrire et à comprendre, mais il ne s'agit pas d'un document <abbr>XML</abbr>. De plus, il y a quelques limitations comme le fait qu'il n'est pas possible de spécifier un type pour les données&nbsp;: il est par exemple impossible de forcer par une DTD un attribut à être un nombre entier strictement positif.</p>
				<p>Le W3C a alors développé un langage <abbr>XML</abbr> qui permette de définir de nouveaux langages <abbr>XML</abbr>&nbsp;: le format <a href="http://www.w3.org/XML/Schema" hreflang="en"><abbr>XML</abbr> Schema</a>. Ce format permet de définir des types de données, et par rapport aux DTD offre de surcroît la possibilité de spécifier un nombre déterminé d'occurrences d'un élément donné, permet la mise au point de grammaires modulaires en facilitant l'importation d'un schéma dans un autre. Cerise sur le gâteau, il s'agit d'un langage <abbr>XML</abbr>&nbsp;: cela signifie qu'il est possible de le manipuler comme tout autre document <abbr>XML</abbr>. En contrepartie, le schéma <abbr>XML</abbr> équivalent à une DTD donnée est plus long. Dans le cas d'une grammaire particulièrement complexe, le schéma peut, si l'on n'y prend garde, devenir difficile à lire. L'équivalent de la <abbr>DTD</abbr> précédentes est ainsi...</p>
<pre>
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema" elementFormDefault="qualified"&gt;
  &lt;xs:element name="élémentParent"&gt;
    &lt;xs:complexType&gt;
      &lt;xs:sequence&gt;
        &lt;xs:element maxOccurs="unbounded" name="élémentEnfant" type="xs:string"/&gt;
      &lt;/xs:sequence&gt;
      &lt;xs:attribute name="attr" use="required"/&gt;
    &lt;/xs:complexType&gt;
  &lt;/xs:element&gt;
&lt;/xs:schema&gt;
</pre>
				<p>On déclare qu'un document <abbr>XML</abbr> est conforme à un schéma <abbr>XML</abbr> en utilisant un espace de nom <abbr>XML</abbr> (<abbr>xmlns</abbr>, <span lang="en"><abbr>XML</abbr> NameSpace</span>). Par exemple, pour indiquer qu'un document est en XHTML strict, on écrit</p>
				<pre>&lt;html xmlns="http://www.w3.org/1999/xhtml"&gt;</pre>
				<p>Plus généralement, un espace de noms s'utilise ainsi&nbsp;:</p>
<pre>
&lt;élémentRacine xmlns:prefixe="http://www.mondomaine.org/schemas/monschema.xsd"&gt;
  &lt;prefixe:élémentEnfant1...&gt;
&lt;/élémentRacine&gt;</pre>
				<h4>Par un schéma Relax NG</h4>
				<p>La complexité relative du format <abbr>XML</abbr> Schema a amené le consortium Oasis à développer un format concurrent nommé <a href="http://www.oasis-open.org/committees/tc_home.php?wg_abbrev=relax-ng" hreflang="en">Relax NG</a>. Ce format reprend les mêmes types de données que le format <abbr>XML</abbr> Schema. Outre une syntaxe <abbr>XML</abbr> qui ressemble <i>grosso modo</i> à celle de <abbr>XML</abbr> Schema, Relax NG offre une syntaxe plus compacte se rapprochant de celle des DTD. Notre exemple récurrent donne dans cette syntaxe...</p>
				<pre>element élémentParent{element élémentEnfant {text}+, attribute attr {text}}</pre>
				<p>En syntaxe <abbr>XML</abbr>, cela donne</p>
<pre>
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;element name="élémentParent" xmlns="http://relaxng.org/ns/structure/1.0"&gt;
  &lt;oneOrMore&gt;
    &lt;element name="élémentEnfant"&gt;
      &lt;text/&gt;
    &lt;/element&gt;
  &lt;/oneOrMore&gt;
  &lt;attribute name="attr"/&gt;
&lt;/element&gt;
</pre>
				<h3 id="transformer-contenu">Transformer un document <abbr>XML</abbr> en... quelque chose d'autre avec XSL</h3>
				<p>Un document <abbr>XML</abbr> est un format de stockage de données. En tant que tel, il offre un grand intérêt s'il est possible de le manipuler afin de traiter ces données. Il est donc nécessaire de disposer d'un langage qui le permette.</p>
				<h4>Introduction</h4>
				<p>Le W3C a développé des technologies, le <a href="http://www.w3.org/Style/XSL/" hreflang="en"><abbr>XSL</abbr></a> pour <span lang="en">eXtensible Stylesheet Language</span>, qui est un format <abbr>XML</abbr> et est par conséquent manipulable et analysable de la même manière qu'un document <abbr>XML</abbr> «&nbsp;classique&nbsp;». Ce langage permet la transformation d'un document <abbr>XML</abbr> en n'importe quel type de fichier texte -un autre document <abbr>XML</abbr> bien sûr, mais aussi de l'HTML qui ne soit pas du XHTML, du <abbr lang="en" title="Rich Text Format">RTF</abbr>, voire du <a href="http://www.adobe.com/products/postscript/" hreflang="en">PostScript</a> ou tout autre format texte, voire <abbr lang="en" title="Portable Document Format">PDF</abbr>.</p>
				<p><abbr>XSL</abbr> consiste en trois grands modules&nbsp;: XPath permet de localiser des nœuds dans une arborescence <abbr>XML</abbr>, <abbr>XSLT</abbr> permet la transformation du document, et XSL-FO (pour <span lang="en">Formatting Objects</span>) en permet la mise en forme.</p>
				<h4>XPath</h4>
				<p>Il est nécessaire de disposer d'un format de description et de navigation au sein de l'arborescence du document <abbr>XML</abbr> source&nbsp;: il s'agit d'<a href="http://www.w3.org/TR/xpath" hreflang="en">XPath</a>. Ce langage est une sorte d'hybridation entre les instructions de navigation à taper en ligne de commande sous Windows ou Unix (comme <kbd>..</kbd> qui désigne le répertoire parent sous ces systèmes, et l'élément parent de l'élément en cours d'analyse sous <abbr>XPath</abbr>), et <a href="http://www.w3.org/Style/CSS/" hreflang="en" lang="en"><abbr title="Cascading StyleSheet">CSS</abbr></a> (par exemple, pour cibler les éléments <code>elt</code> possédant un attribut <code>attr</code>, on écrit <code>elt[@attr]</code>). S'y ajoutent des instructions plus subtiles, ainsi que quelques fonctions mathématiques ou de manipulation des booléens. Le rôle de XPath est de pouvoir identifier un nœud quelconque, ou une collection de nœuds dans une arborescence <abbr>XML</abbr>, que ce soit dans l'absolu (c'est-à-dire en l'identifiant à partir de l'intégralité de l'arbre) ou en relatif (c'est-à-dire en partant d'un nœud déterminé au préalable).</p>
				<h4>XSLT</h4>
				<h5>Principe</h5>
				<p><abbr>XSLT</abbr> est un format <abbr>XML</abbr> défini à partir d'un schéma. Une «&nbsp;feuille de style&nbsp;» <abbr>XSL</abbr>, dont l'élément racine est <code>stylesheet</code> débute donc (après son prologue) par...</p>
				<pre>&lt;xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="2.0"&gt;</pre>
				<p><abbr>XSL</abbr> définit un jeu d'instructions qui permettent le contrôle de la sortie.</p>
				<p>Une fois que l'on dispose des moyens de pouvoir cibler des nœuds différents de l'arborescence, <abbr>XSL</abbr> nous offre la possibilité de la <em>transformer</em>. La transformation peut être simplissime et ne consister qu'en la recopie de la valeur du nœud dans le document de sortie, mais elle peut aussi être très complexe et mettre en œuvre des relations de dépendances entre différents nœuds. Pour l'anecdote, des mathématiciens ont démontré que comme le langage <abbr>XSL</abbr> permet de simuler une <a href="http://fr.wikipedia.org/wiki/Machine_de_Turing#Machines_de_Turing_universelles">machine de Turing universelle</a>, ce langage permet de mener à bien exactement les mêmes algorithmes que les langages de programmation tels que Java, C# et autres C... évidemment, comme il n'est pas à l'origine conçu pour ce genre de tâche, cela risque d'être un peu compliqué&nbsp;;-)</p>
				<p>Par exemple, pour copier dans le document de sortie la valeur de l'élément <code>elt</code> fils de l'élément courant, on écrit <code>&lt;xsl:value-of select="elt" /&gt;</code>. Cela est très simple&nbsp;; mais <abbr>XSL</abbr> permet aussi de construire des tests <code>if... then...</code> ou bien des tests à valeurs multiples&nbsp;:</p>
<pre>
&lt;xsl:choose&gt;
  &lt;xsl:when test="elt='bateau' or elt='canoë'"&gt;Ce moyen de transport navigue.&lt;/xsl:when&gt;
  &lt;xsl:when test="elt='voiture' or elt='bicyclette'"&gt;Ce moyen de transport roule.&lt;/xsl:when&gt;
  &lt;xsl:default&gt;Ce moyen de transport sert à se déplacer dans l'air ou dans l'espace.&lt;/xsl:default&gt;
&lt;/xsl:choose&gt;
</pre>
				<p><abbr>XSL</abbr> est un langage extrêmement riche, et il serait vain de prétendre en faire le tour en si peu de mots. Il suffit de retenir que ce langage permet de faire <em>ce que l'on veut</em> de tout document <abbr>XML</abbr>.</p>
				<h5><abbr>XSLT</abbr> côté client</h5>
				<p><abbr>XSLT</abbr> peut être interprété directement par le poste client. Je vais axer la suite de mon discours sur le cas particulier d'une transformation <abbr>XML</abbr> vers <abbr>(X)HTML</abbr>.</p>
				<p>Si l'on utilise un navigateur Internet, on peut lui laisser la possibilité d'effectuer lui-même, dynamiquement, la transformation du document <abbr>XML</abbr> si on lui spécifie une feuille de style <abbr>XSL</abbr>... ou sa mise en forme si on lui fournir une feuille <abbr>CSS</abbr>. Pour cela, entre le prologue et l'élément racine, il suffit d'appeler la feuille de style avec ce que l'on appelle une «&nbsp;instruction de traitement&nbsp;»&nbsp;:</p>
<pre>
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;?xml-stylesheet type="typeMIMEDeLaFeuilleDeStyle" href="emplacementDeLaFeuilleDeStyle" ?&gt;
&lt;élémentRacine&gt;
(...)
</pre>
				<p>Il est en effet possible, si on fournit un feuille de style <abbr>CSS</abbr>en spécifiant le type <code>text/css</code>, d'appliquer cette feuille au document <abbr>XML</abbr>. Après tout, quand une feuille de style est appliquée à un document XHTML, elle est appliquée à un document <abbr>XML</abbr> particulier, et cela marche plutôt bien. Pour indiquer que les éléments <code>elt</code> doivent être écrits en rouge, il suffit d'écrire dans la feuille <abbr>CSS</abbr>la ligne <code>elt {color:red;}</code>.</p>
				<p>Dans les deux cas, <abbr>CSS</abbr> ou <abbr>XSL</abbr>, la qualité de transformation ou de la mise en forme sont étroitement dépendants du navigateur utilisé. Vous savez déjà que le rendu <abbr>CSS</abbr>diffère grandement d'un navigateur à un autre... eh bien, les transformations <abbr>XSL</abbr> sont encore plus variables. C'est la raison pour laquelle, à moins d'avoir un contrôle absolu sur les navigateurs utilisés sur vos postes client, il n'est pas recommandé de recourir à cette technique.</p>
				<h5><abbr>XSLT</abbr> côté serveur</h5>
				<p>Une manière beaucoup plus fiable d'assurer un résultat final de transformation identique selon les navigateurs est de réaliser cette transformation côté serveur. Le navigateur (ou, plus généralement, l'application chargée du traitement) ne reçoit plus le document <abbr>XML</abbr> source, mais le résultat de sa transformation. Cela permet aussi de délivrer des résultats différents en fonction des requêtes réalisées depuis le poste client. Dans ce rôle, le document <abbr>XML</abbr> source se rapproche plus d'une base de données hiérarchique. Les langages de script incorporent soit nativement, soit par l'intermédiaire de bibliothèques des fonctions de manipulation des documents <abbr>XML</abbr> ainsi que les instructions <abbr>XSL</abbr>&nbsp;: c'est le cas de la bibliothèque <a href="http://xmlsoft.org/XSLT/">libxslt</a> pour <abbr>PHP</abbr> par exemple qui est implémentée par l'extension <a href="http://fr2.php.net/xsl">XSL</a>.</p>
				<h4><abbr>XSL-FO</abbr></h4>
				<p>Ce langage permet de produire des documents au format <abbr>PDF</abbr>. <a href="http://www.w3.org/TR/xsl/" hreflang="en">XSL-FO</a> donne un rendu très fin de la qualité visuelle du document produit au format PDF, au pixel près. Il permet en outre de pouvoir insérer des effets visuels impossibles à réaliser en (X)HTML/CSS, comme l'utilisation de polices de caractères particulières. Ces instructions ne sont pas supportées par les navigateurs Internet. On obtient une feuille de style XSL-FO en ajoutant à une feuille de style <abbr>XSLT</abbr> «&nbsp;normale&nbsp;» les instructions disponibles dans l'espace de nom -virtuel- http://www.w3.org/1999/XSL/Format. Les transformations XSL-FO sont la grande majorité du temps réalisées côté serveur, mais il est possible d'installer sur un poste client un utilitaire Java nommé <a href="http://xmlgraphics.apache.org/fop/" hreflang="en"><abbr lang="en" title="Formatting Objects Processor">FOP</abbr></a>. Cet utilitaire est de surcroît capable de produire des documents de sorte aux différents formats texte, ainsi que <abbr lang="en" title="Printer Command Language">PCL</abbr>, <abbr lang="en" title="Advanced Function Presentation">AFP</abbr>, <abbr lang="en" title="Portable Network Graphics">PNG</abbr>...</p>
				<h3 id="conclusion">Conclusion</h3>
				<p>On le voit, dire que l'on fait du <abbr>XML</abbr> manque de précision&nbsp;: il s'agit plutôt d'<b>un ensemble de technologies et de langages qui permettent la définition, la manipulation, la transformation et le transfert de données entre applications</b>. Un cas particulier est la mise en œuvre dans le cadre d'un développement pour le Web, mais cela n'est que la partie émergée de l'iceberg. En fait, vos applications favorites manipulent déjà du <abbr>XML</abbr> sans que vous le soupçonniez, que ce soit la dernière version d'Office, Open Office, ou bien vos agrégateurs de contenus qui récupèrent des données aux formats <abbr>RSS</abbr> ou Atom, vos navigateurs Web qui traitent des documents <abbr>XHTML</abbr>...</p>
				<p><abbr>XML</abbr> permet de définir des langages plus ou moins complexes mais qui permettent d'établir des standards de formats de fichiers d'échanges entre applications. Peu importe le langage utilisé pour traiter des informations, s'il est capable de produire du code <abbr>XML</abbr>, il est capable de dialoguer avec tout autre programme écrit dans n'importe quel langage.</p>
				<br><br>
				<a href="Tutoriels2.php">Page pr&eacute;c&eacute;dente</a><br><br>
				<a href="Tutoriels1.php">Page 1</a>&nbsp;<a href="Tutoriels2.php">Page 2</a>&nbsp;<a href="Tutoriels3.php">Page 3</a>
				<br><br><br>
			</div>
		</div>		
		
		<?php
        	include("../Page_parties/footer.html");
        ?>
	</body>
</html>
