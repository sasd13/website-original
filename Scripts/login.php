<?php
	session_start();
	
	if ((isset($_POST['login'])) AND (!empty($_POST['login'])) AND (isset($_POST['password'])) AND (!empty($_POST['password'])))
	{
		$db = pg_connect("host=localhost dbname=projet user=postgres password=samir") or die('Connexion impossible!!!');
		$login = pg_escape_string($_POST['login']);	
		$password = pg_escape_string($_POST['password']);
		$query_login = pg_query($db, "SELECT * FROM users WHERE login='{$login}'") or die('Échec requête : ' . pg_last_error());
		$verif_login = pg_num_rows($query_login);
					
		if ($verif_login == 1)
		{
			$query_password = pg_query($db, "SELECT password, email FROM users WHERE login='{$login}' AND password='{$password}'") or die('Échec requête : ' . pg_last_error());
			$verif_password = pg_fetch_array($query_password);
			
			if(($verif_password['email'] != null) AND (strcmp($password, $verif_password['password']) == 0))
			{
				$_SESSION['login'] = $login;
			}
			else
			{
				$_SESSION['echeclogin'] = "<span class=\"red\">Le nom d&#146;utilisateur ou(et) le mot de passe est(sont) incorrect(s)</span><br><br>";									
			}
			pg_free_result($query_password);
		}
		else
		{							
			$_SESSION['echeclogin'] = "<span class=\"red\">Le nom d&#146;utilisateur ou(et) le mot de passe est(sont) incorrect(s)</span><br><br>";
		}
		pg_free_result($query_login);
		pg_close($db);
	}
	
	if(isset($_SESSION['login']))
	{
		header('Location: ../Pages_libres/Espace_personnel.php');
		exit();
	}
	else
	{
		header('Location: ../Pages_libres/Connexion.php');
		exit();
	}
?>