<div class="formulario">
    <?php
        if((!$hayBusqueda)||(empty($arrayTabla))){ //Si no encuentra el cliente buscado, mostrar mensaje.
    ?>
            <div class="alert alert-danger mensaje" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>No se ha encontrado ningún registro.
            </div>
    <?php
        }
    ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-left fila">Propietario</th>
                    <th class="text-left fila">Dni</th>
                    <th class="text-left fila">Dominio</th>
                    <th class="text-left fila">Marca</th>
                    <th class="text-left fila">Modelo</th>
                    <th class="text-right fila">Opci&oacute;n</th>
                </tr>
            </thead>
            <tbody class="tabla">
                <?php
                    foreach ($arrayTabla as $values){
                ?>
                        <tr>
                            <td class="text-left fila"><?php echo $values['apellido'].' '.$values['nombre']?></td>
                            <td class="text-left fila"><?php echo $values['dni'] ?></td>
                            <td class="text-left fila"><?php echo $values['dominio'] ?></td>
                            <td class="text-left fila"><?php echo $values['marca'] ?></td>
                            <td class="text-left fila"><?php echo $values['modelo'] ?></td>
                            <td class="text-right fila">
                                <form action="index.php?action=inicio" method="POST">
                                    <button class='btn btn-info' value="<?php echo $values['dominio'];?>" name='ver' type="submit" title='Información'>
                                        <span class="fa fa-info" aria-hidden="true"></span>
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
</div>