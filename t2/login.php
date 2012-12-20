<?php
	require_once dirname(__FILE__).'/library/lib.php';
	session_start();
	
	in("Login");
	echo '<div id="login">';
	echo '<p class="sideLeft"><img src="images/imgLogo.png" alt="Rosto com fone de ouvido" height="50" width="50">Programming Work II</p>';
	echo '<form action="index.php" method="post">';//form para login
	echo '<input type="text" placeholder="Login:" value="'.@$_COOKIE['login'].'" name="login"/>';
	echo '<input type="password" placeholder="Password:" name="password"/>';
	echo '<input class="btnLogin" type="image" title="Login" src="images/btnLogin.png" alt="Login" name="btnLogin"/>';
	echo '</form>';
	
	echo '<div class="error">';
	if(isset($_GET['r'])){
		if($_GET['r'] == 0){//usuario ja existente
			echo '<p>';
			echo 'User already exists.<br/>';
			echo '</p>';
		}
		if($_GET['r'] == 1){//nome do usuario muito pequeno ou muito grande
			echo '<p>';
			echo 'Incorrect name.<br/>';
			echo '</p>';
		}else if($_GET['r'] == 2){//erro ao validar email, são diferentes ou invalidos
			echo '<p>';
			echo 'Error when validating email.<br/>';
			echo '</p>';
		}else if($_GET['r'] == 3){//erro ao validar senha, são diferentes ou muito curta/extensa
			echo '<p>';
			echo 'Error when validating password.<br/>';
			echo '</p>';
		}else if($_GET['r'] == 4){//sucesso ao cadastrar usuario
			echo '<p>';
			echo 'Successfully register.<br/>';
			echo '</p>';
		}else if($_GET['r'] == 5){//falha ao cadastrar usuario - erro de banco
			echo '<p>';
			echo 'Failure to register.<br/>';
			echo '</p>';
		}else if($_GET['r'] == 6){
			echo '<p>';
			echo 'Invalid user or password.<br/>';
			echo '</p>';
		}
	}
	echo '</div>';
	
	//fazer div para registro
	echo '<div class="relatived">';//inicio div registro
	echo '<div id="register">';
	echo 'Register:';
	echo '<form action="valida.php" method="post">';//form para cadastro
	echo '<input placeholder="Login:" size="40" type="text" name="login"/><br/>';
	echo '<input type="text" size="40" placeholder="Name:" name="name"/><br/>';
	echo '<input type="email" size="40" placeholder="user@domain.com:" name="email"/><br/>';//rever pois IE não suporta
	echo '<input type="email" size="40" placeholder="Confirm your email address:" name="confEmail"/><br/>';//rever pois IE não suporta
	echo '<input type="password" size="40" placeholder="Password:" name="password"/><br/>';
	echo '<input type="password" size="40" placeholder="Confirm your password:" name="confPass"/><br/>';
	echo 'Gender: <input type="radio" value="m" checked="checked" name="gender"/>Male';
	echo '<input type="radio" value="f" name="gender"/>Female<br/>';
	echo '<input class="btnRegister" title="Register" type="image" src="images/btnRegister.png" name="btnRegister" alt="Register"/>';
	echo '</form>';
	echo '</div>';
	echo '<div class="miau">';
	echo '<br/><br/><img src="images/miau.gif" alt="Gato dançando"/>';
	echo '</div>';
	echo '</div>';//fim div registro
	echo '<br/><br/><br/><br/><br/><br/>';
	echo '</div>';
	out();
?>