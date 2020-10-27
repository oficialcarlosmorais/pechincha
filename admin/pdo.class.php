<?php
	class Database
	{
	    protected static $db;
	    private function __construct(){
	        $db_host 	= "localhost";  // local fisico da aplicacao
	        $db_nome 	= "pechincha";  // nome do banco de dados
	        $db_usuario = "root"; // usuario do banco de dados
	        $db_senha 	= "";  // senha do banco de dados
	        $db_driver 	= "mysql"; // representa do SGDB (mysql, sql, postgr, oracle)
	        try{
	            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
	            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            self::$db->exec('SET NAMES utf8');
	        }catch (PDOException $e){
	            die("Connection Error: " . $e->getMessage());
	        }
	    }
	    public static function conexao(){
	        if (!self::$db){
	            new Database();
	        }
	        return self::$db;
	    }
	}

    function Busca_usuario($id) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM usuario WHERE us_id = $id");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }



    function Login($id) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM usuario WHERE us_cpf = $id");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }


    function MostrarProduto($prod_itn_id,$prod_loja) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM produtos WHERE prod_itn_id = $prod_itn_id");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;       
    }

    function Deletar_mov($mov_id){
        $pdo = Database::conexao();
        $d   = $pdo->prepare("DELETE FROM pf_hist WHERE hpf_id = :MOV_ID");
        $d->bindParam(":MOV_ID", $mov_id , PDO::PARAM_INT);
        $d->execute();
        $total = $d->rowCount(); /* para insert, upadate ou delete */
        return $total;

    }

	function NovaLista($dados){
        $pdo = Database::conexao();
        $obj = $pdo->prepare("INSERT INTO lista (ls_orc_nome, ls_data, ls_user) VALUES(:ORC_NOME, :DATA, :USER)");
        $obj->bindParam(":ORC_NOME", $dados['ls_nome'] , PDO::PARAM_STR);
        $obj->bindParam(":DATA", $dados['ls_data'] , PDO::PARAM_STR);
        $obj->bindParam(":USER", $dados['ls_user'] , PDO::PARAM_STR);
        $obj->execute();

        $total = $obj->rowCount(); /* para insert, upadate ou delete */

        return $total;
    }

        function NewEmp($dados){
        $pdo = Database::conexao();
        $obj = $pdo->prepare("INSERT INTO loja (loja_nom_fantasia, loja_endereco, loja_status) VALUES(:LOJA_NOM_FANTASIA, :LOJA_ENDERECO, :LOJA_STATUS)");
        $obj->bindParam(":LOJA_NOM_FANTASIA", $dados['loja_nom_fantasia'] , PDO::PARAM_STR);
        $obj->bindParam(":LOJA_ENDERECO", $dados['loja_endereco'] , PDO::PARAM_STR);
        $obj->bindParam(":LOJA_STATUS", $dados['loja_status'] , PDO::PARAM_STR);
        $obj->execute();

        $total = $obj->rowCount(); /* para insert, upadate ou delete */

        return $total;
    }

    function NovoItem($dados){
        $pdo = Database::conexao();
        $obj = $pdo->prepare("INSERT INTO itens (itn_ls_id, itn_nome, itn_qtd) VALUES(:LS_ID, :NOME, :QTD)");
        $obj->bindParam(":LS_ID", $dados['itn_ls_id'] , PDO::PARAM_STR);
        $obj->bindParam(":NOME", $dados['itn_nome'] , PDO::PARAM_STR);
        $obj->bindParam(":QTD", $dados['itn_qtd'] , PDO::PARAM_STR);
        $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount(); /* para insert, upadate ou delete */
#        $volta = [ $r_obj, $total];
#        return $volta;
        return $total;
    }

    function AddProd($dados){
        $pdo = Database::conexao();
        $obj = $pdo->prepare("INSERT INTO produtos (prod_itn_id, prod_valor, prod_loja, prod_data) VALUES(:PROD_ITN_ID, :PROD_VALOR, :PROD_LOJA, :PROD_DATA)");
        $obj->bindParam(":PROD_ITN_ID", $dados['prod_itn_id'] , PDO::PARAM_STR);
        $obj->bindParam(":PROD_VALOR", $dados['prod_valor'] , PDO::PARAM_STR);
        $obj->bindParam(":PROD_LOJA", $dados['prod_loja'] , PDO::PARAM_STR);
        $obj->bindParam(":PROD_DATA", $dados['prod_data'] , PDO::PARAM_STR);
        $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount(); /* para insert, upadate ou delete */
#        $volta = [ $r_obj, $total];
#        return $volta;
        return $total;
    }

    function Mostrar() {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM us_fisico");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function Deletar($id){
    	$pdo = Database::conexao();
    	$d   = $pdo->prepare("DELETE FROM produtos WHERE id = :ID");
        $d->bindParam(":ID", $id , PDO::PARAM_INT);
        $d->execute();
        $total = $d->rowCount(); /* para insert, upadate ou delete */
        return $total;

    }

    function Atualizar($id,$dados){
        $pdo = Database::conexao();
        $obj = $pdo->prepare("UPDATE produtos SET dsc = :DESCRICAO, qtd = :QUANTIDADE, valor = :VALOR, habilita = :HABILITA WHERE id = :ID");
        $obj->bindParam(":DESCRICAO", $dados['dsc'] , PDO::PARAM_STR);
        $obj->bindParam(":QUANTIDADE", $dados['qtd'] , PDO::PARAM_INT);
        $obj->bindParam(":VALOR", $dados['valor'] , PDO::PARAM_INT);
        $obj->bindParam(":HABILITA", $dados['habilita'] , PDO::PARAM_STR);
        $obj->bindParam(":ID", $dados['id'] , PDO::PARAM_INT);
        $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount();
        }

function New_ordem($dados){
       $pdo = Database::conexao();
       $obj = $pdo->prepare("INSERT INTO servico (srv_id_cliente,srv_tipo, srv_produto, srv_acessorios, srv_observacao, srv_queixa, srv_id_tecnico, srv_status, srv_data_entrada) VALUES(:ID_CLIENTE, :TIPO, :PRODUTO, :ACESSORIOS, :OBSERVACAO, :QUEIXA, :TECNICO, :STATUS, :DATA_ENTRADA)");
       $obj->bindParam(":ID_CLIENTE", $dados['id_cliente'] , PDO::PARAM_INT);
       $obj->bindParam(":PRODUTO", $dados['produto'] , PDO::PARAM_STR);
       $obj->bindParam(":TIPO", $dados['tipo'] , PDO::PARAM_STR);
       $obj->bindParam(":ACESSORIOS", $dados['acessorios'] , PDO::PARAM_STR);
       $obj->bindParam(":OBSERVACAO", $dados['observacao'] , PDO::PARAM_STR);
       $obj->bindParam(":QUEIXA", $dados['queixa'] , PDO::PARAM_STR);
       $obj->bindParam(":TECNICO", $dados['id_tecnico'] , PDO::PARAM_STR);
       $obj->bindParam(":STATUS", $dados['status'] , PDO::PARAM_STR);
       $obj->bindParam(":DATA_ENTRADA", $dados['data_entrada'] , PDO::PARAM_STR);
       $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount(); /* para insert, upadate ou delete */
#        $volta = [ $r_obj, $total];
#        return $volta;
        return $total;
    }

    function MostrarListas($ls_id) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM lista WHERE $ls_id = $ls_id ORDER BY ls_id DESC");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function MostrarItens($ls_id) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM itens WHERE itn_ls_id = $ls_id");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function Lastlista($ls_user) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM lista WHERE ls_user = $ls_user ORDER BY ls_id DESC LIMIT 1");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function New_orcamento($dados){
       $pdo = Database::conexao();
       $obj = $pdo->prepare("INSERT INTO orcamento (orc_srv_id, orc_laudo, orc_pecas, orc_mdo, orc_valor, orc_laudo_data) VALUES(:SRV_ID, :LAUDO, :PECAS, :MDO, :VALOR, :ORC_LAUDO_DATA)");
       $obj->bindParam(":SRV_ID", $dados['id_servico'] , PDO::PARAM_STR);
       $obj->bindParam(":LAUDO", $dados['laudo'] , PDO::PARAM_STR);
       $obj->bindParam(":PECAS", $dados['pecas'] , PDO::PARAM_STR);
       $obj->bindParam(":MDO", $dados['mdo'] , PDO::PARAM_STR);
       $obj->bindParam(":VALOR", $dados['valor'] , PDO::PARAM_STR);
       $obj->bindParam(":ORC_LAUDO_DATA", $dados['laudo_data'] , PDO::PARAM_STR);
       $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount(); /* para insert, upadate ou delete */
#        $volta = [ $r_obj, $total];
#        return $volta;
        return $total;
    }

    function MostrarOrc($id_srvorc) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM orcamento WHERE orc_srv_id = $id_srvorc");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function New_user($dados){
       $pdo = Database::conexao();
       $obj = $pdo->prepare("INSERT INTO usuario (us_nome, us_sobrenome, us_cpf, us_email, us_rua, us_bairro, us_complemento, us_cidade, us_uf, us_telefone, us_celular, us_senha, us_tipo) VALUES(:NOME, :SOBRENOME, :CPF, :EMAIL, :RUA, :BAIRRO, :COMPLEMENTO, :CIDADE, :UF, :TELEFONE, :CELULAR, :SENHA, :TIPO)");
       $obj->bindParam(":NOME", $dados['nome'] , PDO::PARAM_STR);
       $obj->bindParam(":SOBRENOME", $dados['sobrenome'] , PDO::PARAM_STR);
       $obj->bindParam(":CPF", $dados['cpf'] , PDO::PARAM_STR);
       $obj->bindParam(":EMAIL", $dados['email'] , PDO::PARAM_STR);
       $obj->bindParam(":RUA", $dados['rua'] , PDO::PARAM_STR);
       $obj->bindParam(":BAIRRO", $dados['bairro'] , PDO::PARAM_STR);
       $obj->bindParam(":COMPLEMENTO", $dados['complemento'] , PDO::PARAM_STR);
       $obj->bindParam(":CIDADE", $dados['cidade'] , PDO::PARAM_STR);
       $obj->bindParam(":UF", $dados['uf'] , PDO::PARAM_STR);
       $obj->bindParam(":TELEFONE", $dados['telefone'] , PDO::PARAM_STR);
       $obj->bindParam(":CELULAR", $dados['celular'] , PDO::PARAM_STR);
       $obj->bindParam(":SENHA", $dados['senha'] , PDO::PARAM_STR);
       $obj->bindParam(":TIPO", $dados['tipo'] , PDO::PARAM_STR);
       $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount(); /* para insert, upadate ou delete */
#        $volta = [ $r_obj, $total];
#        return $volta;
        return $total;
    }

    function EditarUsuario($dados) {
        $pdo = Database::conexao();
        $obj = $pdo->prepare("UPDATE usuario SET us_nome = :NOME, us_sobrenome = :SOBRENOME, us_cpf = :CPF, us_email = :EMAIL, us_rua = :RUA, us_bairro = :BAIRRO, us_complemento = :COMPLEMENTO, us_cidade = :CIDADE, us_telefone = :TELEFONE, us_celular = :CELULAR, us_uf= :UF, us_tipo = :TIPO, us_senha = :SENHA WHERE us_id = :ID");
        $obj->bindParam(":ID", $dados['id'] , PDO::PARAM_STR);
        $obj->bindParam(":NOME", $dados['nome'] , PDO::PARAM_STR);
        $obj->bindParam(":SOBRENOME", $dados['sobrenome'] , PDO::PARAM_STR);
        $obj->bindParam(":CPF", $dados['cpf'] , PDO::PARAM_STR);
        $obj->bindParam(":EMAIL", $dados['email'] , PDO::PARAM_STR);
        $obj->bindParam(":RUA", $dados['rua'] , PDO::PARAM_STR);
        $obj->bindParam(":BAIRRO", $dados['bairro'] , PDO::PARAM_STR);
        $obj->bindParam(":COMPLEMENTO", $dados['complemento'] , PDO::PARAM_STR);
        $obj->bindParam(":CIDADE", $dados['cidade'] , PDO::PARAM_STR);
        $obj->bindParam(":TELEFONE", $dados['telefone'] , PDO::PARAM_STR);
        $obj->bindParam(":CELULAR", $dados['celular'] , PDO::PARAM_STR);
        $obj->bindParam(":UF", $dados['uf'] , PDO::PARAM_STR);
        $obj->bindParam(":TIPO", $dados['tipo'] , PDO::PARAM_STR);
        $obj->bindParam(":SENHA", $dados['senha'] , PDO::PARAM_STR);

        $obj->execute();
        
    }

    function MostrarClientes() {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM usuario ORDER BY us_nome ASC");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }
    function MostrarEmp($cnpj) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM loja WHERE loja_cnpj=$cnpj");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }
    function MostrarCliente($cliente) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM usuario WHERE us_cpf = $cliente");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function DeletarUsuario($cpf){
        $pdo = Database::conexao();
        $d   = $pdo->prepare("DELETE FROM usuario WHERE us_cpf = :CPF");
        $d->bindParam(":CPF", $cpf , PDO::PARAM_INT);
        $d->execute();
        $total = $d->rowCount(); /* para insert, upadate ou delete */
        return $total;

    }
    function DelItem($itn_id){
        $pdo = Database::conexao();
        $d   = $pdo->prepare("DELETE FROM itens WHERE itn_id = :ITN_ID");
        $d->bindParam(":ITN_ID", $itn_id , PDO::PARAM_INT);
        $d->execute();
        $total = $d->rowCount(); /* para insert, upadate ou delete */
        return $total;

    }

    function StatusCliente($cpf) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM servico WHERE srv_id_cliente = $cpf");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function StatusTecnico($cpf) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM servico WHERE srv_id_tecnico  = $cpf");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function New_emp($dados){
       $pdo = Database::conexao();
       $obj = $pdo->prepare("INSERT INTO loja (loja_raz_social, loja_nom_fantasia, loja_cnpj, loja_email, loja_logradouro, loja_endereco, loja_numero, loja_bairro, loja_complemento, loja_cidade, loja_uf, loja_telefone, loja_celular, loja_senha, loja_status) VALUES(:RAZ_SOCIAL, :NOM_FANTASIA, :CNPJ, :EMAIL, :LOGRADOURO, :ENDERECO, :NUMERO, :BAIRRO, :COMPLEMENTO, :CIDADE, :UF, :TELEFONE, :CELULAR, :SENHA, :STATUS)");
       $obj->bindParam(":RAZ_SOCIAL", $dados['loja_raz_social'] , PDO::PARAM_STR);
       $obj->bindParam(":NOM_FANTASIA", $dados['loja_nom_fantasia'] , PDO::PARAM_STR);
       $obj->bindParam(":CNPJ", $dados['loja_cnpj'] , PDO::PARAM_STR);
       $obj->bindParam(":EMAIL", $dados['loja_email'] , PDO::PARAM_STR);
       $obj->bindParam(":LOGRADOURO", $dados['loja_logradouro'] , PDO::PARAM_STR);
       $obj->bindParam(":ENDERECO", $dados['loja_endereco'] , PDO::PARAM_STR);
       $obj->bindParam(":NUMERO", $dados['loja_numero'] , PDO::PARAM_STR);
       $obj->bindParam(":BAIRRO", $dados['loja_bairro'] , PDO::PARAM_STR);
       $obj->bindParam(":COMPLEMENTO", $dados['loja_complemento'] , PDO::PARAM_STR);
       $obj->bindParam(":CIDADE", $dados['loja_cidade'] , PDO::PARAM_STR);
       $obj->bindParam(":UF", $dados['loja_uf'] , PDO::PARAM_STR);
       $obj->bindParam(":TELEFONE", $dados['loja_telefone'] , PDO::PARAM_STR);
       $obj->bindParam(":CELULAR", $dados['loja_celular'] , PDO::PARAM_STR);
       $obj->bindParam(":SENHA", $dados['loja_senha'] , PDO::PARAM_STR);
       $obj->bindParam(":STATUS", $dados['loja_status'] , PDO::PARAM_STR);

              $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount(); /* para insert, upadate ou delete */
#        $volta = [ $r_obj, $total];
#        return $volta;
        return $total;
    }

    function MostrarAgendamentos() {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM agendamento ORDER BY ag_data DESC");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function MostrarAgendamento($id) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM agendamento WHERE ag_id = $id");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

function EditItem($dados) {
        $pdo = Database::conexao();
        $obj = $pdo->prepare("UPDATE itens SET itn_nome = :NOME, itn_qtd = :QTD WHERE itn_id = :ID");
        $obj->bindParam(":ID", $dados['itn_id'] , PDO::PARAM_STR);
        $obj->bindParam(":NOME", $dados['itn_nome'] , PDO::PARAM_STR);
        $obj->bindParam(":QTD", $dados['itn_qtd'] , PDO::PARAM_STR);
        
        $obj->execute();
    }

    function DeletarAg($id_ag){
        $pdo = Database::conexao();
        $d   = $pdo->prepare("DELETE FROM agendamento WHERE ag_id = :ID");
        $d->bindParam(":ID", $id_ag , PDO::PARAM_INT);
        $d->execute();
        $total = $d->rowCount(); /* para insert, upadate ou delete */
        return $total;
    }