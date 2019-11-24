<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Antecedentes_Model{
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
											  antecedentes.id,
											  antecedentes.det,
											  antecedentes.fecha
											FROM
											  antecedentes
											WHERE
											  antecedentes.historia_clinica_id = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almAntecedentes = new Antecedentes();
				$almAntecedentes->__SET('id', $r->id);
				$almAntecedentes->__SET('det', $r->det);
				$almAntecedentes->__SET('fecha', $r->fecha);
				$result[] = $almAntecedentes;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Eliminar(Antecedentes $data){
		try {
			$sql = "DELETE
					FROM
					  antecedentes
					WHERE
					  antecedentes.id = ?";
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

	public function Registrar(Antecedentes $data){
		try {
		$sql = "INSERT INTO
				  antecedentes(
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

	public function Actualizar(Antecedentes $data){
		try {
		$sql = "UPDATE
				  antecedentes
				SET
				  det = ?
				WHERE
				  antecedentes.id = ?";
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