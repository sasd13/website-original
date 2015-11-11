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
		<link rel="stylesheet" href="../Styles/style_cv.css">
		<title>Projet Site Web - CV</title>
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
				<h2 class="bienvenue">Curriculum Vitae</h2>
                <table class="tabcv">
                	<tr>
                    	<td class="tabcvcel0"><h3>Samir SAID ALI</h3></td>
						<td rowspan="5"><img src="../Images/moi.jpg" alt="moi"></td>
					</tr>
					<tr>
						<td>41 Rue du Long Sentier<br>93300 Aubervilliers</td>
					</tr>
					<tr>
						<td><br><b>T&eacute;l : </b>+33 6 98 33 01 53</td>
					</tr>
					<tr>
						<td><b>E-mail : </b>samir.said-ali at etu.parisdescartes.fr</td>
					</tr>
					<tr>
						<td><b>Mobilit&eacute; : </b>Paris et banlieue</td>
					</tr>
                </table> 
				<div class="titrecv">Exp&eacute;rience professionnelle</div>
				<table class="tabcv">
					<tr>
						<td class="tabcvcel1">Mars 2008-Juillet 2010 :</td>
						<td><b>Employ&eacute; polyvalent cybercaf&eacute;, Comores</b><br>Tenue de caisse<br>Entretien des &eacute;quipements informatiques<br>Conseil et assistance des clients<br><br></td>
					</tr>
					<tr>
						<td class="tabcvcel1">Septembre 2009-Juin 2010 :</td>
						<td><b>Soutien scolaire, Comores</b><br>Explications des cours (math&eacute;matiques niveau coll&egrave;ge et lyc&eacute;es)<br>Aides aux devoirs<br><br></td>
					</tr>
					<tr>
						<td class="tabcvcel1">Juillet-septembre 2009 :</td>
						<td><b>Aide &agrave; la personne, Comores</b><br>Aider la personne dans les gestes de la vie quotidienne<br>Veiller &agrave; la prise des repas et des m&eacute;dicaments</td>
					</tr>
				</table>
				<div class="titrecv">Formation et Dipl&ocirc;mes</div>		
				<table class="tabcv">
					<tr>
						<td class="tabcvcel1">2011 - 2012 :</td>
						<td>Licence 2 Math&eacute;matiques et Informatique, Universit&eacute; Paris Descartes</td>
					</tr>
					<tr>
						<td>2010 - 2011 :</td>
						<td>Licence 1 Math&eacute;matiques et Informatique, Universit&eacute; Paris Descartes</td>
					</tr>
					<tr>
						<td>2009 - 2010 : </td>
						<td>Licence 1 Math&eacute;matiques-Physique-Chimie, Universit&eacute; des Comores</td>
					</tr>
					<tr>
						<td>2009 :</td>
						<td>Baccalaur&eacute;at S, Comores</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>	
					<tr>
						<td><b>Dipl&ocirc;mes :</b></td>
						<td>DELF niveau B2 (dipl&ocirc;me d'&eacute;tudes en langue fran&ccedil;aise)</td>
					</tr>
						<td></td>
						<td>C2i niveau 1 (certificat informatique et internet)</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>						
					<tr>
						<td><b>Utilisation des logiciels :</b></td>
						<td>Word, Excel, Powerpoint...</td>
					</tr>
				</table>
				<div class="titrecv">Loisirs</div>
				<table class="tabcv">
					<tr>
						<td class="tabcvcel1">Cin&eacute;ma<br>Football<br>Musique<br><br></td>
					</tr>
				</table>
				<br>
			</div>
		</div>		
		
		<?php
        	include("../Page_parties/footer.html");
        ?>
	</body>
</html>
