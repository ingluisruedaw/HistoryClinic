<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Historia_clinica_Model{
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
	}

	public function Eliminar(Historia_clinica $data){
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
	}

	public function Registrar(Historia_clinica $data){
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
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function Buscar_Cliente(Historia_clinica $data){//selecciona los datos por codigo de historia clinica
		try {
			$stm = $this->conexion->prepare("SELECT 
											  historia_clinica.cliente_codigo,
											  cliente.id as cliente_cedula,
											  cliente.tipo_doc as cliente_tipo_doc,
											  cliente.eps as cliente_eps,
											  concat(cliente.nombres,' ',cliente.apellidos) as nombres,
											  cliente.nacimiento as cliente_nacimiento,
											  cliente.sexo as cliente_sexo,
											  cliente.ocupacion as cliente_ocupacion,
											  cliente.email as cliente_email,
											  cliente.escolaridad as cliente_escolaridad,
											  cliente.estado_civil as cliente_estado_civil,
											  cliente.acompanante as cliente_acompanante,
											  cliente.parentezco as cliente_parentezco
											FROM
											  historia_clinica
											  INNER JOIN cliente ON (historia_clinica.cliente_codigo = cliente.codigo)
											WHERE
											  historia_clinica.id = ?");
			$stm->execute(array(
				$data->__GET('id')
				));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almHistoria_clinica = new Historia_clinica();
			$almHistoria_clinica->__SET('cliente_codigo', $r->cliente_codigo);
			$almHistoria_clinica->__SET('cliente_cedula', $r->cliente_cedula);
			$almHistoria_clinica->__SET('cliente_tipo_doc', $r->cliente_tipo_doc);
			$almHistoria_clinica->__SET('cliente_eps', $r->cliente_eps);
			$almHistoria_clinica->__SET('nombres', $r->nombres);
			$almHistoria_clinica->__SET('cliente_nacimiento', $r->cliente_nacimiento);
			$almHistoria_clinica->__SET('cliente_sexo', $r->cliente_sexo);
			$almHistoria_clinica->__SET('cliente_ocupacion', $r->cliente_ocupacion);
			$almHistoria_clinica->__SET('cliente_email', $r->cliente_email);
			$almHistoria_clinica->__SET('cliente_escolaridad', $r->cliente_escolaridad);
			$almHistoria_clinica->__SET('cliente_estado_civil', $r->cliente_estado_civil);
			$almHistoria_clinica->__SET('cliente_acompanante', $r->cliente_acompanante);
			$almHistoria_clinica->__SET('cliente_parentezco', $r->cliente_parentezco);
			return $almHistoria_clinica;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>