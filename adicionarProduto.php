<?php 
  require "req/database.php";
  require "req/funcoesProduto.php";
  include "inc/head.php";
  include "inc/header.php";

  try {
    global $conexao;

    $query = $conexao->query("SELECT * FROM usuarios WHERE tipo_usuario_fk = 2;");

    $professores = $query->fetchAll(PDO::FETCH_ASSOC);

  } catch ( PDOException $Exception) {
      echo $Exception->getMessage();
    }
  
  if ($_REQUEST) {
    $nome = $_REQUEST['nome'];
    $descricao = $_REQUEST['descricao'];
    $preco = $_REQUEST['preco'];
    $tag = $_REQUEST['tag'];
    $professor = $_REQUEST['professor'];
    $caminhoCompleto = "";

    if($_FILES) {
      //verifica se não teve erro de upload
      if ($_FILES["inputArquivo"]["error"] == UPLOAD_ERR_OK) {
        //pega o nome real do arquivo
        $nomeArquivo = $_FILES["inputArquivo"]["name"];
        //pega o nome temporario do arquivo
        $nomeTemp = $_FILES["inputArquivo"]["tmp_name"];
        //pegando o caminho até a pasta raiz
        $pastaRaiz = dirname(__FILE__);
        //selecionando a pasta para qual o arquivo será enviado
        $pastaDesejada = "\assets\img\produtos\\";
        //selecionando o caminho completo para ser utilizado na função move_uploaded_file
        $caminhoCompleto = $pastaRaiz . $pastaDesejada . $tag . ".png";
        //movendo o arquivo com a função move_uploaded_file
        move_uploaded_file($nomeTemp, $caminhoCompleto);
      }
    }

    $produto = [
      "nome" => $nome,
      "descricao" => $descricao,
      "preco" => $preco,
      "tag" => $tag,
      "professor" => $professor,
      "imagem" => $tag . ".png"
    ];

    $adicionou = adicionarProduto($produto);
  }
?>

<div class="page-center">
  <h2> Adicionar Produto</h2>
  <!-- mostra a mensagem de erro caso a variavel $erro esteja definida -->
  <?php if(isset($adicionou) AND $adicionou) : ?>
   <div class="alert alert-success" role="alert">
      <span>Produto adicionado com sucesso</span>
    </div>
  <?php endif; ?>
  <form action="adicionarProduto.php" method="post" class="col-md-7" enctype="multipart/form-data">
    <div class="col-xs-12">
      <label for="nome">Nome</label>
      <input type="text" name="nome" class="form-control" id="nome">
    </div>
    <div class="col-xs-12">
      <label for="descricao">Descrição</label>
      <textarea name="descricao" id="descricao" class="form-control"></textarea>
    </div>
    <div class="col-xs-12">
      <label for="preco">Preço</label>
      <input type="number" name="preco" id="preco" class="form-control">
    </div>
    <div class="col-xs-12">
      <label for="tag">tag</label>
      <input type="text" name="tag" id="tag" class="form-control">
    </div>
    <div class="col-xs-12">
      <label for="professor">Professor</label>
      <select name="professor" id="professor" class="form-control">
        <option disabled selected>Selecione o professor</option>
        <?php 
          if(isset($professores)) {
            foreach ($professores as $professor) {
              echo "<option value='" . $professor['id_usuario'] . "'>" . $professor['nome'] . "</option>";
            }
          }
        ?>
      </select>
    </div>
    <div class="col-xs-12">
      <br>
      <label for="inputArquivo" class="btn btn-info">Upload foto do produto</label>
      <input type="file" name="inputArquivo" id="inputArquivo" class="hidden">
    </div>
    <div class="col-xs-12">
      <br>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
  </form>
</div>


<?php 
  include "inc/footer.php";
?>