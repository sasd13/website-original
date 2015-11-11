<?php
	session_start();
	
	$postcomment = false;
	
	if (!isset($_SESSION['login']))
	{
		if ((isset($_POST['login'])) AND (!empty($_POST['login'])) AND (isset($_POST['password'])) AND (!empty($_POST['password'])))
		{
			$db = pg_connect("host=localhost dbname=projet user=postgres password=samir") or die('Connexion impossible!!!');
			$login = pg_escape_string($_POST['login']);	
			$password = pg_escape_string($_POST['password']);
			$query_login = pg_query($db, "SELECT * FROM users WHERE login='{$login}'") or die('Échec requête : ' . pg_last_error());
			$verif_login = pg_num_rows($query_login);
					
			if ($verif_login == 1)
			{
				$query_password = pg_query($db, "SELECT password FROM users WHERE login='{$login}' AND password='{$password}'") or die('Échec requête : ' . pg_last_error());
				$verif_password = pg_num_rows($query_password);
								
				if ($verif_password == 1)
				{
					if ((isset($_POST['comment'])) AND (!empty($_POST['comment'])) AND (strlen($_POST['comment']) <= 500))
					{
						$comment = pg_escape_string($_POST['comment']);
						$query_comment = pg_query($db, "INSERT INTO users_comments (login_comment, date_comment, comment) VALUES ('{$login}', CURRENT_TIMESTAMP, '{$comment}')") or die('Échec requête : ' . pg_last_error());
						if ($query_comment == false)
						{
							$_SESSION['echeccomment'] = "<span class=\"red\">Commentaire &eacute;chou&eacute;</span><br><br>";									
						}	
						else 
						{
							$_SESSION['login'] = $_POST['login'];	
							$postcomment = true;							
						}	
						pg_free_result($query_comment);
					}
					else if ((isset($_POST['comment'])) AND (!empty($_POST['comment'])) AND (strlen($_POST['comment']) > 500))
					{
						$_SESSION['echeccomment'] = "<span class=\"red\">Commentaire trop volumineux</span><br><br>";
					}					
					else
					{
						$_SESSION['echeccomment'] = "<span class=\"red\">Commentaire vide</span><br><br>";
					}
				}
				else
				{
					$_SESSION['echeccomment'] = "<span class=\"red\">Le nom d&#146;utilisateur ou(et) le mot de passe est(sont) incorrect(s)</span><br><br>";									
				}
				pg_free_result($query_password);
			}
			else
			{							
				$_SESSION['echeccomment'] = "<span class=\"red\">Le nom d&#146;utilisateur ou(et) le mot de passe est(sont) incorrect(s)</span><br><br>";
			}
			pg_free_result($query_login);
			pg_close($db);
		}
		else
		{
			$_SESSION['echeccomment'] = "<span class=\"red\">Impossible de poster le commentaire</span><br><br>";
		}			
	}
	else
	{
		$db = pg_connect("host=localhost dbname=projet user=postgres password=samir") or die('Connexion impossible!!!');
		$login = pg_escape_string($_SESSION['login']);	
		
		if ((isset($_POST['comment'])) AND (!empty($_POST['comment'])))
		{
			$comment = pg_escape_string($_POST['comment']);
			$query_comment = pg_query($db, "INSERT INTO users_comments (login_comment, date_comment, comment) VALUES ('{$login}', CURRENT_TIMESTAMP, '{$comment}')") or die('Échec requête : ' . pg_last_error());
			if ($query_comment == false)
			{
				$_SESSION['echeccomment'] = "<span class=\"red\">Commentaire &eacute;chou&eacute;</span><br><br>";									
			}	
			else 
			{
				$postcomment = true;
			}	
			pg_free_result($query_comment);
		}
		else
		{
			$_SESSION['echeccomment'] = "<span class=\"red\">Commentaire vide</span><br><br>";
		}		
		pg_close($db);
	}
	
	if ($postcomment == true)
	{
		header('Location: ../Pages_libres/Espace_personnel.php#tabmsg');
		exit();
	}
	else 
	{
		if(isset($_POST['comment'])) $_SESSION['recupcomment'] = $_POST['comment'];
		header('Location: ../Pages_libres/Commentaires.php');
		exit();
	}
?>