<?php
	require_once dirname(__FILE__).'/library/lib.php';

	echo '<form action="verifica.php" method="post">';
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
	
	echo 'Quantidade:* <input type="text" name="quantidade"/>';
	echo 'Modelo:* <input type="text" name="modelo"/><br/>';
	echo 'Display:* <input type="text" name="display"/>';
	echo 'Preco Unitario:* <input type="text" name="preco_unitario"/><br/>';
	echo 'Dimensao:* <input type="text" name="dimensao"/>';
	echo 'Peso:* <input type="text" name="peso"/><br/><hr/>';
	echo 'Radio:* <input type="text" name="radio"/><br/>';
	echo 'Viva-Voz:* <input type="text" name="viva_voz"/><br/>';
	echo 'Wi-Fi:* <input type="text" name="wi_fi"/><br/><hr/>';
	echo 'Multichip:* <input type="text" name="multichip"/><br/>';
	echo 'bluetooth:* <input type="text" name="bluetooth"/><br/>';
	echo 'Memoria Interna:* <input type="text" name="mem_interna"/><br/>';
	echo 'Memoria Externa:* <input type="text" name="mem_externa"/><br/>';
	echo 'MP3:* <input type="text" name="mp3"/><br/>';
	echo 'Idioma1:* <input type="text" name="idioma1"/><br/>';
	echo 'Idioma2: <input type="text" name="idioma2"/><br/>';
	echo 'Sistema Operacional:* <input type="text" name="sistema_operacional"/><br/>';
	echo 'Bateria: <input type="text" name="bateria"/><br/>';
	echo 'Processador: <input type="text" name="preocessador"/>';
	echo '<input type="submit" value="Enviar"/><br/>';
	echo '*: Campos obrigatorios.';
	echo '</form>';

?>