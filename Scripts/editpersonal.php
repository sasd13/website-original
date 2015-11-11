<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header('Location: ../Pages_libres/Connexion.php');
		exit();
	}
	else
	{
		$db = pg_connect("host=localhost dbname=projet user=postgres password=samir") or die('Connexion impossible!!!');
		$login = pg_escape_string($_SESSION['login']);
				
		if ((isset($_POST['newnom'])) AND (!empty($_POST['newnom']))) 
		{
			$newnom = pg_escape_string($_POST['newnom']);
			$query_nom = pg_query($db, "UPDATE users SET nom='{$newnom}' WHERE login='{$login}'") or die('Échec requête : ' . pg_last_error());
			
			if ($query_nom == false)
			{
				$_SESSION['msgeditname'] = "Modification du nom &eacute;chou&eacute;e<br>";	
				$editnom = 0;
			}
			else
			{
				$_SESSION['nom'] = $_POST['newnom'];
				$editnom = 1;
			}
			pg_free_result($query_nom);
		}
		else
		{
			$editnom = 0;
		}
		
		if ((isset($_POST['newprenom'])) AND (!empty($_POST['newprenom']))) 
		{
			$newprenom = pg_escape_string($_POST['newprenom']);
			$query_prenom = pg_query($db, "UPDATE users SET prenom='{$newprenom}' WHERE login='{$login}'") or die('Échec requête : ' . pg_last_error());
			
			if ($query_prenom == false)
			{
				$_SESSION['msgeditprenom'] = "Modification du pr&eacute;nom &eacute;chou&eacute;e<br>";	
				$editprenom = 0;
			}
			else
			{
				$_SESSION['prenom'] = $_POST['newprenom'];
				$editprenom = 1;
			}
			pg_free_result($query_prenom);
		}
		else
		{
			$editprenom = 0;
		}
		
		if ((isset($_POST['newemail'])) AND (!empty($_POST['newemail']))) 
		{
			$newemail = pg_escape_string(str_replace(' ', '', $_POST['newemail']));
		
			$domaine = strrchr($newemail, '@');
			$point = substr_count($domaine, '.');
			$arobase = substr_count($newemail, '@');
		
			if(($arobase == 1) AND ($point >= 1))
			{
				$query_email = pg_query($db, "UPDATE users SET email='{$newemail}' WHERE login='{$login}'") or die('Échec requête : ' . pg_last_error());
			
				if ($query_email == false)
				{
					$_SESSION['msgeditemail'] = "Modification de l'email &eacute;chou&eacute;e";	
					$editemail = 0;
				}
				else
				{	
					$_SESSION['email'] = $_POST['newemail'];
					$editemail = 1;
				}
				pg_free_result($query_email);
			}
			else
			{
				$_SESSION['msgeditemail'] = "Erreur email";
				$editemail = 0;
			}		
		}
		else
		{
			$editemail = 0;
		}
		pg_close($db);
	
		if(($editnom == 1) OR ($editprenom == 1) OR ($editemail == 1))
		{
			header('Location: change2.php');			
			exit();
		}
		else
		{
			header('Location: change1.php');
			exit();
		}
	}
?>