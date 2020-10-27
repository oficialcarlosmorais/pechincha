<?php 
require_once 'cabecalho.php';  
?>
<div class="w3-container">
    <h1>Pechincha</h1>
  </div>
</div>

<div class="w3-container">
  <h3 style="padding-top: 15px; padding-bottom: 15px;">Cadastrar empresa</h3>
<form action="comandos.php" method="post">
	<input type="text" class="form-control" name="loja_raz_social"  placeholder="Razão social" /><br>
	<input type="text" class="form-control" name="loja_nom_fantasia"placeholder="Nome fantasia"  /><br>
	<input type="number" class="form-control" name="loja_cnpj"placeholder="CNPJ (somente números)" /><br>
	<input type="text" class="form-control" name="loja_email" placeholder="E-mail" /><br>
	<input list="loja_logradouro" class="form-control" name="loja_logradouro" placeholder="Rua, av, passarela...">
		<datalist id="tiporua">
			<option value="Av.">
			<option value="Rua">
			<option value="Passagem">
			<option value="Ponte">
			<option value="Beco">
		</datalist><br>
	<input type="text" class="form-control" name="loja_endereco" placeholder="nome da rua/av/etc"/><br>
	<input type="number" class="form-control" name="loja_numero" placeholder="Número" /><br>
	<input type="text" class="form-control" name="loja_bairro" placeholder="Bairro" /><br>
	<input type="text" class="form-control" name="loja_complemento" placeholder="Complemento"/><br>
	<input type="text" class="form-control" name="loja_cidade" placeholder="Cidade"  /><br>
	<select name="loja_uf" class="form-control" >
		<option selected disabled>Unidade Federativa</option>
		<option value="AC">Acre</option>
		<option value="AL">Alagoas</option>
		<option value="AP">Amapá</option>
		<option value="AM">Amazonas</option>
		<option value="BH">Bahia</option>
		<option value="CE">Ceará</option>
	</select><br>
	<input type="tel" class="form-control" name="loja_telefone" placeholder="Telefone"/><br>
	<input type="tel" class="form-control" name="loja_celular" placeholder="Celular"  /><br>
	<input type="password" class="form-control" name="loja_senha" placeholder="Senha"  /><br>
	
	<input type="submit" class="btn btn-primary" name="btn_new_emp" value="Cadastrar">
</form>
<?php
include_once('rodape.php');
?>