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
	echo 'CNPJ:* <input type="text" value="'.@$_POST['cnpj'].'" name="cnpj"/> (Somente numeros) <input type="button" onClick="buscaFabricante(this);" value="Buscar"/><br/>';
	echo 'Nome da empresa:* <input type="text" value="'.@$_POST['nome'].'" name="nome"/><br/>';//nome
	echo 'Endereco:<br/>';
	echo 'Rua:* <input type="text" value="'.@$_POST['rua'].'" name="rua"/>';
	echo 'Numero:* <input type="text" value="'.@$_POST['numero'].'" name="numero"/><br/>';
	echo 'Bairro:* <input type="text" value="'.@$_POST['bairro'].'" name="bairro"/><br/>';
	echo 'Cidade:* <input type="text" value="'.@$_POST['cidade'].'" name="cidade"/><br/>';
	echo 'Estado:* <input type="text" value="'.@$_POST['estado'].'" name="estado"/><br/>';
	echo 'Pais:* <input type="text" value="'.@$_POST['pais'].'" name="pais"/><br/>';
	echo '<input type="submit" value="Enviar"/><br/>';
	echo '*: Campos obrigatorios.';
	echo '</form>';

	
?>