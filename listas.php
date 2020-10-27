<?php
include("admin/pdo.class.php");
require_once('cabecalho.php');
?>
<div class="w3-container">
    <h1>Pechincha</h1>
  </div>
</div>

<div class="w3-container">
  <h3 style="padding-top: 15px; padding-bottom: 15px;">Listas de compras</h3>
  <a href="lista_novo.php"><button type="button" class="btn btn-outline-success">Nova lista</button></a>
<table style="width: 100%;" class="table table-striped thead-light table-bordered flex-grow-1">
	<tr>
		<th class="flex-grow-1">CÓDIGO</th>
		<th class="flex-grow-1">NOME DA LISTA</th>
		<th class="flex-grow-1">QTD PRODUTOS</th>
		<th class="flex-grow-1">VALOR TOTAL</th>
		<th class="flex-grow-1" colspan="2">COMANDOS</th>
	</tr>
<?php
	foreach (MostrarListas($usr_id) as $value) {
		$itn_qtd = 0;
		$ls_id = $value->ls_id;
		$ls_nome = $value->ls_orc_nome;
		foreach (MostrarItens($ls_id) as $value) {$itn_qtd = $itn_qtd+1; }


    	echo "<tr " . 'onClick="location.href=' ."'". "lista_novo.php?ls_id=$ls_id&ls_nome=$ls_nome" . "'". '"><td>' . $ls_id . "</td><td>" . $ls_nome . "</td><td>" . $itn_qtd . "</td><td>". @$valor. '</td><td align="center" valign="center"><a href=' . '"orc_novo.php?ls_id=' . $ls_id . '&ls_nome=' . $ls_nome . '"><img src="images/edit.png" width="40px" alt="Editar"  title="Editar"></a></td><td class="d-flex justify-content-between flex-fill align-content-center" align="center" valign="center"><a href="lista_edit.php?id_servico=' . $ls_id . '&action=dellista' . '"><img src="images/print.png" width="50px" alt="Imprimir" title="Imprimir"></a></td></tr>';
 }   	

?>
<tr onclick="location.href='index.php'"><td>list</td></tr>
</table>

</article>

<?php 
include_once('rodape.php');
?>