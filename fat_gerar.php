<?php

require_once 'acesso.php';
require_once 'config.php';
$tipoPagina = 'administracao';
require_once 'acessoMaster.php';

?>


<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">	
<meta name="viewport" content="initial-scale=1.0">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>HORUS RASTREAMENTOS - Visualizar CAIXA</title>

<link href="css/bootstrap.css" rel="stylesheet">

<link href="css/sb-admin.css" rel="stylesheet">

<link href="fonts/css/font-awesome.css" rel="stylesheet" type="text/css">

<link href="imagens/favicon.ico" rel="shortcut icon">
<link href="imagens/favicon.ico" rel="icon" type="image/x-icon">

<link href="imagens/apple-touch-icon.png" rel="apple-touch-icon">

</head>


<body>
<?php
include('cabecalho.php');
?>


<section id="page-wrapper">

<section class="container-fluid">

<section class="row">

<section class="col-lg-12">
<h1 class="page-header">
<small><a href="app_coordenadas.php">Todos os Usuários</a></small>
</h1>
</section></section>

<section class="row"><section class="col-lg-12"><section class="panel panel-default">

<section class="panel-heading">

<h3 class="panel-title"><i class="fa fa-star"></i> Administrador</h3>
</section>
								<section class="panel-body">
									<table class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th width="33%">Administrador</th>
												<th width="33%">Nome</th>
												<th width="33%">E-mail</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$getAdmin = mysqli_query($conexao, "SELECT nome, apelido, email FROM usuarios WHERE admin = 'S'");
												
												while($dados = mysqli_fetch_assoc($getAdmin)){
													echo 	
														"<tr onclick=\"window.location='adminEditar.php';\"  style=\"cursor:pointer;\">
															<td>" . $dados['apelido'] . "</td>
															<td>" . $dados['nome'] . "</td>
															<td>" . $dados['email'] . "</td>
														</tr>";													
												}											
											?>
										</tbody>
									</table>
								</section>
							</section>
						</section>
					</section>
					
					<br />
					
					<section class="row">
						<section class="col-lg-12">
							<section class="panel panel-default">
								<section class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-user"></i> Usuários</h3>
								</section>
								<section class="panel-body">
<!-- <table class="table table-bordered table-hover table-striped"> 

<tbody>
-->
<table>
<?php
//comeca aqui

$servername = "localhost";
$username = "root";
$password = "horus4321";
$dbname = "tracker";
$conexao = mysqli_connect("localhost", "root", "horus4321", "tracker");
$num_clientes = 0;
$num_clientes_ja =0;
$transacoes = 0;

$getUsuarios = mysqli_query($conexao, "SELECT * FROM usuarios where admin = 'N' ORDER BY nome ASC");
												
	if(mysqli_num_rows($getUsuarios) > 0){

while($dados = mysqli_fetch_assoc($getUsuarios)){

$transacoes = $transacoes +1;
//GERA A FATURA
	$userID = $dados['id_usuario'];
	$quantos_id = count($userID);
	$getDadosUser = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario ='$userID'");
	$dados = mysqli_fetch_assoc($getDadosUser);
	$qtdVeiculos = mysqli_num_rows(mysqli_query($conexao, "SELECT cliente FROM bem WHERE cliente = '$userID'"));
	$cobranca = $qtdVeiculos * $dados['mensalidade'];
	$getDadosUser = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id_usuario ='$userID'");
	$dados = mysqli_fetch_assoc($getDadosUser);


if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
} else {
	
$data = date("Y-m"). "-" . $dados['data_vencimento'];

$get_last_fat = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM historico_cobrancas WHERE id_usuario = '$userID' && dt_vencimento = '$data'"));

if ($get_last_fat > 0) { 

 echo "<tr><td bgcolor=cyan>FATURA JÁ GERADA para o cliente ". $dados['nome'] . ". Vencimento: " . $data; 
 $num_clientes_ja = $num_clientes_ja +1;
 if (date("Y-m-d") > $data) {
 	echo "</td><td bgcolor=red> VERIFICAR SE JÁ PAGOU </td></tr>";
 	$inadimplentes = $inadimplentes +1;
 } else {
 	echo "</td></tr>";
 }
 
} else { 
$sql = mysqli_query($conexao, "INSERT INTO historico_cobrancas (id_usuario, dt_vencimento, vl_cobranca, status) VALUES ('" . $userID . "','" .$data. "', '" . $cobranca . "', 'AGUARDANDO')");
 echo "<tr><td bgcolor=red>FATURA CRIADA para o cliente ". $dados['nome'] . ". Vencimento: " . $dados['dt_vencimento'] ."</td></tr>";

//CRIA UMA FATURA COM A DATA ESCOLHIDA NO CONTRATO

// echo "FATURA GERADA para o cliente ". $dados['nome'] . ". Vencimento: " . $data ."<br>";

$num_clientes = $num_clientes +1;
//}

//TERMINA AQUI


//} else {
//

//if (mysqli_query($conexao, $sql)) {
//header('location: http://www.horusgps.com.br/sistema/baixasManuais.php?idusuario=' . $userID);

//} else {
//    echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
//    echo "<a href=baixasManuais.php><strong>VOLTAR</strong></a>";
//}
}
}
}
}

mysqli_close($conexao);

echo "BOLETOS GERADOS: " . $num_clientes;
echo "<br>BOLETOS JÁ CRIADOS: " . $num_clientes_ja;
echo "<br>TRANSAÇÕES:" . $transacoes;
echo "<br><strong>VERIFICAR: " . $inadimplentes . "</strong><br><br>";
echo "<a href=fat_atualizar_status.php>ATUALIZAR</a>";
echo "</table>";
//GERA A FATURA TERMINA AQUI
?>



<br><a href="usuarioVisualizar.php"><strong>VOLTAR</strong></a>
<!-- </tbody>
</table> -->
<?php include('rodape.php');?>
	</body>
</html>