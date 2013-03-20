<?php
	require_once dirname(__FILE__).'/library/lib.php';

	if(isset($_POST['cpf'])){
		if(strlen($_POST['cpf']) == 11){//se existir cpf é cad de cliente
			echo 'tem cpf<br/>';
			//valida cpf...
			if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confSenha'])){//dados necessarios
				echo 'tem nome sobrenome email senha<br/>';
				if($_POST['senha'] == $_POST['confSenha'] && strlen($_POST['senha'])){
					$s=true;
				}else{
					$s=false;
				}
				if($s && isset($_POST['tel_fixo']) && isset($_POST['rua']) && isset($_POST['bairro']) && isset($_POST['numero'])){//dados necessarios
					echo 'tem tel_fixo rua bairro numero<br/>';
					if(isset($_POST['cidade']) && isset($_POST['estado']) && isset($_POST['pais'])){//dados necessarios
						echo 'tem cidade estado pais<br/>';
						$cpf = addslashes($_POST['cpf']);
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
								
						$r=tentaCadCliente($dados);
						$host = $_SERVER['HTTP_HOST'];
						$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
						$extra = "index.php?r=$r";
						header("Location: http://$host$uri/$extra");
						exit();
					}
				}else{
					$host = $_SERVER['HTTP_HOST'];
					$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					$extra = "index.php?r=0";
					header("Location: http://$host$uri/$extra");
					exit();
				}
			}else{
				$host = $_SERVER['HTTP_HOST'];
				$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = "index.php?r=0";
				header("Location: http://$host$uri/$extra");
				exit();
			}
		}else{
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php?r=0";
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
					
					$dados=array('cnpj' =>$cnpj, 'nome' => $nome, 'rua' => $rua, 'bairro' => $bairro, 'numero' => $numero, "cidade" => $cidade,
								"estado" => $estado, "pais" => $pais);
					
					$r=tentaCadFabricante($dados);
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
			}else{
				$host = $_SERVER['HTTP_HOST'];
				$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = "index.php?r=0";
				header("Location: http://$host$uri/$extra");
				exit();
			}
		}else{
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php?r=0";
			header("Location: http://$host$uri/$extra");
			exit();
		}
	}else if(isset($_POST['resolucao'])){
		if(strlen($_POST['resolucao']) > 0){
			$resolucao= addslashes($_POST['resolucao']);
			$cam_traseira=NULL;
			$cam_frontal=NULL;
			$flash=NULL;
			
			if(isset($_POST['cam_traseira'])){
				$cam_traseira= addslashes($_POST['cam_traseira']);
			}
			if(isset($_POST['cam_frontal'])){
				$cam_frontal= addslashes($_POST['cam_frontal']);
			}
			if(isset($_POST['flash'])){
				$flash= addslashes($_POST['flash']);
			}
			$dados=array('resolucao' => $resolucao, 'cam_traseira' => $cam_traseira, 'cam_frontal' => $cam_frontal, 'flash' => $flash);
			
			$r=tentaCadCamera($dados);
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
	}else if(isset($_POST['quantidade'])){
		if($_POST['quantidade'] > 0){
			if(isset($_POST['modelo']) && isset($_POST['display']) && isset($_POST['preco_unitario']) && isset($_POST['dimensao'])){
				if(isset($_POST['peso']) && isset($_POST['radio']) && isset($_POST['viva_voz']) && isset($_POST['wi_fi'])){
					if(isset($_POST['multichip']) && isset($_POST['bluetooth']) && isset($_POST['mem_interna']) && isset($_POST['mem_externa'])){
						if(isset($_POST['mp3']) && isset($_POST['idioma1']) && isset($_POST['fabricante']) && isset($_POST['camera'])){
							$fabricante = addslashes($_POST['fabricante']);
							$camera = addslashes($_POST['camera']);
							$quantidade = addslashes($_POST['quantidade']);
							$modelo = addslashes($_POST['modelo']);
							$display = addslashes($_POST['display']);
							$preco_unitario = addslashes($_POST['preco_unitario']);
							$dimensao = addslashes($_POST['dimensao']);
							$peso = addslashes($_POST['peso']);
							$radio = addslashes($_POST['radio']);
							$viva_voz = addslashes($_POST['viva_voz']);
							$wi_fi = addslashes($_POST['wi_fi']);
							$multichip = addslashes($_POST['multichip']);
							$bluetooth = addslashes($_POST['bluetooth']);
							$mem_interna = addslashes($_POST['mem_interna']);
							$mem_externa = addslashes($_POST['mem_externa']);
							$mp3 = addslashes($_POST['mp3']);
							$idioma1 = addslashes($_POST['idioma1']);
							
							$idioma2=NULL;
							$sistema_operacional=NULL;
							$bateria=NULL;
							$processador=NULL;
							
							if(isset($_POST['idioma2'])){
								$idioma2=$_POST['idioma2'];
							}
							if(isset($_POST['sistema_operacional'])){
								$sistema_operacional=$_POST['sistema_operacional'];
							}
							if(isset($_POST['bateria'])){
								$bateria=$_POST['bateria'];
							}
							if(isset($_POST['processador'])){
								$processador=$_POST['processador'];
							}
							
							$dados=array('quantidade' =>$quantidade, 'modelo' => $modelo, 'display' => $display, 'preco_unitario' => $preco_unitario,
								'dimensao' => $dimensao, 'peso' => $peso, 'radio' => $radio, 'viva_voz' => $viva_voz, 'wi_fi' => $wi_fi,
								'multichip' => $multichip, 'bluetooth' => $bluetooth, 'mem_interna' => $mem_interna, 'mem_externa' => $mem_externa,
								'mp3' => $mp3, 'idioma1' => $idioma1, 'idioma2' => $idioma2, 'sistema_operacional' => $sistema_operacional,
								'bateria' => $bateria, 'processador' => $processador, 'fabricante' => $fabricante, 'camera' => $camera);
							
							$r=tentaCadAparelho($dados);
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
					}else{
						$host = $_SERVER['HTTP_HOST'];
						$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
						$extra = "index.php?r=0";
						header("Location: http://$host$uri/$extra");
						exit();
					}
				}else{
					$host = $_SERVER['HTTP_HOST'];
					$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					$extra = "index.php?r=0";
					header("Location: http://$host$uri/$extra");
					exit();
				}
			}else{
				$host = $_SERVER['HTTP_HOST'];
				$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = "index.php?r=0";
				header("Location: http://$host$uri/$extra");
				exit();
			}
		}else{
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "index.php?r=0";
			header("Location: http://$host$uri/$extra");
			exit();
		}
	}else{
		echo 'erro';
	}
?>