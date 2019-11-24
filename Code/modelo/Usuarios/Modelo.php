<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");

class Usuarios_Model{
	public $conexion;

	public function __CONSTRUCT(){
		try{
			$this->conexion = new conexion(); //instanciamos la clase	        
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Actualizar(Usuarios $data){
		try {
			$form_pass = $data->__GET('clave');
			$hash = password_hash($form_pass, PASSWORD_BCRYPT);
			$sql = "UPDATE
					  usuarios
					SET
					  clave = '$hash'
					WHERE
				  		usuarios.usuario = ?";
			$this->conexion->prepare($sql)->execute(
				array(
					$data->__GET('usuario')
					)
				);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}
?>