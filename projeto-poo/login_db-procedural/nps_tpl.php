<?php
require 'sessao.php';

	// session_start(); // Ele grava um cookie na maquina do usuario com id de sessao, sessino_start(); tem que ser enviado antes de qualquer bite mesmo um espaço antes de <php? 
	// var_dump($_SESSION);//$_SESSION é um vetor super global para acessar esses dados da sessao.
	// sessao é o tempo que o usuario usa seu site, e usamos a sessao para para controlar as atividades  de acesso nele. 
	$_SESSION['meuNome'] = 'fulano'; // cria a string fulano e guarda em meuNome e em qualquer arquivo que eu colocar session_start(); isso vai está disponível pra mim puxar através de um echo  'Você é o: ' .$_SESSION['user']. '<br><br>'; por exemplo.
	// echo 'Seu ID de sessão é: '. session_id();//gera um id de sessao

	
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<title>Avaliação</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		</head>
		<body class="text-center">
			<?php include 'index_menu_tpl.php'; ?>
			<h1>Pesquisa de Satisfação</h1><br>
			<h2>Qual a probabilidade de você recomendar nosso serviço para um amigo?</h2><br>
			<form method="post" action="grava_nps.php">
			<label class="text-danger">Nada provável</label>
			<?php
			for( $i = 1; $i <=10; $i++ ){
				echo " <input type='radio' id='nps$i' name='nota' value='$i'>\n 
				<label for='nps$i'>$i</label>\n";
			}
			?>
			<label class='text-success'>Muito provável</label>
			<br><br>
			<h2>Por que você nos deu essa nota?</h2><br>
			<textarea name='explicacao' rows='5' cols='63'></textarea>
			<br>
			<input type='submit' name='avaliacao' value='Avaliar'><br><hr>
			</form>
		</body>
		</html>


