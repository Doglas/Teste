<?php
	require_once dirname(__FILE__).'/../database/database.php';
	
	function insert($login, $name, $email, $password, $gender){
		$sql = "INSERT INTO app (login, nome, senha, email, genero) VALUES ('$login', '$name', '$password', '$email', '$gender')";
		$r = dbConsulta($sql);
		
		return $r;
	}
	function search($login){
		$sql = "SELECT login FROM app WHERE login='$login'";
		$r = dbConsulta($sql);
		
		if(mysql_num_rows($r) > 0){
			return 0;//usuario ja existe
		}else{
			return 1;//usuario nao existe
		}
	}
	function login($login, $password){
		$sql = "SELECT login,senha FROM app WHERE login='$login' AND senha='$password'";
		$r= dbConsulta($sql);
		
		if(mysql_num_rows($r) == 1){
			return 1;
		}else{
			return 0;
		}
	}
?>