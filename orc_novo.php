<?php 
include("admin/pdo.class.php");
require_once 'cabecalho.php';

@$ls_nome=$_GET['ls_nome'];
@$ls_id=$_GET['ls_id'];
@$itn_id='';
@$emp_nome=$_GET['emp_nome'];
?>
<div class="w3-container">
    <h1>Pechincha</h1>
</div>
</div>

<div class="w3-container">
	<?php if($emp_nome ==''){ ?>
	<h3 style="padding-top: 15px; padding-bottom: 15px;"><em>Novo orçamento - <?php echo $ls_nome . ' | - ';?></em></h3>
	<form action="#" method="GET" class="form-inline">
		<input type= "text" id="emp_nome" name="emp_nome" class="form-control" required placeholder="Empresa">
		<input type="hidden" name="ls_id" value="<?php echo $ls_id; ?>">
		<input type="hidden" name="ls_nome" value="<?php echo $ls_nome; ?>">
		<input type="submit" class="btn btn-primary" name="btn_new_emp" value="+">
	</form>
	<?php } else { ?>
	<h3 style="padding-top: 15px; padding-bottom: 15px;">Orçamento  <?php echo " - $ls_nome | $emp_nome"; ?></h3><div class="form-group">
		
	</div> <?php } ?>
<form action="comandos.php" method="GET" class="form-inline">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor unitário</th>
        <th>Valor total</th>
      </tr>
    </thead>
    <tbody>
      	<?php
	if ($emp_nome!=''){ 
	foreach (MostrarItens($ls_id) as $value) {
		$itn_id = $value->itn_id;
		$itn_qtd = $value->itn_qtd;
		$itn_nome = $value->itn_nome;

		echo '<input type="hidden" name="ls_id" value="' . $ls_id . '">';
		echo '<input type="hidden" name="ls_nome" value="' . $ls_nome . '">';
		echo '<input type="hidden" name="prod_itn_id" value="' . $itn_id . '">';
		echo '<input type="hidden" name="prod_loja" value="' . $emp_nome .'">';
		echo '<td>' . $itn_nome . '</td><td>' . $itn_qtd . '</td><td><input type="number" class="form-control" name="prod_valor" size="2" placeholder="R$"><input type="submit" class="btn btn-primary" name="btn_add_prod" value="+"></td><td>valor total</td></tr>';
	}	

	if ($itn_id == '' ) {echo "<tr><td colspan='3'><em>Adicione itens a lista<em></td></tr>";}
	}	
	?>
     </tbody>
  </table>
</form>
	

<?php require_once 'rodape.php'; ?>
