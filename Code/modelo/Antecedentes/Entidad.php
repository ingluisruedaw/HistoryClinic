<?php
class Antecedentes{
	private $id;
	private $det;
	private $historia_clinica_id;
	private $fecha;

	public function __GET($k){ 
		return $this->$k; 
	}
	public function __SET($k, $v){ 
		return $this->$k = $v; 
	}
}
?>