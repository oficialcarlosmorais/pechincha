<?php 
require_once 'cabecalho.php';  
?>
<div class="w3-container">
    <h1>Ordem Online</h1>
  </div>
</div>

<div class="w3-container">
  <h3 style="padding-top: 15px; padding-bottom: 15px;">Novo técnico</h3>
<form action="comandos.php" method="post">
						<input type="text" class="form-control" name="nome" required placeholder="Nome" /><br>
						<input type="text" class="form-control" name="sobrenome"placeholder="Sobrenome" required /><br>
						<input type="number" class="form-control" name="cpf" maxlength="11" placeholder="CPF (somente números)" required /><br>
						<input type="text" class="form-control" name="email" placeholder="E-mail" /><br>
						<input list="tiporua" class="form-control" name="tiporua" placeholder="Rua, av, passarela...">
							<datalist id="tiporua">
								<option value="Av.">
								<option value="Rua">
								<option value="Passagem">
								<option value="Ponte">
								<option value="Beco">
							</datalist><br>
						<input type="text" class="form-control" name="nomerua" placeholder="nome da rua/av/etc" required /><br>
						<input type="text" class="form-control" name="bairro" placeholder="Bairro" required /><br>
						<input type="text" class="form-control" name="complemento" placeholder="Complemento"/><br>
						<input type="text" class="form-control" name="cidade" placeholder="Cidade" required /><br>
						<select name="uf" class="form-control" required>
							<option selected disabled>Unidade Federativa</option>
							<option value="AC">Acre</option>
							<option value="AL">Alagoas</option>
							<option value="AP">Amapá</option>
							<option value="AM">Amazonas</option>
							<option value="BH">Bahia</option>
							<option value="CE">Ceará</option>
						</select><br>
						<input type="text" class="form-control" name="telefone" placeholder="Telefone"/><br>
						<input type="text" class="form-control" name="celular" placeholder="Celular" required /><br>
						<input type="password" class="form-control" name="senha" placeholder="Senha" required /><br>
						<input type="hidden" name="tipo" value="tec">
						<input type="submit" class="btn btn-primary" name="btn_new_user" value="Cadastrar">

					</form>
<?php 
include_once('rodape.php');
?>