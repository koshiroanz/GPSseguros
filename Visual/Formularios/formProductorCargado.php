<div class="formulario">
    <div class="table-responsive" style="margin-top:10px">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-left fila">Dni</th>
                    <th class="text-left fila">Apellido</th>
                    <th class="text-left fila">Nombre</th>
                    <th class="text-left fila">Direcci&oacute;n</th>
                    <th class="text-left fila">Tel&eacute;fono</th>
                    <th class="text-center fila">Opci&oacute;n</th>
                </tr>
            </thead>
            <tbody class="tabla">
                <?php
                    if(!empty($arrayTabla)){
                        foreach ($arrayTabla as $tabla){
                ?>
                            <tr>
                                <td class="text-left fila"><?php echo $tabla['dni'];?></td>
                                <td class="text-left fila"><?php echo $tabla['apellido'];?></td>
                                <td class="text-left fila"><?php echo $tabla['nombre'];?></td>
                                <td class="text-left fila"><?php echo $tabla['direccion'];?></td>
                                <td class="text-left fila"><?php echo $tabla['telefono'];?></td>
                                <td class="text-right fila">
                                    <form class="form-col-1" action="index.php?action=accion_productor" method="POST">
                                        <button class='btn btn-warning' value="<?php echo $tabla['id'];?>" name='buscarProductor' type="submit" title='Ya se encuentra seleccionado' disabled>
                                            <span class='glyphicon glyphicon-pencil'></span>
                                        </button>
                                    </form>
                                    <form class="form-col-2" action="index.php?action=productores" method="POST">
                                        <button class='btn btn-danger' value="<?php echo $tabla['id'];?>" name='btnEliminarProductor' type="submit" title='Eliminar'>
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
                          No se ha encontrado ningún registro de Productor.
                        </div>
                    <?php
                        }
                    ?>
            </tbody>
        </table>
    </div>
    <form action="index.php?action=productores" method="POST">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Dni: </label>
                <input class="form-control" type="text" name="dni" value="<?php echo $tabla['dni'];?>" placeholder="" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Apellido: </label>
                <input class="form-control" type="text" name="apellido" value="<?php echo $tabla['apellido'];?>"  placeholder="" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Nombre: </label>
                <input class="form-control" type="text" name="nombre" value="<?php echo $tabla['nombre'];?>" placeholder="" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Direcci&oacute;n: </label>
                <input class="form-control" type="text" name="direccion" value="<?php echo $tabla['direccion'];?>" placeholder="" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Tel&eacute;fono: </label>
                <input class="form-control" type="text" name="telefono" value="<?php echo $tabla['telefono'];?>" placeholder="" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>Privilegio: </label>
                <select class="form-control" name="privilegio">
                    <?php 
                        switch($tabla['privilegio']){
                            case 3:
                    ?>
                                <option value="<?php echo $tabla['privilegio'];?>">ALTO</option>
                                <option value='2'>MEDIO</option>
                                <option value='1'>BAJO</option>
                    <?php  
                                break;
                            case 2:
                    ?>
                                <option value="<?php echo $tabla['privilegio'];?>">MEDIO</option>
                                <option value='1'>BAJO</option>
                                <option value='3'>ALTO</option>
                    <?php
                                break;
                            case 1:
                    ?>
                                <option value="<?php echo $tabla['privilegio'];?>">BAJO</option>
                                <option value='3'>ALTO</option>
                                <option value='2'>MEDIO</option>
                    <?php
                                break;

                            default:
                    ?>
                                <option value="3" title="A-B-M">ALTO</option>
                                <option value="2" title="A-M">MEDIO</option>
                                <option value="1" title="A">BAJO</option>
                    <?php
                                break;
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <label for="">Tipos de Privilegios: </label>
            <div class="alert alert-info">
                Los productores podrán:</br>
                A-B-M: Alta-Baja-Modificación</br>A-M: Alta-Modificación</br>A: Alta
            </div>
        </div>
        <div class="col-lg-12 grupo-btn">
            <div class="caja-externa-boton">
                <div class="caja-boton-uno">
                    <button class="btn btn-success boton" name="btnModificarProductor" value="<?php echo $tabla['id'];?>" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
                </div>
                <div class="caja-boton-dos">
                    <button class="btn btn-danger boton" name="btnCancelar" type="submit">Cancelar<i class="fa fa-times icono-boton" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>