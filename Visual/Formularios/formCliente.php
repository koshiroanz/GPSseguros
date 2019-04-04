<div class="formulario">
    <?php
        if($_SESSION['privilegio'] == 1){
            $modificar = 'disabled';
            $eliminar = 'disabled';
        }else if($_SESSION['privilegio'] == 2){
            $modificar = '';
            $eliminar = 'disabled';
        }else{
            $modificar = '';
            $eliminar = '';
        }

        if((!$hayBusqueda)||(empty($arrayTabla))){ //Si no encuentra el cliente buscado, mostrar mensaje.
    ?>
            <div class="alert alert-danger mensaje" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>No se ha encontrado ningún registro de Cliente.
            </div>
    <?php
        }
    ?>
    <div class="table-responsive">

        <table class="table" id="table_cliente dt_cliente">
            
            <thead>
                <tr>
                    <th class="text-left fila">Dni</th>
                    <th class="text-left fila">Apellido</th>
                    <th class="text-left fila">Nombre</th>
                    <th class="text-left fila">Estado</th>
                    <th class="text-left fila">CUIT</th>
                    <th class="text-left fila">Tel&eacute;fono</th>
                    <th class="text-left fila">Direcci&oacute;n</th>
                    <th class="text-center fila">Opci&oacute;n</th>
                </tr>
            </thead>

            <tbody class="tabla" id="tabla_ajax">
                <?php
                    if(!empty($arrayTabla)){
                        foreach ($arrayTabla as $tabla){
                ?>
                            <tr>
                                <td class="text-left fila"><?php echo $tabla['dni'];?></td>
                                <td class="text-left fila"><?php echo $tabla['apellido'];?></td>
                                <td class="text-left fila"><?php echo $tabla['nombre'];?></td>
                                <td class="text-left fila"><?php echo $tabla['estado'];?></td>
                                <td class="text-left fila"><?php echo $tabla['cuit'];?></td>
                                <td class="text-left fila"><?php echo $tabla['telefono'];?></td>
                                <td class="text-left fila"><?php echo $tabla['direccion'];?></td>
                                <td class="text-right fila">
                                    <form class="form-col-1" action="index.php?action=editar_cliente" method="POST">
                                        <button class='btn btn-warning' value="<?php echo $tabla['id'];?>" name='editar_cliente' type="submit" title='Editar' <?php echo $modificar; ?>>
                                            <span class='glyphicon glyphicon-pencil'></span>
                                        </button>
                                    </form>
                                    <form class="form-col-2" action="index.php?action=clientes" method="POST">
                                        <button class='btn btn-danger' value="<?php echo $tabla['id'];?>" name='btnEliminarCliente' type="submit" title='Eliminar' <?php echo $eliminar; ?>>
                                            <span class='glyphicon glyphicon-trash'></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>  
            </tbody>
        </table>
    </div>
    <form action="index.php?action=clientes" method="POST">
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="">Dni: </label>
                <input class="form-control" name="dni" id="dni" type="text" placeholder="DNI" required>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="">Apellido: </label>
                <input class="form-control" name="apellido" type="text" placeholder="Apellido" required>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="">Nombre: </label>
                <input class="form-control" name="nombre" type="text" placeholder="Nombre" required>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="">Fecha de Nacimiento: </label>
                <input class="form-control" id="datepicker" name="fechaNac" type='text' autocomplete="off" placeholder="Haz clic aqu&iacute;" required>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="">Tel&eacute;fono: </label>
                <input class="form-control" name="telefono" type="text" placeholder="N° de Teléfono" required>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="">CUIT: </label>
                <input class="form-control" name="cuit" type="text" placeholder="N° de C.U.I.T.">
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="">Estado Civil: </label>
                <select class="form-control" name="estadoCivil">
                    <option  value='SOLTERO/A'>SOLTERO/A</option>
                    <option value='CASADO/A'>CASADO/A</option>
                    <option value='VIUDO/A'>VIUDO/A</option>
                    <option value='DIVORCIADO/A'>DIVORCIADO/A</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="">Direcci&oacute;n: </label>
                <input class="form-control" name="direccion" type="text" placeholder="Direcci&oacute;n" required>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="">Ciudad: </label>
                <input class="form-control" name="ciudad" type="text" placeholder="Ciudad" required>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="">Provincia: </label>
                <input class="form-control" name="provincia" type="text" placeholder="Provincia" required>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="">Fecha Baja: </label>
                <input class="form-control" id="datepicker2" name="fechaBaja" type="text" placeholder="Haz clic aquí">
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="">Productor: </label>
                <select class="form-control" name="productor">
                    <?php 
                        foreach ($arrayProductor as $productor):
                    ?>
                    <option value="<?php echo $productor['id'];?>" name="productor"><?php echo $productor['apellido'];?>, <?php echo $productor['nombre'];?></option>
                    <?php 
                        endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-md-12 col-lg-12 grupo-btn">
            <div class="caja-externa-boton">
                <div class="caja-boton-tres">
                    <button class="btn btn-success boton-tres botonAceptar" name="btnAltaCliente" type="submit">Aceptar y Cargar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <select class="form-control" name="pasoSig">
                        <option  value='VEHICULO'>VEHICULO</option>
                        <option value='BENEFICIARIO'>BENEFICIARIO</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
    <form action="index.php" method="POST">
        <div class="caja-boton-dos">
            <button class="btn btn-default boton" name="btnSalir" type="">Ir a Inicio<i class="fa fa-home icono-boton" aria-hidden="true"></i></button>
        </div>  
    </form>
</div>