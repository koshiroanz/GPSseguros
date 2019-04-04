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
                    <th class="text-left fila">N° Recibo</th>
                    <th class="text-left fila">Fecha</th>
                    <th class="text-left fila">Importe</th>
                    <th class="text-left fila">Cuotas</th>
                    <th class="text-left fila">N° Póliza</th>
                    <th class="text-left fila">Dominio</th>
                    <th class="text-center fila">Opci&oacute;n</th>
                </tr>
            </thead>
            <tbody class="tabla">
                <?php
                    foreach ($arrayTabla as $tabla){
                ?>
                            <tr>
                                <td class="text-left fila"><?php echo $tabla['numRecibo'];?></td>
                                <td class="text-left fila"><?php echo $tabla['fecha'];?></td>
                                <td class="text-left fila"><?php echo $tabla['importe'];?></td>
                                <td class="text-left fila"><?php echo $tabla['numCuota'];?></td>
                                <td class="text-left fila"><?php echo $tabla['numPoliza'];?></td>
                                <td class="text-left fila"><?php echo $tabla['dominio'];?></td>
                                <td class="text-right fila">
                                    <form class="form-col-1" action="index.php?action=buscar_pago" method="POST">
                                        <button class='btn btn-warning' value="<?php echo $tabla['id'];?>" name='buscar_pago' type="submit" title='Ya se encuentra seleccionado' disabled>
                                            <span class='glyphicon glyphicon-pencil'></span>
                                        </button>
                                    </form>
                                    <form class="form-col-2" action="index.php?action=pagos" method="POST">
                                        <button class='btn btn-danger' value="<?php echo $tabla['id'];?>" name='btnEliminarPago' type="submit" title='Eliminar' <?php echo $eliminar; ?>>
                                            <span class='glyphicon glyphicon-trash'></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <form action="index.php?action=pagos" method="POST">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Número de Recibo: </label>
                <input class="form-control" type="text" name="numRecibo" value="<?php echo $tabla['numRecibo'];?>">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Fecha: </label>
                <input class="form-control" type="text" name="fecha" value="<?php echo $tabla['fecha'];?>">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Importe: </label>
                <input class="form-control" type="text" name="importe" value="<?php echo $tabla['importe'];?>">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">N&uacute;mero de Cuota: </label>
                <input class="form-control" type="text" name="numCuota" value="<?php echo $tabla['numCuota'];?>">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">N° de Recibo de Grua: </label>
                <input class="form-control" type="text" name="importeGrua" value="<?php echo $tabla['reciboGrua'];?>">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Importe de Grua: </label>
                <input class="form-control" type="text" name="reciboGrua" value="<?php echo $tabla['importeGrua'];?>">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Observaciones: </label>
                <textarea class="form-control" name="observaciones" value="<?php echo $tabla['observaciones'];?>" cols="22" rows="3"></textarea>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">P&oacute;liza: </label>
                <select class="form-control" name="poliza">
                    <option value="<?php echo $tabla['idPoliza'];?>" name="poliza"><?php echo $tabla['numPoliza'].' - '.$tabla['dominio'];?></option>
                    <?php
                        foreach ($arrayPoliza as $poliza){
                            if($tabla['idPoliza'] != $poliza['id']){
                    ?>
                                <option value="<?php echo $poliza['id'];?>" name="poliza"><?php echo $poliza['numPoliza'].' - '.$poliza['dominio'];?></option>
                    <?php
                            } 
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-12 grupo-btn">
            <div class="caja-externa-boton">
                <div class="caja-boton-uno">
                    <button class="btn btn-success boton" name="btnModificarPago" value="<?php echo $tabla['id'];?>" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
                </div>
                <div class="caja-boton-dos">
                    <button class="btn btn-danger boton" name="btnCancelar" type="submit">Cancelar<i class="fa fa-times icono-boton" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>