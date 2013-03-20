<?php

	echo '<form action="verifica.php" method="POST">';
	echo 'Codigo:* <input type="text" value="'.@$_POST['codigo'].'" name="codigoCam"/> (Somente numeros)<input type="button" onClick="buscaCamera(this);" value="Buscar"/><br/>';
	echo 'Resolucao:* <input type="text" value="'.@$_POST['resolucao'].'" name="resolucao"/> (Somente numeros)<br/>';
	echo 'Traseira: <input type="text" value="'.@$_POST['cam_traseira'].'" name="traseira"/>px (Ex: 9.3)<br/>';
	echo 'Frontal: <input type="text" value="'.@$_POST['cam_frontal'].'" name="frontal"/>px (Ex: 2.1)<br/>';
	echo 'Flash: <input type="radio" name="flash" value="true"/>Sim Nao<input type="radio" name="flash" value="false" checked="checked"/><br/>';
	echo '<input type="submit" value="Enviar"/><br/>';
	echo '*: Campos obrigatorios.';
	echo '</form>';

?>