<?php
include("admin/pdo.class.php");
require_once('cabecalho.php');
?>
<div class="w3-container">
    <h1>Ordem Online</h1>
  </div>
</div>

<div class="w3-container">
  <h3 style="padding-top: 15px; padding-bottom: 15px;">Agendamentos</h3>
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
<?php
foreach (MostrarAgendamentos() as $value) {
	$id = $value->ag_id;
	$nome = $value->ag_nome;
	$data = $value->ag_data;
	$prioridade = $value->ag_prioridade;
	$telefone = $value->ag_telefone;
	$historico = $value->ag_historico;
	$status = $value->ag_status;

	if($data == ""){
		$data = "<center>-</center>";
	} else {
		$data=date('d/m/Y', strtotime($data));
	}
			
    echo "<tr><td>" .$prioridade. "</td><td> ". $nome . "</td><td>" . $data . "</td><td>" . $telefone . "</td><td>" . $historico. "</td><td>".$status. '</td><td align="center" valign="center"><a href=' . '"agendamentos_edit.php?id_ag=' . $id . '"><img src="images/edit.png" width="20px" alt="Editar"  title="Editar"></a></td><td class="d-flex justify-content-between flex-fill align-content-center" align="center" valign="center"><a href="comandos.php?action=delag&id_ag=' . $id . '"><button class="btn btn-danger">Deletar</button></a></td></tr>';
 }
?>
<form action="comandos.php" method="post">
	<tr>
		<td><input type="radio" name="prioridade" value="1"></td>
		<td><input type="text" name="nome" placeholder="Nome" class="form-control" required></td>
		<td><input type="date" name="data" class="form-control"></td>
		<td><input type="text" name="telefone" placeholder="Contato" class="form-control" required></td>
		<td colspan="2"></td>
		<td><input type="submit" class="bnt btn-success" value="Agendar" name="btn_new_ag"></td>
		<td><input type="reset" class="btn-danger" value="cancelar" ></td>
	</tr>
</form>
</table>

</article>

<?php 
include_once('rodape.php');
?>