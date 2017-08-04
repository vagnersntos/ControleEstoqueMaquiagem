<?php 
  require_once('functions.php'); 
  addproduto();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Produto</h2>

<form action="addproduto.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome do Item</label>
      <input type="text" class="form-control" name="produtos['name']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Valor Custo</label>
      <input type="number" class="form-control" name="produtos['custo']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Valor venda</label>
      <input type="number" class="form-control" name="produtos['venda']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Quantidade em estoque</label>
      <input type="number" class="form-control" name="produtos['estoque']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="campo3">Data de Cadastro</label>
      <input type="text" class="form-control" name="produtos['created']" disabled>
    </div>
  </div>
    
    <!--<div class="form-group col-md-1">
      <label for="campo3">UF</label>
      <input type="text" class="form-control" name="produto['state']">
    </div>
    
    <div class="form-group col-md-2">
      <label for="campo3">Inscrição Estadual</label>
      <input type="text" class="form-control" name="produto['ie']">
    </div>
    -->    
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="indexproduto.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
