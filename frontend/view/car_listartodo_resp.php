<?php

require_once("tema_session.php");
require_once("../../backend/class/cargo.class.php");

$obj_car = new cargo;
$obj_car->assignValue();
$obj_car->puntero = $obj_car->getBackup();

headerr("Lista de Cargos - Historial");

/* check("Roles"); */

?>

<!-- Lista -->
<div class="container-fluid p-3">
	<a class="btn btn-success btn-lg" href="menu_config.php"><i class="fas fa-arrow-circle-left"></i></a>
	<h2 class="text-center p-3">Lista de Cargos - Historial</h2>
	<div class="row justify-content-center">
		<div class="col-12 py-2">
			<div class="table-responsive">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nombre</th>
							<th>Creado</th>
							<th>Modificado</th>
							<th>Restaurado</th>
							<th>Eliminado</th>
							<th>PDF</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while (($cargo = $obj_car->extractData()) > 0) {
							echo "<form action='../../backend/controller/cargo.php' method='POST'>
											<tr>
												<input type='hidden' name='cod_car' value='$cargo[cod_car]'>
												<td>$cargo[cod_car]</td>
												<td>$cargo[nom_car]</td>
												<td>$cargo[cre_car]</td>
												<td>$cargo[act_car]</td>
												<td>$cargo[res_car]</td>
												<td>$cargo[eli_car]</td>
												<td><a class='btn btn-danger' href='car_reportepdf.php?cod_car=$cargo[cod_car]'><i class='fas fa-file-pdf'></i></a></td>
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