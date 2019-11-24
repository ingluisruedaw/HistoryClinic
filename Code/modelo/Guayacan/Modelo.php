<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Guayacan_Model{
	public $conexion;

	public function __CONSTRUCT(){
		try{
			$this->conexion = new conexion(); //instanciamos la clase	        
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	/*public function Listar(){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  historia_clinica.id,
											  historia_clinica.cliente_codigo,
											  cliente.id as cliente_cedula,
											  concat(cliente.nombres, ' ', cliente.apellidos) AS nombres,
											  historia_clinica.fecha  
											FROM
											  historia_clinica
											  INNER JOIN cliente ON (historia_clinica.cliente_codigo = cliente.codigo)");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almHistoria_clinica = new Historia_clinica();
				$almHistoria_clinica->__SET('id', $r->id);
				$almHistoria_clinica->__SET('cliente_codigo', $r->cliente_codigo);
				$almHistoria_clinica->__SET('cliente_cedula', $r->cliente_cedula);
				$almHistoria_clinica->__SET('nombres', $r->nombres);
				$almHistoria_clinica->__SET('fecha', $r->fecha);
				$result[] = $almHistoria_clinica;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}*/

	/*public function Eliminar(Historia_clinica $data){
		try {
			$sql = "DELETE
					FROM
					  historia_clinica
					WHERE
					  historia_clinica.id = ?";
			$this->conexion->prepare($sql)->execute(
				array(
					$data->__GET('id')
				)
			);
			echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=historia_clinica';</script>";
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=historia_clinica';</script>";
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
			$almHistoria_clinica = new Historia_clinica();
			if (empty($r)) {
				$almHistoria_clinica->__SET('id', NULL);
			}else{
				$almHistoria_clinica->__SET('id', $r->id);
			}
			return $almHistoria_clinica;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}*/

	public function paciente(Guayacan $data){
		try {
			$stm = $this->conexion->prepare("SELECT 
											  cliente.nombres,
											  cliente.apellidos,
											  cliente.eps
											FROM
											  historia_clinica
											  INNER JOIN cliente ON (historia_clinica.cliente_codigo = cliente.codigo)
											WHERE
											  historia_clinica.id = ?");
			$stm->execute(array($data->__GET('id')));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almGuayacan = new Guayacan();			
			$almGuayacan->__SET('nombres', $r->nombres);
			$almGuayacan->__SET('apellidos', $r->apellidos);
			$almGuayacan->__SET('eps', $r->eps);
			return $almGuayacan;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/*public function Registrar(Historia_clinica $data){
		try {
		$sql = "INSERT INTO
				  historia_clinica(
				  cliente_codigo)
				VALUES(
				  ?)";
		$this->conexion->prepare($sql)->execute(
			array(
				$data->__GET('cliente_codigo')
				)
			);
			echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=historia_clinica';</script>";
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error. Intente Nuevamente'); window.location='?action=historia_clinica';</script>";
		}
	}*/
}
?>