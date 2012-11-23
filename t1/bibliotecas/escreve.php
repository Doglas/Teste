<?php
	
	function sv_player1($NOME, $TIPO, $PRONTO){
		$player1=$NOME;//username
		$tipo1=$TIPO;// x or o
		$pronto=$PRONTO;//yes or no
		$fp = fopen("dado1.txt", "w+");
		fwrite($fp, "player1 ".$player1."\r\ntipo1 ".$tipo1."\r\nready ".$pronto."\r\n");
		fclose($fp);
	}
	function sv_player2($NOME, $TIPO, $PRONTO){
		$player2=$NOME;//username
		$tipo2=$TIPO;// x or o
		$pronto=$PRONTO;//yes or no
		$fp = fopen("dado2.txt", "w+");
		fwrite($fp, "player2 ".$player2."\r\ntipo2 ".$tipo2."\r\nready ".$pronto."\r\n");
		fclose($fp);
	}
	function estaPronto($nome){
		$arq = fopen($nome.'.txt', "r");//abre arquivo i para leitura do jogador se está pronto.
			for($a=0; (!feof($arq)); $a++){
				$buffer = fgets($arq, 4096);
				$linhas[$a] = $buffer;
			}
			fclose($arq);
			$tam= count($linhas);
			$palavras = array();
			for($a=0; $a<$tam; $a++){
				$str = $linhas[$a];
				$palavras = explode(" ", $str);
				if($palavras[0] == 'ready'){
					$pronto = $palavras[1];
					$xd= chop($pronto);
					echo '<br/><br/><br/>O jogador está pronto'.$xd.'!!!!!!<br/><br/><br/><br/><br/><br/>';
				}
			}
			if($xd == '1'){	//if para verificar se existe jogador
				echo 'TAMO TUDO PRONTO  !!!!!!<br/><br/><br/><br/><br/><br/>';
				return true;
			}else{
				echo 'Nao temo pronto    !!!!!!<br/><br/><br/><br/><br/><br/>';
				return false;
			}
	}
?>