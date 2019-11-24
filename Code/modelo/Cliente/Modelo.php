<?php
if (!isset($_SESSION)) session_start();
include_once("./modelo/conexion.php");
class Cliente_Model{
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
											  cliente.codigo,
											  cliente.id,
											  cliente.eps,
											  cliente.nombres,
											  cliente.apellidos,
											  cliente.sexo
											FROM
											  cliente");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almCliente = new Cliente();
				$almCliente->__SET('codigo', $r->codigo);
				$almCliente->__SET('id', $r->id);
				$almCliente->__SET('eps', $r->eps);
				$almCliente->__SET('nombres', $r->nombres);
				$almCliente->__SET('apellidos', $r->apellidos);
				$almCliente->__SET('sexo', $r->sexo);
				$result[] = $almCliente;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Actualizar(Cliente $data){
		try {
			$sql = "UPDATE
					  cliente
					SET
					  id = ?,
					  tipo_doc = ?,
					  eps = ?,
					  nombres = ?,
					  apellidos = ?,
					  nacimiento = ?,
					  sexo = ?,
					  ocupacion = ?,
					  email = ?,
					  escolaridad = ?,
					  estado_civil = ?,
					  acompanante = ?,
					  parentezco = ?
					WHERE
					  cliente.codigo = ?";
			$this->conexion->prepare($sql)->execute(
				array(
					$data->__GET('id'),
					$data->__GET('tipo_doc'),
					$data->__GET('eps'),
					$data->__GET('nombres'),
					$data->__GET('apellidos'),
					$data->__GET('nacimiento'),
					$data->__GET('sexo'),
					$data->__GET('ocupacion'),
					$data->__GET('email'),
					$data->__GET('escolaridad'),
					$data->__GET('estado_civil'),
					$data->__GET('acompanante'),
					$data->__GET('parentezco'),
					$data->__GET('codigo')
				)
			);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function Registro(Cliente $data){/*funcion que verifica si existe un registro o no*/
		try {
			$stm = $this->conexion->prepare("SELECT 
											  cliente.id
											FROM
											  cliente
											WHERE
											  cliente.id = ?");
			$stm->execute(array($data->__GET('id')));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almCliente = new Cliente();
			if (empty($r)) {
				$almCliente->__SET('id', NULL);
			}else{
				$almCliente->__SET('id', $r->id);
			}
			return $almCliente;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function llenar(Cliente $data){/*funcion que verifica si existe un registro o no*/
		try {
			$stm = $this->conexion->prepare("SELECT 
											  cliente.id,
											  cliente.tipo_doc,
											  cliente.eps,
											  cliente.nombres,
											  cliente.apellidos,
											  cliente.nacimiento,
											  cliente.sexo,
											  cliente.ocupacion,
											  cliente.email,
											  cliente.escolaridad,
											  cliente.estado_civil,
											  cliente.acompanante,
											  cliente.parentezco
											FROM
											  cliente
											WHERE
											  cliente.codigo = ?");
			$stm->execute(array($data->__GET('codigo')));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almCliente = new Cliente();
			$almCliente->__SET('id', $r->id);
			$almCliente->__SET('tipo_doc', $r->tipo_doc);
			$almCliente->__SET('eps', $r->eps);
			$almCliente->__SET('nombres', $r->nombres);
			$almCliente->__SET('apellidos', $r->apellidos);
			$almCliente->__SET('nacimiento', $r->nacimiento);
			$almCliente->__SET('sexo', $r->sexo);
			$almCliente->__SET('ocupacion', $r->ocupacion);
			$almCliente->__SET('email', $r->email);
			$almCliente->__SET('escolaridad', $r->escolaridad);
			$almCliente->__SET('estado_civil', $r->estado_civil);
			$almCliente->__SET('acompanante', $r->acompanante);
			$almCliente->__SET('parentezco', $r->parentezco);
			return $almCliente;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data){
		try {
		$sql = "INSERT INTO
				  cliente(
				  id,
				  tipo_doc,
				  eps,
				  nombres,
				  apellidos,
				  nacimiento,
				  sexo,
				  ocupacion,
				  email,
				  escolaridad,
				  estado_civil,
				  acompanante,
				  parentezco)
				VALUES(
				  ?,
				  ?,
				  ?,
				  ?,
				  ?,
				  ?,
				  ?,
				  ?,
				  ?,
				  ?,
				  ?,
				  ?,
				  ?)";
		$this->conexion->prepare($sql)->execute(
			array(
				$data->__GET('id'),
				$data->__GET('tipo_doc'),
				$data->__GET('eps'),
				$data->__GET('nombres'),
				$data->__GET('apellidos'),
				$data->__GET('nacimiento'),
				$data->__GET('sexo'),
				$data->__GET('ocupacion'),
				$data->__GET('email'),
				$data->__GET('escolaridad'),
				$data->__GET('estado_civil'),
				$data->__GET('acompanante'),
				$data->__GET('parentezco')
				)
			);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
}
?>