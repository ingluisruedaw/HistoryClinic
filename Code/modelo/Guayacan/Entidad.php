<?php
class Guayacan{
	private $id;
	private $det;
	private $historia_clinica;
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