<?php
	require_once dirname(__FILE__).'/library/lib.php';
	session_start();
	if($_SESSION['logado']){
		in("Home");
		//***Scripts
		echo '<script>(function(d, s, id) {';
		echo 'var js, fjs = d.getElementsByTagName(s)[0];';
		echo 'if (d.getElementById(id)) return;';
		echo 'js = d.createElement(s); js.id = id;';
		echo 'js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";';
		echo 'fjs.parentNode.insertBefore(js, fjs);';
		echo "}(document, 'script', 'facebook-jssdk'));</script>";
		echo '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);
		js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		//***Fim Scripts
		
		echo '<div id="body">';//////inicio div body
		echo '<div id="home">';//********************Inicio div home
		//fazer div para logout pesquisa e home
		echo '<div class="sideLeft">';//div para botao home
		echo '<form action="home.php" method="post">';//atalho para inicio
		echo '<input class="btnHome" title="Home" type="image" src="images/btnHome.png" name="btnHome" alt="Home"/>';
		echo '</form>';
		echo '</div>';
		echo '<div class="sideLeft">';//div para botao search e entrada de pesquisa
		echo '<form action="home.php" method="post">';//area de pesquisa da musica
		echo '<input type="text" name="search" size=50 placeholder="Ex: music, by band"/>';
		echo '<input class="btnSearch" type="image" src="images/btnSearch.png" name="btnSearch" title="Search" alt="Search"/>';
		echo '</form>';
		echo '</div>';
		echo '<div class="sideLeft">';//div com o nome do usuario
		echo "Welcome, <b>".@$_SESSION['login']."</b>!";
		echo '</div>';
		echo '<div class="sideRight">';//div do logout
		echo '<form action="logout.php" method="post">';
		echo '<input class="btnLogout" type="image" src="images/btnLogout.png" name="btnLogout" title="Logout" alt="Logout"/>';
		echo '</form>';
		echo '</div>';
		echo '</div>';//******************************Fim div home
		
		echo '<div class="button">';/////inicio div botao
		echo '<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>';
		echo '<div id="fb-root"></div>';
		echo '<div class="fb-like" data-href="http://undpat.my.phpcloud.com/progii/t2/index.php" data-send="false" data-width="10" data-show-faces="false"></div>';
		echo '</div>';/////fim div botao

		//fazer div para informação
		if(isset($_GET['r'])){
			echo '<div class="error">';
			if($_GET['r'] == 0){
				echo '<p>';
				echo 'Need music name!<br/>';
				echo '</p>';
			}else if($_GET['r'] == 1){
				echo '<p>';
				echo 'Need band name!<br/>';
				echo '</p>';
			}
			echo '</div>';
		}
		if(isset($_POST['search'])){
			$music= "";
			$band= "";
			$pos = strrpos($_POST['search'], ',');
			if($pos != 0){
				$music = substr($_POST['search'], 0, $pos);//pega somente o nome da musica
				$music = trim($music);
				if(empty($music)){
					header("Location: home.php?r=0");
				}
			}else{
				header("Location: home.php?r=0");
			}
			$pos = strpos($_POST['search'], 'by');
			if($pos != 0){
				$band = substr($_POST['search'], $pos+3);//pega o nome da banda até o fim
				$band = trim($band);
				if(empty($band)){
					header("Location: home.php?r=1");
				}
			}else{
				header("Location: home.php?r=1");
			}
			echo '<div id="video">';//div que coloca o video na tela
			$musicVideo = str_replace(' ', '+', $music);//troca os espaços por +
			$musicVideo = fixesWord($musicVideo);
			$bandVideo = str_replace(' ', '+', $band);//trica os espaços por +
			$bandVideo = fixesWord($bandVideo);
			video($musicVideo, $bandVideo);//função que coloca o video na tela
			echo '</div>';//fim div do video
			
			echo '<div id="lyric">';//div que coloca a letra na tela
			echo '<div class="center">';//coloca o nome e a banda na tela
			echo 'Band: '.ucwords($band).'<br/>';//coloca o primeiro caracter da string maiusculo
			echo 'Music: '.ucwords($music).'<br/>';
			echo '</div>';
			$musicLyric = str_replace(' ', '-', $music);//troca espaços em branco por hifem
			$musicLyric = fixesWord($musicLyric);
			$bandLyric = str_replace(' ', '-', $band);
			$bandLyric = fixesWord($bandLyric);
			echo '<img src="images/music1280x1024.png" alt="Cifra" height="200px" width="900px"/>';//carrega uma imagem no topo da letra
			lyric($musicLyric, $bandLyric);//imprime a letra
			echo '</div>';
		}else{
			echo '<div class="center">';
			echo '<img src="images/imgLogo.png" height="625" alt="Rosto com fone" width="550"/>';
			echo '</div>';
		}
		echo '</div>';///div do corpo
		out();
	}else{
		header("Location: index.php");
	}
?>