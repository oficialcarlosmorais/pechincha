<?php
	class Database
	{
	    protected static $db;
	    private function __construct(){
	        $db_host 	= "localhost";  // local fisico da aplicacao
	        $db_nome 	= "imanager";  // nome do banco de dados
	        $db_usuario = "root"; // usuario do banco de dados
	        $db_senha 	= "horus4321";  // senha do banco de dados
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

    function New_user($dados){
       $pdo = Database::conexao();
       $obj = $pdo->prepare("INSERT INTO us_fisico (usf_cpf,usf_senha,usf_nome,usf_sobrenome, usf_tipo) VALUES(:CPF, :SENHA, :NOME, :SOBRENOME, :TIPO)");
       $obj->bindParam(":CPF", $dados['cpf'] , PDO::PARAM_STR);
       $obj->bindParam(":SENHA", $dados['senha'] , PDO::PARAM_STR);
       $obj->bindParam(":NOME", $dados['nome'] , PDO::PARAM_STR);
       $obj->bindParam(":SOBRENOME", $dados['sobrenome'] , PDO::PARAM_STR);
       $obj->bindParam(":TIPO", $dados['pessoa'] , PDO::PARAM_STR);
       $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount(); /* para insert, upadate ou delete */
#        $volta = [ $r_obj, $total];
#        return $volta;
        return $total;
    }

    function Login($id) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM us_fisico WHERE usf_cpf = $id");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function Relatorio($id) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM pf_hist WHERE hpf_us_id=$id");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function Movimentacao($dados){
        $pdo = Database::conexao();
        $obj = $pdo->prepare("INSERT INTO pf_hist (hpf_mov,hpf_valor,hpf_data,hpf_tipo, hpf_us_id, hpf_origem) VALUES(:MOVIMENTACAO, :VALOR, :DATA, :TIPO, :US_ID, :ORIGEM)");
        $obj->bindParam(":MOVIMENTACAO", $dados['movimentacao'] , PDO::PARAM_STR);
        $obj->bindParam(":VALOR", $dados['valor'] , PDO::PARAM_INT);
        $obj->bindParam(":DATA", $dados['data'] , PDO::PARAM_STR);
        $obj->bindParam(":TIPO", $dados['tipo'] , PDO::PARAM_STR);
        $obj->bindParam(":US_ID", $dados['us_id'] , PDO::PARAM_INT);
        $obj->bindParam(":ORIGEM", $dados['origem'] , PDO::PARAM_STR);
        $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount(); /* para insert, upadate ou delete */
#        $volta = [ $r_obj, $total];
#        return $volta;
        return $total;
    }

    function Show_edt_mov($mov_id) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM pf_hist WHERE hpf_id = $mov_id");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }

    function Editar_mov($mov_id) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("UPDATE pf_hist SET hpf_mov = :MOVIMENTACAO, hpf_valor = :VALOR, hpf_data = :DATA WHERE hpf_id = :MOV_ID");
        $obj->bindParam(":MOV_ID", $mov_id['mov_id'] , PDO::PARAM_INT);
        $obj->bindParam(":MOVIMENTACAO", $mov_id['mov'] , PDO::PARAM_INT);
        $obj->bindParam(":VALOR", $mov_id['valor'] , PDO::PARAM_STR);
        $obj->bindParam(":DATA", $mov_id['data'] , PDO::PARAM_INT);
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

	function Cadastrar($dados){
        $pdo = Database::conexao();
        $obj = $pdo->prepare("INSERT INTO pf_hist (hpf_mov,hpf_valor,hpf_data,hpf_tipo, hpf_us_id, hpf_origem) VALUES(:RECEITA, :VALOR, :DATA, :TIPO, :US_ID, :ORIGEM)");
        $obj->bindParam(":RECEITA", $dados['receita'] , PDO::PARAM_STR);
        $obj->bindParam(":VALOR", $dados['valor'] , PDO::PARAM_INT);
        $obj->bindParam(":DATA", $dados['data'] , PDO::PARAM_STR);
        $obj->bindParam(":TIPO", $dados['pessoa'] , PDO::PARAM_STR);
        $obj->bindParam(":US_ID", $dados['us_id'] , PDO::PARAM_INT);
        $obj->bindParam(":ORIGEM", $dados['origem'] , PDO::PARAM_STR);
        $obj->execute();

#        $r_obj = $obj->fetchAll(PDO::FETCH_OBJ); /* Apenas para as SELECT geral */
#        $r_obj = $obj->fetch(PDO::FETCH_OBJ); /* Apenas para as consultas unica */

        $total = $obj->rowCount(); /* para insert, upadate ou delete */
#        $volta = [	$r_obj, $total];
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

    function MostrarEdicao($id) {
        $pdo = Database::conexao();
        $c = $pdo->prepare("SELECT * FROM produtos WHERE id = $id");
        $c->execute();
        $r_c = $c->fetchAll(PDO::FETCH_OBJ);
        return $r_c;
    }
