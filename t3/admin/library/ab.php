<?php
//ab -> acessa banco
	require_once dirname(__FILE__).'/../../database/db.php';//banco de dados

	function cadCliente($cpf,$nome,$sobrenome,$senha,$email,$tel_fixo,$tel_celular,$data_nascimento,$sexo,$rua,$numero,$bairro,$cidade,$estado,$pais){
		echo $cpf;
		echo 'banco de dados<br/>';
		$sql = "INSERT INTO cliente (cpf,nome,sobrenome,email,senha,sexo,tel_fixo,tel_celular,data_nascimento,rua,numero,bairro,cidade,estado,pais)
				VALUES ($cpf,'$nome','$sobrenome','$email','$senha','$sexo','$tel_fixo','$tel_celular','$data_nascimento','$rua','$numero','$bairro',
				'$cidade','$estado','$pais')";
		echo 'sql ok<br/>';
		$r=dbConsulta($sql);
		return $r;
	}
	function cadFabricante($cnpj,$nome,$rua,$numero,$bairro,$cidade,$estado,$pais){
		$sql = "INSERT INTO fabricante (cnpj,nome,rua,numero,bairro,cidade,estado,pais) VALUES ('$cnpj', '$nome', '$rua','$numero','$bairro','$cidade',
				'$estado','$pais')";
		$r=dbConsulta($sql);
		return $r;
	}
	function cadCamera($resolucao, $cam_traseira, $cam_frontal, $flash){
		$sql = "INSERT INTO camera (resolucao, traseira, frontal, flash) VALUES ('$resolucao','$cam_traseira','$cam_frontal','$flash')";
		
		$r=dbConsulta($sql);
		return $r;
	}
	function cadAparelho($fabricante,$camera,$quantidade,$modelo,$display,$preco_unitario,$dimensao,$peso,$radio,$viva_voz,$wi_fi,$multichip,$bluetooth,$mem_interna,$mem_externa,$mp3,$idioma1,$idioma2,$sistema_operacional,$bateria,$processador){
		$sql = "INSERT INTO novo (fabricante_cnpj,camera_codigo,quantidade,modelo,display,preco_unitario,dimensao,peso,radio,viva_voz,wi_fi,multichip,
				bluetooth,memoria_interna,memoria_externa,mp3,idioma1,idioma2,sistema_operacional,bateria,processador) VALUES ('$fabricante','$camera',
				'$quantidade','$modelo','$display','$preco_unitario','$dimensao','$peso','$radio','$viva_voz','$wi_fi','$multichip','$bluetooth',
				'$mem_interna','$mem_externa','$mp3','$idioma1','$idioma2','$sistema_operacional','$bateria','$processador')";
		$r=dbConsulta($sql);
		return $r;
	}
		
	function edtCliente($cpf,$nome,$sobrenome,$senha,$email,$tel_fixo,$tel_celular,$data_nascimento,$sexo,$rua,$numero,$bairro,$cidade,$estado,$pais){
		echo $cpf;
		echo 'banco de dados<br/>';
		$sql = "UPDATE cliente SET nome='$nome',sobrenome='$sobrenome',email='$email',senha='$senha',sexo='$sexo',tel_fixo='$tel_fixo',
				tel_celular='$tel_celular',data_nascimento='$data_nascimento',rua='$rua',numero='$numero',bairro='$bairro',cidade='$cidade',
				estado='$estado',pais='$pais' WHERE cpf='$cpf'";
		$r=dbConsulta($sql);
		return $r;
	}
	function edtFabricante($cnpj,$nome,$rua,$numero,$bairro,$cidade,$estado,$pais){
		$sql = "UPDATE fabricante SET nome='$nome',rua='$rua',numero='$numero',bairro='$bairro',cidade='$cidade',
				estado='$estado',pais='$pais' WHERE cnpj='$cnpj'";
		$r=dbConsulta($sql);
		return $r;
	}
	function edtCamera($codigo,$resolucao,$cam_traseira,$cam_frontal,$flash){
		$sql = "UPDATE camera SET resolucao='$resolucao', traseira='$cam_traseira', frontal='$cam_frontal', flash='$flash' WHERE codigo='$codigo'";
		$r=dbConsulta($sql);
		return $r;
	}
	function edtAparelho($codigoAp,$fabricante,$camera,$quantidade,$modelo,$display,$preco_unitario,$dimensao,$peso,$radio,$viva_voz,$wi_fi,$multichip,$bluetooth,$mem_interna,$mem_externa,$mp3,$idioma1,$idioma2,$sistema_operacional,$bateria,$processador){
		$sql = "UPDATE novo SET fabricante_cnpj='$fabricante', camera_codigo='$camera', quantidade='$quantidade', modelo='$modelo', display='$display',
				preco_unitario='$preco_unitario', dimensao='$dimensao', peso='$peso', radio='$radio', viva_voz='$viva_voz', wi_fi='$wi_fi',
				multichip='$multichip', bluetooth='$bluetooth', memoria_interna='$mem_interna', memoria_externa='$mem_externa', mp3='$mp3',
				idioma1='$idioma1', idioma2='$idioma2', sistema_operacional='$sistema_operacional', bateria='$bateria',
				processador='$processador' WHERE aparelho_codigo='$codigoAp'";
		$r=dbConsulta($sql);
		return $r;
	}
	
	function slcCliente($cpf){
		$sql= "SELECT nome,sobrenome,email,tel_fixo,tel_celular,data_nascimento,rua,numero,bairro,cidade,estado,pais FROM cliente WHERE cpf='$cpf' ";
		$r=dbConsulta($sql);
		return $r;
	}
	function slcFabricante($cnpj){
		$sql= "SELECT nome,rua,numero,bairro,cidade,estado,pais FROM fabricante WHERE cnpj='$cnpj' ";
		$r=dbConsulta($sql);
		return $r;
	}
	function slcCamera($codigo){
		$sql = "SELECT * FROM camera WHERE codigo='$codigo'";
		$r=dbConsulta($sql);
		return $r;
	}
	function slcAparelho($codigoAp){
		$sql = "SELECT * FROM novo WHERE aparelho_codigo='$codigoAp'";
		$r=dbConsulta($sql);
		return $r;
	}
	
	function dltCliente($cpf){
		$sql = "DELETE FROM cliente WHERE cpf='$cpf'";
		$r=dbConsulta($sql);
		return $r;
	}
	function dltFabricante($cnpj){
		$sql = "DELETE FROM fabricante WHERE cnpj='$cnpj'";
		$r=dbConsulta($sql);
		return $r;
	}
	function dltCamera($codigoCam){
		$sql = "DELETE FROM camera WHERE codigo='$codigoCam'";
		$r=dbConsulta($sql);
		return $r;
	}
	function dltAparelho($codigoAp){
		$sql = "DELETE FROM novo WHERE aparelho_codigo='$codigoAp'";
		$r=dbConsulta($sql);
		return $r;
	}

	function puxaFab(){
		$sql = "SELECT cnpj FROM fabricante";
		$r=dbConsulta($sql);
		return $r;
	}
	function puxaCam(){
		$sql = "SELECT codigo FROM camera";
		$r=dbConsulta($sql);
		return $r;
	}
?>