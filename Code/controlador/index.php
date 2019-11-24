<?php 
    if (!isset($_SESSION)) session_start();

    require_once './modelo/Cliente/Entidad.php';
    require_once './modelo/Cliente/Modelo.php';

    require_once './modelo/Residencia/Entidad.php';
    require_once './modelo/Residencia/Modelo.php';

    require_once './modelo/Historia_clinica/Entidad.php';
    require_once './modelo/Historia_clinica/Modelo.php';

    require_once './modelo/Guayacan/Entidad.php';
    require_once './modelo/Guayacan/Modelo.php';

    require_once './modelo/Motivo/Entidad.php';
    require_once './modelo/Motivo/Modelo.php';

    require_once './modelo/Enfermedad/Entidad.php';
    require_once './modelo/Enfermedad/Modelo.php';

    require_once './modelo/Antecedentes/Entidad.php';
    require_once './modelo/Antecedentes/Modelo.php';

    require_once './modelo/Revision/Entidad.php';
    require_once './modelo/Revision/Modelo.php';

    require_once './modelo/Examen/Entidad.php';
    require_once './modelo/Examen/Modelo.php';

    require_once './modelo/Impresion/Entidad.php';
    require_once './modelo/Impresion/Modelo.php';

    require_once './modelo/Tratamiento/Entidad.php';
    require_once './modelo/Tratamiento/Modelo.php';

    require_once './modelo/Evolucion/Entidad.php';
    require_once './modelo/Evolucion/Modelo.php';

    require_once './modelo/Usuarios/Entidad.php';
    require_once './modelo/Usuarios/Modelo.php';

    $almCliente = new Cliente();
    $modelCliente = new Cliente_Model();

    $almResidencia = new Residencia();
    $modelResidencia = new Residencia_Model();

    $almHistoria_clinica = new Historia_clinica();
    $modelHistoria_clinica = new Historia_clinica_Model();

    $almGuayacan = new Guayacan();
    $modelGuayacan = new Guayacan_Model();

    $almMotivo = new Motivo();
    $modelMotivo = new Motivo_Model();

    $almEnfermedad = new Enfermedad();
    $modelEnfermedad = new Enfermedad_Model();

    $almAntecedentes = new Antecedentes();
    $modelAntecedentes = new Antecedentes_Model();

    $almRevision = new Revision();
    $modelRevision = new Revision_Model();

    $almExamen = new Examen();
    $modelExamen = new Examen_Model();

    $almImpresion = new Impresion();
    $modelImpresion = new Impresion_Model();

    $almTratamiento = new Tratamiento();
    $modelTratamiento = new Tratamiento_Model();

    $almEvolucion = new Evolucion();
    $modelEvolucion = new Evolucion_Model();

    $almUsuarios = new Usuarios();
    $modelUsuarios = new Usuarios_Model();

    if(isset($_REQUEST['action'])){
        switch($_REQUEST['action']){
            case 'login':
                require('views/login.php');
                break;
            case 'logeo'://lo solicita el login
                include 'modelo/checklogin.php';
                break;
            case 'cambiar_clave':
                require('views/Dashboard/Clave/cambiar/index.php');
                break;
            case 'cerrar_sesion':
                require('modelo/Login/logout.php');
                break;
            case 'webmaster':
                require('views/Dashboard/index/index.php');
                break;
            case 'accion_cambiar_clave':
                if (isset($_REQUEST['usuario_id'])) {
                    $almUsuarios->__SET('usuario',$_REQUEST['usuario_id']);
                    $almUsuarios->__SET('clave',$_REQUEST['clave']);
                    if($modelUsuarios->Actualizar($almUsuarios)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Actualizados Existosamente', function(){ window.location='?action=webmaster'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=webmaster'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'cliente':
                require('views/Dashboard/Cliente/index/index.php');
                break;
            case 'cliente_insertar':
                require('views/Dashboard/Cliente/insertar/index.php');
                break;
            case 'formulario_cliente_insertar':
                if (isset($_REQUEST['cliente_id_insertar'])) {
                    $almCliente->__SET('id',$_REQUEST['cliente_id_insertar']);
                    $temp=$modelCliente->Registro($almCliente);
                    if (is_null($temp->id)) {
                        $almCliente->__SET('tipo_doc',$_REQUEST['tipo_doc']);
                        $almCliente->__SET('eps',$_REQUEST['eps']);
                        $almCliente->__SET('sexo',$_REQUEST['sexo']);
                        $almCliente->__SET('nombres',$_REQUEST['nombres']);
                        $almCliente->__SET('apellidos',$_REQUEST['apellidos']);
                        $date = new DateTime($_REQUEST['nacimiento']);
                        $almCliente->__SET('nacimiento',$date->format('Y-m-d'));
                        $almCliente->__SET('email',$_REQUEST['email']);
                        $almCliente->__SET('ocupacion',$_REQUEST['ocupacion']);
                        $almCliente->__SET('escolaridad',$_REQUEST['escolaridad']);
                        $almCliente->__SET('acompanante',$_REQUEST['acompanante']);
                        $almCliente->__SET('parentezco',$_REQUEST['parentezco']);
                        $almCliente->__SET('estado_civil',$_REQUEST['estado_civil']);
                        if($modelCliente->Registrar($almCliente)){
                            echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Insertados Existosamente', function(){ window.location='?action=cliente'; });</script>";
                        }else{
                            echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Insertar Los Datos. Intente Nuevamente', function(){ window.location='?action=cliente'; });</script>";
                        }
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error. Cliente Existente', function(){ window.location='?action=cliente'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'cliente_actualizar':
                require('views/Dashboard/Cliente/actualizar/index.php');
                break;
            case 'formulario_cliente_actualizar':
                if (isset($_REQUEST['cliente_id_actualizar'])) {
                    $almCliente->__SET('codigo',$_REQUEST['codigo']);
                    $almCliente->__SET('id',$_REQUEST['cliente_id_actualizar']);
                    $almCliente->__SET('tipo_doc',$_REQUEST['tipo_doc']);
                    $almCliente->__SET('eps',$_REQUEST['eps']);
                    $almCliente->__SET('sexo',$_REQUEST['sexo']);
                    $almCliente->__SET('nombres',$_REQUEST['nombres']);
                    $almCliente->__SET('apellidos',$_REQUEST['apellidos']);
                    $date = new DateTime($_REQUEST['nacimiento']);
                    $almCliente->__SET('nacimiento',$date->format('Y-m-d'));
                    $almCliente->__SET('email',$_REQUEST['email']);
                    $almCliente->__SET('ocupacion',$_REQUEST['ocupacion']);
                    $almCliente->__SET('escolaridad',$_REQUEST['escolaridad']);
                    $almCliente->__SET('acompanante',$_REQUEST['acompanante']);
                    $almCliente->__SET('parentezco',$_REQUEST['parentezco']);
                    $almCliente->__SET('estado_civil',$_REQUEST['estado_civil']);
                    if($modelCliente->Actualizar($almCliente)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Actualizados Existosamente', function(){ window.location='?action=cliente'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=cliente'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }

                
                break;
            case 'residencia':
                require('views/Dashboard/Residencia/index/index.php');
                break;
            case 'residencia_insertar':
                require('views/Dashboard/Residencia/insertar/index.php');
                break;
            case 'formulario_residencia_insertar':
                if (isset($_REQUEST['cliente_codigo'])) {
                    $almResidencia->__SET('cliente_codigo',$_REQUEST['cliente_codigo']);
                    $temp=$modelResidencia->Registro($almResidencia);
                    if (is_null($temp->id)) {
                         $almResidencia->__SET('ciudad',$_REQUEST['ciudad']);
                         $almResidencia->__SET('direccion',$_REQUEST['direccion']);
                         $almResidencia->__SET('telefono',$_REQUEST['telefono']);
                         $almResidencia->__SET('barrio',$_REQUEST['barrio']);                     
                         if($modelResidencia->Registrar($almResidencia)){
                            echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Insertados Exitosamente', function(){ window.location='?action=residencia'; });</script>";
                        }else{
                            echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=residencia'; });</script>";
                        }
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error. Residencia Existente', function(){ window.location='?action=residencia'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'residencia_actualizar':
                require('views/Dashboard/Residencia/actualizar/index.php');
                break;
            case 'formulario_residencia_actualizar':
                if (isset($_REQUEST['residencia_id_actualizar'])) {
                    $almResidencia->__SET('id',$_REQUEST['id']);
                    $almResidencia->__SET('cliente_codigo',$_REQUEST['cliente_codigo']);
                    $almResidencia->__SET('ciudad',$_REQUEST['ciudad']);
                    $almResidencia->__SET('telefono',$_REQUEST['telefono']);
                    $almResidencia->__SET('direccion',$_REQUEST['direccion']);
                    $almResidencia->__SET('barrio',$_REQUEST['barrio']);
                    if($modelResidencia->Actualizar($almResidencia)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Actualizados Existosamente', function(){ window.location='?action=residencia'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=residencia'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'residencia_eliminar':
                if (isset($_REQUEST['residencia_id_eliminar'])) {
                    $almResidencia->__SET('id',$_REQUEST['residencia_id_eliminar']);
                    if($modelResidencia->Eliminar($almResidencia)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Eliminados Existosamente', function(){ window.location='?action=residencia'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Eliminar Los Datos. Intente Nuevamente', function(){ window.location='?action=residencia'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'historia_clinica':
                require('views/Dashboard/Historia_clinica/index/index.php');
                break;
            case 'historia_clinica_insertar':
                require('views/Dashboard/Historia_clinica/insertar/index.php');
                break;
            case 'formulario_historia_clinica_insertar':
                if (isset($_REQUEST['historia_clinica_insertar_Cliente'])) {
                    $almHistoria_clinica->__SET('cliente_codigo',$_REQUEST['historia_clinica_insertar_Cliente']);
                    $temp=$modelHistoria_clinica->Registro($almHistoria_clinica);
                    if (is_null($temp->id)) {             
                         if($modelHistoria_clinica->Registrar($almHistoria_clinica)){
                            echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Insertados Exitosamente', function(){ window.location='?action=historia_clinica'; });</script>";
                        }else{
                            echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Insertar Los Datos. Intente Nuevamente', function(){ window.location='?action=historia_clinica'; });</script>";
                        }
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Paciente Con Historia Clínica Existente', function(){ window.location='?action=historia_clinica'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'historia_clinica_eliminar':
                if (isset($_REQUEST['historia_clinica_eliminar_Id'])) {
                    $almHistoria_clinica->__SET('id',$_REQUEST['historia_clinica_eliminar_Id']);
                    if($modelHistoria_clinica->Eliminar($almHistoria_clinica)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Eliminados Exitosamente', function(){ window.location='?action=historia_clinica'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Eliminar Los Datos. Intente Nuevamente', function(){ window.location='?action=historia_clinica'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'formulario_Guayacan_insertar':
                require('views/Dashboard/Guayacan/insertar/index.php');
                break;
            case 'guayacan_insertar':
                if (isset($_REQUEST['guayacan_historia_clinica_insertar'])) {
                    $h_clinica=$_REQUEST['guayacan_historia_clinica_insertar'];
                    $cadena='se insertaron: ';
                    if ($_REQUEST['motivo']!='') {
                        $almMotivo->__SET('det',$_REQUEST['motivo']);
                        $almMotivo->__SET('historia_clinica_id',$h_clinica);
                        if($modelMotivo->Registrar($almMotivo)){
                            $cadena=$cadena."Motivo De Consulta,";
                        }
                    }
                    if ($_REQUEST['enfermedad']!='') {
                        $almEnfermedad->__SET('det',$_REQUEST['enfermedad']);
                        $almEnfermedad->__SET('historia_clinica_id',$h_clinica);
                        if($modelEnfermedad->Registrar($almEnfermedad)){
                            $cadena=$cadena."Enfermedad Actual,";
                        }
                    }
                    if ($_REQUEST['antecedentes']!='') {
                        $almAntecedentes->__SET('det',$_REQUEST['antecedentes']);
                        $almAntecedentes->__SET('historia_clinica_id',$h_clinica);
                        if($modelAntecedentes->Registrar($almAntecedentes)){
                            $cadena=$cadena."Antecedentes,";
                        }
                    }
                    if ($_REQUEST['revision']!='') {
                        $almRevision->__SET('det',$_REQUEST['revision']);
                        $almRevision->__SET('historia_clinica_id',$h_clinica);
                        if($modelRevision->Registrar($almRevision)){
                            $cadena=$cadena."Revision Por Sistemas,";
                        }
                    }
                    if ($_REQUEST['examen']!='') {
                        $almExamen->__SET('det',$_REQUEST['examen']);
                        $almExamen->__SET('historia_clinica_id',$h_clinica);
                        if($modelExamen->Registrar($almExamen)){
                            $cadena=$cadena."Examen Fisico,";
                        }
                    }
                    if ($_REQUEST['impresion']!='') {
                        $almImpresion->__SET('det',$_REQUEST['impresion']);
                        $almImpresion->__SET('historia_clinica_id',$h_clinica);
                        if($modelImpresion->Registrar($almImpresion)){
                            $cadena=$cadena."Impresion Diagnostica,";
                        }
                    }
                    if ($_REQUEST['tratamiento']!='') {
                        $almTratamiento->__SET('det',$_REQUEST['tratamiento']);
                        $almTratamiento->__SET('historia_clinica_id',$h_clinica);
                        if($modelTratamiento->Registrar($almTratamiento)){
                            $cadena=$cadena."Tratamiento,";
                        }
                    }
                    if ($_REQUEST['evolucion']!='') {
                        $almEvolucion->__SET('det',$_REQUEST['evolucion']);
                        $almEvolucion->__SET('historia_clinica_id',$h_clinica);
                        if($modelEvolucion->Registrar($almEvolucion)){
                            $cadena=$cadena."Evolucion";
                        }
                    }
                    echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'se insertaron $cadena', function(){ window.location='?action=historia_clinica'; });</script>";
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'motivo_index':
                require('views/Dashboard/Motivo/index/index.php');
                break;
            case 'motivo':
                require('views/Dashboard/Motivo/motivo/index.php');
                break;
            case 'motivo_eliminar':
                if (isset($_REQUEST['accion_eliminar_motivo'])) {
                    $almMotivo->__SET('id',$_REQUEST['accion_eliminar_motivo']);
                    if($modelMotivo->Eliminar($almMotivo)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Eliminados Existosamente', function(){ window.location='?action=motivo_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Eliminar Los Datos. Intente Nuevamente', function(){ window.location='?action=motivo_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'motivo_actualizar':
                require('views/Dashboard/Motivo/actualizar/index.php');
                break;
            case 'formulario_motivo_actualizar':
                if (isset($_REQUEST['motivo_id'])) {
                    $almMotivo->__SET('id',$_REQUEST['motivo_id']);
                    $almMotivo->__SET('det',$_REQUEST['motivo_det']);
                    if($modelMotivo->Actualizar($almMotivo)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Actualizados Existosamente', function(){ window.location='?action=motivo_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=motivo_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }                
                break;
            case 'enfermedad_index':
                require('views/Dashboard/Enfermedad/index/index.php');
                break;
            case 'enfermedad':
                require('views/Dashboard/Enfermedad/enfermedad/index.php');
                break;
            case 'enfermedad_eliminar':
                if (isset($_REQUEST['accion_eliminar_enfermedad'])) {
                    $almEnfermedad->__SET('id',$_REQUEST['accion_eliminar_enfermedad']);
                    if($modelEnfermedad->Eliminar($almEnfermedad)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Eliminados Existosamente', function(){ window.location='?action=enfermedad_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Eliminar Los Datos. Intente Nuevamente', function(){ window.location='?action=enfermedad_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'enfermedad_actualizar':
                require('views/Dashboard/Enfermedad/actualizar/index.php');
                break;
            case 'formulario_enfermedad_actualizar':
                if (isset($_REQUEST['enfermedad_id'])) {
                    $almEnfermedad->__SET('id',$_REQUEST['enfermedad_id']);
                    $almEnfermedad->__SET('det',$_REQUEST['enfermedad_det']);
                    if($modelEnfermedad->Actualizar($almEnfermedad)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Actualizados Existosamente', function(){ window.location='?action=enfermedad_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=enfermedad_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'antecedentes_index':
                require('views/Dashboard/Antecedentes/index/index.php');
                break;
            case 'antecedentes':
                require('views/Dashboard/Antecedentes/antecedentes/index.php');
                break;
            case 'antecedentes_eliminar':
                if (isset($_REQUEST['accion_eliminar_antecedente'])) {
                    $almAntecedentes->__SET('id',$_REQUEST['accion_eliminar_antecedente']);
                    if($modelAntecedentes->Eliminar($almAntecedentes)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Eliminados Existosamente', function(){ window.location='?action=antecedentes_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Eliminar Los Datos. Intente Nuevamente', function(){ window.location='?action=antecedentes_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'antecedentes_actualizar':
                require('views/Dashboard/Antecedentes/actualizar/index.php');
                break;
            case 'formulario_antecedentes_actualizar':
                if (isset($_REQUEST['enfermedad_id'])) {
                    $almAntecedentes->__SET('id',$_REQUEST['enfermedad_id']);
                    $almAntecedentes->__SET('det',$_REQUEST['enfermedad_det']);
                    if($modelAntecedentes->Actualizar($almAntecedentes)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Actualizados Existosamente', function(){ window.location='?action=antecedentes_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=antecedentes_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'revision_index':
                require('views/Dashboard/Revision/index/index.php');
                break;
            case 'revision':
                require('views/Dashboard/Revision/revision/index.php');
                break;
            case 'revision_eliminar':
                if (isset($_REQUEST['accion_eliminar_revision'])) {
                    $almRevision->__SET('id',$_REQUEST['accion_eliminar_revision']);
                    if($modelRevision->Eliminar($almRevision)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Eliminados Existosamente', function(){ window.location='?action=revision_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Eliminar Los Datos. Intente Nuevamente', function(){ window.location='?action=revision_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'revision_actualizar':
                require('views/Dashboard/Revision/actualizar/index.php');
                break;
            case 'formulario_revision_actualizar':
                if (isset($_REQUEST['enfermedad_id'])) {
                    $almRevision->__SET('id',$_REQUEST['enfermedad_id']);
                    $almRevision->__SET('det',$_REQUEST['enfermedad_det']);
                    if($modelRevision->Actualizar($almRevision)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Actualizados Existosamente', function(){ window.location='?action=revision_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=revision_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'examen_index':
                require('views/Dashboard/Examen/index/index.php');
                break;
            case 'examen':
                require('views/Dashboard/Examen/examen/index.php');
                break;
            case 'examen_eliminar':
                if (isset($_REQUEST['accion_eliminar_examen'])) {
                    $almExamen->__SET('id',$_REQUEST['accion_eliminar_examen']);
                    if($modelExamen->Eliminar($almExamen)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Eliminados Existosamente', function(){ window.location='?action=examen_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Eliminar Los Datos. Intente Nuevamente', function(){ window.location='?action=examen_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'examen_actualizar':
                require('views/Dashboard/Examen/actualizar/index.php');
                break;
            case 'formulario_examen_actualizar':
                if (isset($_REQUEST['enfermedad_id'])) {
                    $almExamen->__SET('id',$_REQUEST['enfermedad_id']);
                    $almExamen->__SET('det',$_REQUEST['enfermedad_det']);
                    if($modelExamen->Actualizar($almExamen)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Actualizados Existosamente', function(){ window.location='?action=examen_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=examen_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'evolucion_index':
                require('views/Dashboard/Evolucion/index/index.php');
                break;
            case 'evolucion':
                require('views/Dashboard/Evolucion/evolucion/index.php');
                break;
            case 'evolucion_eliminar':
                if (isset($_REQUEST['accion_eliminar_evolucion'])) {
                    $almEvolucion->__SET('id',$_REQUEST['accion_eliminar_evolucion']);
                    if($modelEvolucion->Eliminar($almEvolucion)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Eliminados Existosamente', function(){ window.location='?action=evolucion_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Eliminar Los Datos. Intente Nuevamente', function(){ window.location='?action=evolucion_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }                
                break;
            case 'evolucion_actualizar':
                require('views/Dashboard/Evolucion/actualizar/index.php');
                break;
            case 'formulario_evolucion_actualizar':
                if (isset($_REQUEST['enfermedad_id'])) {
                    $almEvolucion->__SET('id',$_REQUEST['enfermedad_id']);
                    $almEvolucion->__SET('det',$_REQUEST['enfermedad_det']);
                    if($modelEvolucion->Actualizar($almEvolucion)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Actualizados Existosamente', function(){ window.location='?action=evolucion_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=evolucion_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'tratamiento_index':
                require('views/Dashboard/Tratamiento/index/index.php');
                break;
            case 'tratamiento':
                require('views/Dashboard/Tratamiento/tratamiento/index.php');
                break;
            case 'tratamiento_eliminar':
                if (isset($_REQUEST['accion_eliminar_tratamiento'])) {
                    $almTratamiento->__SET('id',$_REQUEST['accion_eliminar_tratamiento']);
                    if($modelTratamiento->Eliminar($almTratamiento)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Eliminados Existosamente', function(){ window.location='?action=tratamiento_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Eliminar Los Datos. Intente Nuevamente', function(){ window.location='?action=tratamiento_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'tratamiento_actualizar':
                require('views/Dashboard/Tratamiento/actualizar/index.php');
                break;
            case 'formulario_tratamiento_actualizar':
                if (isset($_REQUEST['enfermedad_id'])) {
                    $almTratamiento->__SET('id',$_REQUEST['enfermedad_id']);
                    $almTratamiento->__SET('det',$_REQUEST['enfermedad_det']);
                    if($modelTratamiento->Actualizar($almTratamiento)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Actualizados Existosamente', function(){ window.location='?action=tratamiento_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=tratamiento_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'impresion_index':
                require('views/Dashboard/Impresion/index/index.php');
                break;
            case 'impresion':
                require('views/Dashboard/Impresion/impresion/index.php');
                break;
            case 'impresion_eliminar':
                if (isset($_REQUEST['accion_eliminar_impresion'])) {
                    $almImpresion->__SET('id',$_REQUEST['accion_eliminar_impresion']);
                    if($modelImpresion->Eliminar($almImpresion)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Eliminados Existosamente', function(){ window.location='?action=impresion_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Eliminar Los Datos. Intente Nuevamente', function(){ window.location='?action=impresion_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'impresion_actualizar':
                require('views/Dashboard/Impresion/actualizar/index.php');
                break;
            case 'formulario_impresion_actualizar':
                if (isset($_REQUEST['enfermedad_id'])) {
                    $almImpresion->__SET('id',$_REQUEST['enfermedad_id']);
                    $almImpresion->__SET('det',$_REQUEST['enfermedad_det']);
                    if($modelImpresion->Actualizar($almImpresion)){
                        echo"<script type=\"text/javascript\">alertify.alert('MENSAJE', 'Datos Actualizados Existosamente', function(){ window.location='?action=impresion_index'; });</script>";
                    }else{
                        echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'Error Al Actualizar Los Datos. Intente Nuevamente', function(){ window.location='?action=impresion_index'; });</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alertify.alert('ERROR', 'ACCESO NO AUTORIZADO', function(){ window.location='?action=webmaster'; });</script>";
                }
                break;
            case 'reporte_index':
                require('views/Dashboard/Reporte/index/index.php');
                break;
            case 'reporte':
                require('views/Dashboard/Reporte/reporte/index.php');
                break;




            case '404':
               include 'views/404.php';
                break;
                    
            default:
                header('Location: ?action=404');
        }
    }else{
        header('Location: ?action=login');
        exit;
    }           
?>