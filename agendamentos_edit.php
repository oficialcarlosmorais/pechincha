<?php
include("admin/pdo.class.php");
require_once('cabecalho.php');

$id = $_GET['id_ag'];
foreach (MostrarAgendamento($id) as $value) {
	$id = $value->ag_id;
	$nome = $value->ag_nome;
	$data = $value->ag_data;
	$prioridade = $value->ag_prioridade;
	$telefone = $value->ag_telefone;
	$historico = $value->ag_historico;
	$status = $value->ag_status;

	if($data == ""){$data = "<center>-</center>";}

 }
?>
<div class="w3-container">
    <h1>Ordem Online</h1>
  </div>
</div>

<div class="w3-container">
  <h3 style="padding-top: 15px; padding-bottom: 15px;">Agendamentos | <?php echo $nome; ?></h3>
  <a href="ordem_novo.php"><button type="button" class="btn btn-outline-success"></button></a>
<table style="width: 100%;" class="table table-striped thead-light table-bordered flex-grow-1">
	<tr>
		<th class="flex-grow-1">#</th>
		<th class="flex-grow-1">NOME</th>
		<th class="flex-grow-1">AGENDADO PARA</th>
		<th class="flex-grow-1">TELEFONE</th>
		<th class="flex-grow-1">HISTÓRICO</th>
		<th class="flex-grow-1">STATUS</th>
		<th class="flex-grow-1" colspan="2">COMANDOS</th>
	</tr>

<form action="comandos.php" method="post">
	<tr>
		<input type="hidden" name="ag_id" value="<?php echo $id; ?>"> 
		<td><input type="radio" name="prioridade" value="1"></td>
		<td><input type="text" name="nome" placeholder="Nome" class="form-control" value = "<?php echo $nome; ?>" required></td>
		<td><input type="date" name="data" class="form-control" value = "<?php echo $data; ?>"></td>
		<td><input type="tel" name="telefone" placeholder="Contato" class="form-control" value = "<?php echo $telefone; ?>" required></td>
		<td><textarea name="historico" placeholder="Histórico" class="form-control" value = "<?php echo $historico; ?>"></textarea></td>
		<td><input type="text" name="status" placeholder="status" class="form-control" value = "<?php echo $status; ?>" required></td>
		<td><input type="submit" class="bnt btn-success" value="Agendar" name="btn_edt_ag"></td>
		<td><input type="reset" class="btn-danger" value="cancelar" ></td>
	</tr>
</form>
</table>

</article>
