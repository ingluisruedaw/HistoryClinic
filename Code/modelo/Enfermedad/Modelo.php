<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Enfermedad_Model{
	public $conexion;

	public function __CONSTRUCT(){
		try{
			$this->conexion = new conexion(); //instanciamos la clase	        
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar($id){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  enfermedad_actual.id,
											  enfermedad_actual.det,
											  enfermedad_actual.fecha
											FROM
											  enfermedad_actual
											WHERE
											  enfermedad_actual.historia_clinica_id = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almEnfermedad = new Enfermedad();
				$almEnfermedad->__SET('id', $r->id);
				$almEnfermedad->__SET('det', $r->det);
				$almEnfermedad->__SET('fecha', $r->fecha);
				$result[] = $almEnfermedad;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Eliminar(Enfermedad $data){
		try {
			$sql = "DELETE
					FROM
					  enfermedad_actual
					WHERE
					  enfermedad_actual.id = ?";
			$this->conexion->prepare($sql)->execute(
				array(
					$data->__GET('id')
				)
			);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function Registrar(Enfermedad $data){
		try {
		$sql = "INSERT INTO
				  enfermedad_actual(
				  det,
				  historia_clinica_id)
				VALUES(
				  ?,
				  ?)";
		$this->conexion->prepare($sql)->execute(
			array(
				$data->__GET('det'),
				$data->__GET('historia_clinica_id')
				)
			);
		return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function Actualizar(Enfermedad $data){
		try {
		$sql = "UPDATE
				  enfermedad_actual
				SET
				  det = ?
				WHERE
				  enfermedad_actual.id = ?";
		$this->conexion->prepare($sql)->execute(
			array(
				$data->__GET('det'),
				$data->__GET('id')
				)
			);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}
?>