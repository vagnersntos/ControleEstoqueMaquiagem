<?php 
  require_once('functions.php'); 
  if (isset($_GET['name'])){
    delete($_GET['name']);
  } else {
    die("ERRO: ID não definido.");
  }
?>
