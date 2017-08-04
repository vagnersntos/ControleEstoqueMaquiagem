<?php
    require_once('functions.php');
    indexproduto();
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
	<div class="row">
		<div class="col-sm-6">
			<h2>Produtos</h2>
		</div>
		<div class="col-sm-6 text-right h2">
	    	<a class="btn btn-primary" href="addproduto.php"><i class="fa fa-plus"></i> Novo Item</a>
	    	<a class="btn btn-default" href="indexproduto.php"><i class="fa fa-refresh"></i> Atualizar</a>
	    </div>
	</div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $_SESSION['message']; ?>
	</div>
	<?php clear_messages(); ?>
<?php endif; ?>

<hr>

<table class="table table-hover">
<thead>
	<tr>
		<th>ID</th>
		<th width="30%">Nome</th>
		<th>Valor de Custo</th>
		<th>Valor de Venda</th>
		<th>Quantidade em estoque</th>
	</tr>
</thead>
<tbody>
<?php if ($produto) : ?>
<?php foreach ($produto as $produtos) : ?>
	<tr>
		<td><?php echo $produtos['id']; ?></td>
		<td><?php echo $produtos['name']; ?></td>
		<td><?php echo $produtos['custo']; ?></td>
		<td><?php echo $produtos['venda']; ?></td>
		<td><?php echo $produtos['estoque']; ?></td>
		<td class="actions text-right">
			<a href="viewproduto.php?id=<?php echo $produto['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
			<a href="editproduto.php?id=<?php echo $produto['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
			<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $produto['id']; ?>">
				<i class="fa fa-trash"></i> Excluir
			</a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
	<tr>
		<td colspan="6">Nenhum registro encontrado.</td>
	</tr>
<?php endif; ?>
</tbody>
</table>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>
