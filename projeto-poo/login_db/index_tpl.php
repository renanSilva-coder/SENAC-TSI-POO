<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	 <link href="./T-style.css" rel="stylesheet">

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <div class="text-danger"><?php if (isset($msg)) echo $msg ?></div><br>
            
            <!--Formulário de login-->
            <form class="form-signin" method="post">
              
              <!--Campo de login-->
              <div class="form-label-group">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" class="form-control" placeholder="example@gmail.com" required autofocus>
              </div>

              <!--Campo de senha-->
              <div class="form-label-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" class="form-control" placeholder="password" required>
              </div>
              <hr class="my-4">

              <!--Botão de Entrar-->
              <input type="submit" class="btn btn-lg btn-outline-primary btn-block text-uppercase" name="entrar" value="Entrar">

              <!--Botão de cadastro--><br>
              <a href="usuario/cadastro.php"><input type="button" class="btn btn-lg btn-outline-primary btn-block text-uppercase" name="cadastrar-se" value="Cadastrar-se"></a>
            
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>