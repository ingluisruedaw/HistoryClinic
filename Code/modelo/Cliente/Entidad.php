<?php
class Cliente
{
	private $codigo;
	private $id;
	private $tipo_doc;
	private $eps;
	private $nombres;
	private $apellidos;
	private $nacimiento;
	private $sexo;
	private $ocupacion;
	private $email;
	private $escolaridad;
	private $estado_civil;
	private $acompanante;
	private $parentezco;

	public function __GET($k){ 
		return $this->$k; 
	}
	public function __SET($k, $v){ 
		return $this->$k = $v; 
	}
}
?>