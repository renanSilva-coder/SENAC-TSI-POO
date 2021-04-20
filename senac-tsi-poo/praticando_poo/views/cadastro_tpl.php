<!DOCTYPE html>
<html>
<head>
  <title>Cadastrar Usuário</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="container p-sm-2 text-center">
  <?php include '../../index_menu_tpl.php'; ?>
  
  <h1 class="container pt-sm-4">CADASTRE SUA CONTA :-)</h1>

  <form method="post" action="./cadastro.php" enctype="multipart/form-data">
    <div class="text-danger">
      <?php
      echo '<p>'; 
        if(count($erros) > 0){//conta quantos indices tem num vetor, ou seja se for 0, não tem mensagem, se for 1 ou mais ja tem, e como pode ter + q 1 fazemos um foreach para criar um looping que exibe todos
          foreach ($erros as $erro) { 
            echo $erro; 
          }
        } 
      echo '</p>'; 
      ?>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nome">Nome Completo</label>
        <input type="text" class="form-control" id="nome" placeholder="Seu Nome..." name="nome" required>
      </div>
      <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
      </div>
      <div class="form-group col-md-6">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" required>
      </div>
      <div class="form-group col-md-6">
        <label for="conf_senha">Confirme a senha</label>
        <input type="password" class="form-control" id="conf_senha" placeholder="Confirme sua senha" name="conf_senha" required>
      </div>  
    </div>
    <input type='submit' class='btn btn-outline-dark font-weight-bold text-uppercase' name='cadastrar' value='Cadastrar'>
  </form>
  
</body>
</html>