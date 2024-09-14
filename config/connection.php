<?php
  define('PGSQL_HOST', getenv('PGSQL_HOST') ?: 'postgres');
  define('PGSQL_PORT', getenv('PGSQL_PORT') ?: '5432');
  define('PGSQL_USER', getenv('PGSQL_USER') ?: 'admin');
  define('PGSQL_PASSWORD', getenv('PGSQL_PASSWORD') ?: 'senha@123');
  define('PGSQL_DB_NAME', getenv('PGSQL_DB_NAME') ?: 'livrocaixa');

  try {
    $dsn = 'pgsql:host=' . PGSQL_HOST . ';port=' . PGSQL_PORT . ';dbname=' . PGSQL_DB_NAME;
    $PDO = new PDO($dsn, PGSQL_USER, PGSQL_PASSWORD);
  } catch (PDOException $e) {
    echo 'Erro ao conectar com o PostgreSQL: ' . $e->getMessage();
    exit;
  }
?>
