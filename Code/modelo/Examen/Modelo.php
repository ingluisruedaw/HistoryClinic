<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Examen_Model{
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
											  examen_fisico.id,
											  examen_fisico.det,
											  examen_fisico.fecha
											FROM
											  examen_fisico
											WHERE
											  examen_fisico.historia_clinica_id = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almexamen_fisico = new Examen();
				$almexamen_fisico->__SET('id', $r->id);
				$almexamen_fisico->__SET('det', $r->det);
				$almexamen_fisico->__SET('fecha', $r->fecha);
				$result[] = $almexamen_fisico;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Eliminar(Examen $data){
		try {
			$sql = "DELETE
					FROM
					  examen_fisico
					WHERE
					  examen_fisico.id = ?";
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

	public function Registrar(Examen $data){
		try {
		$sql = "INSERT INTO
				  examen_fisico(
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

	public function Actualizar(Examen $data){
		try {
		$sql = "UPDATE
				  examen_fisico
				SET
				  det = ?
				WHERE
				  examen_fisico.id = ?";
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