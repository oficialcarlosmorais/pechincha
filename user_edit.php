<?php 
include("admin/pdo.class.php");
require_once 'cabecalho.php';
$cliente = $_GET['id']; 
?>
<div class="w3-container">
    <h1>Ordem Online</h1>
  </div>
</div>

<div class="w3-container">
  <h3 style="padding-top: 15px; padding-bottom: 15px;">Editar Usuário</h3>
<form action="comandos.php" method="post">
	<?php
		foreach (MostrarCliente($cliente) as $value) {
		$id = $value->us_id;
		$nome = $value->us_nome;
		$sobrenome = $value->us_sobrenome;
		$cpf = $value->us_cpf;
		$email = $value->us_email;
		$rua = $value->us_rua;
		$bairro = $value->us_bairro;
		$complemento = $value->us_complemento;
		$cidade = $value->us_cidade;
		$uf = $value->us_uf;
		$telefone = $value->us_telefone;
		$celular = $value->us_celular;
		$senha = $value->us_senha;
		$tipo = $value->us_tipo;
	 }
	 ?>
	<input type="hidden" name="id" value=<?php echo $id; ?>>
	<input type="text" class="form-control" name="nome" required placeholder="Nome" value="<?php echo $nome?>" /><br>
	<input type="text" class="form-control" name="sobrenome"placeholder="Sobrenome" required value="<?php echo $sobrenome?>" /><br>
	<input type="text" class="form-control" name="cpf" maxlength="11" placeholder="CPF (somente números)" value="<?php echo $cpf?>" readonly /><br>
	<input type="text" class="form-control" name="email" placeholder="E-mail" required value="<?php echo $email?>" /><br>
	<input type="text" class="form-control" name="rua" placeholder="rua/av/etc" required value="<?php echo $rua?>"/><br>
	<input type="text" class="form-control" name="bairro" placeholder="Bairro" required value="<?php echo $bairro?>"/><br>
	<input type="text" class="form-control" name="complemento" placeholder="Complemento" value="<?php echo $complemento?>"><br>
	<input type="text" class="form-control" name="cidade" placeholder="Cidade" required value="<?php echo $cidade?>" /><br>
	<select name="uf" class="form-control" required>
		<option selected value="<?php echo $uf?>" ><?php echo $uf?></option>
		<option value="AC">Acre</option>
		<option value="AL">Alagoas</option>
		<option value="AP">Amapá</option>
		<option value="AM">Amazonas</option>
		<option value="BH">Bahia</option>
		<option value="CE">Ceará</option>
	</select><br>
	<input type="tel" class="form-control" name="telefone" placeholder="Telefone" value="<?php echo $telefone?>" /><br>
	<input type="tel" class="form-control" name="celular" placeholder="Celular" required value="<?php echo $celular?>" /><br>
	<input type="password" class="form-control" name="senha" placeholder="Senha" required value="<?php echo $senha?>" /><br>
	<input type="hidden" name="tipo" value="<?php echo $tipo?>">
	<input type="submit" class="btn btn-primary" name="btn_edit_user" value="Editar">
</form>
<?php 
require_once 'rodape.php';
 ?>
