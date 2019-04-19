<?php 
  //iniciando a sessão do usuário
  session_start();
  //destruindo a sessão do usuário
  session_destroy();
  //redirecionando o usuario para o login.php
  header("location: ../login.php");
?>