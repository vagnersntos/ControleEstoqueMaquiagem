/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var name = button.data('customer');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Cliente ' + name);
  modal.find('#confirm').attr('href', 'delete.php?name=' + name);
})