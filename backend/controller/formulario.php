<?php

require_once("../class/formulario.class.php");

$obj_for = new formulario;

$obj_for->assignValue();

switch ($_REQUEST["run"]) {
	case 'create':
		$obj_for->create();
		header("Location: ../../frontend/view/inicio.php");
		break;

	case 'delete':
		$obj_for->delete();
		header("Location: ../../frontend/view/for_listartodo.php");
		break;
}