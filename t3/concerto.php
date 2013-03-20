<?php
	require_once dirname(__FILE__).'/library/lib.php';
	@session_start();
	
	in("Concerto");
	echo '<div  id="oferta">';
	$ofer1 = '<img src="image/cat.gif" alt="oferta1" width="700" height="350"/>';
	echo $ofer1;
	echo '</div>';//div da oferta

	out();
	
?>