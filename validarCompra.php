<?php
  $nomeCurso = $_REQUEST["nomeCurso"];
  $precoCurso = $_REQUEST["precoCurso"];
  $nome = $_REQUEST["nomeCompleto"];
  $cpf = $_REQUEST["cpf"];
  $nroCartao = $_REQUEST["nroCartao"];
  $validade = $_REQUEST["validade"];
  $cvv = $_REQUEST["cvv"];

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
      </div>
    </div>
  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>