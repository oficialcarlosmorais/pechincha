<?php 
include("admin/pdo.class.php");
require_once 'cabecalho.php';

@$ls_nome=$_GET['ls_nome'];
@$ls_id=$_GET['ls_id'];
@$itn_id=$_GET['itn_id'];
@$itn_nome = $_GET['itn_nome'];
@$itn_qtd = $_GET['itn_qtd'];
?>
<div class="w3-container">
    <h1>Pechincha</h1>
</div>
</div>

<div class="w3-container">
	
	<h3 style="padding-top: 15px; padding-bottom: 15px;"><em>Editar lista - <?php echo $ls_nome; ?></em></h3>
	<form action="comandos.php" method="POST" class="form-inline">
		<input type="text" id="itn_nome" name="itn_nome" class="form-control" required value="<?php echo $itn_nome;?>">
		<input type= "text" id="itn_qtd" name="itn_qtd" class="form-control" required placeholder="Quantidade" value="<?php echo $itn_qtd;?>">
		<input type="hidden" name="itn_id" value="<?php echo $itn_id;  ?>">
		<input type="hidden" name="ls_nome" value="<?php echo $ls_nome; ?>">
		<input type="hidden" name="ls_id" value="<?php echo $ls_id; ?>">
		<input type="submit" class="btn btn-primary" name="btn_edit_item" value="!">
	</form>
	
<?php require_once 'rodape.php'; ?>
