<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Residencia_Model{
	public $conexion;

	public function __CONSTRUCT(){
		try{
			$this->conexion = new conexion(); //instanciamos la clase	        
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar(){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  residencia.id,
											  residencia.cliente_codigo,
											  CONCAT(cliente.nombres,' ',cliente.apellidos) AS cliente,
											  residencia.ciudad,
											  residencia.direccion,
											  residencia.telefono,
											  residencia.barrio
											FROM
											  residencia
											  INNER JOIN cliente ON (residencia.cliente_codigo = cliente.codigo)");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almResidencia = new Residencia();
				$almResidencia->__SET('id', $r->id);
				$almResidencia->__SET('cliente_codigo', $r->cliente_codigo);
				$almResidencia->__SET('cliente', $r->cliente);
				$almResidencia->__SET('ciudad', $r->ciudad);
				$almResidencia->__SET('direccion', $r->direccion);
				$almResidencia->__SET('telefono', $r->telefono);
				$almResidencia->__SET('barrio', $r->barrio);
				$result[] = $almResidencia;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Actualizar(Residencia $data){
		try {
			$sql = "UPDATE
					  residencia
					SET
					  cliente_codigo = ?,
					  ciudad = ?,
					  direccion = ?,
					  telefono = ?,
					  barrio = ?
					WHERE
					  residencia.id = ?";
			$this->conexion->prepare($sql)->execute(
				array(
					$data->__GET('cliente_codigo'),
					$data->__GET('ciudad'),
					$data->__GET('direccion'),
					$data->__GET('telefono'),
					$data->__GET('barrio'),
					$data->__GET('id')
				)
			);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function Eliminar(Residencia $data){
		try {
			$sql = "DELETE
					FROM
					  residencia
					WHERE
					  residencia.id = ?";
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

	/*public function Actualizar_Eliminado(Pais $data){
		try {
			$sql = "UPDATE pais SET det = ?, estados_id = (SELECT estados.id FROM estados WHERE estados.det = 'activo') WHERE id = ?";
			$this->conexion->prepare($sql)->execute(array($data->__GET('det'),$data->__GET('id')));
			if ($_SESSION['rol']==1) {
				echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=pais';</script>";
			}
		} catch (Exception $e) {
			if ($_SESSION['rol']==1) {
				echo"<script type=\"text/javascript\">alert('Error'); window.location='?action=pais';</script>";
			}			
		}
	}*/

	public function Registro(Residencia $data){//funcion que verifica si existe un registro o no
		try {
			$stm = $this->conexion->prepare("SELECT 
											  residencia.id
											FROM
											  residencia
											WHERE
											  residencia.cliente_codigo = ? AND 
											  residencia.ciudad = ? AND 
											  residencia.direccion = ?");
			$stm->execute(array(
				$data->__GET('cliente_codigo'),
				$data->__GET('ciudad'),
				$data->__GET('direccion')
				));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almResidencia = new Residencia();
			if (empty($r)) {
				$almResidencia->__SET('id', NULL);
			}else{
				$almResidencia->__SET('id', 'hay datos');
			}
			return $almResidencia;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function llenar(Residencia $data){//llenar los datos en la variable solicitada
		try {
			$stm = $this->conexion->prepare("SELECT 
											  residencia.cliente_codigo,
											  residencia.ciudad,
											  residencia.direccion,
											  residencia.telefono,
											  residencia.barrio
											FROM
											  residencia
											WHERE
											  residencia.id = ?");
			$stm->execute(array(
				$data->__GET('id')
			));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almResidencia = new Residencia();
			$almResidencia->__SET('cliente_codigo', $r->cliente_codigo);
			$almResidencia->__SET('ciudad', $r->ciudad);
			$almResidencia->__SET('direccion', $r->direccion);
			$almResidencia->__SET('telefono', $r->telefono);
			$almResidencia->__SET('barrio', $r->barrio);
			return $almResidencia;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Residencia $data){
		try {
		$sql = "INSERT INTO
				  residencia(
				  cliente_codigo,
				  ciudad,
				  direccion,
				  telefono,
				  barrio)
				VALUES(
				  ?,
				  ?,
				  ?,
				  ?,
				  ?)";
		$this->conexion->prepare($sql)->execute(
			array(
				$data->__GET('cliente_codigo'),
				$data->__GET('ciudad'),
				$data->__GET('direccion'),
				$data->__GET('telefono'),
				$data->__GET('barrio')
				)
			);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}
?>