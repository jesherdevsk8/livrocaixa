<?php
  define('MYSQL_HOST', getenv('MYSQL_HOST') ?: 'mysql');
  define('MYSQL_PORT', getenv('MYSQL_PORT') ?: '3306');
  define('MYSQL_USER', getenv('MYSQL_USER') ?: 'admin');
  define('MYSQL_PASSWORD', getenv('MYSQL_PASSWORD') ?: 'senha@123');
  define('MYSQL_DB_NAME', getenv('MYSQL_DB_NAME') ?: 'livrocaixa');

  try{
    $dsn = 'mysql:host=' . MYSQL_HOST . ';port=' . MYSQL_PORT . ';dbname=' . MYSQL_DB_NAME;
    $PDO = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
  }catch(PDOException $e){
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
    exit;
  }
?>
