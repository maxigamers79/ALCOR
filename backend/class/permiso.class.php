<?php

require_once("utilidad.class.php");

class permiso extends utilidad
{

	public $cod_per;
	public $fky_cargo;
	public $cod_mod;
	public $est_per;
	public $bas_per;


	function create()
	{
		$cre_per = date("y-m-d h:i:s");

		$this->que_bda = "INSERT INTO permiso
								(fky_cargo,
								cod_mod,
								cre_per,
								est_per,
								bas_per)
							VALUES
								('$this->fky_cargo',
								'$this->cod_mod',
								'$cre_per',
								'A',
								'A');";

		return $this->run();
	} // fin de create

	function update()
	{
		$act_per = date("y-m-d h:i:s");

		$this->que_bda = "UPDATE permiso
							SET 
								fky_cargo='$this->fky_cargo',
								cod_mod='$this->cod_mod',
								act_per='$act_per',
								est_per='$this->est_per'
							WHERE
								cod_per='$this->cod_per';";

		return $this->run();
	} // fin de update

	function restore()
	{
		$res_per = date("y-m-d h:i:s");

		$this->que_bda = "UPDATE permiso
								SET
									res_per='$res_per',
									bas_per='A'
								WHERE
									cod_per='$this->cod_per';";

		return $this->run();
	} // fin de restore

	function firstDelete()
	{
		$eli_per = date("y-m-d h:i:s");

		$this->que_bda = "UPDATE permiso
								SET
									eli_per='$eli_per',
									bas_per='B'
								WHERE
									cod_per='$this->cod_per';";

		return $this->run();
	} // fin de firstDelete

	function getAll()
	{
		$this->que_bda = "SELECT * FROM permiso WHERE bas_per='A';";

		return $this->run();
	} // fin de getAll

	function getMenu()
	{
		$this->que_bda = "SELECT * FROM permiso WHERE fky_cargo='$this->fky_cargo' AND est_per='A' AND bas_per='A';";

		return $this->run();
	} // fin de getMenu

	function getByCode()
	{
		$this->que_bda = "SELECT * FROM permiso WHERE cod_per='$this->cod_per';";

		return $this->run();
	} // fin de getByCode

	function getFirstDelete()
	{
		$this->que_bda = "SELECT * FROM permiso WHERE bas_per='B';";

		return $this->run();
	} // fin de getFirstDelete

	function delete()
	{
		$this->que_bda = "DELETE FROM permiso
								WHERE
									cod_per='$this->cod_per';";

		return $this->run();
	} // fin de delete

	function filter()
	{
		$filter1 = ($this->cod_per != "") ? "AND cod_per='$this->cod_per'" : "";
		$filter2 = ($this->fky_cargo != "") ? "AND fky_cargo='$this->fky_cargo'" : "";
		$filter3 = ($this->cod_mod != "") ? "AND cod_mod='$this->cod_mod'" : "";
		$filter4 = ($this->est_per != "") ? "AND est_per='$this->est_per'" : "";
		$filter5 = ($this->bas_per != "") ? "AND bas_per='$this->bas_per'" : "";

		$this->que_bda = "SELECT * FROM permiso WHERE 1=1 $filter1 $filter2 $filter3 $filter4 $filter5;";

		return $this->run();
	} // fin de filter

	function getBackup()
	{
		$this->que_bda = "SELECT * FROM permiso_resp;";

		return $this->run();
	} // fin de getBackup

	function filterBackup()
	{

		$filter1 = ($this->cod_per != "") ? "AND cod_per='$this->cod_per'" : "";
		$filter2 = ($this->fky_cargo != "") ? "AND fky_cargo='$this->fky_cargo'" : "";
		$filter3 = ($this->cod_mod != "") ? "AND cod_mod='$this->cod_mod'" : "";
		$filter4 = ($this->est_per != "") ? "AND est_per='$this->est_per'" : "";
		$filter5 = ($this->bas_per != "") ? "AND bas_per='$this->bas_per'" : "";

		$this->que_bda = "SELECT * FROM permiso_resp WHERE 1=1 $filter1 $filter2 $filter3 $filter4 $filter5;";

		return $this->run();
	} // fin de filterBackup

}