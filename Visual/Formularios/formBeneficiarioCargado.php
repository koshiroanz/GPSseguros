<div class="formulario">
    <?php 
        session_start();
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
                    <th class="text-left fila">Dni</th>
                    <th class="text-left fila">Apellido</th>
                    <th class="text-left fila">Nombre</th>
                    <th class="text-left fila">Direcci&oacute;n</th>
                    <th class="text-left fila">Ciudad</th>
                    <th class="text-left fila">Provincia</th>
                    <th class="text-center fila">Opci&oacute;n</th>
                </tr>
            </thead>
            <tbody class="tabla">
                <?php
                if(empty(!$arrayTabla)){
                    foreach($arrayTabla as $tabla){
                ?>
                    <tr>
                        <td class="text-left fila"><?php echo $tabla[1];?></td>
                        <td class="text-left fila"><?php echo $tabla[2];?></td>
                        <td class="text-left fila"><?php echo $tabla[3];?></td>
                        <td class="text-left fila"><?php echo $tabla[5];?></td>
                        <td class="text-left fila"><?php echo $tabla[6];?></td>
                        <td class="text-left fila"><?php echo $tabla[7];?></td>
                        <td class="text-right fila">
                            <form class="form-col-1" action="index.php?action=accion_beneficiario" method="POST">
                                <button class='btn btn-warning' value="<?php echo $tabla[0];?>" name='buscarBeneficiario' type="submit" title='Ya se encuentra seleccionado' disabled>
                                    <span class='glyphicon glyphicon-pencil'></span>
                                </button>
                            </form>
                            <form class="form-col-2" action="index.php?action=beneficiarios" method="POST">
                                <button class='btn btn-danger' value="<?php echo $tabla[0];?>" name='btnEliminarBeneficiario' type="submit" title='Eliminar' <?php echo $eliminar; ?>>
                                    <span class='glyphicon glyphicon-trash'></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            <?php
                }else{
            ?>
                    <div class="alert alert-danger" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only">Error:</span>
                      No se ha encontrado ningún registro de Beneficiario.
                    </div>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <form action="index.php?action=beneficiarios" method="POST">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Dni: </label>
                <input class="form-control" name="dni" value="<?php echo $tabla[1];?>" type="text" placeholder="DNI" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Apellido: </label>
                <input class="form-control" name="apellido" value="<?php echo $tabla[2];?>" type="text" placeholder="Apellido" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Nombre: </label>
                <input class="form-control" name="nombre" value="<?php echo $tabla[3];?>" type="text" placeholder="Nombre" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Tel&eacute;fono: </label>
                <input class="form-control" name="telefono" value="<?php echo $tabla[4];?>" type="text" placeholder="N° de Celular" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Direcci&oacute;n: </label>
                <input class="form-control" name="direccion" value="<?php echo $tabla[5];?>" type="text" placeholder="Direcci&oacute;n" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Ciudad: </label>
                <input class="form-control" name="ciudad" value="<?php echo $tabla[6];?>" type="text" placeholder="Ciudad" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Provincia: </label>
                <input class="form-control" name="provincia" value="<?php echo $tabla[7];?>" type="text" placeholder="Provincia" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Relaci&oacute;n con Asegurado: </label>
                <input class="form-control" name="parentesco" value="<?php echo $tabla[8];?>" type="text" placeholder="Relacion" required>
            </div>
        </div>
         <div class="col-lg-4">
            <div class="form-group">
                <label for="">Cliente: </label>
                <select class="form-control" name="cliente">
                    <option value="<?php echo $tabla[9];?>" name="cliente"><?php echo $tabla[10];?> / <?php echo $tabla[11];?> <?php echo $tabla[12];?></option>
                    <?php 
                        foreach ($arrayCliente as $cliente){
                            if($cliente['id'] != $tabla[9]){
                    ?>
                                 <option value="<?php echo $cliente['id'];?>" name="cliente"><?php echo $cliente['dni'];?> / <?php echo $cliente['apellido'];?> <?php echo $cliente['nombre'];?></option>
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
                    <button class="btn btn-success boton" name="btnModificarBeneficiario" value="<?php echo $tabla[0];?>" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
                </div>
                <div class="caja-boton-dos">
                    <button class="btn btn-danger boton" name="btnCancelar" type="submit">Cancelar<i class="fa fa-times icono-boton" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>