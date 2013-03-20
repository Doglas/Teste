<?php
	require_once dirname(__FILE__).'/library/lib.php';
	
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
	
	echo 'Fabricante:<select name="fabricante">';
	$r=puxaFabricante();
	if(mysql_num_rows($r) > 0){
		while($l = mysql_fetch_assoc($r)){
			$cnpj = $l['cnpj'];
			echo "<option value='$cnpj'>$cnpj</option>";
		}
	}
	echo '</select>';
	
	echo 'Camera:<select name="camera">';
	$r=puxaCamera();
	if(mysql_num_rows($r) > 0){
		while($l = mysql_fetch_assoc($r)){
			$cod = $l['codigo'];
			echo "<option value='$cod'>$cod</option>";
		}
	}
	echo '</select><br/>';
	
	echo 'Codigo:* <input type="text" value="'.@$_POST['codigoAp'].'" name="codigoAp"/> (Somente numeros) <input type="button" onClick="buscaAparelho(this);" value="Buscar"/><br/>';
	echo 'Quantidade:* <input type="text" value="'.@$_POST['quantidade'].'" name="quantidade"/><br/>';
	echo 'Modelo:* <input type="text" value="'.@$_POST['modelo'].'" name="modelo"/><br/>';
	echo 'Display:* <input type="text" value="'.@$_POST['display'].'" name="display"/><br/>';
	echo 'Preco Unitario:* <input type="text" value="'.@$_POST['preco_unitario'].'" name="preco_unitario"/><br/>';
	echo 'Dimensao:* <input type="text" value="'.@$_POST['dimensao'].'" name="dimensao"/><br/>';
	echo 'Peso:* <input type="text" value="'.@$_POST['peso'].'" name="peso"/><br/>';
	echo 'Radio: <input type="radio" value="1" name="radio"/>Sim Nao<input type="radio" checked="checked" value="0" name="radio"/><br/>';
	echo 'Viva-Voz: <input type="radio" value="1" name="viva_voz"/>Sim Nao<input type="radio" checked="checked" value="0" name="viva_voz"/><br/>';
	echo 'Wi-Fi: <input type="radio" value="1" name="wi_fi"/>Sim Nao<input type="radio" checked="checked" value="0" name="wi_fi"/><br/>';
	echo 'Bluetooth: <input type="radio" value="1" name="bluetooth"/>Sim Nao<input type="radio" checked="checked" value="0" name="bluetooth"/><br/>';
	echo 'MP3: <input type="radio" value="1" name="mp3"/>Sim Nao<input type="radio" checked="checked" value="0" name="mp3"/><br/>';
	echo 'Multichip:* <input type="text" value="'.@$_POST['multichip'].'" name="multichip"/><br/>';
	echo 'Memoria Interna:* <input type="text" value="'.@$_POST['mem_interna'].'" name="mem_interna"/><br/>';
	echo 'Memoria Externa:* <input type="text" value="'.@$_POST['mem_externa'].'" name="mem_externa"/><br/>';
	echo 'Idioma 1:* <input type="text" value="'.@$_POST['idioma1'].'" name="idioma1"/><br/>';
	echo 'Idioma 2: <input type="text" value="'.@$_POST['idioma2'].'" name="idioma2"/><br/>';
	echo 'Sistema Operacional: <input type="text" value="'.@$_POST['sistema_operacional'].'" name="sistema_operacional"/><br/>';
	echo 'Bateria: <input type="text" value="'.@$_POST['bateria'].'" name="bateria"/><br/>';
	echo 'Processador: <input type="text" value="'.@$_POST['processador'].'" name="processador"/><br/>';
	
	echo '<input type="submit" name="editar" value="Editar"/><br/>';
	echo '*: Campos obrigatorios.';
	echo '</form>';

?>