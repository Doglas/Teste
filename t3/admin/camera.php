<?php

	echo '<!DOCTYPE html>';
	echo '<html>';
	echo '	<head>';
	echo '		<link rel="stylesheet" type="text/css" href="app.css"/>';
	echo '		<link rel="shortcut icon" href="image/favicon.ico"/>';
	echo '		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-15">';
	echo '		<title>ADMIN</title>';//alterar para passar o nome da pagina
	echo '	</head>';
	echo '	<body>';
	echo '<div id="dados">';
	if(isset($_GET['r'])){
		if($_GET['r']==0){
			echo '<div id="erro">';
			echo 'Falta preencher os campos obrigatorios.<br/>';
			echo '</div>';
		}else if($_GET['r'] == 1){
			echo '<div id="acerto">';
			echo 'Cadastrado com sucesso.';
			echo '</div>';
		}
	}
	//echo '<div id="dados">';
	echo '<form action="/../verifica.php" method="post">';
	echo 'Resolução:* <input type="text" name="resolucao"/> (Ex: 12.4)<br/>';
	echo 'Camera traseira: <input type="text" name="cam_traseira"/> (Ex: 3.1)<br/>';
	echo 'Camera frontral: <input type="text" name="cam_frontral"/> (Ex: 2.1)<br/>';
	echo 'Flash: Sim<input type="radio" value="true" name="flash"/> <input type="radio" value="false" name="flash"/>Não<br/>';
	echo '<input type="submit" value="Enviar"/><br/>';
	echo '*: Campos obrigatorios.';
	echo '</form>';
	echo '</div>';
	
	
	
	
	

	echo '	</body>';
	echo '</html>';
?>