<?php


	function desenhaTabuleiro(){
		$fp = fopen("velha.txt", "r");
		
		$linhas = fread($fp, 4096);//linhas = todo o arquivo
		//recebe o valor na posição do arquivo
		$linhas = trim($linhas);//trim retira os espaços em branco no inicio e no final

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
		
		for($a=0; $a<3; $a++){
			for($b=0; $b<3; $b++){
				if($matriz[$a][$b] == 1){
					echo '<div id="pos'.$a.'-'.$b.'">';
					echo '<img src="assets/xizinho.png" height="100" width="100" alt="Xis">';
					echo '</div>';
				}else if($matriz[$a][$b] == 0){
					echo '<div id="pos'.$a.'-'.$b.'">';
					echo '<img src="assets/bolinha.png" height="100" width="100" alt="Bolinha">';
					echo '</div>';
				}
			}
		}
	}
?>