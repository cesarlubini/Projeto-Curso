<?php 


  function cadastrarUsuario ($usuario) {
    
  }

  function logarUsuario($email, $senha) {
    global $nomeArquivo;
    $nomeLogado = "";
    // pegando o conteúdo do arquivo usuarios.json
    $usuariosJson = file_get_contents($nomeArquivo);
    // transformando o json em array associativo
    $arrayUsuarios = json_decode($usuariosJson, true);

    // verifica se o usuario existe no arquivo usuarios.json
    foreach ($arrayUsuarios["usuarios"] as $chave => $valor) {
      //verificando se email e senha são iguais ao do json
      if ($valor["email"] == $email && password_verify($senha, $valor["senha"])) {
        $nomeLogado = $valor["nome"];
        break;
      }
    }
    return $nomeLogado;
  }

?>