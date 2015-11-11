<?php
	session_start();
	
	if ((isset($_POST['login'])) AND (!empty($_POST['login'])) AND (isset($_POST['password'])) AND (!empty($_POST['password'])) AND (isset($_POST['confirmpassword'])) AND (!empty($_POST['confirmpassword'])) AND (isset($_POST['nom'])) AND (!empty($_POST['nom'])) AND (isset($_POST['prenom'])) AND (!empty($_POST['prenom'])) AND (isset($_POST['email'])) AND (!empty($_POST['email'])))
	{
		$nom = pg_escape_string(ucwords($_POST['nom']));
		$prenom = pg_escape_string(ucwords($_POST['prenom']));
		$sexe = $_POST['sexe'];
		$naissance = $_POST['naissance'];
		$email = pg_escape_string(strtolower(str_replace(' ', '', $_POST['email'])));
		$login = pg_escape_string($_POST['login']);	
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];
					
		$db = pg_connect("host=localhost dbname=projet user=postgres password=samir") or die('Connexion impossible!!!');						
		$query_login = pg_query($db, "SELECT * FROM users WHERE login='{$login}'") or die('Échec requête : ' . pg_last_error());
		$verif_login = pg_num_rows($query_login);
		$query_email = pg_query($db, "SELECT * FROM users WHERE email='{$email}'") or die('Échec requête : ' . pg_last_error());
		$verif_email = pg_num_rows($query_email);
					
		if ($verif_login == 0)
		{
			if ((strcmp($password, $confirmpassword) == 0) AND (strlen($password) >= 6))
			{
				$domaine = strrchr($email, '@');
				$point = substr_count($domaine, '.');
				$arobase = substr_count($email, '@');
			
				if(($arobase == 1) AND ($point >= 1) AND ($verif_email == 0))
				{
					$query_register = pg_query($db, "INSERT INTO users (nom, prenom, sexe, naissance, email, login, password, registerdate, photo) VALUES ('{$nom}', '{$prenom}', '{$sexe}', '{$naissance}', '{$email}', '{$login}', '{$password}', CURRENT_TIMESTAMP, NULL)") or die('Échec requête : ' . pg_last_error());
					if ($query_register == false)
					{
						$_SESSION['echecregister'] = "<span class=\"red\">&nbsp;Inscription &eacute;chou&eacute;e</span><br><br>";									
					}	
					else 
					{
						$_SESSION['login'] = $login;
					}	
					pg_free_result($query_register);			
				}
				else
				{
					$_SESSION['echecemail'] = "<span class=\"red\">&nbsp;Erreur email</span>";
				}
			}							
			else
			{
				$_SESSION['echecpassword'] = "<span class=\"red\">&nbsp;Erreur Mot de passe</span>";
			}
		}					
		else
		{
			$_SESSION['echeclogin'] = "<span class=\"red\">&nbsp;Pseudo indisponible/invalide</span>";
		}	
		pg_free_result($query_login);
		pg_close($db);
	}
	else
	{
		$_SESSION['echecregister'] = "<span class=\"red\">Remplir le formulaire</span><br><br>";
	}

	if(isset($_SESSION['login']))
	{
		header('Location: ../Pages_libres/Espace_personnel.php');
		exit();
	}
	else
	{
		header('Location: ../Pages_libres/Inscription.php');
		exit();
	}
?>