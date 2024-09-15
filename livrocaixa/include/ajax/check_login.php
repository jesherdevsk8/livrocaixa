<?php
  session_start();

  include('../../../config/connection.php');

  // var_dump($_POST);

  $email    = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM usuarios WHERE email = :email";
  $stmt = $PDO->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $stored_hash = $row['senha'];

  // $stored_hash = $stmt->fetchColumn();

  if ($stored_hash && password_verify($password, $stored_hash)) {
    $_SESSION['id']         = $row['id'];
    $_SESSION['email']      = $email;
    $_SESSION['credencial'] = $row['credencial'];
    $_SESSION['login'] = true;
    echo "ok";
  } else {
    echo "error";
  }

  exit;
?>