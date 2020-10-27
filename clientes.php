<?php
include("admin/pdo.class.php");
require_once('cabecalho.php');
?>
<div class="w3-container">
    <h1>Ordem Online</h1>
  </div>
</div>

<div class="w3-container">
  <h3 style="padding-top: 15px; padding-bottom: 15px;">Clientes</h3>
  <a href="cliente_novo.php"><button type="button" class="btn btn-outline-success">Novo cliente</button></a>
<table style="width: 100%;" class="table table-striped thead-light table-bordered flex-grow-1">
	<tr>
		<th class="flex-grow-1">NOME</th>
		<th class="flex-grow-1">CPF</th>
		<th class="flex-grow-1">TELEFONE</th>
		<th class="flex-grow-1">STATUS</th>
		<th class="flex-grow-1" colspan="2">COMANDOS</th>
	</tr>
<?php

foreach (MostrarClientes() as $value) {
	$tipo = $value->us_tipo;
	if($tipo=='cli'){
		$nome = $value->us_nome;
		$sobrenome = $value->us_sobrenome;
		$cpf = $value->us_cpf;
		$celular = $value->us_celular;
		$c=count(StatusCliente($cpf));
		$status = "$c ordens";
		$action = "del";
		echo "<tr><td>" . $nome .' '.$sobrenome . "</td><td>" . $cpf . "</td><td>" . $celular . "</td><td>" . $status . "</td><td><a class='btn btn-warning' href=" . '"user_edit.php?id=' . $cpf . '">EDITAR</a></td><td><a class="btn btn-danger" href="comandos.php?id=' . $cpf . '&action=' . $action . '">EXCLUIR</a></td></tr>';
	}
}   	

?>
</table>

</article>

<?php 
include_once('rodape.php');
?>