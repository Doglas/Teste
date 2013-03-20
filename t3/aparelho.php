<?php
	require_once dirname(__FILE__).'/library/lib.php';
	@session_start();
	
	in("Aparelho");
	
	echo '<div id="coluna">';//mostra marcas
	echo 'Fabricante:<select name="fabricante">';
	$r=puxaFabricante();
	if(mysql_num_rows($r) > 0){
		while($l = mysql_fetch_assoc($r)){
			$nome = $l['nome'];
			echo "<option value='$nome'>$nome</option>";
		}
	}
	echo '</select>';
	echo '<input type="button" onClick="buscaAparelho(this);" value="Buscar"/><br/>';
	echo '</div>';
	
	echo '<div id="mostraAparelho">';//mostra aparelhos
	echo '<div id="mostraAparelho1">';//mostra aparelhos
	echo '</div>';
	echo '</div>';
	
		
	echo '<script type="text/javascript" src="library/jquery.js"></script>';
	echo '<script type="text/javascript" src="library/aparelho.js"></script>';
	
	out();
	
?>