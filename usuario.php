<?php 
  include "inc/head.php";
  include "inc/header.php";
  //verifica se o arquivo foi enviado
  if($_FILES) {
    //verifica se não teve erro de upload
    if ($_FILES["arquivo"]["error"] == UPLOAD_ERR_OK) {
      //pega o nome real do arquivo
      $nomeArquivo = $_FILES["arquivo"]["name"];
      //pega o nome temporario do arquivo
      $nomeTemp = $_FILES["arquivo"]["tmp_name"];
      //pegando o caminho até a pasta raiz
      $pastaRaiz = dirname(__FILE__);
      //selecionando a pasta para qual o arquivo será enviado
      $pastaDesejada = "\assets\img\\";
      //selecionando o caminho completo para ser utilizado na função move_uploaded_file
      $caminhoCompleto = $pastaRaiz . $pastaDesejada . "avatar.png";
      //movendo o arquivo com a função move_uploaded_file
      move_uploaded_file($nomeTemp, $caminhoCompleto);
    }
  }
?>

  <div class="page-center">
    <div class="col-md-3">
      <div class="thumbnail">
        <img src="assets/img/avatar.png" alt="Foto de perfil">
        <div class="caption">
          <h2><?php echo $nomeLogado?></h2>
          <p><?php echo $emailLogado?></p>
          <form action="usuario.php" method="post" enctype="multipart/form-data">
            <label for="inputArquivo" class="btn btn-info">Escolha sua foto</label>
            <input type="file" id="inputArquivo" name="arquivo" class="hidden">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php 
  include "inc/footer.php";
?>