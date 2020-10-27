<?php 
include("admin/pdo.class.php");
require_once 'cabecalho.php'; 
?>
<div class="w3-container">
    <h1>Ordem Online</h1>
  </div>
</div>

<div class="w3-container">
  <h3 style="padding-top: 15px; padding-bottom: 15px;">Novo agendamento</h3>
<form action="comandos.php" method="post">
	<label for="id_cliente">Cliente</label>
	<select id="id_cliente" name="id_cliente" class="form-control" required placeholder="Cliente">
						<?php 
	foreach (MostrarClientes() as $value) {
		$cliente_tipo = $value->us_tipo;
		if($cliente_tipo == 'cli') {
			$cliente_cpf = $value->us_cpf;
			$cliente_nome = $value->us_nome;
			$cliente_sobrenome = $value->us_sobrenome;

	 		echo '<option value="' . $cliente_cpf . '">' . $cliente_nome . " " . $cliente_sobrenome . '</option>';
		}		
	 }
	 echo "</select>";  ?><br>
	<label for="orcamento">Orçamento</label><br>
	<input id="orcamento" type="radio" name="tipo" value="orcamento" checked><br>
	<label for="preventiva">Manutenção preventiva</label><br>
	<input id="preventiva" type="radio" name="tipo" value="preventiva"><br>
	<label for="corretiva">Manutenção corretiva</label><br>
	<input id="corretiva" type="radio" name="tipo" value="corretiva"><br>

	<input type="text" class="form-control" name="produto"placeholder="Produto" required /><br>
	<input type="text" class="form-control" name="acessorios" placeholder="Acessórios"  /><br>
	<textarea name="observacao" class="form-control" placeholder="Observações"></textarea><br>
	<textarea name="queixa" class="form-control" placeholder="Queixa do produto"></textarea><br>
	<label for="id_tecnico">Técnico</label>
	<select id="id_tecnico" class="form-control" name="id_tecnico" required>
	<?php 
	foreach (MostrarClientes() as $value) {
		$cliente_tipo = $value->us_tipo;
		if($cliente_tipo == 'tec') {
			$cliente_cpf = $value->us_cpf;
			$cliente_nome = $value->us_nome;
			$cliente_sobrenome = $value->us_sobrenome;

	 		echo '<option value="' . $cliente_cpf . '">' . $cliente_nome . " " . $cliente_sobrenome . '</option>';
		}		
	 }
	?>
	</select><br>
	<input type="hidden" class="form-control" name="data_entrada" value="<?php echo date('d/m/Y'); ?>">
						
	<input type="submit" class="btn btn-primary" name="btn_new_ordem" value="Cadastrar">
</form>
<?php require_once 'rodape.php'; ?>
