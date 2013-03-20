function buscaAparelho(tag){
	tag=$(tag).parent();
	var fabricante=$('select[name="fabricante"]', tag).val();
	$.ajax({
		url:'teste.php',
		type: "POST",
		dataType: 'json',
		data:{
			'buscar': 'Buscar',
			'fabricante': fabricante
		}
		}).done(function(data){
			var dados='';
			console.log(data);
			dados= '<table border=1>'
			for(var nome in data){
				dados += '<tr><td>' + data[nome].modelo + '</td><td>' + data[nome].image + '</td><td>Quantidade:' + data[nome].quantidade;
				dados += '<br/>Preco: ' + data[nome].preco + '</td><td>Memoria:<br/>Interna: ' + data[nome].interna + 'GB<br/>Externa:' + data[nome].externa + 'GB</td>';
			}
			dados+='</tr>';
			
			$('#mostraAparelho1').html(dados);
		}).error(function(){alert('Nao deu');});
}
function cadAparelho(){
	$.ajax({url:"teste.php"}).done(function (dados){
		$('#dados').html(dados);
	}).fail(erro);

}

window.addEventListener("load");