<?php
class Historia_clinica{
	private $id;
	private $fecha;
	private $cliente_codigo;
	private $nombres;//nombre del cliente
	private $cliente_cedula;//cedula del cliente

	private $cliente_tipo_doc;
	private $cliente_eps;
	private $cliente_nacimiento;
	private $cliente_sexo;
	private $cliente_ocupacion;
	private $cliente_email;
	private $cliente_escolaridad;
	private $cliente_estado_civil;
	private $cliente_acompanante;
	private $cliente_parentezco;

	public function __GET($k){ 
		return $this->$k; 
	}
	public function __SET($k, $v){ 
		return $this->$k = $v; 
	}
}
?>