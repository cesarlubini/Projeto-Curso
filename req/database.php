<?php 

  $dsn = 'mysql:host=localhost;dbname=projeto_cursos;charset=utf8mb4;port:3306';
  $db_user = 'root';
  $db_pass = '';
  $conexao = new PDO($dsn, $db_user, $db_pass);
  

  // var_dump($conexao);

  //$query = $conexao->query('SELECT * FROM usuarios');

  // $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

  // var_dump($resultado);
?>