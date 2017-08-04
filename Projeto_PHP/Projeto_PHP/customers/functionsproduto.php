<?php
/**
funções produtos

*/

require_once('../config.php');
require_once(DBAPI);
$produtos = null;
$produto = null;
/**
 *  Listagem de produto
 */
function index() {
  global $produto;
  $produto = find_all('produtos');
}

/**
 *  Cadastro de produto
 */
function add() {
  if (!empty($_POST['produtos'])) {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $produto = $_POST['produtos'];
    $produto['modified'] = $produto['created'] = $today->format("Y-m-d H:i:s");
    
    save('produto', $produto);
    header('location: indexproduto.php');
  }
}

/**
 *  Visualização de um produto
 */
function view($id = null) {
  global $produto;
  $produto = find('produtos', $id);
}

/**
 *  Exclusão de um produto
 */
function delete($id= null) {
  global $produto;
  $produto = remove('produtos', $id);
  header('location: indexproduto.php');
}
?>