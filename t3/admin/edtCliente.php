<?php
	if(isset($_GET['r'])){
		if($_GET['r'] == 0){
			echo '<div class="erro">';
			echo 'Falta preencher os campos obrigatórios.<br/>';
			echo '</div>';
		}else if($_POST['r'] == 1){
			echo '<div class="acerto">';
			echo 'Cadastrado com sucesso.';
			echo '</div>';
		}
	}
	echo '<form action="editar.php" method="post">';
	echo 'CPF:* <input type="text" value="'.@$_POST['cpf'].'" name="cpf"/> (Somente numeros) <input type="button" onClick="buscaCliente(this);" value="Buscar"/><br/>';//cpf
	echo 'Email:* <input type="text" value="'.@$_POST['email'].'" name="email"/><br/>';//email
	echo 'Nome:* <input type="text" value="'.@$_POST['nome'].'" name="nome"/>';//nome
	echo 'Sobrenome:* <input type="text" value="'.@$_POST['sobrenome'].'" name="sobrenome"/><br/>';//sobrenome
	echo 'Senha:* <input type="password" name="senha"/>';//senha
	echo 'Conf. Senha:* <input type="password" name="confSenha"/><br/><hr/>';//conf senha
	echo 'Masculino:<input type="radio" checked="checked" value="M" name="sexo"/>';//masculino
	echo '<input type="radio" value="F" name="sexo"/>:Femenino<br/>';//feminino
	echo 'Data de nascimento: <input type="text" name="data_nascimento"/>(Ex: AAAA-MM-DD)<br/>';//data nascimento
	echo 'Telefone Fixo:* <input type="text" value="'.@$_POST['tel_fixo'].'" name="tel_fixo"/> (Somente numeros)<br/>';//tel_fixo
	echo 'Telefone Celular: <input type="text" name="tel_celular"/> (Somente numeros)<br/><hr/>';
	echo 'Endereco:<br/>';
	echo 'Rua:* <input type="text" value="'.@$_POST['rua'].'" name="rua"/>';
	echo 'Numero:* <input type="text" value="'.@$_POST['numero'].'" name="numero"/><br/>';
	echo 'Bairro:* <input type="text" value="'.@$_POST['bairro'].'" name="bairro"/><br/>';
	echo 'Cidade:* <input type="text" value="'.@$_POST['cidade'].'" name="cidade"/><br/>';
	echo 'Estado:* <input type="text" value="'.@$_POST['estado'].'" name="estado"/><br/>';
	echo 'Pais:* <input type="text" value="'.@$_POST['pais'].'" name="pais"/><br/>';
	echo '<input type="submit" name="editar" value="Editar"/><br/>';
	echo '*: Campos obrigatorios.';
	echo '</form>';

?>