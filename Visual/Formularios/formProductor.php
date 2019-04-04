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
                                        <button class='btn btn-warning' value="<?php echo $tabla['id'];?>" name='buscarProductor' type="submit" title='Editar'>
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
                <label for="">Direcci&oacute;n: </label>
                <input class="form-control" name="direccion" type="text" placeholder="Direcci&oacute;n" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Tel&eacute;fono: </label>
                <input class="form-control" name="telefono" type="text" placeholder="N° de Telefono" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>Privilegio: </label>
                <select class="form-control" name="privilegio">
                    <option value="">Seleccione una opción...</option>
                    <option value="3" title="A-B-M">ALTO</option>
                    <option value="2" title="A-M">MEDIO</option>
                    <option value="1" title="A">BAJO</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <label for="">Tipos de Privilegios: </label>
            <div class="alert alert-info">
                Los productores podrán:</br>
                A-B-M: Alta-Baja-Modificación</br>
                A-M: Alta-Modificación</br>
                A: Alta
            </div>
        </div>
        <div class="col-lg-12 grupo-btn">
            <div class="caja-externa-boton">
                <div class="caja-boton-uno">
                    <button class="btn btn-success boton" name="btnAltaProductor" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
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