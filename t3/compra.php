<?php
	require_once dirname(__FILE__).'/library/lib.php';
	@session_start();
	
	in("Compra");
	echo '<div  id="oferta">';
	$ofer1 = '<img src="image/load.gif" alt="oferta1" width="300" height="300"/>';
	echo $ofer1;
	echo '</div>';//div da oferta

	out();
	
?>