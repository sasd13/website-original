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
			<link rel="stylesheet" href="lib/style_gallerie.css">
			<link rel="stylesheet" type="text/css" href="lib/jquery.ad-gallery.1.2.5.css">
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
			<script type="text/javascript" src="lib/jquery.ad-gallery.1.2.5.js"></script>
			<script type="text/javascript">
				$(function() 
				{
					$('img.image1').data('ad-desc', 'Whoa! This description is set through elm.data("ad-desc") instead of using the longdesc attribute.<br>And it contains <strong>H</strong>ow <strong>T</strong>o <strong>M</strong>eet <strong>L</strong>adies... <em>What?</em> That aint what HTML stands for? Man...');
					$('img.image1').data('ad-title', 'Title through $.data');
					$('img.image4').data('ad-desc', 'This image is wider than the wrapper, so it has been scaled down');
					$('img.image5').data('ad-desc', 'This image is higher than the wrapper, so it has been scaled down');
					var galleries = $('.ad-gallery').adGallery();
					$('#switch-effect').change
					(
						function() 
						{
							galleries[0].settings.effect = $(this).val();
							return false;
						}
					);
					$('#toggle-slideshow').click
					(
						function() 
						{
							galleries[0].slideshow.toggle();
							return false;
						}
					);
					$('#toggle-description').click
					(
						function() 
						{
							if(!galleries[0].settings.description_wrapper) 
							{
								galleries[0].settings.description_wrapper = $('#descriptions');
							} 	
							else 
							{
								galleries[0].settings.description_wrapper = false;
							}
							return false;
						}
					);
				});
			</script>
			<title>Projet Site Web - Galerie</title>
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
					<h2 class="bienvenue">Galerie Photos</h2>
					<div id="gallery" class="ad-gallery">
					<div class="ad-image-wrapper">
					</div>
					<div class="ad-controls">
					</div>
					<div class="ad-nav">
					<div class="ad-thumbs">
						<ul class="ad-thumb-list">
							<li>
								<a href="images/1.jpg">
									<img src="images/thumbs/t1.jpg" title="Comores" alt="Route de Moroni">
								</a>
							</li>
							<li>
								<a href="images/2.jpg">
									<img src="images/thumbs/t2.jpg" title="Comores" alt="Plage Itsandra">
								</a>
							</li>
							<li>
								<a href="images/3.jpg">
									<img src="images/thumbs/t3.jpg" title="Comores" alt="Lac sal&eacute;">
								</a>
							</li>
							<li>
								<a href="images/4.jpg">
									<img src="images/thumbs/t4.jpg" title="France" alt="Pyramide du Louvre">
								</a>
							</li>
							<li>
								<a href="images/5.jpg">
									<img src="images/thumbs/t5.jpg" title="France" alt="Place de la Concorde">
								</a>
							</li>
							<li>
								<a href="images/6.jpg">
									<img src="images/thumbs/t6.jpg" title="France" alt="Tour Eiffel">
								</a>
							</li>
							<li>
								<a href="images/7.jpg">
									<img src="images/thumbs/t7.jpg" title="France" alt="Arc de Triomphe">
								</a>
							</li>
							<li>
								<a href="images/8.jpg">
									<img src="images/thumbs/t8.jpg" title="France" alt="Tombe du Soldat Inconnu">
								</a>
							</li>
							<li>
								<a href="images/9.jpg">
									<img src="images/thumbs/t9.jpg" title="France" alt="Place de la D&eacute;fense">
								</a>
							</li>
							<li>
								<a href="images/10.jpg">
									<img src="images/thumbs/t10.jpg" title="France" alt="La D&eacute;fense">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div id="descriptions">
			</div>
			<p class="par">
				Transition: <select id="switch-effect">
							<option value="slide-hori">Horizontale</option>
							<option value="slide-vert">Verticale</option>
							<option value="resize">R&eacute;tr&eacute;cie/Agrandie</option>	
							<option value="fade">Effac&eacute;e</option>
						</select><br>
				Options diaporama : <a href="#" id="toggle-slideshow"><input type="button" value="Activer/Desactiver"></a><br>
				Description hors image : <a href="#" id="toggle-description"><input type="button" value="Activer/Desactiver"></a>
			</p>
			<br><br>
		</div>
		</div>
	
		<?php
			include("../Page_parties/footer.html");
		?> 
	</body>
</html>