<?php
	require_once dirname(__FILE__).'/library/cadastro.php';
	session_start();

	if(isset($_POST['login']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['confEmail']) && isset($_POST['password']) && isset($_POST['confPass']) && isset($_POST['gender'])){
		echo 'existe todos os dados';
		//verifica login
		$r = search($_POST['login']);
		if($r){//se entrar aqui, significa que o login que o usuario mandou ainda não existe no banco
			echo 'pode usar este login';
			$_SESSION['user'] = $_POST['login'];
			//verifica nome se maior que x caracteres e menor que y caracteres
			if((strlen($_POST['name']) > 10) && (strlen($_POST['name']) < 60)){
				echo 'nome está dentro das espicificações';
				$_SESSION['name'] = $_POST['name'];
				//verifica email e a confirmação
				if($_POST['email'] == $_POST['confEmail']){
					//verifica senha e a confirmação
					$_SESSION['email'] = $_POST['email'];
					if((strlen($_POST['password']) >= 6) && ($_POST['password'] == $_POST['confPass'])){
						$i= insert($_POST['login'], $_POST['name'], $_POST['email'], $_POST['password'], $_POST['gender']);
						if($i){
							$message = 'Welcome to PlayMusic!<br/>Your login: '.$_POST['login'].'Password: '.$_POST['password'].'';
							mail($_POST['email'], "Welcome to PlayMusic", $message);
							header("Location: login.php?r=4");
						}else{
							header("Location: login.php?r=5");
						}
					}else{
						header("Location: login.php?r=3");
					}
				}else{
					header("Location: login.php?r=2");
				}
			}else{
				header("Location: login.php?r=1");
			}
		}else{
			header("Location: login.php?r=0");
		}		
	}
?>