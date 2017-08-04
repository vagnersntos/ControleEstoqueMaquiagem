<?php 
	require_once('functions.php'); 
	viewproduto($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h3>Cliente <?php echo $produto['name']; ?></h3>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Nome do Item:</dt>
	<dd><?php echo $produto['name']; ?></dd>

	<dt>Valor Custo:</dt>
	<dd><?php echo $produto['custo']; ?></dd>

	<dt>Valor Venda:</dt>
	<dd><?php echo $produto['venda']; ?></dd>

	<dt>Quantidade em Estoque:</dt>
	<dd><?php echo $produto['estoque']; ?></dd>
</dl>

<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="editproduto.php?id=<?php echo $produto['id']; ?>" class="btn btn-primary">Editar</a>
	  <a href="indexproduto.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>
