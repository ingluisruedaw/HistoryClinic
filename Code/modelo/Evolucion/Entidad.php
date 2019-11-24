<?php
class Evolucion{
	private $id;
	private $det;
	private $historia_clinica_id;

	public function __GET($k){ 
		return $this->$k; 
	}
	public function __SET($k, $v){ 
		return $this->$k = $v; 
	}
}
?>