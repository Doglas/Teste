<?php
	require_once dirname(__FILE__).'/library/lib.php';
	
	@session_start();
	
	if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
		echo 'Usuário já esta logado.';
		header("Location: compra.php");
		exit();
	}else{
		in("Login - OFF");
		echo '<br/>';
		echo '<div id="login">';
		echo '<form action="autentica.php" method="POST">';
		echo 'CPF: <input type="text" name="cpf"/><br/>';
		echo 'Senha: <input type="password" name="senha"/><br/>';
		echo '<input type="submit" value="Enviar"/>';
		echo '</form>';
		echo '<br/>';
		if(isset($_GET['r'])){
			$r = $_GET['r'];
			if($r==0){//cpf ou senha invalidos
				echo 'CPF ou senha inválidos.<br/>';
			}
		}
		echo '<a href="cadastroCliente.php"/>Cadastre-se aqui!</a><br/><br/>';
		echo '</div>';
	}
	out();
?>