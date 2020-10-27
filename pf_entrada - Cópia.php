<?php require_once('cabecalho.php'); ?>
				<section id="campo_calculo" class="campo_calculo coluna sombra">
					<?php
						$id=$_SESSION['id'];
						foreach (Relatorio($id) as $value) {
							$mov_id = $value->hpf_id;
							$mov = $value->hpf_mov;
							$valor = $value->hpf_valor;
							$data = $value->hpf_data;
							$tipo = $value->hpf_tipo;
							if($tipo=='r'){$t_receita = $t_receita+$valor;}
							}
					?>

					<table class="table table-striped table-hover table-condensed" style="background-color: white;">
					<thead>
						<tr>
							<th colspan="3" valign="center" style="background-color: #4CAF50; color:white; font-size: 2vw;">Receitas</th>
							<th colspan="2" valign="center" style="background-color: #4CAF50; color:white; font-size: 2vw;">R$ <?php echo $t_receita; ?></th>
						</tr>
					</thead>
						<tr>
							<th class="receita" style="color: white;">Movimentação</th>
							<th class="receita" style="color: white;">Valor</th>
							<th class="receita" style="color: white;">Data</th>
							<th class="receita"  style="color: white;" colspan="2">Comandos</th>
						</tr>
						
						<?php
						$id=$_SESSION['id'];
						foreach (Relatorio($id) as $value) {
							$mov_id = $value->hpf_id;
							$mov = $value->hpf_mov;
							$valor = $value->hpf_valor;
							$data = $value->hpf_data;
							$tipo = $value->hpf_tipo;
							if($tipo=='r'){$t_receita = $t_receita+$valor;
														
							ECHO "<tr><td>$mov</td><td>R$ $valor</td><td>$data</td><td>" . '<a href="mov_edit.php?action=edit&mov_id='.$mov_id.'&us_id='.$id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td><td><a href="comandos.php?action=del&mov_id='.$mov_id.'&us_id='.$id.'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';
							}
							
						}
					?>
					</table>
			</section>
				
			</article>

			<!--<footer><h4>I-Manager</h4>Copyright 2022</footer>-->
		</main>
<p id="oc_receita"></p>
</html>	