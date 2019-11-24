<?php
class Motivo{
	private $id;
	private $det;
	private $fecha;
	private $historia_clinica_id;
	private $nombres;
	private $apellidos;
	private $eps;

	public function __GET($k){ 
		return $this->$k; 
	}
	public function __SET($k, $v){ 
		return $this->$k = $v; 
	}
}
?>