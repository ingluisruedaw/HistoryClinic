<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Motivo_Model{
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
											  motivo_consulta.id,
											  motivo_consulta.det,
											  motivo_consulta.fecha
											FROM
											  motivo_consulta
											WHERE
											  motivo_consulta.historia_clinica_id = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almMotivo = new Motivo();
				$almMotivo->__SET('id', $r->id);
				$almMotivo->__SET('det', $r->det);
				$almMotivo->__SET('fecha', $r->fecha);
				$result[] = $almMotivo;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}


	public function Eliminar(Motivo $data){
		try {
			$sql = "DELETE
					FROM
					  motivo_consulta
					WHERE
					  motivo_consulta.id = ?";
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

	public function Registro(Historia_clinica $data){//funcion que verifica si existe un registro o no
		try {
			$stm = $this->conexion->prepare("SELECT 
											  historia_clinica.id
											FROM
											  historia_clinica
											WHERE
											  historia_clinica.cliente_codigo = ?");
			$stm->execute(
				array(
					$data->__GET('cliente_codigo')
					)
			);
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almMotivo = new Historia_clinica();
			if (empty($r)) {
				$almMotivo->__SET('id', NULL);
			}else{
				$almMotivo->__SET('id', $r->id);
			}
			return $almMotivo;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Motivo $data){
		try {
		$sql = "INSERT INTO
				  motivo_consulta(
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

	public function Actualizar(Motivo $data){
		try {
		$sql = "UPDATE
				  motivo_consulta
				SET
				  det = ?
				WHERE
				  motivo_consulta.id = ?";
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