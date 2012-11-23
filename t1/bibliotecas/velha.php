<?php
	
	function desenhaVelha(){
		$fp = fopen("velha.txt", "w+");
	}
	function testaVenceu($vet){
		if(testaLinhaUm($vet)){//testa se a primeira linha deu velha
			return 1;
		}else if(testaLinhaDois($vet)){//testa se a segunda linha deu velha
			return 1;
		}else if(testaLinhaTres($vet)){//testa se a terceira linha deu velha
			return 1;
		}else if(testaColunaUm($vet)){
			return 1;
		}else if(testaColunaDois($vet)){
			return 1;
		}else if(testaColunaTres($vet)){
			return 1;
		}else if(testaDiagonalPrincipal($vet)){
			return 1;
		}else if(testaDiagonalSecundaria($vet)){
			return 1;
		}
	}
	function testaLinhaUm($vet){
		if($vet[0][0] == 0 && $vet[0][1] == 0 && $vet[0][2] == 0){//primeira linha
			return 1;
		}else if($vet[0][0] == 1 && $vet[0][1] == 1 && $vet[0][2] == 1){
			return 1;
		}else{
			return 0;
		}
	}
	function testaLinhaDois($vet){
		if($vet[1][0] == 0 && $vet[1][1] == 0 && $vet[1][2] == 0){//segunda linha
			return 1;
		}else if($vet[1][0] == 1 && $vet[1][1] == 1 && $vet[1][2] == 1){
			return 1;
		}else{
			return 0;
		}
	}
	function testaLinhaTres($vet){
		if($vet[2][0] == 0 && $vet[2][1] == 0 && $vet[2][2] == 0){//terceira linha
			return 1;
		}else if($vet[2][0] == 1 && $vet[2][1] == 1 && $vet[2][2] == 1){
			return 1;
		}else{
			return 0;
		}
	}
	function testaColunaUm($vet){
		if($vet[0][0] == 0 && $vet[1][0] == 0 && $vet[2][0] == 0){//primeira coluna
			return 1;
		}else if($vet[0][0] == 1 && $vet[1][0] == 1 && $vet[2][0] == 1){
			return 1;
		}else{
			return 0;
		}
	}
	function testaColunaDois($vet){
		if($vet[0][1] == 0 && $vet[1][1] == 0 && $vet[2][1] == 0){//segunda coluna
			return 1;
		}else if($vet[0][1] == 1 && $vet[1][1] == 1 && $vet[2][1] == 1){
			return 1;
		}else{
			return 0;
		}
	}
	function testaColunaTres($vet){
		if($vet[0][2] == 0 && $vet[1][2] == 0 && $vet[2][2] == 0){//terceira coluna
			return 1;
		}else if($vet[0][2] == 1 && $vet[1][2] == 1 && $vet[2][2] == 1){
			return 1;
		}else{
			return 0;
		}
	}
	function testaDiagonalPrincipal($vet){
	if($vet[0][0] == 0 && $vet[1][1] == 0 && $vet[2][2] == 0){//diagonal principal
			return 1;
		}else if($vet[0][0] == 1 && $vet[1][1] == 1 && $vet[2][2] == 1){
			return 1;
		}else{
			return 0;
		}
	}
	function testaDiagonalSecundaria($vet){
		if($vet[0][2] == 0 && $vet[1][1] == 0 && $vet[2][0] == 0){//diagonal secundaria
			return 1;
		}else if($vet[0][2] == 1 && $vet[1][1] == 1 && $vet[2][0] == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
?>