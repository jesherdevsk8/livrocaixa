<?php
  function protegeLogin(){
    if(!isset($_SESSION['login']) || $_SESSION['login'] === false){
      header("HTTP/1.0 401 Unauthorized");
      include('../livrocaixa/include/unauthorized.php');
      exit();
    }
  }
?>