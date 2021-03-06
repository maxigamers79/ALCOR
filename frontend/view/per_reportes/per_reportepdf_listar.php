<html>

<head>
	<meta charset='UTF-8'>
	<title>Lista de Permisos</title>
	<link rel='stylesheet' href='../../css/estilospdf.css'>
</head>

<body>
	<table>
		<tr class='head'>
			<th class='head' colspan="2" style='text-align: left;'><img src='../../img/logo3.png' width='250px'></th>
			<th class='head' colspan="1" style='text-align: right;'>
				<h3>Lista de Permisos</h3>
			</th>
			<th class='head'></th>
		</tr>
		<tr class='nada'>
			<th class='nada'></th>
		</tr>
		<tr class='tr'>
			<th class="th">Código</th>
			<th class="th">Cargo</th>
			<th class="th">Módulo</th>
		</tr>
		<?php
		
		require_once("../../../backend/class/permiso.class.php");
		require_once("../../../backend/class/cargo.class.php");
		require_once("../../../backend/class/modulo.class.php");

		$obj_per = new permiso;
		$obj_per->puntero = $obj_per->getAll();

		$obj_car = new cargo;

		$obj_mod = new modulo;

		while (($permiso = $obj_per->extractData()) > 0) {

			$obj_car->cod_car = $permiso['cod_car'];
			$obj_car->puntero = $obj_car->filter();
			$cargo = $obj_car->extractData();

			$obj_mod->cod_mod = $permiso['cod_mod'];
			$obj_mod->puntero = $obj_mod->filter();
			$modulo = $obj_mod->extractData();

			echo "
						<tr class='tr'>
							<td class='td'>$permiso[cod_per]</td>
							<td class='td'>$cargo[nom_car]</td>
							<td class='td'>$modulo[nom_mod]</td>
						</tr>
			";
		}
		?>
	</table>
</body>

</html>