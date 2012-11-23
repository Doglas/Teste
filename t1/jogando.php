<?php
	require_once dirname(__FILE__).'/bibliotecas/velha.php';
	
	$jog1= 2;
	$jog2= 2;
	
	if(isset($_GET['val'])){
		if($_GET['val'] == 'valorO'){
			$jog = fopen("jog.txt", "w+");
			fwrite($jog, "0");//define a vez do jogador
			fclose($jog);
			$jog = fopen("tipo1.txt", "w+");//define o tipo do jogador
			fwrite($jog, "0");
			fclose($jog);
		}else if($_GET['val'] == 'valorX'){
			$jog = fopen("jog.txt", "w+");
			fwrite($jog, "0");
			fclose($jog);
			$jog = fopen("tipo1.txt", "w+");
			fwrite($jog, "1");
			fclose($jog);
		}else{
			echo 'falha jogando.php';
		}
	}
	$fp = fopen("velha.txt", "r");//abre o arquivo sу para leitura
	
	$matriz= Array();
	$linhas = fread($fp, 4096);//linhas = todo o arquivo
	//recebe o valor na posiзгo do arquivo
	$linhas = trim($linhas);//trim retira os espaзos em branco no inicio e no final

	$linha4 = explode(":", $linhas);//passa para linha4 cada linha da matriz 3x3
	
	$linha1 = $linha4[0];//linha 1 recebe primeira linha
	$linha2 = $linha4[1];//linha 2 recebe segunda linha
	$linha3 = $linha4[2];//linha 3 recebe terceira linha
	
	$linha1 = explode("|", $linha1);
	$linha2 = explode("|", $linha2);
	$linha3 = explode("|", $linha3);
	//coloca a velha numa matriz
	$matriz[0][0]=$linha1[0];
	$matriz[0][1]=$linha1[1];
	$matriz[0][2]=$linha1[2];
	
	$matriz[1][0]=$linha2[0];
	$matriz[1][1]=$linha2[1];
	$matriz[1][2]=$linha2[2];
	
	$matriz[2][0]=$linha3[0];
	$matriz[2][1]=$linha3[1];
	$matriz[2][2]=$linha3[2];
	//testar se o jogo ja acabou
	
	$v1=testaVenceu($matriz);
	
	//ler arquivo e identificar jogador
	$jog = fopen("jog.txt", "r");
	$atual = fread($jog, 4096);
	$atual = trim($atual);
	
	if($v1){
		//redireciona
		$arq = fopen("arquivo.txt", "w+");
		fwrite($arq, "1");
		fclose($arq);
		header("Location: layout.php?p=".$atual);
	}else{	
		//jogador atual faz jogada
		header("Location: layout.php");
	}

?>