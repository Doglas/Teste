<?php

	require_once dirname(__FILE__).'/bibliotecas/lib.php';
	
	$fp = fopen("arquivo.txt", "w+");
	fwrite($fp, "0");
	fclose($fp);
	
	cabecalho("VENCEDOR");
	
	echo '<div id="interface">';
	echo '<p class="corpo">';
	echo 'You win!<br/>';
	echo '</p>';
	echo '<p class="corpo">';
	echo '<img src="assets/trofeu.png" height="400" width="300" alt="Xis"/>';
	echo '</p>';
	echo '</div>';
	

	rodape();


?>