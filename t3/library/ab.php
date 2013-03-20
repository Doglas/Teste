<?php
//ab -> acessa banco
	require_once dirname(__FILE__).'/../database/db.php';//banco de dados
	
	function login($cpf, $senha){
		$sql = "SELECT cpf,senha FROM cliente WHERE cpf='$cpf' and senha='$senha'";
		
		$r=dbConsulta($sql);
		return $r;
	}
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
	function slcAparelho($codigoAp){
		$sql = "SELECT * FROM novo join fabricante on novo.fabricante_cnpj=fabricante.cnpj WHERE fabricante.nome='$codigoAp'";
		$r=dbConsulta($sql);
		return $r;
	}
	function puxaFab(){
		$sql = "SELECT nome FROM fabricante";
		$r=dbConsulta($sql);
		return $r;
	}

?>