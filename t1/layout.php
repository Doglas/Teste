<?php
	require_once dirname(__FILE__).'/bibliotecas/lib.php';
	require_once dirname(__FILE__).'/bibliotecas/desenha.php';
	
	$fp = fopen("arquivo.txt", "r");
	$arquivo = fread($fp, 4096);
	fclose($fp);

	if(isset($_GET['p']) && $arquivo == 1){//só entrara nas condições após tiver um ganhador
		$perde = $_GET['p'];
		$tp = fopen("tipo1.txt", "r");
		$tipoJogador1 = trim(fread($tp));//tipo1 recebe o tipo do jogador 1
		
		if($tipoJogador1 == 1){
			$tipoJogador2 = 0;
		}else{
			$tipoJogador2 = 1;
		}
		if($perde == $tipoJogador2){
			header("Location: venceu.php?var=xizinho");
		}else{
			header("Location: venceu.php?var=bolinha");
		}
	}else if($arquivo == 0){
		header("Location: perdeu.php");
	}
	
	$jog = fopen("jog.txt", "r");
	$atual = fread($jog, 4096);
	$atual = trim($atual);
	
	$tipo1=99;
	$tipo2=99;
	
	$vez = $atual;
	$fp = fopen("tipo1.txt", "r");
	$tipo1= trim(fread($fp, 4096));//tipo1 recebe o tipo do jogador 1
	if($tipo1 == 1){
		$tipo2=0;
	}else{
		$tipo2=1;
	}

	echo '<!doctype html>';
		echo '<html>';
			echo '<head>';
				echo '<link rel="stylesheet" type="text/css" href="init.css"/>';
				echo '<meta http-equiv="content-type" content="text/html"; charset=UTF-8"/>';
				echo '<meta http-equiv="refresh" content="3;url=layout.php"/>';
				echo "<title>Jogando</title>";
			echo '</head>';
			echo '<body>';
			
			echo '<p classe="corpo">';
			echo 'A pagina do jogo é atualizada a cada 3 segundos...<br/><br/>';
			echo 'É a vez do jogador: ';
			if($vez == 1){
				if($tipo1 == 1){
					echo 'Xizinho<br/><br/>';
				}else{
					echo 'Bolinha<br/><br/>';
				}
			}else{
				if($tipo1 == 0){
					echo 'Xizinho<br/><br/>';
				}else{
					echo 'Bolinha<br/><br/>';
				}
			}
			echo 'Respeite sua vez!!!<br/>';
			echo '</p>';
	if($vez==1){//jogador 1 que joga
		echo '<div id="jogo">';	
		echo '<img src="assets/tabuleiro.png" height="350" width="350" alt="Tabuleiro" usemap="#velha">';
		
		desenhaTabuleiro();
		echo '<map name="velha">';
			echo '<area shape="rect" coords="0,0,100,100" href="coordenada.php?coord=0&tipo='.$tipo1.'" alt="posicao00">';
			echo '<area shape="rect" coords="120,0,220,100" href="coordenada.php?coord=1&tipo='.$tipo1.'" alt="posicao01">';
			echo '<area shape="rect" coords="240,0,340,100" href="coordenada.php?coord=2&tipo='.$tipo1.'" alt="posicao02">';
			
			echo '<area shape="rect" coords="0,120,100,220" href="coordenada.php?coord=10&tipo='.$tipo1.'" alt="posicao10">';
			echo '<area shape="rect" coords="120,120,220,220" href="coordenada.php?coord=11&tipo='.$tipo1.'" alt="posicao11">';
			echo '<area shape="rect" coords="240,120,340,220" href="coordenada.php?coord=12&tipo='.$tipo1.'" alt="posicao12">';
			
			echo '<area shape="rect" coords="0,240,100,340" href="coordenada.php?coord=20&tipo='.$tipo1.'" alt="posicao20">';
			echo '<area shape="rect" coords="120,240,220,340" href="coordenada.php?coord=21&tipo='.$tipo1.'" alt="posicao21">';
			echo '<area shape="rect" coords="240,240,340,340" href="coordenada.php?coord=22&tipo='.$tipo1.'" alt="posicao22">';
		echo '</map>';
		echo '</div>';
		
	}else if($vez==0){//se for jogador 2	
		echo '<div id="jogo">';	
		echo '<img src="assets/tabuleiro.png" height="350" width="350" alt="Tabuleiro" usemap="#velha">';
		
		desenhaTabuleiro();
		echo '<map name="velha">';
			echo '<area shape="rect" coords="0,0,100,100" href="coordenada.php?coord=0&tipo='.$tipo2.'" alt="posicao00">';
			echo '<area shape="rect" coords="120,0,220,100" href="coordenada.php?coord=1&tipo='.$tipo2.'" alt="posicao01">';
			echo '<area shape="rect" coords="240,0,340,100" href="coordenada.php?coord=02&tipo='.$tipo2.'" alt="posicao02">';
			
			echo '<area shape="rect" coords="0,120,100,220" href="coordenada.php?coord=10&tipo='.$tipo2.'" alt="posicao10">';
			echo '<area shape="rect" coords="120,120,220,220" href="coordenada.php?coord=11&tipo='.$tipo2.'" alt="posicao11">';
			echo '<area shape="rect" coords="240,120,340,220" href="coordenada.php?coord=12&tipo='.$tipo2.'" alt="posicao12">';
			
			echo '<area shape="rect" coords="0,240,100,340" href="coordenada.php?coord=20&tipo='.$tipo2.'" alt="posicao20">';
			echo '<area shape="rect" coords="120,240,220,340" href="coordenada.php?coord=21&tipo='.$tipo2.'" alt="posicao21">';
			echo '<area shape="rect" coords="240,240,340,340" href="coordenada.php?coord=22&tipo='.$tipo2.'" alt="posicao22">';
		echo '</map>';
		echo '</div>';
	}
?>