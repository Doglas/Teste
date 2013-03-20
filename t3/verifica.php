<?php
	require_once dirname(__FILE__).'/library/lib.php';

	if(isset($_POST['cpf'])){
		if(strlen($_POST['cpf']) == 11){//se existir cpf é cad de cliente
			echo 'tem cpf<br/>';
			//valida cpf...
			if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confSenha'])){//dados necessarios
				echo 'tem nome sobrenome email senha<br/>';
				if($_POST['senha'] == $_POST['confSenha'] && strlen($_POST['senha'])>5){
					$s=true;
				}else{
					$s=false;
				}
				if($s && isset($_POST['tel_fixo']) && isset($_POST['rua']) && isset($_POST['bairro']) && isset($_POST['numero'])){//dados necessarios
					echo 'tem tel_fixo rua bairro numero<br/>';
					if(isset($_POST['cidade']) && isset($_POST['estado']) && isset($_POST['pais'])){//dados necessarios
						echo 'tem cidade estado pais<br/>';
						$cpf = addslashes($_POST['cpf']);
						echo "CPF AQUI TEM => $cpf<br/>";
						$cpf = $_POST['cpf'];
						echo "CPF AQUI TEM => $cpf<br/>";
						$nome = addslashes($_POST['nome']);
						$sobrenome = addslashes($_POST['sobrenome']);
						$email = addslashes($_POST['email']);
						$senha = addslashes($_POST['senha']);
						
						$tel_fixo = addslashes($_POST['tel_fixo']);
						$rua = addslashes($_POST['rua']);
						$bairro = addslashes($_POST['bairro']);
						$numero = addslashes($_POST['numero']);
						
						$cidade = addslashes($_POST['cidade']);
						$estado = addslashes($_POST['estado']);
						$pais = addslashes($_POST['pais']);
						$sexo=NULL;//verificar
						$tel_celular=NULL;
						$data_nascimento=NULL;
						
						if(isset($_POST['sexo'])){
							echo 'tem sexo<br/>';
							$sexo = addslashes($_POST['sexo']);
						}
						if(isset($_POST['tel_celular'])){
							echo 'tem celular<br/>';
							$tel_celular = addslashes($_POST['tel_celular']);
						}
						if(isset($_POST['data_nascimento'])){
							echo 'tem nascimento<br/>';
							$data_nascimento = addslashes($_POST['data_nascimento']);
						}
						$dados = array("cpf" => $cpf, "nome" => $nome, "sobrenome" => $sobrenome, "email" => $email, "senha" => $senha,
								"tel_fixo" => $tel_fixo, "rua" => $rua, "bairro" => $bairro, "numero" => $numero, "cidade" => $cidade,
								"estado" => $estado, "pais" => $pais, "sexo" => $sexo, "tel_celular" => $tel_celular,
								"data_nascimento" => $data_nascimento);
						echo $dados['cpf'];
						$r=tentaCadCliente($dados);
						$host = $_SERVER['HTTP_HOST'];
						$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
						$extra = "cadastroCliente.php?r=$r";
						header("Location: http://$host$uri/$extra");
						exit();
					}
				}else{
					$host = $_SERVER['HTTP_HOST'];
					$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					$extra = "cadastroCliente.php?r=0";
					header("Location: http://$host$uri/$extra");
					exit();
				}
			}else{
				$host = $_SERVER['HTTP_HOST'];
				$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = "cadastroCliente.php?r=0";
				header("Location: http://$host$uri/$extra");
				exit();
			}
		}else{
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "cadastroCliente.php?r=0";
			header("Location: http://$host$uri/$extra");
			exit();
		}
	}else if(isset($_POST['cnpj'])){
		if(strlen($_POST['cnpj']) == 14){//se existir cnpj é cad de fornecedor
			echo 'tem cnpj<br/>';
			if(isset($_POST['nome']) && isset($_POST['rua']) && isset($_POST['bairro']) && isset($_POST['numero'])){
				echo 'tem nome rua bairro numero<br/>';
				if(isset($_POST['cidade']) && isset($_POST['estado']) && isset($_POST['pais'])){
					echo 'tem cidade estado pais<br/>';
					$cnpj = addslashes($_POST['cnpj']);
					$nome = addslashes($_POST['nome']);
					
					$rua = addslashes($_POST['rua']);
					$bairro = addslashes($_POST['bairro']);
					$numero = addslashes($_POST['numero']);
					
					$cidade = addslashes($_POST['cidade']);
					$estado = addslashes($_POST['estado']);
					$pais = addslashes($_POST['pais']);
					
					//insere no banco
					header("Location: index.php?r=1");
					exit();
				}else{
					header("Location: index.php?r=0");
					exit();
				}
			}else{
				header("Location: index.php?r=0");
				exit();
			}
		}else{
			header("Location: index.php?r=0");
			exit();
		}
	}else if(isset($_POST['resolucao'])){
		if(strlen($_POST['resolucao']) > 0){
			$resolucao= addslashes($_POST['resolucao']);
			if(isset($_POST['cam_traseira'])){
				$cam_traseira= addslashes($_POST['cam_traseira']);
			}
			if(isset($_POST['cam_frontal'])){
				$cam_frontal= addslashes($_POST['cam_frontal']);
			}
			if(isset($_POST['flash'])){
				$flash= addslashes($_POST['flash']);
			}
			//insere no banco
			header("Location: index.php?r=1");
			exit();
		}else{
			header("Location: index.php?r=0");
			exit();
		}
	}else if(isset($_POST['codAparelho'])){
	
	}else{
		echo 'erro';
	}
?>