<?php 

	require("tema.php");
	require("../../backend/clase/cargo.class.php");
	require("../../backend/clase/empleado.class.php");

	$obj_ado = new empleado;

	$obj_ado->estandar();

	$cod_ado=$_REQUEST['cod_ado'];

	$obj_ado->asignar_valor();
	$obj_ado->puntero=$obj_ado->listar_modificar();
	$empleado=$obj_ado->extraer_dato();

	$obj_car = new cargo;
	$obj_car->puntero=$obj_car->listar_normal();

	encabezado("Modificar empleado - ALCOR C.A.");

?>

	<div class="<?php echo $obj_ado->container; ?>">
		<div class="row pb-3 mb-3 bg-white">
			<div class="col-12 text-left">
				<button class="<?php echo $obj_ado->btn_atras; ?>" onClick="window.location.href='ado_.php'">Atras</button>
			</div>
		</div>
		<div class="<?php echo $obj_ado->card; ?>" style="width: 40rem">
			<h2 class="<?php echo $obj_ado->titulocard; ?>">Modificar empleado</h2>
			<hr>
			<div class="card-body">
				<form action="../../backend/controlador/empleado.php" method="POST">
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<input type="hidden" name="cod_ado" value="<?php echo $empleado['cod_ado']; ?>">
								<label for="nom_ado" class="text-white text-left h5">Nombre:</label>
								<input type="text" name="nom_ado" id="nom_ado" placeholder="Nombre:" minlength="3" maxlength="50" require="" value="<?php echo $empleado['nom_ado']; ?>"  class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="ape_ado" class="text-white text-left h5">Apellido:</label>
								<input type="text" name="ape_ado" id="ape_ado" placeholder="Apellido:" minlength="3" maxlength="50" require="" value="<?php echo $empleado['ape_ado']; ?>"  class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<label for="gen_ado" class="text-white text-left h5">Genero:</label>
								<select name="gen_ado" id="gen_ado" class="<?php echo $obj_ado->input_normal; ?>">
									<option value="H">Hombre</option>
									<option value="M">Mujer</option>
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="nac_ado" class="text-white text-left h5">Fecha de nacimiento:</label>
								<input type="date" name="nac_ado" id="nac_ado" placeholder="Fecha de nacimiento:" require="" value="<?php echo $empleado['nac_ado']; ?>"  class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-4">
							<div class="form-group">
								<label for="tip_ado" class="text-white text-left h5">Tipo:</label>
								<select name="tip_ado" id="tip_ado" class="<?php echo $obj_ado->input_normal; ?>">
									<option value="V">Venezolano</option>
									<option value="E">Extranjero</option>
								</select>
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label for="ced_ado" class="text-white text-left h5">Cédula:</label>
								<input type="text" name="ced_ado" id="ced_ado" placeholder="Cédula:" minlength="1" maxlength="8" require="" value="<?php echo $empleado['ced_ado']; ?>"  class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label for="tel_ado" class="text-white text-left h5">Telefono:</label>
								<input type="text" name="tel_ado" id="tel_ado" placeholder="Telefono:" minlength="11" maxlength="11" require="" value="<?php echo $empleado['tel_ado']; ?>"  class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-6">
							<div class="form-group">
								<label for="cor_ado" class="text-white text-left h5">Correo:</label>
								<input type="email" name="cor_ado" id="cor_ado" placeholder="Correo:" minlength="1" maxlength="100" require="" value="<?php echo $empleado['cor_ado']; ?>"  class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="car_ado" class="text-white text-left h5">Cargo:</label>
								<select name="car_ado" id="car_ado" class="<?php echo $obj_ado->input_normal; ?>">
									<?php while (($cargo=$obj_car->extraer_dato())>0)
										{
											$select=($empleado['car_ado']==$cargo['cod_car']) ? "selected" : "" ;
											echo "<option $select value='$cargo[cod_car]'>$cargo[nom_car]</option>";
										}										
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-12">
							<div class="form-group">
								<label for="dir_ado" class="text-white text-left h5">Dirección:</label>
								<input type="text" name="dir_ado" id="dir_ado" placeholder="Dirección:" minlength="3" maxlength="100" require="" value="<?php echo $empleado['dir_ado']; ?>"  class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
					</div>
					<div class="row p-3">
						<div class="col-8">
							<div class="form-group">
								<label for="dir_ado" class="text-white text-left h5">Dirección:</label>
								<input type="text" name="dir_ado" id="dir_ado" placeholder="Dirección:" minlength="3" maxlength="100" require="" value="<?php echo $empleado['dir_ado']; ?>"  class="<?php echo $obj_ado->input_normal; ?>">
							</div>
						</div>
						<div class="col-4">
							<div class="form-group">
								<label for="est_ado" class="text-white text-left h5">Activo/Inactivo:</label>
								<select name="est_ado" id="est_ado" class="<?php echo $obj_ado->input_normal; ?>">
									<option value="A">Activo</option>
									<option value="I">Inactivo</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row p-3 text-center">
						<div class="col-6">
							<div class="form-group">
								<button type="reset" name="ejecutar" id="ejecutar" value="limpiar" class="<?php echo $obj_ado->btn_limpiar; ?>">Limpiar</button>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<button type="submit" name="ejecutar" id="ejecutar" value="insertar" class="<?php echo $obj_ado->btn_enviar; ?>">Modificar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php 
	
	pie();

?>