<?php
	require_once dirname(__FILE__).'/library/lib.php';
	session_start();

	if(isset($_POST['cpf']) && isset($_POST['senha'])){
		$i = tentaLogin($_POST['cpf'], $_POST['senha']);
		if($i){
			$_SESSION['logado'] = true;
			$_SESSION['login'] = $_POST['cpf'];
			setCookie("cpf", $_POST['cpf'], time()+(60*60*24));
			header("Location: index.php");
			exit();
		}else{
			$_SESSION['logado'] = false;
			header("Location: login.php?r=0");
			exit();
		}
	}
	if(isset($_SESSION['logado']) && ($_SESSION['logado'] == true)){
		header("Location: index.php");
	}else{
		header("Location: login.php");
	}
?>