<?php 
  require "req/funcoesLogin.php";
  include "inc/head.php";

  if($_REQUEST) {
    $nome = $_REQUEST["nome"];
    $email = $_REQUEST["email"];
    $senha = $_REQUEST["senha"];
    $confirmarSenha = $_REQUEST["confirmarSenha"];

    //verificando se a senha é igual a corfirmar senha
    if ($senha == $confirmarSenha) { 
      //criptografando a senha
      $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);
      // criando novo usuário
      $novoUsuario = [
        "nome" => $nome,
        "email" => $email,
        "senha" => $senhaCrip
      ];
      // cadastro meu usuario no json
      $cadastrou = cadastrarUsuario($novoUsuario);

    } else {
      $erro = "Senhas incompativeis";
    }
  }
?>

  <div class="page-center">
    <h2>Cadastre-se</h2>
    <!-- Verifica se a variavel $cadastrou foi definida -->
    <?php if (isset($cadastrou) && $cadastrou) : ?>
      <div class="alert alert-success" role="alert">
        <span>Usuário cadastrado com sucesso!</span>
      </div>
    <?php elseif (isset($erro)) : ?>
      <div class="alert alert-danger" role="alert">
        <?= $erro; ?>
      </div>
    <?php endif; ?>
    <form action="cadastro.php" method="post" class="col-md-7">
      <div class="col-md-12">
        <label for="inputNome">Nome</label>
        <input type="text" name="nome" class="form-control" id="inputNome">
      </div>
      <div class="col-md-12">
        <label for="inputEmail">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail">
      </div>
      <div class="col-md-12">
        <label for="inputSenha">Senha</label>
        <input type="password" name="senha" class="form-control" id="inputSenha">
      </div>
      <div class="col-md-12">
        <label for="inputConfirmarSenha">Confirme sua senha</label>
        <input type="password" name="confirmarSenha" class="form-control" id="inputConfirmarSenha">
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="login.php" class="col-md-offset-9">Fazer Login!</a>
      </div>
    </form>
  </div>

<?php 
  include "inc/footer.php";
?>