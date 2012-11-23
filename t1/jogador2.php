<?php
	require_once dirname(__FILE__).'/bibliotecas/lib.php';
	
	cabecalho("Velha");
	
	$tpJog2="tipo";
	if(isset($_GET['tipo'])){
		if($_GET['tipo'] == 'valorX'){
			$tpJog2= "valorO";
			$tp= "Você é bolinha";
		}else{
			$tpJog2= "valorX";
			$tp= "Você é xizinho";
		}
	}
	
	echo '<div id="cabeca">';
		echo '<p class="cabeca">';
		echo 'Jogo da véia';
		echo '</p>';
	echo '</div>';
	echo '<hr>';
	
	echo '<div id="interface">';//inicio do div - corpo
	echo '<form action="jogo.php" method="get">';
	echo '<p class="corpo">';
	echo 'Player: <input type="text" name="jogador2"/>';
	echo '<input type="submit" value="I'."'m ready!".'"/>';
	echo '<br/>';
	echo '<br/>';
	echo '<img src="assets/xizinho.png" height="50" width="50" alt="Xis"/>';
	if($tpJog2 == "valorO"){
		//echo '<input type="radio" name="valor" value="valorX"/>';
		echo '<input type="hidden" name="valor" value="valorO"/>';
		echo '<input type="radio" name"nada" disabled="disabled" value="valorX"/>';
		echo '<input type="radio" name"nada" disabled="disabled" checked="checked" value="valorO"/>';
	}else{
		echo '<input type="hidden" name="valor" value="valorX"/>';
		echo '<input type="radio" name="nada" disabled="disabled" value="valorX" checked="checked"/>';
		echo '<input type="radio" name="nada" disabled="disabled" value="valorO"/>';
	}
	echo '<img src="assets/bolinha.png" height="50" width="50" alt="Bola"/>';
	echo '</p>';
	echo '</form>';
	echo '<p class="corpo">';
	echo '<img src="assets/tabuleiro.png" height="300" width="300" alt="Tabuleiro vazio"/>';
	echo '</p>';
	echo '</div>';//fim do div - corpo
	
	rodape();
?>