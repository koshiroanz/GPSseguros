<?php
    include_once('Visual/Controladores/ControladoraV.php');
    $controladoraV = new ControladoraV();
    $var = false;

    session_start();

    if(isset($_POST['usuario']) && isset($_POST['pass'])){
        $usuario = $controladoraV->login($_POST['usuario'],$_POST['pass']);
        if (empty($usuario)) {
            $controladoraV->armarVentana('Sesion', null,12);
        }else{
            $_SESSION['privilegio'] = $usuario[7];
            $_SESSION['id'] = $usuario[0];
            $controladoraV->armarVentana('Inicio', null,0);
        }
    }else if(!empty($_SESSION)){
        if(isset($_GET['action'])){
/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            INICIO
-----------------------------------------------------------------------------------------------------------------------------------------------*/
            if($_GET['action'] == 'inicio'){
                if(isset($_POST['btnBuscarInicio'])){
                    $controladoraV->armarVentana($_POST['filtro'], $_POST['valor'], 0);
                }else if(isset($_POST['ver'])){
                    $controladoraV->armarVentana('Inicio', $_POST['ver'], 0);
                }else{
                    $controladoraV->armarVentana('Inicio', null, 0);
                }
            }
/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            CLIENTE
-----------------------------------------------------------------------------------------------------------------------------------------------*/
            if($_GET['action'] == 'clientes'){

                if(isset($_GET['existeDni'])){  // Está seteado la variable existeDni?

                    if(!empty($_GET['existeDni'])){ // Si no está vacío la variable dni..
                        $respuesta = $controladoraV->obtenerIdCliente($_GET['existeDni']);
                    }
                    
                    if($respuesta){
                        print_r(json_encode($respuesta));
                    }else{
                        print_r(json_encode(false));
                    }
                    

                }else if(isset($_POST['btnAltaCliente'])){
                    if($controladoraV->altaCliente($_POST['dni'], $_POST['apellido'], $_POST['nombre'], $_POST['fechaNac'], $_POST['direccion'], $_POST['ciudad'], $_POST['provincia'], $_POST['cuit'], $_POST['telefono'], $_POST['fechaBaja'], $_POST['estadoCivil'], $_POST['productor'])){
                        if($_POST['pasoSig'] == 'VEHICULO'){
                            $_POST['action'] = 'vehiculos';
                            $_POST['cliente'] = $controladoraV->obtenerIdCliente($_POST['dni']);
                            $controladoraV->armarVentana('Vehiculos', null, 2);
                        }else if($_POST['pasoSig'] == 'BENEFICIARIO'){
                            $_POST['action'] = 'beneficiario';
                            $controladoraV->armarVentana('Beneficiario', null, 3);
                        }
                    }else{
                        // Algún error de ALTA
                    }

                }else if(isset($_POST['btnModificarCliente'])){
                    $var = $controladoraV->modificarCliente($_POST['btnModificarCliente'],$_POST['dni'], $_POST['apellido'], $_POST['nombre'], $_POST['fechaNac'], $_POST['direccion'], $_POST['ciudad'], $_POST['provincia'], $_POST['cuit'], $_POST['telefono'], $_POST['fechaBaja'], $_POST['estadoCivil'], $_POST['productor']);
                }else if(isset($_POST['btnEliminarCliente'])){
                    $var = $controladoraV->bajaDe('Cliente','id',$_POST['btnEliminarCliente']);
                    if(!$var){
                        // Algún error de BAJA
                    }
                }else if(isset($_POST['btnCancelar'])){
                    $controladoraV->armarVentana('Clientes',null,1);
                }else if(isset($_POST['btnSalir'])){
                    $controladoraV->armarVentana('Inicio', null, 0);
                }else{
                    $controladoraV->armarVentana('Cliente', null,1);
                }

                if($var){
                    if(isset($_POST['poliza'])){
                        unset($_POST['poliza']);
                    }

                    $controladoraV->armarVentana('Cliente', null,1);
                    $var = false;
                }
            }else if($_GET['action'] == 'buscar_cliente'){
                $controladoraV->armarVentana('Cargar Tabla Cliente', $_POST['buscar_cliente'], 1);
            }else if($_GET['action'] == 'editar_cliente'){ // Incluye/Requiere la ventana con el Formulario del cliente cargado.
                $controladoraV->armarVentana('Editar Cliente', $_POST['editar_cliente'], 1);
            }

/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            VEHICULO
-----------------------------------------------------------------------------------------------------------------------------------------------*/
            if($_GET['action'] == 'vehiculos'){
                if(isset($_GET['marca'])){
                    $modelos = $controladoraV->obtenerModelosMarca($_GET['marca']);
                    print_r(json_encode($modelos));     
                }else if(isset($_GET['modelo'])){
                    $carroceria = $controladoraV->obtenerCarroceriaModelos($_GET['modelo']);
                    echo json_encode($carroceria);          
                }else if(isset($_POST['btnAltaVehiculo'])){
                    $res = $controladoraV->altaVehiculo($_POST['dominio'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['chasis'], $_POST['motor'], $_POST['valor'], $_POST['cliente'], $_POST['carroceria']); // PARA MANEJAR ARCHIVOS => $_FILES['archivo']['name']
                    if($res){
                        $_POST['vehiculo'] = $controladoraV->obtenerIdVehiculo($_POST['dominio']);
                        $controladoraV->armarVentana('Polizas',null,4);
                    }else{
                        // MENSAJE DE ERROR DE ALTA VEHICULO;
                    }
                }else if(isset($_POST['btnModificarVehiculo'])){
                    $var = $controladoraV->modificarVehiculo($_POST['btnModificarVehiculo'], $_POST['dominio'], $_POST['marca'], $_POST['modelo'], $_POST['anio'], $_POST['chasis'], $_POST['motor'], $_POST['valor'], $_POST['cliente'], $_POST['carroceria']);
                }else if(isset($_POST['btnEliminarVehiculo'])){
                    $var = $controladoraV->bajaDe('Vehiculo','id',$_POST['btnEliminarVehiculo']);
                }else if(isset($_POST['btnCancelar'])){
                    $controladoraV->armarVentana('Vehiculos',null,2);
                }else if(isset($_POST['btnSalir'])){
                    $controladoraV->armarVentana('Inicio', null, 0);
                }else{
                    $controladoraV->armarVentana('Vehiculos',null,2);
                }

                if($var){
                    if(isset($_POST['poliza'])){
                        unset($_POST['poliza']);
                    }

                    $controladoraV->armarVentana('Vehiculos',null,2);
                    $var = false;
                }

            }else if($_GET['action'] == 'buscar_vehiculo'){
                if($_POST['buscar_vehiculo'] == ''){
                    $controladoraV->armarVentana('Vehiculos',null,2);
                }else{
                    $controladoraV->armarVentana('Cargar Tabla Vehiculo', $_POST['buscar_vehiculo'], 2);
                }

            }else if($_GET['action'] == 'accion_vehiculo'){
                $controladoraV->armarVentana('Accion Vehiculo', $_POST['buscar_vehiculo'], 2);
            }

/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            POLIZA
-----------------------------------------------------------------------------------------------------------------------------------------------*/
            if($_GET['action'] == 'polizas'){
                if(isset($_GET['compSeguro'])){
                    $cobertura = $controladoraV->obtenerCoberturaCompania($_GET['compSeguro']);
                    echo json_encode($cobertura);
                }else if(isset($_POST['btnAltaPoliza'])){
                    if($controladoraV->altaPoliza($_POST['numPoliza'], $_POST['vigenciaPedida'], $_POST['vigenciaPedidaHasta'], $_POST['vigenciaPoliza'], $_POST['vigenciaPolizaHasta'], $_POST['costoPoliza'], $_POST['observaciones'], $_POST['endoso'], $_POST['estado'], $_POST['sumaAsegurada'], $_POST['numeroPolizaVida'], $_POST['costoVida'], $_POST['destino'], $_POST['vehiculo'], $_POST['categoria'], $_POST['cobertura'], $_POST['compSeguro'])){
                        $_POST['poliza'] = $controladoraV->obtenerPolizaDominio($_POST['vehiculo']);
                        $controladoraV->armarVentana('Pagos',null,5);
                    }
                }else if(isset($_POST['btnModificarPoliza'])){
                    $var = $controladoraV->modificarPoliza($_POST['btnModificarPoliza'], $_POST['numPoliza'], $_POST['vigenciaPedida'], $_POST['vigenciaPedidaHasta'], $_POST['vigenciaPoliza'], $_POST['vigenciaPolizaHasta'], $_POST['costoPoliza'], $_POST['observaciones'], $_POST['endoso'], $_POST['estado'], $_POST['sumaAsegurada'], $_POST['numeroPolizaVida'], $_POST['costoVida'], $_POST['destino'], $_POST['vehiculo'], $_POST['categoria'], $_POST['cobertura'], $_POST['compSeguro']);
                }else if(isset($_POST['btnEliminarPoliza'])){
                    $var = $controladoraV->bajaPoliza($_POST['btnEliminarPoliza']);
                }else if(isset($_POST['btnCancelar'])){
                    $controladoraV->armarVentana('Polizas',null,4);
                }else if(isset($_POST['btnSalir'])){
                    $controladoraV->armarVentana('Inicio', null, 0);
                }else{
                    $controladoraV->armarVentana('Polizas',null,4);
                }

                if($var){
                    if(isset($_POST['poliza'])){
                        unset($_POST['poliza']);
                    }

                    $controladoraV->armarVentana('Polizas',null,4);
                    $var = false;
                }
            }else if($_GET['action'] == 'buscar_poliza'){
                if(isset($_POST['buscar_poliza'])){
                    $controladoraV->armarVentana('Cargar Tabla Poliza', $_POST['buscar_poliza'], 4);
                }else{
                    $controladoraV->armarVentana('Poliza',null,4);
                }
            }else if($_GET['action'] == 'accion_poliza'){
                $controladoraV->armarVentana('Accion Poliza', $_POST['buscar_poliza'], 4);
            }
/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            PAGO
-----------------------------------------------------------------------------------------------------------------------------------------------*/
            if($_GET['action'] == 'pagos'){
                if(isset($_POST['btnAltaPago'])){
                    $var = $controladoraV->altaPago($_POST['numRecibo'],$_POST['fecha'],$_POST['importe'],$_POST['numCuota'],$_POST['importeGrua'],$_POST['reciboGrua'],$_POST['observaciones'],$_POST['poliza']);
                }else if(isset($_POST['btnModificarPago'])){
                    $var = $controladoraV->modificarPago($_POST['btnModificarPago'],$_POST['numRecibo'],$_POST['fecha'],$_POST['importe'],$_POST['numCuota'],$_POST['importeGrua'],$_POST['reciboGrua'],$_POST['observaciones'],$_POST['poliza']);
                }else if(isset($_POST['btnEliminarPago'])){
                    $var = $controladoraV->bajaPago($_POST['btnEliminarPago']);
                }else if(isset($_POST['btnCancelar'])){
                    $controladoraV->armarVentana('Pagos',null,5);
                }else if(isset($_POST['btnSalir'])){
                    $controladoraV->armarVentana('Inicio', null, 0);
                }else{
                    if(isset($_POST['cargarPago'])){
                        $a = $controladoraV->obtenerPolizaDominio($_POST['cargarPago']);
                        $_POST['poliza'] = $controladoraV->obtenerPolizaDominio($_POST['cargarPago']);
                    }
                    $controladoraV->armarVentana('Pagos',null,5);
                }

                if($var){
                    if(isset($_POST['poliza'])){
                        unset($_POST['poliza']);
                    }
                    
                    $controladoraV->armarVentana('Pagos',null,5);
                    $var = false;
                }

            }else if($_GET['action'] == 'buscar_pago'){
                if($_POST['buscar_pago'] == ''){
                    $controladoraV->armarVentana('Pago',null,5);
                }else{
                    $controladoraV->armarVentana('Cargar Tabla Pago', $_POST['buscar_pago'], 5);
                }
                
            }else if($_GET['action'] == 'accion_pago'){
                $controladoraV->armarVentana('Accion Pago', $_POST['buscar_pago'], 5);
            }

/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            SINIESTRO
-----------------------------------------------------------------------------------------------------------------------------------------------*/
            if($_GET['action'] == 'siniestros'){
                if(isset($_POST['btnAltaSiniestro'])){
                    $var = $controladoraV->altaSiniestro($_POST['numPoliza'],$_POST['apellido'],$_POST['nombre'],$_POST['dominio'],$_POST['conductor'],$_POST['terceroUno'],$_POST['dominioUno'],$_POST['conductorUno'],$_POST['terceroDos'],$_POST['dominioDos'], $_POST['conductorDos'],$_POST['fechaSiniestro'],$_POST['fechaDenunciaInterna'],$_POST['exposicionPolicial'],$_POST['fotocopiaDni'],$_POST['fotocopiaCV'],$_POST['fotocopiaCC'],$_POST['fotocopiaVTV'],$_POST['fotosAsegurado'],$_POST['otros'],$_POST['fechaReclamoTercero'],$_POST['exposicionPolicialTercero'],$_POST['fotocopiaCVTercero'],$_POST['boletoCompra'],$_POST['fotocopiaCCTercero'],$_POST['certificadoCobertura'],$_POST['denunciaAdministrativa'],$_POST['fotosCantTercero'], $_POST['presupuesto'],$_POST['presupuestoDos'],$_POST['totalPresupuesto'],$_POST['gastosMedicos'],$_POST['informeMedico'],$_POST['fechaEnvioDI'],$_POST['fechaEnvioRT'],$_POST['fechaDictamen'],$_POST['dictamen'],$_POST['ofrecimiento'],$_POST['reclamoVence']);
                }else if(isset($_POST['btnModificarSiniestro'])){
                    $var = $controladoraV->modificarSiniestro($_POST['btnModificarSiniestro'],$_POST['numPoliza'],$_POST['apellido'],$_POST['nombre'],$_POST['dominio'],$_POST['conductor'],$_POST['terceroUno'],$_POST['dominioUno'],$_POST['conductorUno'],$_POST['terceroDos'],$_POST['dominioDos'], $_POST['conductorDos'],$_POST['fechaSiniestro'],$_POST['fechaDenunciaInterna'],$_POST['exposicionPolicial'],$_POST['fotocopiaDni'],$_POST['fotocopiaCV'],$_POST['fotocopiaCC'],$_POST['fotocopiaVTV'],$_POST['fotosAsegurado'],$_POST['otros'],$_POST['fechaReclamoTercero'],$_POST['exposicionPolicialTercero'],$_POST['fotocopiaCVTercero'],$_POST['boletoCompra'],$_POST['fotocopiaCCTercero'],$_POST['certificadoCobertura'],$_POST['denunciaAdministrativa'],$_POST['fotosCantTercero'], $_POST['presupuesto'],$_POST['presupuestoDos'],$_POST['totalPresupuesto'],$_POST['gastosMedicos'],$_POST['informeMedico'],$_POST['fechaEnvioDI'],$_POST['fechaEnvioRT'],$_POST['fechaDictamen'],$_POST['dictamen'],$_POST['ofrecimiento'],$_POST['reclamoVence']);
                }else if(isset($_POST['btnEliminarSiniestro'])){
                    $var = $controladoraV->bajaSiniestro($_POST['btnEliminarSiniestro']);
                }else if(isset($_POST['btnCargar'])){
                    $controladoraV->armarVentana('dominio',$_POST['btnCargar'],6);
                }else if(isset($_POST['btnCancelar'])){
                    $controladoraV->armarVentana('Siniestro',null,6);
                }else if(isset($_POST['btnSalir'])){
                    $controladoraV->armarVentana('Inicio', null, 0);
                }else{
                    $controladoraV->armarVentana('Siniestro',null,6);
                }

                if($var){
                    if(isset($_POST['poliza'])){
                        unset($_POST['poliza']);
                    }
                    
                    $controladoraV->armarVentana('Siniestro',null,6);
                    $var = false;
                }

            }else if($_GET['action'] == 'buscar_siniestro'){
                if($_POST['buscar_siniestro'] == ''){            //Si es vacío se recarga la página con todos los resultados en la tabla.
                    $controladoraV->armarVentana('Siniestro',null,6);
                }else{
                    $controladoraV->armarVentana($_POST['filtro'], $_POST['buscar_siniestro'], 6);
                }
            }

/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            IMPRESION CERTIFICADO
-----------------------------------------------------------------------------------------------------------------------------------------------*/
            if($_GET['action'] == 'impresion_certificado'){
                if(isset($_POST['buscarDominioI'])){
                    $controladoraV->armarVentana('Impresion Certificado', $_POST['buscarDominioI'], 7);
                }else if(isset($_POST['btnVer'])){
                    $controladoraV->armarVentana('Impresion Certificado', $_POST['btnVer'], 7);
                }else if(isset($_POST['btnDescargar'])){
                    $controladoraV->armarVentana('Impresion Certificado', $_POST['btnDescargar'], 7);
                }else{
                    $controladoraV->armarVentana('Impresion Certificado', null, 7);
                }
            }

/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            IMPRESION CARNET
-----------------------------------------------------------------------------------------------------------------------------------------------*/
            if($_GET['action'] == 'impresion_carnet'){
                if(isset($_POST['buscarDominioI'])){
                    $controladoraV->armarVentana('Impresion Carnet', $_POST['buscarDominioI'], 8);
                }else if(isset($_POST['btnVer'])){
                    $controladoraV->armarVentana('Impresion Carnet', $_POST['btnVer'], 8);
                }else if(isset($_POST['btnDescargar'])){
                    $controladoraV->armarVentana('Impresion Carnet', $_POST['btnDescargar'], 8);
                }else{
                    $controladoraV->armarVentana('Impresion Carnet', null, 8);
                }
            }

/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            PEDIDOS
-----------------------------------------------------------------------------------------------------------------------------------------------*/
            if($_GET['action'] == 'pedidos'){
                if(isset($_POST['btnBuscarPedido'])){
                    $controladoraV->armarVentana($_POST['filtro'], $_POST['valor'], 9);
                }else{
                    $controladoraV->armarVentana('Pedidos', null, 9);
                }
            }

/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            PRODUCTOR
-----------------------------------------------------------------------------------------------------------------------------------------------*/
            if($_GET['action'] == 'productores'){
                if(isset($_POST['btnAltaProductor'])){
                    $existeProductor = $controladoraV->obtenerDe('Productor','dni',$_POST['dni']);
                    if(!$existeProductor){
                        $var = $controladoraV->altaProductor($_POST['dni'], $_POST['apellido'], $_POST['nombre'], $_POST['direccion'],$_POST['telefono'],$_POST['privilegio']);
                    }else{
                        $var = true;
                    }
                }else if(isset($_POST['btnModificarProductor'])){
                    $var = $controladoraV->modificarProductor($_POST['btnModificarProductor'], $_POST['dni'], $_POST['apellido'], $_POST['nombre'], $_POST['direccion'],$_POST['telefono'],$_POST['privilegio']);
                }else if(isset($_POST['btnEliminarProductor'])){
                    $var = $controladoraV->bajaProductor($_POST['btnEliminarProductor']);
                }else if(isset($_POST['btnCancelar'])){
                    $controladoraV->armarVentana('Productor',null,10);
                }else if(isset($_POST['btnSalir'])){
                    $controladoraV->armarVentana('Inicio', null, 0);
                }else{
                    $controladoraV->armarVentana('Productor',null,10);
                }

                if($var){
                    $controladoraV->armarVentana('Productor',null,10);
                    $var = false;
                }

            }else if($_GET['action'] == 'buscar_productor'){
                $controladoraV->armarVentana('Cargar Tabla Productor', $_POST['buscar_productor'], 10);
            }else if($_GET['action'] == 'accion_productor'){
                $controladoraV->armarVentana('Accion Productor', $_POST['buscar_productor'], 10);
            }

/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            OTROS
-----------------------------------------------------------------------------------------------------------------------------------------------*/
            if($_GET['action'] == 'otros'){
                if(isset($_POST['btnAltaCompSeguro'])){
                    $var = $controladoraV->altaCompSeguro($_POST['nombre']);
                }else if(isset($_POST['btnAltaCategoria'])){
                    $var = $controladoraV->altaCategoria($_POST['nombre']);
                }else if(isset($_POST['btnAltaCobertura'])){
                    $var = $controladoraV->altaCobertura($_POST['nombre'],$_POST['compania']);
                }else if(isset($_POST['btnAltaMarca'])){
                    $var = $controladoraV->altaMarca($_POST['nombre']);
                }else if(isset($_POST['btnAltaCarroceria'])){
                    $var = $controladoraV->altaCarroceria($_POST['nombre']);
                }else if(isset($_POST['btnAltaModelo'])){
                    $var = $controladoraV->altaModelo($_POST['nombre'],$_POST['marca'],$_POST['carroceria']);
                }else{
                    $controladoraV->armarVentana('Otros', null, 11);
                }

                if($var){
                    $controladoraV->armarVentana('Otros', null, 11);
                    $var = false;
                }
            }else if($_GET['action'] == 'notificaciones'){
                if(isset($_GET['cant'])){
                    $cantidadActual = $controladoraV->notificaciones($_GET['cant']);
                    print_r(json_decode($cantidadActual));
                }else{
                    echo "No existe cant en action notificaciones";
                }
                    
            }

            if(isset($_POST['btnSalir'])){
                $controladoraV->armarVentana('Inicio', null, 0);
            }

/*---------------------------------------------------------------------------------------------------------------------------------------------
                                                            SALIR
-----------------------------------------------------------------------------------------------------------------------------------------------*/

            if ($_GET['action'] == 'salir') {
                session_destroy();
                $controladoraV->armarVentana('Sesion', null,12);
            }

            if($_GET['action'] == 'menu'){
                print_r(json_decode($_SESSION['privilegio']));
            }       

/*---------------------------------------------------------------------------------------------------------------------------------------------*/

        }else{
            $controladoraV->armarVentana('Inicio', null, 0);
        }
    }else{
        $controladoraV->armarVentana('Sesion', null,12);
    }

?>