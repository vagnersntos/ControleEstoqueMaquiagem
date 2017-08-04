<?php
require_once('../config.php');
require_once(DBAPI);
$customers = null;
$customer = null;
$produtos = null;
$produto = null;
/**
 *  Listagem de Clientes
 */
function index() {
  global $customers;
  $customers = find_all('customers');
}

/*listagem de produtos*/
function indexproduto() {
  global $produto;
  $produto = find_all('produtos');
}

/**
 *  Cadastro de Clientes
 */
function add() {
  if (!empty($_POST['customer'])) {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $customer = $_POST['customer'];
    $customer['modified'] = $customer['created'] = $today->format("d-m-Y H:i:s");
    
    save('customers', $customer);
    header('location: index.php');
  }
}

/**
 *  Cadastro de produtos
 */

function addproduto() {
  if (!empty($_POST['produtos'])) {
    
    $today = 
      date_create('now', new DateTimeZone('America/Sao_Paulo'));
    $produto  = $_POST['produtos'];
    $produto ['modified'] = $produto ['created'] = $today->format("Y-m-d H:i:s");
    
    save('produtos', $produto);
    header('location: indexproduto.php');
  }
}


/**
 *  Visualização de um Cliente
 */
function view($id = null) {
  global $customer;
  $customer = find('customers', $id);
}

/*visualização de um produto*/

function viewproduto($id = null) {
  global $produto;
  $produto = find('produtos', $id);
}


/**
 *  Exclusão de um Cliente
 */
function delete($id = null) {
  global $customer;
  $customer = remove('customers', $id);
  header('location: index.php');
}

function deleteproduto($id = null) {
  global $produto;
  $produto = remove('produtos', $id);
  header('location: indexprodutos.php');
}


