<?php
	
	require_once("../clase/empleado.class.php");

	$obj_ado = new empleado;

	$obj_ado->asignar_valor();

	switch ($_REQUEST["ejecutar"])
	{
		case 'insertar':			$obj_ado->resultado=$obj_ado->insertar();
									$obj_ado->mensaje();
									header("refresh:1; url=../../frontend/vista/ado_registrar.php");
		break;

		case 'modificar_normal':	$obj_ado->resultado=$obj_ado->modificar_normal();
									$obj_ado->mensaje();
									header("refresh:1; url=../../frontend/vista/ado_menu.php");
		break;

		case 'modificar_restaurar':	$obj_ado->resultado=$obj_ado->modificar_restaurar();
									$obj_ado->mensaje();
									header("refresh:1; url=../../frontend/vista/ado_listarpapelera.php");
		break;

		case 'modificar_eliminar':	$obj_ado->resultado=$obj_ado->modificar_eliminar();
									$obj_ado->mensaje();
									header("refresh:1; url=../../frontend/vista/ado_listartodo.php");
		break;

		case 'modificar_datos':		$obj_ado->resultado=$obj_ado->modificar_datos();
									$obj_ado->mensaje();
									header("refresh:1; url=../../frontend/vista/menu_principal.php");
		break;

		case 'modificar_contrasena':$obj_ado->resultado=$obj_ado->modificar_contrasena();
									$obj_ado->mensaje();
									header("refresh:1; url=../../frontend/vista/menu_principal.php");
		break;

		case 'eliminar':			$obj_ado->resultado=$obj_ado->eliminar();
									$obj_ado->mensaje();
									header("refresh:1; url=../../frontend/vista/ado_listarpapelera.php");
		break;

		case 'comprobar_datos':		$obj_ado->puntero=$obj_ado->comprobar_datos();
									$empleado=$obj_ado->extraer_dato();

									if($empleado['cor_ado']==$obj_ado->cor_ado && $empleado['ced_ado']==$obj_ado->ced_ado && $empleado['tel_ado']==$obj_ado->tel_ado && $empleado['nac_ado']==$obj_ado->nac_ado && $empleado['est_ado']=="A" && $empleado['bas_ado']=="A")
									{
										$obj_ado->cod_ado=$empleado['cod_ado'];
										$obj_ado->modificar_contrasena();

										header("Location: ../../frontend/vista/usu_sesion.php");
									}
									else
									{
										$obj_ado->mensaje();
										header("Location: ../../frontend/vista/ado_olvidocontrasena.php");
									}
									

		break;
	}

?>