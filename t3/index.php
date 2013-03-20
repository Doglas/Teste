<?php
	require_once dirname(__FILE__).'/library/lib.php';

	@session_start();
	
	in("Programming Work III - OFF");
	if(isset($_SESSION['logado']) && $_SESSION['logado']== true){
		echo 'Bem vindo usuário';
	}
	if(isset($_GET['r'])){
		$r = $_GET['r'];
		
		echo $r;
	}
	echo '<div  id="oferta">';
	$ofer1 = '<img src="image/celular-robo.jpg" alt="oferta1" width="200" height="300"/>';
	echo $ofer1;
	echo '</div>';//div da oferta

	out();
?>