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
                    foreach ($arrayTabla as $tabla):
                ?>
                    <tr>
                        <td class="text-left fila"><?php echo $tabla['dni'];?></td>
                        <td class="text-left fila"><?php echo $tabla['apellido'];?></td>
                        <td class="text-left fila"><?php echo $tabla['nombre'];?></td>
                        <td class="text-left fila"><?php echo $tabla['direccion'];?></td>
                        <td class="text-left fila"><?php echo $tabla['ciudad'];?></td>
                        <td class="text-left fila"><?php echo $tabla['provincia'];?></td>
                        <td class="text-right fila">
                            <form class="form-col-1" action="index.php?action=accion_beneficiario" method="POST">
                                <button class='btn btn-warning' value="<?php echo $tabla['id'];?>" name='buscarBeneficiario' type="submit" title='Editar' <?php echo $modificar; ?>>
                                    <span class='glyphicon glyphicon-pencil'></span>
                                </button>
                            </form>
                            <form class="form-col-2" action="index.php?action=beneficiarios" method="POST">
                                <button class='btn btn-danger' value="<?php echo $tabla['id'];?>" name='btnEliminarBeneficiario' type="submit" title='Eliminar' <?php echo $eliminar; ?>>
                                    <span class='glyphicon glyphicon-trash'></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                    endforeach
                ?>
            <?php
                }else{
            ?>
                    <div class="alert alert-danger" role="alert">
                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                      <span class="sr-only">Error:</span>
                      No se ha encontrado ningún registro de <?php echo $var?>.
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
                <input class="form-control" name="dni" type="text" placeholder="DNI" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Apellido: </label>
                <input class="form-control" name="apellido" type="text" placeholder="Apellido" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Nombre: </label>
                <input class="form-control" name="nombre" type="text" placeholder="Nombre" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Tel&eacute;fono: </label>
                <input class="form-control" name="telefono" type="text" placeholder="N° de Teléfono" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Direcci&oacute;n: </label>
                <input class="form-control" name="direccion" type="text" placeholder="Direcci&oacute;n" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Ciudad: </label>
                <input class="form-control" name="ciudad" type="text" placeholder="Ciudad" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Provincia: </label>
                <input class="form-control" name="provincia" type="text" placeholder="Provincia" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Relaci&oacute;n con Asegurado: </label>
                <input class="form-control" name="parentesco" type="text" placeholder="Relacion" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Cliente: </label>
                <select class="form-control" name="cliente">
                    <?php 
                        foreach ($arrayCliente as $cliente):
                    ?>
                    <option value="<?php echo $cliente['id'];?>" name="cliente"><?php echo $cliente['dni'];?> / <?php echo $cliente['apellido'];?> <?php echo $cliente['nombre'];?></option>
                    <?php 
                        endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-12 grupo-btn">
            <div class="caja-externa-boton">
                <div class="caja-boton-uno">
                    <button class="btn btn-success boton" name="btnAltaBeneficiario" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
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