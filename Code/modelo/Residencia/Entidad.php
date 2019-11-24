<?php
class Residencia
{
	private $id;
	private $cliente_codigo;
	private $cliente;
	private $ciudad;
	private $direccion;
	private $telefono;
	private $barrio;

	public function __GET($k){ 
		return $this->$k; 
	}
	public function __SET($k, $v){ 
		return $this->$k = $v; 
	}
}
?>