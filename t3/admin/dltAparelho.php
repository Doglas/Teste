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
	echo '<form action="deletar.php" method="post">';
	echo 'Codigo:* <input type="text" value="'.@$_POST['codigoAp'].'" name="codigoAp"/> (Somente numeros)';//cpf
	echo '<input type="submit" value="Deletar"/><br/>';
	echo '*: Campos obrigatorios.';
	echo '</form>';

?>