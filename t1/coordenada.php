<?php

	$tp=99;
	if(isset($_GET['coord'])){
		$crd = $_GET['coord'];
		echo 'Coordenada selecionada ------>'.$crd.'<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<br/>';
	}
	if(isset($_GET['tipo'])){
		$tp=$_GET['tipo'];
	}else{
		echo '<br/>TIpo indefinido';
	}
	$fp = fopen("velha.txt", "r");//abre o arquivo só para leitura
	$linhas = fread($fp, 4096);//linhas = todo o arquivo
	$linhas = trim($linhas);//trim retira os espaços em branco no inicio e no final
	
	echo 'Linhas antes de explode --->'.$linhas.'<br/>';
	
	$linha4 = explode(":", $linhas);//passa para linha4 cada linha da matriz 3x3

	$linha1 = $linha4[0];//linha 1 recebe primeira linha
	$linha2 = $linha4[1];//linha 2 recebe segunda linha
	$linha3 = $linha4[2];//linha 3 recebe terceira linha
	
	$linha1 = explode("|", $linha1);
	$linha2 = explode("|", $linha2);
	$linha3 = explode("|", $linha3);
	fclose($fp);
	//abre o arquivo para leitura e salva nas linhas
	
	//re abre o arquivo para sobre escrita w+
	$fp = fopen("velha.txt", "w+");
	
	echo 'Linha 1 [0] ->>>>'.$linha1[0].'<br/>';
	echo 'Linha 1 [1] ->>>>'.$linha1[1].'<br/>';
	echo 'Linha 1 [2] ->>>>'.$linha1[2].'<br/>';
	
	echo 'Linha 2 [0] ->>>>'.$linha2[0].'<br/>';
	echo 'Linha 2 [1] ->>>>'.$linha2[1].'<br/>';
	echo 'Linha 2 [2] ->>>>'.$linha2[2].'<br/>';
	
	echo 'Linha 3 [0] ->>>>'.$linha3[0].'<br/>';
	echo 'Linha 3 [1] ->>>>'.$linha3[1].'<br/>';
	echo 'Linha 3 [2] ->>>>'.$linha3[2].'<br/>';
	
	//daqui 000
	//ler arquivo e identificar jogador
	$jog = fopen("jog.txt", "r");
	$atual = fread($jog, 4096);
	$atual = trim($atual);
	fclose($jog);
	
	$jog = fopen("jog.txt", "w+");
	if($atual == 1){
		fwrite($jog, "0");
	}else if($atual == 0){
		fwrite($jog, "1");
	}else{
		echo 'nao foi possivel identificar jogador';
	}
	fclose($jog);
	//até aqui 000 troca jogador atual
	
	if($crd == 0){
		fwrite($fp, $tp.'|'.$linha1[1].'|'.$linha1[2].'|:'.$linha2[0].'|'.$linha2[1].'|'.$linha2[2].'|:'.$linha3[0].'|'.$linha3[1].'|'.$linha3[2].'|:');
	}else if($crd == 1){
		fwrite($fp, $linha1[0].'|'.$tp.'|'.$linha1[2].'|:'.$linha2[0].'|'.$linha2[1].'|'.$linha2[2].'|:'.$linha3[0].'|'.$linha3[1].'|'.$linha3[2].'|:');	
	}else if($crd == 2){
		fwrite($fp, $linha1[0].'|'.$linha1[1].'|'.$tp.'|:'.$linha2[0].'|'.$linha2[1].'|'.$linha2[2].'|:'.$linha3[0].'|'.$linha3[1].'|'.$linha3[2].'|:');		
	}else if($crd == 10){
		fwrite($fp, $linha1[0].'|'.$linha1[1].'|'.$linha1[2].'|:'.$tp.'|'.$linha2[1].'|'.$linha2[2].'|:'.$linha3[0].'|'.$linha3[1].'|'.$linha3[2].'|:');	
	}else if($crd == 11){
		fwrite($fp, $linha1[0].'|'.$linha1[1].'|'.$linha1[2].'|:'.$linha2[0].'|'.$tp.'|'.$linha2[2].'|:'.$linha3[0].'|'.$linha3[1].'|'.$linha3[2].'|:');	
	}else if($crd == 12){
		fwrite($fp, $linha1[0].'|'.$linha1[1].'|'.$linha1[2].'|:'.$linha2[0].'|'.$linha2[1].'|'.$tp.'|:'.$linha3[0].'|'.$linha3[1].'|'.$linha3[2].'|:');	
	}else if($crd == 20){
		fwrite($fp, $linha1[0].'|'.$linha1[1].'|'.$linha1[2].'|:'.$linha2[0].'|'.$linha2[1].'|'.$linha2[2].'|:'.$tp.'|'.$linha3[1].'|'.$linha3[2].'|:');	
	}else if($crd == 21){
		fwrite($fp, $linha1[0].'|'.$linha1[1].'|'.$linha1[2].'|:'.$linha2[0].'|'.$linha2[1].'|'.$linha2[2].'|:'.$linha3[0].'|'.$tp.'|'.$linha3[2].'|:');	
	}else if($crd == 22){
		fwrite($fp, $linha1[0].'|'.$linha1[1].'|'.$linha1[2].'|:'.$linha2[0].'|'.$linha2[1].'|'.$linha2[2].'|:'.$linha3[0].'|'.$linha3[1].'|'.$tp.'|:');	
	}
	header("Location: jogando.php");

?>