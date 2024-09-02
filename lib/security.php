<?php

  function protegeLogin(){
    // $_SESSION['login'] = false;

    if($_SESSION['login'] == false){
      header("HTTP/1.0 401 Unauthorized");
      include('livrocaixa/include/unauthorized.php');
      exit();
    }

  }

?>