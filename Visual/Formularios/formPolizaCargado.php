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
                                <td class="text-left fila"><?php echo $tabla['proApellido'].' '.$tabla['proNombre'];?></td>
                                <td class="text-left fila"><?php echo $tabla['vigenciaPoliza'];?></td>
                                <td class="text-left fila"><?php echo $tabla['vigenciaPolizaHasta'];?></td>
                                <td class="text-right fila">
                                    <form class="form-col-1" action="index.php?action=accion_poliza" method="POST">
                                        <button class='btn btn-warning' value="<?php echo $tabla['id'];?>" name='buscar_poliza' type="submit" title='Ya se encuentra seleccionado' disabled>
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
                <input class="form-control" id="datepicker" type="text" name="vigenciaPedida" value="<?php echo $tabla['vigenciaPedida'];?>" placeholder="" required <?php echo $modificar; ?>>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Vigencia Pedida Hasta: </label>
                <input class="form-control" id="datepicker2" type="text" name="vigenciaPedidaHasta" value="<?php echo $tabla['vigenciaPedidaHasta'];?>" placeholder="" required <?php echo $modificar; ?>>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Vigencia Poliza: </label>
                <input class="form-control" id="datepicker3" type="text" name="vigenciaPoliza" value="<?php echo $tabla['vigenciaPoliza'];?>" placeholder="" <?php echo $modificar; ?>>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Vigencia Poliza Hasta: </label>
                <input class="form-control" id="datepicker4" type="text" name="vigenciaPolizaHasta" value="<?php echo $tabla['vigenciaPolizaHasta'];?>" placeholder="" <?php echo $modificar; ?>>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Número de Poliza: </label>
                <input class="form-control" type="text" name="numPoliza" value="<?php echo $tabla['numPoliza'];?>" placeholder="" required <?php echo $modificar; ?>>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Costo de Poliza: </label>
                <input class="form-control" type="text" name="costoPoliza" value="<?php echo $tabla['costoPoliza'];?>" placeholder="$" <?php echo $modificar; ?>>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">N&uacute;mero de Poliza Vida: </label>
                <input class="form-control" type="text" name="numeroPolizaVida" value="<?php echo $tabla['numPolizaVida'];?>" placeholder="" <?php echo $modificar; ?>>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Costo de Vida: </label>
                <input class="form-control" type="text" name="costoVida" value="<?php echo $tabla['costoPolizaVida'];?>" placeholder="" <?php echo $modificar; ?>>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Endoso: </label>
                <input class="form-control" type="text" name="endoso" value="<?php echo $tabla['endoso'];?>" placeholder="" <?php echo $modificar; ?>>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Suma Asegurada: </label>
                <input class="form-control" type="text" name="sumaAsegurada" value="<?php echo $tabla['sumaAsegurada'];?>" placeholder="" <?php echo $modificar; ?>>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Estado: </label>
                <select class="form-control" name="estado" required <?php echo $modificar; ?>>
                    <option value="<?php echo $tabla['estado'];?>"><?php echo $tabla['estado'];?></option>
                    <?php
                        switch($tabla['estado']){
                            case 'ACTIVO':
                    ?>
                                <option value="BAJA TEMPORAL">BAJA TEMPORAL</option>
                                <option value="SUPER BAJA">SUPER BAJA</option>
                    <?php
                                break;
                            case 'BAJA TEMPORAL':
                    ?>
                                <option value="ACTIVO">ACTIVO</option>
                                <option value="SUPER BAJA">SUPER BAJA</option>
                    <?php
                                break;
                            case 'SUPER BAJA':
                    ?>
                                <option value="ACTIVO">ACTIVO</option>
                                <option value="BAJA TEMPORAL">BAJA TEMPORAL</option>
                    <?php
                                break;
                            default:
                    ?>
                                <option value="ACTIVO">ACTIVO</option>
                                <option value="BAJA TEMPORAL">BAJA TEMPORAL</option>
                                <option value="SUPER BAJA">SUPER BAJA</option>
                    <?php
                                break;
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Destino: </label>
                <select class="form-control" name="destino" required <?php echo $modificar; ?>>
                    <option value="<?php echo $tabla['destino'];?>"><?php echo $tabla['destino'];?></option>
                    <option value="PARTICULAR">PARTICULAR</option>
                    <option value="COMERCIAL">COMERCIAL</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Dominio Veh&iacute;culo: </label>
                <select class="form-control" name="vehiculo" <?php echo $modificar; ?>>
                    <option value="<?php echo $tabla['idVehiculo'];?>" name="vehiculo"><?php echo $tabla['dominio'];?></option>
                    <?php 
                        foreach ($arrayVehiculos as $vehiculos){
                    ?>
                    <option value="<?php echo $vehiculos['id'];?>" name="vehiculo"><?php echo $vehiculos['dominio'];?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Categor&iacute;a: </label>
                <select class="form-control" value="<?php echo $tabla['idCategoria'];?>" name="categoria" required <?php echo $modificar; ?>>
                    <option value="<?php echo $tabla['idCategoria'];?>" name="categoria"><?php echo $tabla['nomCat'];?></option>
                    <?php 
                        foreach ($arrayCategoria as $categoria){
                    ?>
                    <option value="<?php echo $categoria['id'];?>" name="categoria"><?php echo $categoria['nombre'];?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Compañia Aseguradora: </label>
                <select class="form-control" value="<?php echo $tabla['idCompSeguro'];?>" name="compSeguro" required <?php echo $modificar; ?>>
                    <option value="<?php echo $tabla['idCompSeguro'];?>" name="compSeguro"><?php echo $tabla['nomComp'];?></option>
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
                <select class="form-control" value="<?php echo $tabla['idCobertura'];?>" name="cobertura" required <?php echo $modificar; ?>>
                    <option value="<?php echo $tabla['idCobertura'];?>" name="cobertura"><?php echo $tabla['nomCob'];?></option>
                    <?php 
                        foreach ($arrayCobertura as $cobertura){
                    ?>
                    <option value="<?php echo $cobertura['id'];?>" name="cobertura"><?php echo $cobertura['nombre'];?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="">Observaciones: </label>
                <textarea class="form-control" name="observaciones" cols="22" rows="2" <?php echo $modificar; ?>>
                <?php echo $tabla['observaciones'];?>
                </textarea>
            </div>
        </div>
        <div class="col-lg-12 grupo-btn">
            <div class="caja-externa-boton">
                <div class="caja-boton-uno">
                    <button class="btn btn-success boton" name="btnModificarPoliza" value="<?php echo $tabla['id'];?>" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true" <?php echo $modificar; ?>></i></button>
                </div>
                <div class="caja-boton-dos">
                    <button class="btn btn-danger boton" name="btnCancelar" type="submit">Cancelar<i class="fa fa-times icono-boton" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>