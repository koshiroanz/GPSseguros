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

        if((!$hayBusqueda)||(empty($arrayTabla))){ //Si no encuentra póliza a buscar, mostrar mensaje.
    ?>
            <div class="alert alert-danger mensaje" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>No se ha encontrado ningún registro de Póliza.
            </div>
    <?php
        }
    ?>
    <div class="table-responsive" style="margin-top:10px">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-left fila">N° P&oacute;liza</th>
                    <th class="text-left fila">Dominio</th>
                    <th class="text-left fila">Productor</th>
                    <th class="text-left fila">Vig. desde</th>
                    <th class="text-left fila">Vig. hasta</th>
                    <th class="text-center fila">Opci&oacute;n</th>
                </tr>
            </thead>
            <tbody class="tabla">
                <?php
                    if(!empty($arrayTabla)){
                        foreach ($arrayTabla as $tabla){
                ?>
                            <tr>
                                <td class="text-left fila"><?php echo $tabla['numPoliza'];?></td>
                                <td class="text-left fila"><?php echo $tabla['dominio'];?></td>
                                <td class="text-left fila"><?php echo $tabla['apellido'].' '.$tabla['nombre'];?></td>
                                <td class="text-left fila"><?php echo $tabla['vigenciaPoliza'];?></td>
                                <td class="text-left fila"><?php echo $tabla['vigenciaPolizaHasta'];?></td>
                                <td class="text-right fila">
                                    <form class="form-col-1" action="index.php?action=accion_poliza" method="POST">
                                        <button class='btn btn-warning' value="<?php echo $tabla['id'];?>" name='buscar_poliza' type="submit" title='Editar' <?php echo $modificar; ?>>
                                            <span class='glyphicon glyphicon-pencil'></span>
                                        </button>
                                    </form>
                                    <form class="form-col-2" action="index.php?action=polizas" method="POST">
                                        <button class='btn btn-danger' value="<?php echo $tabla['id'];?>" name='btnEliminarPoliza' type="submit" title='Eliminar' <?php echo $eliminar; ?>>
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
    <form action="index.php?action=polizas" method="POST">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Vigencia Pedida: </label>
                <input class="form-control" id="datepicker" name="vigenciaPedida" type='text' autocomplete="off" placeholder="Haz clic aqu&iacute;" required>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Vigencia Pedida Hasta: </label>
                <input class="form-control" id="datepicker2" name="vigenciaPedidaHasta" type='text' autocomplete="off" placeholder="Haz clic aqu&iacute;" required>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Vigencia Poliza: </label>
                <input class="form-control" id="datepicker3" name="vigenciaPoliza" type='text' autocomplete="off" placeholder="Haz clic aqu&iacute;">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Vigencia Poliza Hasta: </label>
                <input class="form-control" id="datepicker4" name="vigenciaPolizaHasta" type='text' autocomplete="off" placeholder="Haz clic aqu&iacute;">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Número de Poliza: </label>
                <input class="form-control" type="text" name="numPoliza" value="" placeholder="N° de Poliza" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Costo de Poliza: </label>
                <input class="form-control" type="text" name="costoPoliza" value="" placeholder="$">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">N&uacute;mero de Poliza Vida: </label>
                <input class="form-control" type="text" name="numeroPolizaVida" value="" placeholder="N° de Poliza Vida">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Costo de Vida: </label>
                <input class="form-control" type="text" name="costoVida" value="" placeholder="$">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Endoso: </label>
                <input class="form-control" type="text" name="endoso" value="" placeholder="N° de Endoso">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Suma Asegurada: </label>
                <input class="form-control" type="text" name="sumaAsegurada" value="" placeholder="$">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Estado: </label>
                <select class="form-control" name="estado" required>
                    <option value="">Seleccione una opción</option>
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="BAJA TEMPORAL">BAJA TEMPORAL</option>
                    <option value="BAJA PERMANENTE">BAJA PERMANENTE</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Destino: </label>
                <select class="form-control" name="destino" id="" required>
                    <option value="PARTICULAR">PARTICULAR</option>
                    <option value="COMERCIAL">COMERCIAL</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Dominio Veh&iacute;culo: </label>
                <select class="form-control" name="vehiculo" required>
                    <?php
                        if(isset($_POST['vehiculo'])){
                    ?>
                            <option value="<?php echo $_POST['vehiculo'][0];?>" name="vehiculo"><?php echo $_POST['vehiculo'][1];?></option>
                    <?php 
                        }else{
                           foreach ($arrayVehiculos as $vehiculos){
                    ?>
                                <option value="<?php echo $vehiculos['id'];?>" name="vehiculo"><?php echo $vehiculos['dominio'];?></option>
                    <?php 
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Categor&iacute;a: </label>
                <select class="form-control" name="categoria" required>
                    <?php 
                        foreach ($arrayCategoria as $categorias){
                    ?>
                    <option value="<?php echo $categorias['id'];?>" name="categoria"><?php echo $categorias['nombre'];?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group" >
                <label for="">Compañia Aseguradora: </label>
                <select class="form-control" name="compSeguro" id="select_compSeguro" required>
                    <option> Seleccione una opcion... </option>
                    <?php 
                        foreach ($arrayCompSeguro as $compSeguros){
                    ?>
                    <option value="<?php echo $compSeguros['id'];?>" name="compSeguro"><?php echo $compSeguros['nombre'];?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Cobertura: </label>
                <select class="form-control" name="cobertura" id="select_cobertura" required>
                    <option> Seleccione una opcion... </option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="">Observaciones: </label>
                <textarea class="form-control" name="observaciones" cols="22" rows="2"></textarea>
            </div>
        </div>
        <div class="col-lg-12 grupo-btn">
            <div class="caja-externa-boton">
                <div class="caja-boton-uno">
                    <button class="btn btn-success boton" name="btnAltaPoliza" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
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