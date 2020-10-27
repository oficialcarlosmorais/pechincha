<?php
include("admin/pdo.class.php");
/*	foreach (login($id) as $value) {
		$id = $value->id;
		$dsc = $value->dsc;
		$qtd = $value->qtd;
		$valor = $value->valor;
		$habilita = $value->habilita;
 } 

*/
if($_POST['btn_login']='Entrar') {
 	$id=$_POST['cpf'];
 	$contador=0;
foreach (Login($id) as $value) {
	$contador = $contador+1;
		$id = $value->us_id;
	  //$id = $value->usf_id;
		$nome = $value->us_nome;
	  //$nome = $value->usf_nome;
		$sobrenome = $value->us_sobrenome; 
      //$sobrenome = $value->usf_sobrenome;
		$cpf = $value->us_cpf;
	  //$cpf = $value->usf_cpf;
		$hash =  $value->us_senha;
		$pessoa = $value->us_tipo;
		echo $id . $nome . $sobrenome . $cpf;
 }
 if ($contador == '0') {
 	header('location:index.php?err=usuario');
 } else {
 	if(password_verify($_POST['senha'], $hash)){
    	session_start();
    	$_SESSION['nome'] = $nome;
    	$_SESSION['id'] = $id;
    	header('location:default.php');
 } else {
 	header('location:index.php?err=senha');
 }
}

  
}

 	
?>
