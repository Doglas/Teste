<?php
	require_once dirname(__FILE__).'/library/lib.php';
	@session_start();
		
	in("Cadastro de cliente");
	
	echo '<div id="cliente">';
	if(isset($_GET['r'])){
		if($_GET['r']==0){
			echo '<div class="erro">';
			echo 'Falta preencher os campos obrigatórios.<br/>';
			echo '</div>';
		}else if($_GET['r'] == 1){
			echo '<div class="acerto">';
			echo 'Cadastrado com sucesso.';
			echo '</div>';
		}
	}
	echo '<form action="verifica.php" method="post">';
	echo 'CPF:* <input type="text" name="cpf"/> (Somente números)<br/>';//cpf
	echo 'Email:* <input type="text" name="email"/><br/>';//email
	echo 'Nome:* <input type="text" name="nome"/>';//nome
	echo 'Sobrenome:* <input type="text" name="sobrenome"/><br/>';//sobrenome
	echo 'Senha:* <input type="password" name="senha"/>';//senha
	echo 'Conf. Senha:* <input type="password" name="confSenha"/><br/><hr/>';//conf senha
	echo 'Masculino:<input type="radio" value="M" name="sexo"/>';//masculino
	echo '<input type="radio" value="F" name="sexo"/>:Femenino<br/>';//feminino
	echo 'Data de nascimento: <input type="text" name="data_nascimento"/>(Ex: AAAA-MM-DD)<br/>';//data nascimento
	echo 'Telefone Fixo:* <input type="text" name="tel_fixo"/> (Somente números)';//tel_fixo
	echo 'Telefone Celular: <input type="text" name="tel_celular"/> (Somente números)<br/><hr/>';
	echo 'Endereço:<br/>';
	echo 'Rua:* <input type="text" name="rua"/>';
	echo 'Número:* <input type="text" name="numero"/><br/>';
	echo 'Bairro:* <input type="text" name="bairro"/><br/>';
	echo 'Cidade:* <input type="text" name="cidade"/><br/>';
	echo 'Estado:* <input type="text" name="estado"/><br/>';
	echo 'Pais:* <input type="text" name="pais"/><br/>';
	echo '<input type="submit" value="Enviar"/><br/>';
	echo '*: Campos obrigatórios.';
	echo '</form>';
	echo '</div>';

	
	out();
	
?>