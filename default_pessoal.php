<?php require_once('cabecalho.php');?>
				
				<section id="campo_calculo" class="campo_calculo coluna sombra">
<?php
$id=$_SESSION['id'];
foreach (Relatorio($id) as $value) {
		$id = $value->hpf_id;
		$mov = $value->hpf_mov;
		$valor = $value->hpf_valor;
		$data = $value->hpf_data;
		$tipo = $value->hpf_tipo;
		if ($tipo == 'r') {$t_receita = $t_receita+$valor;}
		if ($tipo == 'd') {$t_despesa = $t_despesa+$valor;}		
		}   	

?>
				<div class="calculo space_between campo_grande receita">
					 <p>Receitas</p> <p id="receita">R$ <?php echo $t_receita; ?></p>
					</div>
					
					<div class="calculo space_between campo_grande despesas">
					 <p>Despesas</p> <p id="despesas">R$ <?php echo $t_despesa; ?></p>
					</div>

					<div class="calculo space_between campo_grande total">
					 <p>Total</p> <p id="total">R$ <?php echo $t_receita-$t_despesa; ?></p>
					</div>
				</section>

				
				<section id="campo_relatorio" class="campo_calculo row sombra">
					<div class="calculo campo_grande coluna receita">
					 <h3>Receitas</h3>
					 <ol id="ol_receitas">
					 	<li>Salário: R$ -</li>
					 </ol>
					</div>
					
					<div class="calculo campo_grande coluna despesas">
					 <h3>Despesas</h3>
					 <ol id="ol_despesas">
					 	<li>Luz: R$</li>
					 	<li>Água: R$</li>
					 	<li>Celulares: R$</li>
					 	<li>Transportes R$</li>
					 </ol>
					</div>

					<div class="calculo campo_grande coluna total">
					 <h3>Total</h3>
					 <span id="span_total">R$</span>
					</div>
				</section>

			</article>

		<!--	<footer>I-Manager<br>Copyright 2022</footer>-->
		</main>

</html>	
