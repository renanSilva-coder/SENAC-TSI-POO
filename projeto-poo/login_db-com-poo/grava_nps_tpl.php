<!DOCTYPE html>
<html>
<head>
	<title>Avaliado</title>
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
	<h1><?php echo $msg; ?></h1>
	<a class="text-dark" href="nps_tpl.php">Avaliar Novamente?</a>
	<br><br>
	<?php echo "<a class='text-dark' href='agradecimento.php?nota=".$nota."'>Seguir</a>";?>
	<!-- colocar ?nota= no link que eu criei adiciona esse mesmo texto na url.
	Seguindo, ao puxar a variável $nota que vem de nps.php, não é preciso um include do arquivo agradecimento.php, pois é possível puxar $nota pois tem um include deste arquivo lá que compartilha essa variável. E assim  crio um link para em agradecimento.php que pega o valor de $nota. 
	Agora em agradecimento.php está disponível a variável $nota através do método $_GET que é utilizado para passar valores pela url. 
	*O & serve para adicionar outra variável
	OS DADOS PODEM SER PASSADOS POR GET, POST ou REQUEST, ou include ou require devidamente.
	-->
</body>
</html>