<?php 
include("admin/pdo.class.php");
require_once 'cabecalho.php';

@$ls_nome=$_GET['ls_nome'];
@$ls_id=$_GET['ls_id'];
@$itn_id='';
?>
<div class="w3-container">
    <h1>Pechincha</h1>
</div>
</div>

<div class="w3-container">
	<?php if($ls_id ==''){ ?>
	<h3 style="padding-top: 15px; padding-bottom: 15px;"><em>Nova lista*</em></h3>
	<form action="comandos.php" method="post" class="form-inline">
		<input type= "text" id="ls_nome" name="ls_nome" class="form-control" required placeholder="Escreva o nome da lista" value="<?php echo $ls_nome;?>">
		<input type="submit" class="btn btn-primary" name="btn_new_lista" value="+">
	</form>
	<?php } else { ?>
	<h3 style="padding-top: 15px; padding-bottom: 15px;"><?php echo $ls_nome; ?></h3><div class="form-group">
		<form action="comandos.php" method="post" class="form-inline">
		<input type="text" name="itn_nome" class="form-control"  placeholder="Produto" size="50">
		<input type="number" name="itn_qtd" class="form-control"placeholder="Quantidade" size="5">
		<input type="hidden" name="itn_ls_id" value="<?php echo @$ls_id;?>">
		<input type="hidden" name="ls_nome" value="<?php echo @$ls_nome;?>">
		<input type="submit" class="btn btn-primary" name="btn_new_item" value="+"></form>
	</div> <?php } ?>

<table class="table table-striped">
    <thead>
      <tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Controle</th>
      </tr>
    </thead>
    <tbody>
      	<?php
	if ($ls_id){ 
	foreach (MostrarItens($ls_id) as $value) {
		$itn_id = $value->itn_id;
		$itn_qtd = $value->itn_qtd;
		$itn_nome = $value->itn_nome;
		echo '<td>' . $itn_nome . '</td><td>' . $itn_qtd . "</td><td><a class='btn btn-warning' href=" . '"lista_edit.php?ls_id=' . $ls_id . '&ls_nome=' . $ls_nome . '&itn_id=' . $itn_id . '&itn_nome=' . $itn_nome . '&itn_qtd='. $itn_qtd . '">!</a>' . "<a class='btn btn-danger' href=" . '"comandos.php?ls_id=' . $ls_id . '&ls_nome=' . $ls_nome . '&itn_id=' . $itn_id . '&action=delitem">-</a></td></tr>'; 
	}	
	if ($itn_id == '' ) {echo "<tr><td colspan='3'><em>Adicione itens a lista<em></td></tr>";}
	}	
	?>
     </tbody>
  </table>

	

<?php require_once 'rodape.php'; ?>
