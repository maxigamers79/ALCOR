<?php

require_once("tema_session.php");
require_once("../../backend/class/empleado.class.php");

$obj_ado = new empleado;
$obj_ado->assignValue();
$obj_ado->puntero = $obj_ado->filterBackup();

headerr("Empleados Filtrados - Historial");

checkAdmin();

?>

<!-- Lista -->
<div class="container-fluid px-3 pt-3 pb-5 mb-5">
	<a class="btn btn-success btn-lg" href="menu_config.php"><i class="fas fa-arrow-circle-left"></i></a>
	<h2 class="text-center p-3">Empleados Filtrados - Historial</h2>
	<div class="row justify-content-center">
		<div class="col-12 py-2">
			<div class="table-responsive">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<th>Código</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Genero</th>
						<th>Fecha de Nacimiento</th>
						<th>Tipo</th>
						<th>Cédula</th>
						<th>Teléfono</th>
						<th>Correo</th>
						<th>Cargo</th>
						<th>Dirección</th>
						<th>Fecha de Contrato</th>
						<th>Modificado</th>
						<th>Eliminado</th>
						<th>Restaurado</th>
					</thead>
					<tbody>
						<?php
						while (($empleado = $obj_ado->extractData()) > 0) {
							echo "<form action='../../backend/controller/empleado.php' method='POST'>
												<tr>
													<input type='hidden' name='cod_ado' value='$empleado[cod_ado]'>
													<td>$empleado[cod_ado]</td>
													<td>$empleado[nom_ado]</td>
													<td>$empleado[ape_ado]</td>";

							if ($empleado['gen_ado'] == "H") {
								echo "<td>Hombre</td>";
							} else {
								echo "<td>Mujer</td>";
							}

							echo "<td>$empleado[nac_ado]</td>";

							if ($empleado['tip_ado'] == "V") {
								echo "<td>Venezolano</td>";
							} else {
								echo "<td>Extranjero</td>";
							}
							echo "
													<td>$empleado[ced_ado]</td>
													<td>$empleado[tel_ado]</td>
													<td>$empleado[cor_ado]</td>
													<td>$empleado[cod_car]</td>
													<td>$empleado[dir_ado]</td>
													<td>$empleado[cre_ado]</td>
													<td>$empleado[act_ado]</td>
													<td>$empleado[eli_ado]</td>
													<td>$empleado[res_ado]</td>
												</tr>
											</form>
										";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php

footer();

?>