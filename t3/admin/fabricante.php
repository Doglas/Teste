<?php
	if(isset($_GET['r'])){
		if($_GET['r']==0){
			echo '<div class="erro">';
			echo 'Falta preencher os campos obrigatorios.<br/>';
			echo '</div>';
		}else if($_GET['r'] == 1){
			echo '<div class="acerto">';
			echo 'Cadastrado com sucesso.';
			echo '</div>';
		}
	}
	//echo '<div id="dados">';
	echo '<form action="verifica.php" method="post">';
	echo 'CNPJ:* <input type="text" name="cnpj"/> (Somente numeros)<br/>';//cpf
	echo 'Nome da empresa:* <input type="text" name="nome"/><br/>';//nome
	echo 'Endereco:<br/>';
	echo 'Rua:* <input type="text" name="rua"/>';
	echo 'Numero:* <input type="text" name="numero"/><br/>';
	echo 'Bairro:* <input type="text" name="bairro"/><br/>';
	echo 'Cidade:* <input type="text" name="cidade"/><br/>';
	echo 'Estado:* <input type="text" name="estado"/><br/>';
	echo 'Pais:* <input type="text" name="pais"/><br/>';
	echo '<input type="submit" value="Enviar"/><br/>';
	echo '*: Campos obrigatorios.';
	echo '</form>';
?>