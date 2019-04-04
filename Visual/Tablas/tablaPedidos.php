<div class="formulario">
    <?php
        if($arrayPedidos == null){ //Si no encuentra el cliente buscado, mostrar mensaje.
    ?>
            <div class="alert alert-danger mensaje" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>No se ha encontrado ningún registro.
            </div>
    <?php
        }else{
    ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-left fila">N° Poliza</th>
                    <th class="text-left fila">Cliente</th>
                    <th class="text-left fila">Dominio</th>
                    <th class="text-left fila">Productor</th>
                    <th class="text-right fila">Opci&oacute;n</th>
                </tr>
            </thead>
            <tbody class="tabla">
                <?php
                    foreach ($arrayPedidos as $values){
                ?>
                        <tr>
                            <td class="text-left fila"><?php echo $values[0];?></td>
                            <td class="text-left fila"><?php echo $values[1].' '.$values[2];?></td>
                            <td class="text-left fila"><?php echo $values[3];?></td>
                            <td class="text-left fila"><?php echo $values[5].' '.$values[6];?></td>
                            <td class="text-right fila">
                                <form action="index.php?action=accion_poliza" method="POST">
                                    <button class='btn btn-info' value="<?php echo $values[4];?>" name='buscar_poliza' type="submit" title='Cargar'>
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
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
</div>