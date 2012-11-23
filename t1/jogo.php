<?php
	require_once dirname(__FILE__).'/bibliotecas/lib.php';
	require_once dirname(__FILE__).'/bibliotecas/escreve.php';
	cabecalho('Jogo');
	$player1= "Abc";
	$tpPlayer1= "tipo";
	$player2= "Def";
	$tpPlayer2= "tipo";
	$p1=false;
	$p2=false;
	
	if(isset($_GET['jogador1'])){
		$player1=$_GET['jogador1'];//player1= nome do jogador
		$tpPlayer1=$_GET['valor'];//define se o jogador 1 é X ou O
		sv_player1($player1, $tpPlayer1, true);
		$dado = "dado2.txt";
		unlink($dado);
		$end = dirname(__FILE__).'/jogador2.php?tipo='.$tpPlayer1;
		header("Location: espera.php?end=".$end);
		//redireciona para uma pagina de espera com o link par ao jogador 2
	}
	if(isset($_GET['jogador2'])){
		$player2=$_GET['jogador2'];//player2= nome do jogador
		$tpPlayer2=$_GET['valor'];//define se o jogador 2 é X ou O
		sv_player2($player2, $tpPlayer2, true);
	}
	
	$p1 = estaPronto("dado1");
	$p2 = estaPronto("dado2");
	//if para iniciar o jogo se os dois jogadores existem
	if($p1 && $p2){//inicia o jogo
		//redireciona para o inicio do jogo
		unlink("velha.txt");
		$fp = fopen("velha.txt", "w+");
		fwrite($fp, "9|9|9|:9|9|9|:9|9|9|:");
		fclose($fp);
		$fp = fopen("dado1.txt", "r");
		$linhas = fread($fp, 4096);
		$plv = explode(" ", $linhas);//plv = segunda linha do arquivo
		$asd = substr($plv[2], 0, 6);
		$init = fopen("arquivo.txt", "w+");
		fwrite($init, "1");
		fclose($init);
		header("Location: jogando.php?val=".$asd);
	}
	rodape();
?>