<?php
	define("SAL", 'Trabalho de Programação II');

	require_once dirname(__FILE__).'/ab.php';//consulta no banco
	session_start();
		
	function in($title){//função do cabeçalho
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '	<head>';
		echo '		<link rel="stylesheet" type="text/css" href="library/style.css"/>';
		echo '		<link rel="stylesheet" type="text/css" href="library/ap.css"/>';
		echo '		<link rel="shortcut icon" href="image/favicon.ico"/>';
		//echo '		<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
		echo '		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-15">';
		echo '		<title>'.$title.'</title>';//alterar para passar o nome da pagina
		echo '	</head>';
		echo '	<body>';
		echo '<div id="logo">';
		echo '<img src="image/logoSilva.png" alt="Logo" widht="700" height="250"/>';
		echo '<div id="sair">';
		echo '<form action="logout.php" method="post">';
		echo '<input class="btn" title="Sair" type="image" src="image/sair.png" name="btnSair" alt="Sair"/>';
		echo '</form>';
		echo '</div>';
		echo '</div>';
//----------------------------------------------------------
		echo '<div id="menu">';//div menu
		echo '<div class="lado">';
		echo '<form action="index.php" method="POST">';
		echo '<input class="btn" title="Inicio" type="image" src="image/inicio.png" name="btnInicio" alt="Inicio"/>';
		echo '</form>';
		echo '</div>';
		echo '<div class="lado">';
		echo '<form action="login.php" method="POST">';
		echo '<input class="btn" title="Login" type="image" src="image/login.png" name="btnLogin" alt="Login"/>';
		echo '</form>';
		echo '</div>';
		echo '<div class="lado">';
		echo '<form action="aparelho.php" method="POST">';
		echo '<input class="btn" title="Aparelho" type="image" src="image/aparelho.png" name="btnAparelho" alt="Aparelho"/>';
		echo '</form>';
		echo '</div>';
		echo '<div class="lado">';
		echo '<form action="compra.php" method="POST">';
		echo '<input class="btn" title="Login" type="image" src="image/compra.png" name="btnCompra" alt="Compra"/>';
		echo '</form>';
		echo '</div>';
		echo '<div class="lado">';
		echo '<form action="concerto.php" method="POST">';
		echo '<input class="btn" title="Login" type="image" src="image/concerto.png" name="btnConcerto" alt="Concerto"/>';
		echo '</form>';
		echo '</div>';

		echo '</div>';//div do menu
		echo '<div id="tela">';//div da tela
	}
	function out(){
		echo '</div>';//div da tela
		$date = date('Y');
		echo '		<div id="out">';
		echo '		<hr>';
		echo '		<p>';
		echo '		© '.$date.' - All rights reserved. Programming II - Doglas A. Finco, Patrick Jr. De Bastiani.';
		echo '		</p>';
		echo '		</div>';
		echo '	</body>';
		echo '</html>';
	}
	
	function tentaLogin($cpf, $senha){
		$cpf = addslashes($cpf);
		$senha = addslashes($senha);
		
		if($cpf=="admin" && $senha=="admin"){
			$_SESSION['admin']=true;
			header("Location: admin/index.php");
			exit();
		}
		$senha = md5($senha + SAL);
		$r= login($cpf, $senha);
		
		if(mysql_num_rows($r) == 1){
			return true;
		}else{
			return false;
		}
	}
	function tentaCadCliente($dados){
		$tel_celular=NULL;
		$data_nascimento=NULL;
		$sexo=NULL;
		if(isset($dados['tel_celular'])){
			$tel_celular=$dados['tel_celular'];
		}
		if(isset($dados['data_nascimento'])){
			$data_nascimento=$dados['data_nascimento'];
		}
		if(isset($dados['sexo'])){
			$sexo=$dados['sexo'];
		}
		if(isset($dados['cpf'])){
			$cpf= $dados["cpf"];
		}
		//$cpf= $dados['cpf'];
		echo "<br/>CPF VETOR ";
		echo $dados['cpf'];
		echo '<br/><br/>';
		echo "CPF DEPOIS:";
		echo $cpf;
		echo '<br/><br/>';
		$nome=$dados["nome"];
		$sobrenome=$dados["sobrenome"];
		$senha=md5($dados["senha"] + SAL);
		$email=$dados["email"];
		$tel_fixo=$dados["tel_fixo"];
		$rua=$dados["rua"];
		$bairro=$dados["bairro"];
		$numero=$dados["numero"];
		$cidade=$dados["cidade"];
		$estado=$dados["estado"];
		$pais=$dados["pais"];

		$r= cadCliente($cpf,$nome,$sobrenome,$senha,$email,$tel_fixo,$tel_celular,$data_nascimento,$sexo,$rua,$numero,$bairro,$cidade,$estado,$pais);
		echo "<br/>$r<br/>aqui";
		if($r){
			return 1;
		}else{
			return 0;
		}
	}
	function puxaFabricante(){
		$r=puxaFab();
		return $r;
	}
	function pegaAparelho($fabricante){
		$r=slcAparelho($fabricante);
		return $r;
	}
	function buscaImagem($q){
		$q=str_replace(' ', '%20', $q);

		$url = "https://ajax.googleapis.com/ajax/services/search/images?".'v=1.0&q='.$q;
		$site = 'http://localhost/Patrick/t3/home.php';
		// sendRequest
		// note how referer is set manually
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$body = curl_exec($ch);
		curl_close($ch);
		// now, process the JSON string
		$json = json_decode($body);
		// now have some fun with the results...

		if(count($json->responseData->results) != 0){
			$img= $json->responseData->results[0]->url;
			$dado= '<img src="'.$img.'" height="200" width="200" alt="Celular"/>';
			return $dado;
		}else{
			echo '<img src="image/wait.png" height="100" width="100" alt="nada"/>';
		}

	}
?>