<?php
	function cabecalho($titulo){
		echo '<!doctype html>';
		echo '<html>';
			echo '<head>';
				echo '<link rel="stylesheet" type="text/css" href="init.css"/>';
				echo '<meta http-equiv="content-type" content="text/html"; charset=UTF-8"/>';
				echo "<title>".$titulo."</title>";
			echo '</head>';
			echo '<body>';
	}
	function rodape(){
				echo '<hr>';
				echo '<div id="roda">';
				echo '<p class="roda">';
				echo "Copyright © 2012 - Programming II - Doglas A. Finco, Patrick Jr. De Bastiani. All rights reserved.";
				echo '</p>';
				echo '</div>';
			echo '</body>';
		echo '</html>';
	}
?>