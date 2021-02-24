<?php
include '../header_tpl.php';
include '../index_menu_tpl.php';
?>
<html lang="pt-br">

<head>
    <title>LISTA</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="text-center">
    <div class="container">    
        <p>Abaixo está a lista de registros</p>
        <div class="text-danger">
        <?php 
        if(isset($erro)){
            echo "$erro<br><br>";
        }
        ?> 
        </div>       
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Whatsapp</th>
            <th>Apagar</th>
            <th>Editar</th>
        </tr>
        </thead>
<?php foreach ($lista as $usuario) {

	echo "<tbody>
                <tr>
                    <td>{$usuario['id']}</td>
                    <td>{$usuario['nome']}</td>
                    <td>{$usuario['email']}</td>
                    <td><a href='?apagar={$usuario['id']}'>apagar</a></td>
                    <td><a href='?editar={$usuario['id']}'>editar</a></td>
                </tr>
          </tbody>";

}
?>

	</table>
	</div>
	<br><br>
</div>

<?php
include '../footer_tpl.php';
