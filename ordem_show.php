<?php 
include("admin/pdo.class.php");
require_once 'cabecalho.php'; 
$id_servico = $_GET['id_servico'];

foreach (MostrarOrdem($id_servico) as $value) {
	$id_cliente = $value->srv_id_cliente;
	$id_tecnico = $value->srv_id_tecnico;
	$produto = $value->srv_produto;
	$acessorios = $value->srv_acessorios;
	$queixa = $value->srv_queixa;
	$data_entrada = $value->srv_data_entrada;
	$data_saida = $value->srv_data_saida;
	$status = $value->srv_status;
	$tipo = $value->srv_tipo;
	$cliente = $id_cliente;
	$observacao = $value->srv_observacao;
	foreach (MostrarCliente($cliente) as $value) {
		$nome = $value->us_nome;
		$sobrenome = $value->us_sobrenome;
		$rua = $value->us_rua;
		$bairro = $value->us_bairro;
		$cidade = $value->us_cidade;
		$uf = $value->us_uf;
		$email = $value->us_email;
		$telefone = $value->us_telefone;
		$celular = $value->us_celular;
	}
}

?>
</div>
<article id="artigo" class="d-flex justify-content-between flex-fill align-content-center" style="border: 2px solid black;background-color: white; color: black; border-radius: 10px; margin-bottom: 10px;">
	<section style="width: 80%; padding-top: 5px; padding-bottom: 5px; border-radius: 10px 0 0 10px;" class="d-flex flex-column align-items-center align-self-center flex-fill">
		<div class="d-flex flex-column align-items-center align-self-center flex-fill">
		<img src="images/logo.png" width="200px">
		</div>
		<div class="d-flex flex-column align-items-center align-self-center flex-fill">
		<h3><strong>HORUS RASTREAMENTOS</strong></h3>Av. Diógenes Silva, nº 2089. Bairro: Buritizal<br>Contato: (96)99133-6464
		</div>
	</section>
	<section style="border: 1px solid black; width:20%; padding: 15px;  border-radius: 0 10px 10px 0;">
		<p><strong>Ordem de serviço <?php echo $id_servico; ?></strong></p>
				<?php 
				switch ($tipo) {
				 	case 'orcamento':
				 		echo '<input id="orcamento" type="radio" name="tipo" value="orcamento" disabled checked><label for="orcamento">Orçamento</label><br><input id="preventiva" type="radio" name="tipo" value="preventiva" disabled><label for="preventiva">Manut. preventiva</label><br><input id="corretiva" type="radio" name="tipo" value="corretiva" disabled><label for="corretiva">Manut. corretiva</label>';
				 		break;

				 	case 'preventiva':
				 		echo '<input id="orcamento" type="radio" name="tipo" value="orcamento" disabled><label for="orcamento">Orçamento</label><br><input id="preventiva" type="radio" name="tipo" value="preventiva" checked disabled><label for="preventiva">Manut. preventiva</label><br><input id="corretiva" type="radio" name="tipo" value="corretiva" disabled><label for="corretiva">Manut. corretiva</label>';
				 		break;

				 	case 'corretiva':
				 		echo '<input id="orcamento" type="radio" name="tipo" value="orcamento" disabled><label for="orcamento">Orçamento</label><br><input id="preventiva" type="radio" name="tipo" value="preventiva" disabled><label for="preventiva">Manut. preventiva</label><br><input id="corretiva" type="radio" name="tipo" value="corretiva" disabled checked><label for="corretiva">Manut. corretiva</label>';
				 		break;

				 		default:
				 		echo '<input id="orcamento" type="radio" name="tipo" value="orcamento" disabled checked><label for="orcamento">Orçamento</label><br><input id="preventiva" type="radio" name="tipo" value="preventiva" disabled><label for="preventiva">Manut. preventiva</label><br><input id="corretiva" type="radio" name="tipo" value="corretiva" disabled><label for="corretiva">Manut. corretiva</label>';

				 		break;
				 } 
				 echo "<br><strong>Entrada:</strong> $data_entrada";?>
			

	</section>
</article>

<article class="d-flex justify-content-between flex-fill align-content-center" style="border: 2px solid black;background-color: white; color: black; border-radius: 10px; margin-bottom: 10px;">
	<section style="padding: 10px; border-radius: 10px 0 0 10px;" class="d-flex align-self-center flex-fill flex-column">
		<p><strong>Cliente: </strong> <?php echo $nome . " " . $sobrenome; ?></p>
		<p><strong>End: </strong><?php echo $rua; ?></p>
		<p><strong>Cidade: </strong><?php echo $cidade; ?> | <strong>Bairro: </strong> <?php echo $bairro; ?> | <strong>UF: </strong><?php echo $uf;?> | <strong> CPF: </strong><?php echo $id_cliente;?></p>
		<p><strong>Email: </strong><?php echo $email;?></p>
		<p><strong>Tel: </strong><?php echo $telefone;?>  <strong>Celular: </strong><?php echo $celular;?></p>
	</section>
</article>
<article class="d-flex justify-content-between flex-fill align-content-center" style="border: 2px solid black;background-color: white; color: black; border-radius: 10px; margin-bottom: 10px;">
	<section style="border-radius: 10px 0 0 10px;" class="d-flex align-self-center flex-fill flex-column">
		<div style="background-color: silver; border-radius: 10px 10px 0 0; padding: 10px;">
			<strong><center>PRODUTO</center></strong>
		</div>
		<div style="padding: 10px;">
				<?php echo $produto; ?>
		</div>
			
	</section>
</article>
<article class="d-flex justify-content-between flex-fill align-content-center" style="border: 2px solid black;background-color: white; color: black; border-radius: 10px; margin-bottom: 10px;">
	<section style="border-radius: 10px 0 0 10px;" class="d-flex align-self-center flex-fill flex-column">
		<div style="background-color: silver; border-radius: 10px 10px 0 0; padding: 10px;">
			<strong><center>ACESSÓRIOS</center></strong>
		</div>
		<div style="padding: 10px;">
			<?php
				if ($acessorios == "") { $acessorios = "------";}
			 echo $acessorios; ?>
		</div>
	</section>
</article>
<article class="d-flex justify-content-between flex-fill align-content-center" style="border: 2px solid black;background-color: white; color: black; border-radius: 10px; margin-bottom: 10px;">
	<section style="border-radius: 10px 0 0 10px;" class="d-flex align-self-center flex-fill flex-column">
		<div style="background-color: silver; border-radius: 10px 10px 0 0; padding: 10px;">
			<strong><center>OBSERVAÇÕES</center></strong>
		</div>
		<div style="padding: 10px;">
			<?php
				if ($observacao == "") { $observacao = "------";}
			 	echo $observacao; 
			?>
		</div>
	</section>
</article>
<article class="d-flex justify-content-between flex-fill align-content-center" style="border: 2px solid black;background-color: white; color: black; border-radius: 10px; margin-bottom: 10px;">
	<section style="border-radius: 10px 0 0 10px;" class="d-flex align-self-center flex-fill flex-column">
		<div style="background-color: silver; border-radius: 10px 10px 0 0; padding: 10px;">
			<strong><center>QUEIXA DO APARELHO</center></strong>
		</div>
		<div style="padding: 10px;">
			<?php echo $queixa;?>
		</div>
	</section>
</article>
<article class="d-flex justify-content-between flex-fill align-content-center" style="border: 2px solid black;background-color: white; color: black; border-radius: 10px; margin-bottom: 10px;">
	<section style="border-radius: 10px 0 0 10px;" class="d-flex align-self-center flex-fill flex-column">
		<div style="background-color: silver; border-radius: 10px 10px 0 0; padding: 10px;">
			<strong><center>LAUDO TÉCNICO</center></strong>
		</div>
		<div style="padding: 10px; min-height: 100px;">

			<?php
			$id_srvorc=$id_servico;
				foreach (MostrarOrc($id_srvorc) as $linha) {
					$laudo = $linha->orc_laudo;
					$pecas = $linha->orc_pecas;
					$mdo = $linha->orc_mdo;
					$valor = $linha->orc_valor;
					$orc_laudo_data = $linha->orc_laudo_data;
				}
				echo $laudo;
			?>
		</div>
		<div style="border: 1px solid black; border-radius: 0px 0px 10px 10px; padding-top: 10px; padding-right: 10px">
			<strong><?php
			//Mostrar técnico, que está na tabela usuario junto com os clientes
			$cliente = $id_tecnico;
			foreach (MostrarCliente($cliente) as $value) {
				$nome = $value->us_nome;
				$sobrenome = $value->us_sobrenome;
			}
			$tecnico = $nome . " " . $sobrenome;
			 echo "<p align=right><i>Técnico: $tecnico</i>"; ?></strong>
		</div>
	</section>
</article>
<article class="d-flex justify-content-between flex-fill align-content-center" style="border: 2px solid black;background-color: white; color: black; border-radius: 10px; margin-bottom: 10px;">
	<section style="border-radius: 10px 0 0 10px;" class="d-flex align-self-center flex-fill flex-column">
		<div style="background-color: silver; border-radius: 10px 10px 0 0; padding: 10px;">
			<strong><center>ORÇAMENTO</center></strong>
		</div>
		<div style="padding: 10px;">
			<?php 
			echo "Peças: R$ $pecas<br>";
			echo "Mão de obra: R$ $mdo<br>";
			echo "Total: R$ $valor<br>";
			?>		
		</div>
		<div style="border: 1px solid black; border-radius: 0px 0px 10px 10px; padding-top: 10px; padding-right: 10px">
			<strong><?php echo "<p align=right><i>Data do laudo: $orc_laudo_data</i>";?></strong>
		</div>			
	</section>
</article>

	<p>Garantia de 90 dias. Caso o cliente desista do orçamento, deverá pagar a taxa de R$50,00 de orçamento.</p>

	<p style="text-align: center; margin-top: 50px;">_______________________________<br>Cliente</p>
	
<?php require_once 'rodape.php'; ?>
