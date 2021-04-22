<?
ob_start();
session_start();

	if (isset($_SESSION["pseudoMemb"])) {

		$_COOKIE["pseudoMemb"] = '';
		$_SESSION["pseudoMemb"] = '';

		// Destruction session et redirection vers page accueil.php
		unset($_SESSION);
		session_destroy();
		header('Location: ./../../front/includes/pages/accueil.php?login=""');
	}
	else {

		$page = isset($_COOKIE['page']) ? $_COOKIE['page'] : 'accueil';
		header("Location:" . $page . ".php");
	}

ob_end_flush();