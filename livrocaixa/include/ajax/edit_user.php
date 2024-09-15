<?php

session_start();

include('../../../lib/security.php');

include('../../../config/connection.php');

protegeLogin();

// recebe os dados do formulario
$user_id               = $_POST['user_id'];
$email                 = $_POST['email'];
$password              = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

// email em branco
if($email == ""){
  echo "email_branco";
  exit;
}

// senha em branco
if($password == ""){
  echo "senha_branco";
  exit;
}

// verifica se as senhas sao diferentes
if($password != $password_confirmation){
  echo "senha_diferente";
  exit;
}

$sql = "SELECT * FROM usuarios WHERE email = :email AND id != :user_id";
$consulta = $PDO->prepare($sql);
$consulta->bindParam(':email', $email);
$consulta->bindParam(':user_id', $user_id);
$result = $consulta->execute();

$numero_linhas = $consulta->rowCount();

if($numero_linhas != 0){
  echo "email_igual";
  exit;
}

$password_hash = password_hash($password, PASSWORD_BCRYPT);

// sql com os nomes identicos do banco de dados
$sql    = "UPDATE usuarios SET email = :email, senha = :senha WHERE id = :user_id";
$stmt   = $PDO->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $password_hash);
$result = $stmt->execute();

if(!$result){
  echo "error";
  exit;
}else{
  echo "ok";
  exit;
}
?>