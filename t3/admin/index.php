<?php
	require_once dirname(__FILE__).'/library/lib.php';

	@session_start();
	if(isset($_SESSION['admin']) && $_SESSION['admin']==true){//é admin
		up();
		if(isset($_GET['r'])){
			if($_GET['r']==0){
				///*
				echo '<div class="erro">';
				echo 'Falta preencher os campos obrigatorios.<br/>';
				echo '</div>';
				//*/
				//echo alert('Erro!');
			}else if($_GET['r'] == 1){
				///*
				echo '<div class="acerto">';
				echo 'Cadastrado com sucesso.';
				echo '</div>';
				//*/
				//echo alert('Sucesso!');
			}
			//header("Location: index.php");
			//exit();
		}

		echo '<div id="corpo">';
		echo '<div id="menu">';//div do menu
		echo '<div id="cadastro">';//div dos cadastros -- inicio
		echo 'Cadastros<br/>';//fornecedor
		echo '</div>';
		echo '<div id="cadastro_menu" style="display: none;">';
		echo '<div id="cadFabricante">cadastra Fornecedor<br/></div>';
		echo '<div id="cadCliente">cadastra Cliente<br/></div>';
		echo '<div id="cadCamera">cadastra Camera<br/></div>';
		echo '<div id="cadAparelho">cadastra Aparelho<br/></div>';
		echo '</div>';//div dos cadastros -- fim
		
		
		echo '<div id="editar">';
		echo 'Editar<br/>';
		echo '</div>';
		echo '<div id="editar_menu" style="display: none;">';
		echo '<div id="edtFabricante">editar Fornecedor<br/></div>';
		echo '<div id="edtCliente">editar Cliente<br/></div>';
		echo '<div id="edtCamera">editar Camera<br/></div>';
		echo '<div id="edtAparelho">editar Aparelho<br/></div>';
		echo '</div>';//div dos editar -- fim

		
		echo '<div id="deletar">';
		echo 'Deletar<br/>';
		echo '</div>';
		echo '<div id="deletar_menu" style="display: none;">';
		echo '<div id="dltFabricante">deletar Fornecedor<br/></div>';
		echo '<div id="dltCliente">deletar Cliente<br/></div>';
		echo '<div id="dltCamera">deletar Camera<br/></div>';
		echo '<div id="dltAparelho">deletar Aparelho<br/></div>';
		echo '</div>';//div dos deletar
		
		echo '</div>';//fecha div do menu
		
		
		echo '<div id="dados">';
		/*
		echo 'teste dados<br/>';//fornecedor
		echo 'teste dados<br/>';
		echo 'teste dados<br/>';
		echo 'teste dados<br/>';
		echo 'teste dados<br/>';
		echo 'teste dados<br/>';
		*/
		echo '</div>';
		echo '</div>';
		
		echo '<script type="text/javascript" src="library/jquery.js"></script>';
		echo '<script type="text/javascript" src="library/app.js"></script>';
		
		down();
	}else{//aqui não
		header("Location: ../login.php");
		exit();
	}


?>