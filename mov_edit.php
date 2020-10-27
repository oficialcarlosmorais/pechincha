<?php require_once('cabecalho.php'); ?>
				<section id="campo_calculo" class="campo_calculo coluna sombra">

					<table class="table table-striped table-hover table-condensed" style="background-color: white;">
					<thead>
						<tr>
							<th colspan="3" valign="center" style="background-color: #4CAF50; color:white; font-size: 2vw;">Editar</th>
							<th colspan="2" valign="center" style="background-color: #4CAF50; color:white; font-size: 2vw;"></th>
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
						$mov_id = $_GET['mov_id'];
						echo $mov_id;
						foreach (Show_edt_mov($mov_id) as $value) {
							$mov_id = $value->hpf_id;
							$mov = $value->hpf_mov;
							$valor = $value->hpf_valor;
							$data = $value->hpf_data;
							$tipo = $value->hpf_tipo;
							if($tipo=='r'){$t_receita = $t_receita+$valor;
														
							ECHO "<tr><td><input type=text name=movimentacao value=$mov required></td><td><input type=text name=valor value=$valor required></td><td><input type=date name=data value=$data required> </td><td>" . '<a href="comandos.php?action=edit&mov_id='.$mov_id.'&us_id='.$id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td><td><a href="comandos.php?action=del&mov_id='.$mov_id.'&us_id='.$id.'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';
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