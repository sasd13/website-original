<!-- Navigation -->
<div id="nav">    
   	<!--Menu-->    
	<ul id="menu">					
		<li><a href="../Pages_libres/Accueil.php">Accueil</a></li>
		<li>
           	<a href="../Pages_libres/A_propos.php">&Agrave; propos</a>
            <ul>
               	<li><a href="../Pages_libres/CV.php">CV</a></li>
                <li><a href="../Page_galerie/Galerie.php">Galerie Photos</a></li>
            </ul>
        </li>
        <li>
			<a href="../Pages_libres/Working.php">Working</a>
            <ul>
				<li><a href="../Pages_libres/Projets.php">Projets</a></li>
				<li><a href="../Pages_libres/Tutoriels1.php">Tutoriels</a></li>
                <li><a href="../Page_tableau/Tableau_Piet_Mondrian.php">Tableau Piet Mondrian</a></li>
            </ul>
        </li>
        <li><a href="../Pages_libres/Espace_personnel.php">Espace Personnel</a>
			<ul>
				<li><a href="../Pages_libres/Inscription.php">Inscription</a>
				<li><a href="../Pages_libres/Commentaires.php">Commentaires</a></li>
			</ul>
        </li>		
	</ul>
	<!-- Fin Menu -->
	<ul id="statut">
		<li>
			<?php echo $statut."&nbsp;&nbsp;&#124;&nbsp;&nbsp;"; 
				if (isset($_SESSION['login']))
				{
					echo "<a href=\"../Scripts/logout.php\">D&eacute;connexion</a>";
				}
				else
				{
					echo "<a href=\"../Pages_libres/Connexion.php\">Connexion</a>";
				}
			?>
		</li>
	</ul>
</div>    