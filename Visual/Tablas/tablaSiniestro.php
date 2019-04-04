<div class="formulario">
    <?php
        if(empty($siniestroBusqueda)){
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
                    <th class="text-left fila">Asegurado</th>
                    <th class="text-left fila">Dominio</th>
                    <th class="text-left fila">N° Poliza</th>
                    <th class="text-right fila">Opci&oacute;n</th>
                </tr>
            </thead>
            <tbody class="tabla">
                <?php
                    foreach ($siniestroBusqueda as $values):
                ?>
                        <tr>
                            <td class="text-left fila"><?php echo $values['apellido'].' '.$values['nombre']?></td>
                            <td class="text-left fila"><?php echo $values['dominio'] ?></td>
                            <td class="text-left fila"><?php echo $values['numPoliza'] ?></td>
                            <td class="text-right fila">
                                <form action="index.php?action=siniestros" method="POST">
                                    <button class='btn btn-info' value="<?php echo $values['dominio'];?>" name='btnCargar' type="submit" title='Cargar'>
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                <?php 
                    endforeach
                ?>
            </tbody>
        </table>
    </div>
    <?php 
        }
    ?>
</div>