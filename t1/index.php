<?php
	require_once dirname(__FILE__).'/bibliotecas/lib.php';
	
	cabecalho("Velha");
	

	echo '<div id="cabeca">';
		echo '<p class="cabeca">';
		echo 'Jogo da véia';
		echo '</p>';
	echo '</div>';
	echo '<hr>';
	
	echo '<div id="interface">';//inicio do div - corpo
	echo '<form action="jogo.php" method="get">';
	echo '<p class="corpo">';
	echo 'Player: <input type="text" name="jogador1"/>';
	echo '<input type="submit" value="I'."'m ready!".'"/>';
	echo '<br/>';
	echo '<br/>';
	echo '<img src="assets/xizinho.png" height="50" width="50" alt="Xis"/>';
	echo '<input type="radio" name="valor" value="valorX" checked="checked"/>';
	echo '<input type="radio" name="valor" value="valorO"/>';
	echo '<img src="assets/bolinha.png" height="50" width="50" alt="Bola"/>';
	echo '</p>';
	echo '</form>';
	echo '<p class="corpo">';
	echo 'Os jogadores terão que estar prontos dentro de 20 segundos para iniciar a partida.<br/>';
	echo 'O jogo inicia automáticamente.<br/>';
	echo '</p>';
	echo '<p class="corpo">';
	echo '<img src="assets/tabuleiro.png" height="280" width="280" alt="Tabuleiro vazio"/>';
	echo '</p>';
	echo '</div>';//fim do div - corpo
	
	rodape();
?>