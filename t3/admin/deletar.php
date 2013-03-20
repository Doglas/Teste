<?php
	require_once dirname(__FILE__).'/library/lib.php';
	
	if(isset($_POST['cpf'])){
		if(strlen($_POST['cpf']) == 11){
			echo 'tem cpf<br/>';
			$cpf = addslashes($_POST['cpf']);
			
			$r= tentaDltCliente($cpf);
			
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php?r=$r";
			header("Location: http://$host$uri/$extra");
			exit();
		}else{
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php?r=0";
			header("Location: http://$host$uri/$extra");
			exit();
		}
	}else if(isset($_POST['cnpj'])){
		if(strlen($_POST['cnpj']) == 14){
			$cnpj = addslashes($_POST['cnpj']);
			
			$r= tentaDltFabricante($cnpj);
			
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php?r=$r";
			header("Location: http://$host$uri/$extra");
			exit();
		}else{
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php?r=0";
			header("Location: http://$host$uri/$extra");
			exit();
		}
	}else if(isset($_POST['codigoCam'])){
		if(strlen($_POST['codigoCam']) > 0){
			$codigoCam = addslashes($_POST['codigoCam']);
			
			$r= tentaDltCamera($codigoCam);
			
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php?r=$r";
			header("Location: http://$host$uri/$extra");
			exit();
		}else{
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php?r=0";
			header("Location: http://$host$uri/$extra");
			exit();
		}
	}else if(isset($_POST['codigoAp'])){
		if(strlen($_POST['codigoAp']) > 0){
			$codigoAp = addslashes($_POST['codigoAp']);
			
			$r= tentaDltAparelho($codigoAp);
			
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php?r=$r";
			header("Location: http://$host$uri/$extra");
			exit();
		}else{
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php?r=0";
			header("Location: http://$host$uri/$extra");
			exit();
		}
	}
?>