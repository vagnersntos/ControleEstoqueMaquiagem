<?php
mysqli_report(MYSQLI_REPORT_STRICT);
function open_database() {
  try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $conn;
  } catch (Exception $e) {
    echo $e->getMessage();
    return null;
  }
}
function close_database($conn) {
  try {
    mysqli_close($conn);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find( $table = null, $id = null ) {
  
  $database = open_database();
  $found = null;
  try {
    if ($id) {
      $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);
      
      if ($result->num_rows > 0) {
        $found = $result->fetch_assoc();
      }
      
    } else {
      
      $sql = "SELECT * FROM " . $table;
      $result = $database->query($sql);
      
      if ($result->num_rows > 0) {
        $found = $result->fetch_all(MYSQLI_ASSOC);
        
        /* Metodo alternativo
        $found = array();
        while ($row = $result->fetch_assoc()) {
          array_push($found, $row);
        } */
      }
    }
  } catch (Exception $e) {
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  
  close_database($database);
  return $found;
}

/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function find_all( $table ) {
  return find($table);
}

/**
*  Insere um registro no BD
*/
function save($table = null, $data = null) {
  $database = open_database();
  $columns = null;
  $values = null;
  //print_r($data);
  foreach ($data as $key => $value) {
    $columns .= trim($key, "'") . ",";
    $values .= "'$value',";
  }
  // remove a ultima virgula
  $columns = rtrim($columns, ',');
  $values = rtrim($values, ',');
  
  $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
  try {
    $database->query($sql);
    $_SESSION['message'] = 'Registro cadastrado com sucesso.';
    $_SESSION['type'] = 'success';
  
  } catch (Exception $e) { 
  
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 
  close_database($database);
}

/**
 *  Atualizacao/Edicao de Cliente
 */
function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['customer'])) {
      $customer = $_POST['customer'];
      $customer['modified'] = $now->format("Y-m-d H:i:s");
      update('customers', $id, $customer);
      header('location: index.php');
    } else {
      global $customer;
      $customer = find('customers', $id);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Atualiza um registro em uma tabela, por ID
 */
function update($table = null, $id = 0, $data = null) {
  $database = open_database();
  $items = null;
  foreach ($data as $key => $value) {
    $items .= trim($key, "'") . "='$value',";
  }
  // remove a ultima virgula
  $items = rtrim($items, ',');
  $sql  = "UPDATE " . $table;
  $sql .= " SET $items";
  $sql .= " WHERE id=" . $id . ";";
  try {
    $database->query($sql);
    $_SESSION['message'] = 'Registro atualizado com sucesso.';
    $_SESSION['type'] = 'success';
  } catch (Exception $e) { 
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 
  close_database($database);
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function remove( $table = null, $id = null ) {
  $database = open_database();
  
  try {
    if ($id) {
      $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);
      if ($result = $database->query($sql)) {     
        $_SESSION['message'] = "Registro Removido com Sucesso.";
        $_SESSION['type'] = 'success';
      }
    }
  } catch (Exception $e) { 
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  close_database($database);
}



/*______________________________________________________________________________ data base produto ___________________________________________________________*/


/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
function find_produto( $table = null, $id = null ) {
  
  $database = open_database();
  $found = null;
  try {
    if ($id) {
      $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);
      
      if ($result->num_rows > 0) {
        $found = $result->fetch_assoc();
      }
      
    } else {
      
      $sql = "SELECT * FROM " . $table;
      $result = $database->query($sql);
      
      if ($result->num_rows > 0) {
        $found = $result->fetch_all(MYSQLI_ASSOC);
        
        /* Metodo alternativo
        $found = array();
        while ($row = $result->fetch_assoc()) {
          array_push($found, $row);
        } */
      }
    }
  } catch (Exception $e) {
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  
  close_database($database);
  return $found;
}

/**
 *  Pesquisa Todos os Registros de uma Tabela
 */
function find_all_produto( $table ) {
  return find($table);
}

/**
*  Insere um registro no BD
*/
function save_produto($table = null, $data = null) {
  $database = open_database();
  $columns = null;
  $values = null;
  //print_r($data);
  foreach ($data as $key => $value) {
    $columns .= trim($key, "'") . ",";
    $values .= "'$value',";
  }
  // remove a ultima virgula
  $columns = rtrim($columns, ',');
  $values = rtrim($values, ',');
  
  $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
  try {
    $database->query($sql);
    $_SESSION['message'] = 'Registro cadastrado com sucesso.';
    $_SESSION['type'] = 'success';
  
  } catch (Exception $e) { 
  
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 
  close_database($database);
}

/**
 *  Atualizacao/Edicao de Cliente
 */
function edit_produto() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['produtos'])) {
      $produto = $_POST['produtos'];
      $produto['modified'] = $now->format("Y-m-d H:i:s");
      update('produtos', $id, $produto);
      header('location: indexproduto.php');
    } else {
      global $produto;
      $produto = find('produtos', $id);
    } 
  } else {
    header('location: indexproduto.php');
  }
}

/**
 *  Atualiza um registro em uma tabela, por ID
 */
function update_produto($table = null, $id = 0, $data = null) {
  $database = open_database();
  $items = null;
  foreach ($data as $key => $value) {
    $items .= trim($key, "'") . "='$value',";
  }
  // remove a ultima virgula
  $items = rtrim($items, ',');
  $sql  = "UPDATE " . $table;
  $sql .= " SET $items";
  $sql .= " WHERE id=" . $id . ";";
  try {
    $database->query($sql);
    $_SESSION['message'] = 'Registro atualizado com sucesso.';
    $_SESSION['type'] = 'success';
  } catch (Exception $e) { 
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 
  close_database($database);
}

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
function remove_produto( $table = null, $id = null ) {
  $database = open_database();
  
  try {
    if ($id) {
      $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
      $result = $database->query($sql);
      if ($result = $database->query($sql)) {     
        $_SESSION['message'] = "Registro Removido com Sucesso.";
        $_SESSION['type'] = 'success';
      }
    }
  } catch (Exception $e) { 
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }
  close_database($database);
}



