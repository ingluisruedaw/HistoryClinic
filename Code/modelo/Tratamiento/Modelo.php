<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Tratamiento_Model{
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
											  tratamiento.id,
											  tratamiento.det,
											  tratamiento.fecha
											FROM
											  tratamiento
											WHERE
											  tratamiento.historia_clinica_id = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almTratamiento = new Tratamiento();
				$almTratamiento->__SET('id', $r->id);
				$almTratamiento->__SET('det', $r->det);
				$almTratamiento->__SET('fecha', $r->fecha);
				$result[] = $almTratamiento;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Eliminar(Tratamiento $data){
		try {
			$sql = "DELETE
					FROM
					  tratamiento
					WHERE
					  tratamiento.id = ?";
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

	public function Registrar(Tratamiento $data){
		try {
		$sql = "INSERT INTO
				  tratamiento(
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

	public function Actualizar(tratamiento $data){
		try {
		$sql = "UPDATE
				  tratamiento
				SET
				  det = ?
				WHERE
				  tratamiento.id = ?";
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