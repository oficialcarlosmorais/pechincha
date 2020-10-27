<?php
include("admin/pdo.class.php");

//Ordem Online
$mensagem="";

if (@$_GET['action']=='delitem'){
	$itn_id = $_GET['itn_id'];
	$ls_id = $_GET['ls_id'];
	$ls_nome = $_GET['ls_nome'];
	//$c=count(MostrarCliente($id));
	//if( $c == 0) {
	//	$mensagem = '<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" onclick="window.history.go(-1);">&times;</button><strong>Usuário não encontrado!</strong> Verifique os dados e tente novamente.</div>';

	//} else {
	DelItem($itn_id);
		//$mensagem = '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" onclick="window.history.go(-2);">&times;</button><strong>Usuário deletado com sucesso!</strong></div>';
	header("location:lista_novo.php?ls_id=$ls_id&ls_nome=$ls_nome");
	}
//} 

if (@$_GET['action']=='delag'){
	$id_ag = $_GET['id_ag'];
	DeletarAg($id_ag);
	header ('location: agendamentos.php');
} 

if (@$_POST['btn_new_user']){
	$id = $_POST['cpf'];

	//verifica se o CPF do usuário já existe na tabela "Usuario".
	$c=count(MostrarCliente($id));
	//Se tiver, cadastra. Se não, dá erro e pára.
	if( $c == 0) {
	$us_senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
	$rua = $_POST['tiporua'] . " " . $_POST['nomerua'];
	$cpf = $_POST['cpf'];
	//remove caracteres especiais
	$cpf = ereg_replace("[^a-zA-Z0-9_]", "", strtr($cpf, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));

	$dados =[
		"nome"=>$_POST['nome'],
		"sobrenome"=>$_POST['sobrenome'],
		"cpf"=>$_POST['cpf'],
		"email"=>$_POST['email'],
		"rua"=>$rua,
		"bairro"=>$_POST['bairro'],
		"complemento"=>$_POST['complemento'],
		"cidade"=>$_POST['cidade'],
		"telefone"=>$_POST['telefone'],
		"celular"=>$_POST['celular'],
		"uf"=>$_POST['uf'],
		"tipo"=>$_POST['tipo'],
		"senha"=>$us_senha
	];
	New_user($dados);
	$mensagem = '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" onclick="window.history.go(-2);">&times;</button><strong>Usuário criado com sucesso!</strong></div>';

	} else {
	$mensagem = '<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" onclick="window.history.go(-1);">&times;</button><strong>ERRO: CPF já cadastrado!</strong> Verifique os dados e tente novamente.</div>';
	}

	}

if (@$_POST['btn_new_emp']){
	$cnpj = $_POST['loja_cnpj'];

	//verifica se o CPF do usuário já existe na tabela "Usuario".
	$c=count(MostrarEmp($cnpj));
	//Se tiver, cadastra. Se não, dá erro e pára.
	if($c == 0) {
	$loja_senha = password_hash($_POST["loja_senha"], PASSWORD_DEFAULT);
	$dados =[
		"loja_raz_social"=>$_POST['loja_raz_social'],
		"loja_nom_fantasia"=>$_POST['loja_nom_fantasia'],
		"loja_cnpj"=>$_POST['loja_cnpj'],
		"loja_email"=>$_POST['loja_email'],
		"loja_logradouro"=>$_POST['loja_logradouro'],
		"loja_endereco"=>$_POST['loja_endereco'],
		"loja_numero"=>$_POST['loja_numero'],
		"loja_bairro"=>$_POST['loja_bairro'],
		"loja_complemento"=>$_POST['loja_complemento'],
		"loja_cidade"=>$_POST['loja_cidade'],
		"loja_uf"=>$_POST['loja_uf'],
		"loja_telefone"=>$_POST['loja_telefone'],
		"loja_celular"=>$_POST['loja_celular'],
		"loja_senha"=>$loja_senha,
		"loja_status"=>'1'
	];
	New_emp($dados);
	$mensagem = '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" onclick="window.history.go(-2);">&times;</button><strong>Usuário criado com sucesso!</strong></div>';

	} else {
	$mensagem = '<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" onclick="window.history.go(-1);">&times;</button><strong>ERRO: CPF já cadastrado!</strong> Verifique os dados e tente novamente.</div>';
	}

	}


if (@$_POST['btn_new_lista']){
	$data = date("d/m/Y");
	$dados =[
		"ls_nome"=>$_POST['ls_nome'],
		"ls_data"=>$data,
		"ls_user"=>01,
		];
	
	NovaLista($dados);
	$ls_user = 1;
	foreach (LastLista($ls_user) as $value) {
		$ls_id = $value->ls_id;
		$ls_nome = $value->ls_orc_nome;
	}
	header("location:lista_novo.php?ls_id=$ls_id&ls_nome=$ls_nome");
	}

if (@$_POST['btn_new_item']){
	$itn_ls_id = $_POST['itn_ls_id'];
	$itn_nome = $_POST['itn_nome'];
	$itn_qtd = $_POST['itn_qtd'];
	$ls_nome = $_POST['ls_nome'];
	$dados =[
		"itn_ls_id"=>$itn_ls_id,
		"itn_nome"=>$itn_nome,
		"itn_qtd"=>$itn_qtd
		];
	NovoItem($dados);
	header("location:lista_novo.php?ls_id=$itn_ls_id&ls_nome=$ls_nome");
	}

if (@$_POST['btn_ordem_edt']){
	$laudo_data = date("d/m/Y");
	$dados =[
		"id_servico"=>$_POST['id_servico'],
		"laudo"=>$_POST['laudo'],
		"pecas"=>$_POST['pecas'],
		"mdo"=>$_POST['mdo'],
		"valor"=>$_POST['valor'],
		"laudo_data"=>$laudo_data,
		"status"=>'aguardando cliente'
	];
	New_orcamento($dados);
	//Edt_orcamento($dados);
	$id_servico = $_POST['id_servico'];
	/*foreach (LastOrdem($id_cliente) as $value) {
		$id_servico = $value->srv_id;
	};*/
	header("location:ordem_show.php?id_servico=$id_servico");
	}

if (@$_POST['btn_edit_user']){
	$dados =[
		"id"=>$_POST['id'],
		"nome"=>$_POST['nome'],
		"sobrenome"=>$_POST['sobrenome'],
		"cpf"=>$_POST['cpf'],
		"email"=>$_POST['email'],
		"rua"=>$_POST['rua'],
		"bairro"=>$_POST['bairro'],
		"complemento"=>$_POST['complemento'],
		"cidade"=>$_POST['cidade'],
		"telefone"=>$_POST['telefone'],
		"celular"=>$_POST['celular'],
		"uf"=>$_POST['uf'],
		"tipo"=>$_POST['tipo'],
		"senha"=>$_POST['senha']
	];
	EditarUsuario($dados);
	$mensagem = '<div class="alert alert-success alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" onclick="window.history.go(-2);">&times;</button><strong>Usuário editado com sucesso!</strong></div>';

}

if (@$_POST['btn_edit_item']) {
	
	$dados =[
	"itn_id" => $_POST['itn_id'],
	"itn_nome" => $_POST['itn_nome'],
	"itn_qtd" => $_POST['itn_qtd'],
	"ls_id" => $_POST['ls_id'],
	"ls_nome" => $_POST['ls_nome'],
	];
	EditItem($dados);
	$ls_id=$_POST['ls_id'];
	$ls_nome=$_POST['ls_nome'];
	header("location:lista_novo.php?ls_id=$ls_id&ls_nome=$ls_nome");

}

if (@$_GET['btn_add_prod']) {
	$data = date("d/m/Y");
	$dados =[
	"prod_itn_id" => $_GET['prod_itn_id'],
	"prod_loja" => $_GET['prod_loja'],
	"prod_valor" => $_GET['prod_valor'],
	"prod_data" => $data
	];
	AddProd($dados);
	$ls_id=$_GET['ls_id'];
	$ls_nome=$_GET['ls_nome'];
	$emp_nome = $_GET['prod_loja'];
	header("location:orc_novo.php?ls_id=$ls_id&emp_nome=$emp_nome");

}

require_once('cabecalho.php');
?>
<div class="w3-container">
    <h1>Ordem Online</h1>
  </div>
</div>

<div class="w3-container">
  <h3 style="padding-top: 15px; padding-bottom: 15px;">Usuário</h3>

<?php
echo $mensagem;

?>