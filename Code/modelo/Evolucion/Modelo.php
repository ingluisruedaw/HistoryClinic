<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Evolucion_Model{
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
											  evolucion.id,
											  evolucion.det,
											  evolucion.fecha
											FROM
											  evolucion
											WHERE
											  evolucion.historia_clinica_id = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almEvolucion = new Evolucion();
				$almEvolucion->__SET('id', $r->id);
				$almEvolucion->__SET('det', $r->det);
				$almEvolucion->__SET('fecha', $r->fecha);
				$result[] = $almEvolucion;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Eliminar(Evolucion $data){
		try {
			$sql = "DELETE
					FROM
					  evolucion
					WHERE
					  evolucion.id = ?";
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

	public function Registrar(Evolucion $data){
		try {
		$sql = "INSERT INTO
				  evolucion(
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

	public function Actualizar(Evolucion $data){
		try {
		$sql = "UPDATE
				  evolucion
				SET
				  det = ?
				WHERE
				  evolucion.id = ?";
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