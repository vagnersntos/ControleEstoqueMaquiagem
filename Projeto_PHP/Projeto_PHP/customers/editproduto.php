<?php 
  require_once('functions.php'); 
  edit_produto();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Cliente</h2>

<form action="editproduto.php?id=<?php echo $produto['id']; ?>" method="post">
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome </label>
      <input type="text" class="form-control" name="produto['name']" value="<?php echo $produto['name']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Valor Custo</label>
      <input type="number" class="form-control" name="produto['custo']" value="<?php echo $produto['custo']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Valor venda</label>
      <input type="number" class="form-control" name="produto['venda']" value="<?php echo $produto['venda']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-5">
      <label for="campo1">Quantidade em Estoque</label>
      <input type="number" class="form-control" name="produto['quantidade']" value="<?php echo $produto['quantidade']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Data de Cadastro</label>
      <input type="text" class="form-control" name="produto['created']" disabled value="<?php echo $produto['created']; ?>">
    </div>
  </div>
<!--
    <div class="form-group col-md-1">
      <label for="campo3">UF</label>
      <input type="text" class="form-control" name="produto['state']" value="<?php echo $produto['state']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="campo3">Inscrição Estadual</label>
      <input type="text" class="form-control" name="produto['ie']" value="<?php echo $produto['ie']; ?>">
    </div>
-->
    <div class="form-group col-md-2">
      <label for="campo3">UF</label>
      <input type="text" class="form-control">
    </div>
  </div>
  <div id="actions" class="row">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-default">Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>
