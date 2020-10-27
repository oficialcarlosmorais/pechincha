<?php

require_once 'acesso.php';
require_once 'config.php';


$tipoPagina = 'administracao';

require_once 'acessoMaster.php';

$dt_pagamento = date('Y-m-d', $_POST['dt_pagamento']);
$hora = date('H:i:s');
$vl_cobranca = $_POST ['vl_recebido'];
$histc_forma_pgto = $_['forma_pgto'];
$cobranca = $_POST['cobranca'];
$id_usuario = $_POST['id_usuario'];

if ($_POST['acao']=='recibo'){

include 'recibo.php';}

if ($_POST['acao']=='notificar'){

include 'notificacao_atraso.php';}

if ($_POST['acao']=='baixar'){

$qyhistoricocobrancas = "update historico_cobrancas set status = 'PAGO' where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

$qyhistoricocobrancas = "update historico_cobrancas set histc_forma_pgto = '" . $_POST['forma_pgto'] . "'" . " where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

$qyhistoricocobrancas = "update historico_cobrancas set hora = '" . date('H:i:s') . "'" . " where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

$qyhistoricocobrancas = "update historico_cobrancas set vl_cobranca = ". $_POST['vl_recebido'] . " where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

$qyhistoricocobrancas = "update historico_cobrancas set dt_pagamento = now() where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

$qyhistoricocobrancas = "update usuarios set ativo = 'S' where id_usuario = ".$_POST['id_usuario'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

header('location: http://www.horusgps.com.br/sistema/baixasManuais.php?idusuario=' . $_POST['id_usuario']);
}

if ($_POST['acao']=='editar'){
$qyhistoricocobrancas = "update historico_cobrancas set status = 'PAGO' where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

$qyhistoricocobrancas = "update historico_cobrancas set histc_forma_pgto = '" . $_POST['forma_pgto'] . "'" . " where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

$qyhistoricocobrancas = "update historico_cobrancas set hora = '" . date('H:i:s') . "'" . " where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

$qyhistoricocobrancas = "update historico_cobrancas set vl_cobranca = ". $_POST['vl_recebido'] . " where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

$qyhistoricocobrancas = "update historico_cobrancas set dt_pagamento = '" . $_POST['dt_pagamento'] . "' where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

header('location: http://www.horusgps.com.br/sistema/baixasManuais.php?idusuario=' . $_POST['id_usuario']);	

}

if ($_POST['acao']=='reabrir'){

$qyhistoricocobrancas = "update historico_cobrancas set status = 'AGUARDANDO' where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

$qyhistoricocobrancas = "update historico_cobrancas set dt_pagamento = 'NULL' where id = ".$_POST['cobranca'];
$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));

header('location: http://www.horusgps.com.br/sistema/baixasManuais.php?idusuario=' . $_POST['id_usuario']);
	}

if ($_POST['acao']=='deletar'){
$qyhistoricocobrancas = "DELETE FROM historico_cobrancas where id = ".$_POST['cobranca'];

$rshistoricocobrancas = mysqli_query($conexao, $qyhistoricocobrancas) or die(mysqli_error($conexao));
header('location: http://www.horusgps.com.br/sistema/baixasManuais.php?idusuario=' . $_POST['id_usuario']);
}




?>
	