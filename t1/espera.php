<?php
	require_once dirname(__FILE__).'/bibliotecas/lib.php';
	
	$link = 'nada';
	if(isset($_GET['end'])){
		$link = $_GET['end'];
	}
	echo '<!doctype html>';
		echo '<html>';
			echo '<head>';
				echo '<link rel="stylesheet" type="text/css" href="init.css"/>';
				echo '<meta http-equiv="content-type" content="text/html"; charset=UTF-8"/>';
				echo '<meta http-equiv="refresh" content="30;url=jogo.php"/>';
				echo "<title>Velha</title>";
			echo '</head>';
			echo '<body>';
	echo '<div id="cabeca">';
		echo '<p class="cabeca">';
		echo 'Jogo da véia';
		echo '</p>';
	echo '</div>';
	echo '<hr>';
	
	echo '<div id="interface">';//inicio do div - corpo
	echo '<p class="corpo">';
	echo '<img src="assets/tabuleiro.png" height="300" width="300" alt="Tabuleiro vazio"/>';
	echo '<br/>';
	echo '<input type="text" value="'.$link.'"/>';
	echo '</p>';
	echo '</div>';//fim do div - corpo
	
	rodape();
?>