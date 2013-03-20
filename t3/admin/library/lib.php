<?php
	require_once dirname(__FILE__).'/ab.php';
	
	function up(){//pagina admin
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '	<head>';
		echo '		<link rel="stylesheet" type="text/css" href="library/adm.css"/>';
		echo '		<link rel="shortcut icon" href="../image/favicon.ico"/>';
		echo '		<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
		//echo '		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-15">';
		echo '		<title>ADMIN</title>';//alterar para passar o nome da pagina
		echo '	</head>';
		echo '	<body>';
		echo '<div id="logo">';
		echo '<img src="../image/logoSilva.png" alt="Logo" widht="700" height="250"/>';
		echo '<div id="sair">';
		echo '<form action="../logout.php" method="post">';
		echo '<input class="btn" title="Sair" type="image" src="../image/sair.png" name="btnSair" alt="Sair"/>';
		echo '</form>';
		echo '</div>';
		echo '</div>';
	}
	function down(){//pagina admin
		echo '	</body>';
		echo '</html>';
	}
	
	function tentaCadCliente($dados){
		$tel_celular=NULL;
		$data_nascimento=NULL;
		$sexo=NULL;
		$tel_celular=$dados['tel_celular'];
		$data_nascimento=$dados['data_nascimento'];
		$sexo=$dados['sexo'];
		$cpf= $dados["cpf"];
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
	function tentaCadFabricante($dados){
		$cnpj=$dados['cnpj'];
		$nome=$dados["nome"];
		
		$rua=$dados["rua"];
		$bairro=$dados["bairro"];
		$numero=$dados["numero"];
		$cidade=$dados["cidade"];
		$estado=$dados["estado"];
		$pais=$dados["pais"];
		
		$r = cadFabricante($cnpj,$nome,$rua,$numero,$bairro,$cidade,$estado,$pais);
		if($r){
			return 1;
		}else{
			return 0;
		}
	}
	function tentaCadCamera($dados){
		$resolucao= $dados['resolucao'];
		$cam_traseira= $dados['cam_traseira'];
		$cam_frontal= $dados['cam_frontal'];
		$flash= $dados['flash'];
		
		$r=cadCamera($resolucao, $cam_traseira, $cam_frontal, $flash);
		
		if($r){
			return 1;
		}else{
			return 0;
		}
	}
	function tentaCadAparelho($dados){
		$quantidade = $dados['quantidade'];
		$modelo = $dados['modelo'];
		$display = $dados['display'];
		$preco_unitario = $dados['preco_unitario'];
		$dimensao = $dados['dimensao'];
		$peso = $dados['peso'];
		$radio = $dados['radio'];
		$viva_voz = $dados['viva_voz'];
		$wi_fi = $dados['wi_fi'];
		$multichip = $dados['multichip'];
		$bluetooth = $dados['bluetooth'];
		$mem_interna = $dados['mem_interna'];
		$mem_externa = $dados['mem_externa'];
		$mp3 = $dados['mp3'];
		$idioma1 = $dados['idioma1'];
		$idioma2 = $dados['idioma2'];
		$sistema_operacional = $dados['sistema_operacional'];
		$bateria = $dados['bateria'];
		$processador = $dados['processador'];
		$fabricante = $dados['fabricante'];
		$camera = $dados['camera'];
		
		$r=cadAparelho($fabricante,$camera,$quantidade,$modelo,$display,$preco_unitario,$dimensao,$peso,$radio,$viva_voz,$wi_fi,$multichip,$bluetooth,$mem_interna,$mem_externa,$mp3,$idioma1,$idioma2,$sistema_operacional,$bateria,$processador);
		
		if($r){
			return 1;
		}else{
			return 0;
		}
	}
	
	function tentaEdtCliente($dados){
		$tel_celular=NULL;
		$data_nascimento=NULL;
		$sexo=NULL;
		$tel_celular=$dados['tel_celular'];
		$data_nascimento=$dados['data_nascimento'];
		$sexo=$dados['sexo'];
		$cpf= $dados["cpf"];
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
		
		$r= edtCliente($cpf,$nome,$sobrenome,$senha,$email,$tel_fixo,$tel_celular,$data_nascimento,$sexo,$rua,$numero,$bairro,$cidade,$estado,$pais);
		echo "<br/>$r<br/>aqui";
		if($r){
			return 1;
		}else{
			return 0;
		}
	}
	function tentaEdtFabricante($dados){
		$cnpj = $dados['cnpj'];
		$nome = $dados['nome'];
		$rua=$dados["rua"];
		$bairro=$dados["bairro"];
		$numero=$dados["numero"];
		$cidade=$dados["cidade"];
		$estado=$dados["estado"];
		$pais=$dados["pais"];
		
		$r= edtFabricante($cnpj,$nome,$rua,$numero,$bairro,$cidade,$estado,$pais);
		if($r){
			return 1;
		}else{
			return 0;
		}
	}
	function tentaEdtCamera($dados){
		$codigoCam= $dados['codicoCam'];
		$resolucao = $dados['resolucao'];
		$cam_traseira = $dados['cam_traseira'];
		$cam_frontal=$dados["cam_frontal"];
		$flash=$dados["flash"];
		
		
		$r= edtCamera($codigoCam,$resolucao,$cam_traseira,$cam_frontal,$flash);
		if($r){
			return 1;
		}else{
			return 0;
		}
	}
	function tentaEdtAparelho($dados){
		$quantidade = $dados['quantidade'];
		$modelo = $dados['modelo'];
		$display = $dados['display'];
		$preco_unitario = $dados['preco_unitario'];
		$dimensao = $dados['dimensao'];
		$peso = $dados['peso'];
		$radio = $dados['radio'];
		$viva_voz = $dados['viva_voz'];
		$wi_fi = $dados['wi_fi'];
		$multichip = $dados['multichip'];
		$bluetooth = $dados['bluetooth'];
		$mem_interna = $dados['mem_interna'];
		$mem_externa = $dados['mem_externa'];
		$mp3 = $dados['mp3'];
		$idioma1 = $dados['idioma1'];
		$idioma2 = $dados['idioma2'];
		$sistema_operacional = $dados['sistema_operacional'];
		$bateria = $dados['bateria'];
		$processador = $dados['processador'];
		$fabricante = $dados['fabricante'];
		$camera = $dados['camera'];
		$codigoAp = $dados['codigoAp'];
		
		$r=edtAparelho($codigoAp,$fabricante,$camera,$quantidade,$modelo,$display,$preco_unitario,$dimensao,$peso,$radio,$viva_voz,$wi_fi,$multichip,$bluetooth,$mem_interna,$mem_externa,$mp3,$idioma1,$idioma2,$sistema_operacional,$bateria,$processador);
		if($r){
			return 1;
		}else{
			return 0;
		}
	}
	
	function tentaSlcCliente($cpf){
		$r=slcCliente($cpf);
		return $r;
	}
	function tentaSlcFabricante($cnpj){
		$r=slcFabricante($cnpj);
		return $r;
	}
	function tentaSlcCamera($codigo){
		$r=slcCamera($codigo);
		return $r;
	}
	function tentaSlcAparelho($codigo){
		$r=slcAparelho($codigo);
		return $r;
	}
	
	function tentaDltCliente($cpf){
		$r=dltCliente($cpf);
		return $r;
	}
	function tentaDltFabricante($cnpj){
		$r=dltFabricante($cnpj);
		return $r;
	}
	function tentaDltCamera($codigoCam){
		$r=dltCamera($codigoCam);
		return $r;
	}
	function tentaDltAparelho($codigoAp){
		$r=dltAparelho($codigoAp);
		return $r;
	}
	
	function puxaFabricante(){
		$r=puxaFab();
		return $r;
	}
	function puxaCamera(){
		$r=puxaCam();
		return $r;
	}
?>