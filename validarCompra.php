<?php
  $nomeCurso = $_REQUEST["nomeCurso"];
  $precoCurso = $_REQUEST["precoCurso"];
  $nome = $_REQUEST["nomeCompleto"];
  $cpf = $_REQUEST["cpf"];
  $nroCartao = $_REQUEST["nroCartao"];
  $validade = $_REQUEST["validade"];
  $cvv = $_REQUEST["cvv"];
  $erros = [];

  //funções
  function validarNome ($nome) {
    return strlen($nome) > 0 && strlen($nome) <= 15;
  } 

  function validarCpf($cpf) {
    return strlen($cpf) == 11;
  }

  function validarNroCartao($nroCartao) {
    $primeiroNum = substr($nroCartao, 0, 1);
    return $primeiroNum == 4 || $primeiroNum == 5 || $primeiroNum == 6;
  }

  function validarData($validade) {
    $dataAtual = date("Y-m");
    return $validade >= $dataAtual;
  }

  function validarCvv ($cvv) {
    return strlen($cvv) == 3;
  }

  function validarCompra($nome, $cpf, $nroCartao, $validade, $cvv) {
    global $erros;

    if (!validarNome($nome)) {
      array_push($erros, "Preencha seu nome");
    }

    if (!validarCpf($cpf)) {
      array_push($erros, "Seu CPF precisa ter 11 caracters");
    }

    if (!validarNroCartao($nroCartao)) {
      array_push($erros, "Seu cartão precisa começar com 4, 5 ou 6");
    }

    if (!validarData($validade)) {
      array_push($erros, "A validade precisa ser maior que a data atual");
    }

    if (!validarCvv($cvv)) {
      array_push($erros, "Seu CVV precisa ter 3 caracteres");
    }
  }

  validarCompra($nome, $cpf, $nroCartao, $validade, $cvv);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Obrigado!</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <?php if (count($erros) > 0) :?>
          <div class="panel panel-danger">
            <div class="panel-heading">
              <span>Preencha seus dados corretamente!</span>
            </div>
            <div class="panel-body">
              <ul class="list-group">
                <?php foreach($erros as $chave => $valorErro) : ?>
                  <li class="list-group-item">
                    <?= $valorErro ?>
                  </li>
                <?php endforeach; ?>
              </ul>
              <div class="center"><a href="index.php">Voltar para home</a></div>
            </div>
          </div>
        <?php else : ?>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <span>Compra realizada com sucesso!</span>
            </div>
            <div class="panel-body">
              <ul class="list-group">
                <li class="list-group-item"><strong>Nome Curso: <?php echo $nomeCurso; ?></strong></li>
                <li class="list-group-item"><strong>Preço: R$ <?php echo $precoCurso; ?></strong></li>
                <li class="list-group-item"><strong>Nome Completo: </strong><?php echo $nome; ?></li>
              </ul>
              <div class="center"><a href="index.php">Voltar para home</a></div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>