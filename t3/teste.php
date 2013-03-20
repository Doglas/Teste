<?php
	require_once dirname(__FILE__).'/library/lib.php';

	if(isset($_POST['buscar']) && $_POST['buscar'] == 'Buscar'){
		if(isset($_POST['fabricante']) && strlen($_POST['fabricante']) > 0){
			$fabricanteNome = addslashes($_POST['fabricante']);
			
			$r= pegaAparelho($fabricanteNome);
			$dado=array();
			while($l = mysql_fetch_assoc($r)){
				$dado[]=array(
					'quantidade' => $l['quantidade'],
					'preco' => $l['preco_unitario'],
					'interna' => $l['memoria_interna'],
					'externa' => $l['memoria_externa'],
					'modelo' => $l['modelo'],
					'image' => buscaImagem($l['modelo'])
					);
			}
			echo json_encode($dado);
			return ;
		}
	}

?>