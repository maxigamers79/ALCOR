<?php

require_once("tema_session.php");
require_once("../../backend/class/producto.class.php");

$obj_pro = new producto;
$obj_pro->puntero = $obj_pro->getAll();

headerr("Registrar Ventas");

check("Ventas", 4);

?>

<!-- Formulario -->
<div class="container px-3 pt-3 pb-5 mb-5">
	<div class="row justify-content-center">
		<div class="col-12 col-md-6 p-2">
			<div class="card rounded">
				<h2 class="card-title text-center pt-4">Registrar Venta</h2>
				<form action="../../backend/controller/producto.php" method="POST" class="was-validation" id="formulario" novalidate>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="producto">Producto:</label>
									<select name="cod_pro" id="producto" class="form-control">
										<option value="">Seleccione...</option>
										<?php while (($producto = $obj_pro->extractData()) > 0) {
											echo "<option value='$producto[cod_pro]'>$producto[nom_pro] | Cantidad: $producto[can_pro]</option>";
										}
										?>
									</select>
									<small id="productoDiv" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="cantidad">Cantidades:</label>
									<input type="text" name="com_pro" id="cantidad" class="form-control">
									<small id="cantidadDiv" class="invalid-feedback"></small>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer d-flex justify-content-between">
						<button type="reset" class="btn btn-success">Limpiar</button>
						<button type="submit" class="btn btn-primary" name="run" value="sale">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="../js/validaciones.js"></script>

<?php

footer();

?>