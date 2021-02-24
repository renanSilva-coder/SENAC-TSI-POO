<h1 class="container pt-sm-4">EDITAR USUÁRIO :-)</h1>

  <form method="post">
  <br>
  <div class="text-success">
  <?php

  if ( isset($editado_ok) ) {
           echo "Editado com sucesso!";
      }

  ?>  
  </div>
  <div class="text-danger">
    <?php
    if(isset($erros)){ 
      if(count($erros) > 0){//conta quantos indices tem num vetor, ou seja se for 0, não tem mensagem, se for 1 ou mais ja tem, e como pode ter + q 1 fazemos um foreach para criar um looping que exibe todos
        foreach ($erros as $erro) { 
          echo $erro.'<br>'; 
        }
      }
    }
    ?>
  </div>
  <br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNome">Nome Completo</label>
      <input type="text" class="form-control" id="inputNome" placeholder="Seu Nome..." name="nome" value="<?php echo $nome; ?>" required>
    </div>
  <div class="form-group col-md-6">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="<?php echo $email; ?>"required>
  </div>
  <div class="form-group col-md-6">
    <label for="inputSenha">Senha</label>
    <input type="password" class="form-control" id="inputSenha" placeholder="Senha" name="senha" value="****" required>
  </div>
  <div class="form-group col-md-6">
    <label for="conf_senha">Confirme a senha</label>
    <input type="password" class="form-control" id="conf_senha" placeholder="Confirme sua senha" name="conf_senha" value="****" required>
  </div>
  </div>

    <input type="hidden" name="id" value="<?php echo $_GET['editar']; ?>">
    <input type='submit' class='btn btn-outline-dark' name='gravar' value='Gravar'>
</form>