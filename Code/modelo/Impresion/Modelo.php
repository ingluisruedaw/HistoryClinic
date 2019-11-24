<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Impresion_Model{
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
											  impresion_diagnostica.id,
											  impresion_diagnostica.det,
											  impresion_diagnostica.fecha
											FROM
											  impresion_diagnostica
											WHERE
											  impresion_diagnostica.historia_clinica_id = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almImpresion = new Impresion();
				$almImpresion->__SET('id', $r->id);
				$almImpresion->__SET('det', $r->det);
				$almImpresion->__SET('fecha', $r->fecha);
				$result[] = $almImpresion;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Eliminar(Impresion $data){
		try {
			$sql = "DELETE
					FROM
					  impresion_diagnostica
					WHERE
					  impresion_diagnostica.id = ?";
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

	public function Registrar(Impresion $data){
		try {
		$sql = "INSERT INTO
				  impresion_diagnostica(
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

	public function Actualizar(Impresion $data){
		try {
		$sql = "UPDATE
				  impresion_diagnostica
				SET
				  det = ?
				WHERE
				  impresion_diagnostica.id = ?";
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