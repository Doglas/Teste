<?php

	echo '<form action="verifica.php" method="POST">';
	echo 'Resolucao:* <input type="text" name="resolucao"/> (Somente numeros)<br/>';
	echo 'Traseira: <input type="text" name="traseira"/>px (Ex: 9.3)<br/>';
	echo 'Frontal: <input type="text" name="frontal"/>px (Ex: 2.1)<br/>';
	echo 'Flash: <input type="radio" name="flash" value="true"/>Sim Nao<input type="radio" name="flash" value="false" checked="checked"/><br/>';
	echo '<input type="submit" value="Enviar"/><br/>';
	echo '*: Campos obrigatorios.';
	echo '</form>';

?>