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
							if($tipo=='d'){$t_despesa = $t_despesa+$valor;}
							}
					?>

					<table class="table table-striped table-hover table-condensed" style="background-color: white;">
					<thead>
						<tr>
							<th colspan="3" valign="center" style="background-color: rgb(240, 86, 87); color:white; font-size: 2vw;">Despesas</th>
							<th colspan="2" valign="center" style="background-color: rgb(240, 86, 87); color:white; font-size: 2vw;">R$ <?php echo $t_despesa; ?></th>
						</tr>
					</thead>
						<tr>
							<th style="color: black; background-color: #ffcc00;">Movimentação</th>
							<th style="color: black; background-color: #ffcc00;">Valor</th>
							<th style="color: black; background-color: #ffcc00;">Data</th>
							<th style="color: black; background-color: #ffcc00;" colspan="2">Comandos</th>
						</tr>
						
						<?php
						$id=$_SESSION['id'];
						foreach (Relatorio($id) as $value) {
							$mov_id = $value->hpf_id;
							$mov = $value->hpf_mov;
							$valor = $value->hpf_valor;
							$data = $value->hpf_data;
							$tipo = $value->hpf_tipo;
							if($tipo=='d'){$t_despesa = $t_despesa+$valor;
														
							ECHO "<tr><td>$mov</td><td>R$ $valor</td><td>$data</td><td>" . '<a href="mov_edit.php?action=edit&mov_id='.$mov_id.'&us_id='.$id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td><td><a href="comandos.php?action=del&mov_id='.$mov_id.'&us_id='.$id.'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';
							}
							
						}
					?>
					</table>			</section>
				
			</article>

		<!--	<footer><h4>I-Manager</h4>Copyright 2022</footer>-->
		</main>
</html>	