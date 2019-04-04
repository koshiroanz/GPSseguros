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
                    <th class="text-left fila">Dominio</th>
                    <th class="text-left fila">Propietario</th>
                    <th class="text-left fila">Carrocer&iacute;a</th>
                    <th class="text-center fila">Opci&oacute;n</th>
                </tr>
            </thead>
            <tbody class="tabla">
                <?php
                    foreach ($arrayTabla as $tabla){
                ?>
                    <tr>
                        <td class="text-left fila"><?php echo $tabla['dominio'];?></td>
                        <td class="text-left fila"><?php echo $tabla['apellido'].' '.$tabla['nom'];?></td>
                        <td class="text-left fila"><?php echo $tabla['nombre'];?></td>
                        <td class="text-right fila">
                            <form class="form-col-1" action="index.php?action=buscar_vehiculo" method="POST">
                                <button class='btn btn-warning' value="<?php echo $tabla['id'];?>" name='buscarDominio' type="submit" title='Ya se encuentra seleccionado' disabled>
                                    <span class='glyphicon glyphicon-pencil'></span>
                                </button>
                            </form>
                            <form class="form-col-2" action="index.php?action=vehiculos" method="POST">
                                <button class='btn btn-danger' value="<?php echo $tabla['id'];?>" name='btnEliminarVehiculo' type="submit" title='Eliminar'>
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
    <form action="index.php?action=vehiculos" method="POST">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Dominio: </label>
                <input class="form-control" type="text" name="dominio" value="<?php echo $arrayVehiculo[1];?>" placeholder="">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Marca: </label>
                <select class="form-control" name="marca" id="select_marca">
                    <option value="<?php echo $arrayVehiculo[2];?>" name="marca"><?php echo $arrayVehiculo[3];?></option>
                    <?php 
                        foreach ($arrayMarca as $marca):
                    ?>
                    <option value="<?php echo $marca['id'];?>" name="marca"><?php echo $marca['nombre'];?></option>
                    <?php 
                        endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Modelo: </label>
                <select class="form-control" name="modelo" id="select_modelo">
                    <option value="<?php echo $arrayVehiculo[4];?>" name="modelo"><?php echo $arrayVehiculo[5];?></option>
                    <?php 
                        foreach ($arrayModelo as $modelo):
                    ?>
                    <option value="<?php echo $modelo['id'];?>" name="modelo"><?php echo $modelo['nombre'];?></option>
                    <?php 
                        endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Carrocer&iacute;a: </label>
                <select class="form-control" name="carroceria" id="">
                    <option value="<?php echo $arrayVehiculo[6];?>" name="carroceria"><?php echo $arrayVehiculo[7];?></option>
                    <?php 
                        foreach ($arrayCarroceria as $carroceria):
                    ?>
                    <option value="<?php echo $carroceria['id'];?>" name="carroceria"><?php echo $carroceria['nombre'];?></option>
                    <?php 
                        endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Año: </label>
                <input class="form-control" type="text" name="anio" value="<?php echo $arrayVehiculo[8];?>" placeholder="Año">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Chasis: </label>
                <input class="form-control" type="text" name="chasis" value="<?php echo $arrayVehiculo[9];?>" placeholder="Chasis">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Motor: </label>
                <input class="form-control" type="text" name="motor" value="<?php echo $arrayVehiculo[10];?>" placeholder="Motor">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Valor: </label>
                <input class="form-control" type="text" name="valor" value="<?php echo $arrayVehiculo[11];?>" placeholder="">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Propietario: </label>
                <select class="form-control" name="cliente">
                    <option value="<?php echo $arrayVehiculo[12];?>" name="cliente"><?php echo $arrayVehiculo[13];?> <?php echo $arrayVehiculo[14];?> / <?php echo $arrayVehiculo[15];?></option>
                    <?php 
                        foreach ($arrayPropietario as $clientes){
                            if($clientes['id'] != $arrayVehiculo[12]){
                    ?>
                                <option value="<?php echo $clientes['id'];?>" name="cliente"><?php echo $clientes['apellido'];?> <?php echo $clientes['nombre'];?> / <?php echo $clientes['dni'];?></option>
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
                    <button class="btn btn-success boton" name="btnModificarVehiculo" value="<?php echo $arrayVehiculo[0];?>" type="submit">Aceptar<i class="fa fa-check icono-boton" aria-hidden="true"></i></button>
                </div>
                <div class="caja-boton-dos">
                    <button class="btn btn-danger boton" name="btnCancelar" type="submit">Cancelar<i class="fa fa-times icono-boton" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>
