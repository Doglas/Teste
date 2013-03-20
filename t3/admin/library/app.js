function pronto(){
	var a= window.document.getElementById("cadastro");
	a.addEventListener("click",cadastro);
	var b= window.document.getElementById("editar");
	b.addEventListener("click",editar);
	var d= window.document.getElementById("deletar");
	d.addEventListener("click",deletar);
	
	$('#cadCliente').click(cadCliente);
	$('#cadFabricante').click(cadFabricante);
	$('#cadAparelho').click(cadAparelho);
	$('#cadCamera').click(cadCamera);
	
	$('#edtCliente').click(edtCliente);
	$('#edtFabricante').click(edtFabricante);
	$('#edtCamera').click(edtCamera);
	$('#edtAparelho').click(edtAparelho);
	
	$('#dltCliente').click(dltCliente);
	$('#dltFabricante').click(dltFabricante);
	$('#dltCamera').click(dltCamera);
	$('#dltAparelho').click(dltAparelho);
}

function cadastro(){
	if($('#cadastro_menu').css('display') == 'none'){
		$('#cadastro_menu').fadeIn();
	}else{
		$('#cadastro_menu').fadeOut();
	}

}
function editar(){
	if($('#editar_menu').css('display') == 'none'){
		$('#editar_menu').fadeIn();
	}else{
		$('#editar_menu').fadeOut();
	}
}
function deletar(){
	if($('#deletar_menu').css('display') == 'none'){
		$('#deletar_menu').fadeIn();
	}else{
		$('#deletar_menu').fadeOut();
	}
}

function erro(){
	
}
/******************CADASTRO*******************/
function cadCliente(){
	
	$.ajax({url:"cadastroCliente.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#300', 'color' : 'white'});
	}).fail(erro);

}
function cadFabricante(){
	
	$.ajax({url:"fabricante.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#700', 'color' : 'white'});
	}).fail(erro);

}
function cadAparelho(){
	
	$.ajax({url:"cadAparelho.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#a00', 'color' : 'white'});
	}).fail(erro);

}
function cadCamera(){
	
	$.ajax({url:"cadCamera.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#d00', 'color' : 'white'});
	}).fail(erro);

}
/******************CADASTRO*******************/
/******************EDITAR*********************/
function edtCliente(){
	$.ajax({url:"edtCliente.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#030', 'color' : 'white'});
	}).fail(erro);
}
function edtFabricante(){
	$.ajax({url:"edtFabricante.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#070', 'color' : 'white'});
	}).fail(erro);
}
function edtCamera(){
	$.ajax({url:"edtCamera.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#0a0', 'color' : 'white'});
	}).fail(erro);
}
function edtAparelho(){
	$.ajax({url:"edtAparelho.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#0d0', 'color' : 'white'});
	}).fail(erro);
}
/******************EDITAR*********************/
/******************DELETAR********************/
function dltCliente(){
	$.ajax({url:"dltCliente.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#003', 'color' : 'white'});
	}).fail(erro);
}
function dltFabricante(){
	$.ajax({url:"dltFabricante.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#007', 'color' : 'white'});
	}).fail(erro);
}
function dltCamera(){
	$.ajax({url:"dltCamera.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#00a', 'color' : 'white'});
	}).fail(erro);
}
function dltAparelho(){
	$.ajax({url:"dltAparelho.php"}).done(function (dados){
		$('#dados').html(dados);
		$('#dados').css({'background-color' : '#00d', 'color' : 'white'});
	}).fail(erro);
}
/******************DELETAR********************/
function buscaCliente(tag){
	tag=$(tag).parent();
	var cpf=$('input[name="cpf"]', tag).val();
	$.ajax({
		url:'../admin/editar.php',
		type: "POST",
		dataType: 'json',
		data:{
			'buscar': 'Buscar',
			'cpf': cpf
		}
		}).done(function(data){
		
		console.log(data);
		$('input[name="nome"]', tag).val(data.nome);
		$('input[name="sobrenome"]', tag).val(data.sobrenome);
		$('input[name="email"]', tag).val(data.email);
		$('input[name="tel_fixo"]', tag).val(data.tel_fixo);
		$('input[name="rua"]', tag).val(data.rua);
		$('input[name="numero"]', tag).val(data.numero);
		$('input[name="bairro"]', tag).val(data.bairro);
		$('input[name="cidade"]', tag).val(data.cidade);
		$('input[name="estado"]', tag).val(data.estado);
		$('input[name="pais"]', tag).val(data.pais);
		
		}).error(function(){alert('Nao deu');});
}
function buscaFabricante(tag){
	tag=$(tag).parent();
	var cnpj=$('input[name="cnpj"]', tag).val();
	$.ajax({
		url:'../admin/editar.php',
		type: "POST",
		dataType: 'json',
		data:{
			'buscar': 'Buscar',
			'cnpj': cnpj
		}
		}).done(function(data){
		
		console.log(data);
		$('input[name="nome"]', tag).val(data.nome);
		$('input[name="rua"]', tag).val(data.rua);
		$('input[name="numero"]', tag).val(data.numero);
		$('input[name="bairro"]', tag).val(data.bairro);
		$('input[name="cidade"]', tag).val(data.cidade);
		$('input[name="estado"]', tag).val(data.estado);
		$('input[name="pais"]', tag).val(data.pais);
		
		}).error(function(){alert('Nao deu');});
}
function buscaCamera(tag){
	tag=$(tag).parent();
	var codigoCam=$('input[name="codigoCam"]', tag).val();
	$.ajax({
		url:'../admin/editar.php',
		type: "POST",
		dataType: 'json',
		data:{
			'buscar': 'Buscar',
			'codigoCam': codigoCam
		}
		}).done(function(data){
		
		console.log(data);
		$('input[name="resolucao"]', tag).val(data.resolucao);
		$('input[name="cam_frontal"]', tag).val(data.cam_frontal);
		$('input[name="cam_traseira"]', tag).val(data.cam_traseira);
		}).error(function(){alert('Nao deu');});
}
function buscaAparelho(tag){
	tag=$(tag).parent();
	var codigoAp=$('input[name="codigoAp"]', tag).val();
	$.ajax({
		url:'../admin/editar.php',
		type: "POST",
		dataType: 'json',
		data:{
			'buscar': 'Buscar',
			'codigoAp': codigoAp
		}
		}).done(function(data){
		
		console.log(data);
		$('input[name="quantidade"]', tag).val(data.quantidade);
		$('input[name="modelo"]', tag).val(data.modelo);
		$('input[name="display"]', tag).val(data.display);
		$('input[name="modelo"]', tag).val(data.modelo);
		$('input[name="preco_unitario"]', tag).val(data.preco_unitario);
		$('input[name="dimensao"]', tag).val(data.dimensao);
		$('input[name="peso"]', tag).val(data.peso);
		$('input[name="radio"]', tag).val(data.radio);
		$('input[name="viva_voz"]', tag).val(data.viva_voz);
		$('input[name="wi_fi"]', tag).val(data.wi_fi);
		$('input[name="multichip"]', tag).val(data.multichip);
		$('input[name="mem_interna"]', tag).val(data.mem_interna);
		$('input[name="mem_externa"]', tag).val(data.mem_externa);
		$('input[name="mp3"]', tag).val(data.mp3);
		$('input[name="idioma1"]', tag).val(data.idioma1);
		$('input[name="idioma2"]', tag).val(data.idioma2);
		$('input[name="sistema_operacional"]', tag).val(data.sistema_operacional);
		$('input[name="bateria"]', tag).val(data.bateria);
		$('input[name="processador"]', tag).val(data.processador);
		$('input[name="fabricante"]', tag).val(data.fabricante);
		$('input[name="camera"]', tag).val(data.camera);
		
		}).error(function(){alert('Nao deu');});
}



window.addEventListener("load", pronto);