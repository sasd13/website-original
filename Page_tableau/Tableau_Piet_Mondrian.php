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

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Projet Site Web">
		<meta name="keywords" content="HTML5,CSS3,JavaScript,PHP">
		<meta name="author" content="Samir SAID ALI">
		<link rel="stylesheet" href="../Styles/style.css">
		<link rel="stylesheet" href="../Styles/style_tableau_piet_mondrian.css">
		<title>Projet Site Web - Tableau Piet Mondrian</title>
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
				<h2 class="bienvenue">Tableau Piet Mondrian</h2>
                <table id="tabpm">
					<tr>
						<td id="tr1td1" class="silver">&nbsp;</td>
						<td id="tr1td2" class="silver">&nbsp;</td>
						<td id="tr1td3" class="silver">&nbsp;</td>
						<td id="tr1td4" class="silver">&nbsp;</td>
						<td id="tr1td5" class="silver">&nbsp;</td>
						<td id="tr1td6" class="yellow">&nbsp;</td>
						<td id="tr1td7" class="yellow">&nbsp;</td>
						<td id="tr1td8" class="silver">&nbsp;</td>
					</tr>
					<tr>
						<td id="tr2td1" class="silver">&nbsp;</td>
						<td id="tr2td2" class="red">&nbsp;</td>
						<td id="tr2td3" class="red">&nbsp;</td>
						<td id="tr2td4" class="red">&nbsp;</td>
						<td id="tr2td5" class="red">&nbsp;</td>
						<td id="tr2td6" class="yellow">&nbsp;</td>
						<td id="tr2td7" class="yellow">&nbsp;</td>
						<td id="tr2td8" class="silver">&nbsp;</td>
					</tr>
					<tr>
						<td id="tr3td1" class="silver">&nbsp;</td>
						<td id="tr3td2" class="red">&nbsp;</td>
						<td id="tr3td3" class="red">&nbsp;</td>
						<td id="tr3td4" class="red">&nbsp;</td>
						<td id="tr3td5" class="red">&nbsp;</td>
						<td id="tr3td6" class="yellow">&nbsp;</td>
						<td id="tr3td7" class="yellow">&nbsp;</td>
						<td id="tr3td8" class="silver">&nbsp;</td>
					</tr>
					<tr>
						<td id="tr4td1" class="silver">&nbsp;</td>
						<td id="tr4td2" class="red">&nbsp;</td>
						<td id="tr4td3" class="red">&nbsp;</td>
						<td id="tr4td4" class="red">&nbsp;</td>
						<td id="tr4td5" class="red">&nbsp;</td>
						<td id="tr4td6" class="silver">&nbsp;</td>
						<td id="tr4td7" class="silver">&nbsp;</td>
						<td id="tr4td8" class="silver">&nbsp;</td>
					</tr>
					<tr>
						<td id="tr5td1" class="silver">&nbsp;</td>
						<td id="tr5td2" class="red">&nbsp;</td>
						<td id="tr5td3" class="red">&nbsp;</td>
						<td id="tr5td4" class="red">&nbsp;</td>
						<td id="tr5td5" class="red">&nbsp;</td>
						<td id="tr5td6" class="silver">&nbsp;</td>
						<td id="tr5td7" class="silver">&nbsp;</td>
						<td id="tr5td8" class="silver">&nbsp;</td>
					</tr>
					<tr>
						<td id="tr6td1" class="silver">&nbsp;</td>
						<td id="tr6td2" class="black">&nbsp;</td>
						<td id="tr6td3" class="black">&nbsp;</td>
						<td id="tr6td4" class="silver">&nbsp;</td>
						<td id="tr6td5" class="silver">&nbsp;</td>
						<td id="tr6td6" class="silver">&nbsp;</td>
						<td id="tr6td7" class="silver">&nbsp;</td>
						<td id="tr6td8" class="silver">&nbsp;</td>
					</tr>
					<tr>
						<td id="tr7td1" class="yellow">&nbsp;</td>
						<td id="tr7td2" class="black">&nbsp;</td>
						<td id="tr7td3" class="black">&nbsp;</td>
						<td id="tr7td4" class="silver">&nbsp;</td>
						<td id="tr7td5" class="silver">&nbsp;</td>
						<td id="tr7td6" class="blue">&nbsp;</td>
						<td id="tr7td7" class="blue">&nbsp;</td>
						<td id="tr7td8" class="red">&nbsp;</td>
					</tr>
					<tr>
						<td id="tr8td1" class="yellow">&nbsp;</td>
						<td id="tr8td2" class="silver">&nbsp;</td>
						<td id="tr8td3" class="silver">&nbsp;</td>
						<td id="tr8td4" class="black">&nbsp;</td>
						<td id="tr8td5" class="black">&nbsp;</td>
						<td id="tr8td6" class="blue">&nbsp;</td>
						<td id="tr8td7" class="blue">&nbsp;</td>
						<td id="tr8td8" class="red">&nbsp;</td>
					</tr>
					<tr>
						<td id="tr9td1" class="yellow">&nbsp;</td>
						<td id="tr9td2" class="silver">&nbsp;</td>
						<td id="tr9td3" class="silver">&nbsp;</td>
						<td id="tr9td4" class="silver">&nbsp;</td>
						<td id="tr9td5" class="silver">&nbsp;</td>
						<td id="tr9td6" class="silver">&nbsp;</td>
						<td id="tr9td7" class="silver">&nbsp;</td>
						<td id="tr9td8" class="red">&nbsp;</td>
					</tr>
				</table>						
            </div>
		</div>
        
        <?php
			include("../Page_parties/footer.html");
		?>	
	</body>
</html>
