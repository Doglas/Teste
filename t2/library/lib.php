<?php

	function in($title){//função do cabeçalho
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '	<head>';
		echo '		<link rel="stylesheet" type="text/css" href="library/layout.css"/>';
		echo '		<link rel="shortcut icon" href="images/favicon.ico"/>';
		//echo '		<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
		echo '		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-15">';
		echo '		<title>Trabalho 2 - '.$title.'</title>';//alterar para passar o nome da pagina
		echo '	</head>';
		echo '	<body>';
	}
	function out(){
		$date = date('Y');
		echo '		<hr>';
		echo '		<div id="rodape">';
		echo '		<p>';
		echo '		© '.$date.' - All rights reserved. Programming II - Doglas A. Finco, Patrick Jr. De Bastiani.';
		echo '		</p>';
		echo '		</div>';
		echo '	</body>';
		echo '</html>';
	}
	function open_url($url) {
		$handle = fopen($url,'r');

		if($handle) {
			$content = "";
			while(!feof($handle)) {
				$content .= fread($handle, 4096);
			}
			fclose($handle);
			return $content;
		}
	}
	function video($music, $band){
		$youTube_UserFeedURL = 'http://gdata.youtube.com/feeds/api/videos?q='.$music.'+'.$band.'&max-results=1';
		// Usa cURL para pegar o XML do feed
		$cURL = curl_init(sprintf($youTube_UserFeedURL));
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURL, CURLOPT_FOLLOWLOCATION, true);
		$result = curl_exec($cURL);
		curl_close($cURL);

		// Inicia o parseamento do XML com o SimpleXML
		$xml = new SimpleXMLElement($result);

		$videos = array();

		// Passa por todos vídeos no RSS
		foreach ($xml->entry AS $video) {
			$url = (string)$video->link['href'];

			// Quebra a URL do vÃ­deo para pegar o ID
			parse_str(parse_url($url, PHP_URL_QUERY), $params);
			$id = $params['v'];

			// Monta um array com os dados do vÃ­deo
			$videos[] = array('id' => $id, 'titulo' => (string)$video->title,
				'thumbnail' => 'http://i' . rand(1, 4) .'.ytimg.com/vi/'. $id .'/hqdefault.jpg',
				'url' => $url);
		foreach ($videos AS $video) { 
			$link = $video['url'];
			//pega marcação do codigo..
			$posIniCod = strpos($link,'=')+1;
			$posEndCod = strpos($link,'&');
			$tamTotalLink = strlen($link);
			$offSet = $posEndCod - $tamTotalLink;
			/****/
			$codeSrc = substr($link, $posIniCod,$offSet);
			//pega link embed padrão
			$stringSrcIframe = 'http://www.youtube.com/embed/'.$codeSrc.'';
			
			echo'<iframe width="640" height="480" src="'.$stringSrcIframe.'" frameborder="0" allowfullscreen></iframe>';			
			}
		}
	}
	function lyric($music, $band){
		$url = "http://www.vagalume.com.br/$band/$music.html";
	
		#Vamos pegar parte do código fonte do Vagalume
		$html = str_replace("\n", "", open_url($url));
		$html = str_replace("\r", "", $html);

		#Identificamos, através de expressão regular, a parte do código fonte que pegaremos
		preg_match('/<div itemprop=description.*?<\/div>/', $html, $results);

		#Exibimos o resultado na tela
		echo $results[0];
	}
	function fixesWord($word){
		$word = str_replace(',', '', $word);//retira as virgulas
		$word = str_replace('.', '', $word);//retira os pontos
		$word = str_replace('$', 's', $word);//troca os $ por s
		$word = str_replace('"', '', $word);//retira aspas dupla
		$word = str_replace("'", '', $word);//retira aspas simples
		$word = str_replace('(', '', $word);//retira os parente esquerdo
		$word = str_replace(')', '', $word);//retira os parente direito
		$word = strtolower($word);
		$pos = strpos($word, '&');//arruma o & por nada
		if($pos != 0){
			$word = substr($word, 0, $pos).''.substr($word, $pos+2);//arrua o & por nada
		}
		return $word;
	}
?>