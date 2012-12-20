<?php
	require_once dirname(__FILE__).'/library/cadastro.php';
	session_start();

	if(isset($_POST['login']) && isset($_POST['password'])){
		//procura no banco o login e a senha e compara se é o dono da conta
		$i = login($_POST['login'], $_POST['password']);
		if($i == 1){
			$_SESSION['logado'] = true;
			$_SESSION['login'] = $_POST['login'];
			setCookie("login", $_POST['login'], time()+(60*60*24));
			echo $i;
			echo 'valor i';			
			header("Location: index.php");
			exit();
		}else{
			$_SESSION['logado'] = false;
			header("Location: login.php?r=6");
			exit();
		}
	}
	if(isset($_SESSION['logado']) && ($_SESSION['logado'] == true)){
		header("Location: home.php");
	}else{
		header("Location: login.php");
	}
?>