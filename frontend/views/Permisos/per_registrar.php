<?php

require_once("tema_session.php");
require_once("../../backend/class/permiso.class.php");
require_once("../../backend/class/cargo.class.php");
require_once("../../backend/class/modulo.class.php");

$obj_per = new permiso;
$obj_per->classBootstrap();

$obj_car = new cargo;
$obj_car->puntero = $obj_car->getAllActive();

$obj_mod = new modulo;
$obj_mod->puntero = $obj_mod->getAllActive();

headerr("Registrar Permiso");

check("Roles");

?>

<div class="<?php echo $obj_per->container; ?>">
	<div class="row pb-3 mb-3 bg-white">
		<div class="col-12 text-left">
			<button class="<?php echo $obj_per->btn_atras; ?>" onClick="window.location.href='rol_menu.php'"><i
					class="icon ion-md-arrow-round-back"></i></button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-12 col-md-8">
			<div class="<?php echo $obj_per->card; ?>">
				<h2 class="<?php echo $obj_per->titulocard; ?>">Registrar Permiso</h2>
				<hr>
				<div class="card-body">
					<form action="../../backend/controller/permiso.php" method="POST">
						<div class="row p-3">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="cod_car" class="<?php echo $obj_per->for; ?>">Cargo:</label>
									<select name="cod_car" id="cod_car" required="" class="<?php echo $obj_per->input_normal; ?>">
										<option value="">Seleccione...</option>
										<?php while (($cargo = $obj_car->extractData()) > 0) {
											if ($cargo['cod_car'] == 1 || $cargo['nom_car'] == 'Administrador') {
											} else {
												echo "<option value='$cargo[cod_car]'>$cargo[nom_car]</option>";
											}
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="cod_mod" class="<?php echo $obj_per->for; ?>">Modulo:</label>
									<select name="cod_mod" id="cod_mod" required="" class="<?php echo $obj_per->input_normal; ?>">
										<option value="">Seleccione...</option>
										<?php while (($modulo = $obj_mod->extractData()) > 0) {
											echo "<option value='$modulo[cod_mod]'>Menú de $modulo[nom_mod]</option>";
										}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="row p-3 text-center">
							<div class="col-6">
								<div class="form-group">
									<button type="reset" name="run" id="run" value="limpiar"
										class="<?php echo $obj_per->btn_limpiar; ?>">Limpiar</button>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<button type="submit" name="run" id="run" value="create"
										class="<?php echo $obj_per->btn_enviar; ?>">Registrar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

<?php

footer();

?>