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

        if(!$hayBusqueda){
    ?>
        <div class="alert alert-danger" role="alert" style="margin-top:20px;">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          No se ha encontrado ningún registro de Pago
        </div>
    <?php 
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
                        <form class="form-col-1" action="index.php?action=accion_pago" method="POST">
                            <button class='btn btn-warning' value="<?php echo $tabla['id'];?>" name='buscar_pago' type="submit" title='Editar' <?php echo $modificar; ?>>
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
                <input class="form-control" type="text" name="numRecibo" placeholder="N° de Recibo" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Fecha: </label>
                <input class="form-control" id="datepicker" name="fecha" type="text" autocomplete="off" placeholder="Haz clic aqu&iacute;" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Importe: </label>
                <input class="form-control" type="text" name="importe" placeholder="Importe" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">N&uacute;mero de Cuota: </label>
                <input class="form-control" type="numeric" name="numCuota" placeholder="N&uacute;mero de Cuota">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">N° de Recibo de Grua: </label>
                <input class="form-control" type="text" name="reciboGrua" placeholder="N° de Recibo de Grua">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Importe de Grua: </label>
                <input class="form-control" type="text" name="importeGrua" placeholder="Importe de Grua">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Observaciones: </label>
                <textarea class="form-control" name="observaciones" cols="22" rows="3"></textarea>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Poliza: </label>
                <select class="form-control" name="poliza" required>
                    <option name="poliza">Seleccione una opcion...</option>
                   <?php
                        if(isset($_POST['poliza'])){
                    ?>
                            <option value="<?php echo $_POST['poliza'][0];?>" name="poliza"><?php echo $_POST['poliza'][1].' - '.$_POST['poliza'][2];?></option>
                    <?php 
                        }else{
                            // MOSTRAR SOLO POLIZAS QUE NO SE HAYAN PAGADO EN EL MES ACTUAL
                            foreach($arrayPoliza as $poliza){
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
                    <button class="btn btn-success boton" name="btnAltaPago" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
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