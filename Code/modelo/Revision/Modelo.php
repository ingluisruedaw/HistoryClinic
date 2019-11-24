<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Revision_Model{
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
											  revision_por_sistemas.id,
											  revision_por_sistemas.det,
											  revision_por_sistemas.fecha
											FROM
											  revision_por_sistemas
											WHERE
											  revision_por_sistemas.historia_clinica_id = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almRevision = new Revision();
				$almRevision->__SET('id', $r->id);
				$almRevision->__SET('det', $r->det);
				$almRevision->__SET('fecha', $r->fecha);
				$result[] = $almRevision;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Eliminar(Revision $data){
		try {
			$sql = "DELETE
					FROM
					  revision_por_sistemas
					WHERE
					  revision_por_sistemas.id = ?";
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

	public function Registrar(Revision $data){
		try {
		$sql = "INSERT INTO
				  revision_por_sistemas(
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

	public function Actualizar(Revision $data){
		try {
		$sql = "UPDATE
				  revision_por_sistemas
				SET
				  det = ?
				WHERE
				  revision_por_sistemas.id = ?";
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