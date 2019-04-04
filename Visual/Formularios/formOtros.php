<div class="formulario">
    <!-- -->
    <div class="contenedor-texto">
        <p class="text-left p-texto">COMPAÑIA DE SEGUROS</p>
    </div>
    <div class="separador"></div>
    <!-- -->
    <div class="row deRow">
        <div class="col-lg-4 alert alert-success">
            <h2>Compañia Seguro</h2>
            <form class="form-inline" action="index.php?action=otros" method="POST">
                <div class="form-group">
                    <label class="fuente" for="">Nombre: </label>
                    <input class="form-control" name="nombre" type="text" placeholder="Nombre" required>
                </div>
                <button class="btn btn-success" name="btnAltaCompSeguro" type="submit">Guardar</button>
            </form>
        </div>
        <div class="col-lg-4 alert alert-success" style="margin-left:20px !important;">
            <h2>Categor&iacute;a</h2>
            <form class="form-inline" action="index.php?action=otros" method="POST">
                <div class="form-group">
                    <label class="fuente" for="">Nombre: </label>
                    <input class="form-control" name="nombre" type="text" placeholder="Nombre" required>
                </div>
                <button class="btn btn-success" name="btnAltaCategoria" type="submit">Guardar</button>
            </form>
        </div>
        <div class="col-lg-5 alert alert-success">
            <h2>Cobertura</h2>
            <form class="form-inline" action="index.php?action=otros" method="POST">
                <div class="form-group">
                    <label class="fuente" for="">Nombre: </label>
                    <input class="form-control" name="nombre" type="text" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                    <label class="fuente" for="">Compañia Seguro: </label>
                    <select class="form-control" name="compania" id="">
                        <?php foreach ($arrayCompania as $arrayC): ?>
                                <option value="<?php echo $arrayC['id'];?>" name="compania"><?php echo $arrayC['nombre'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn btn-success" name="btnAltaCobertura" type="submit">Guardar</button>
            </form>
        </div>
    </div>
    <!-- -->
    <div class="contenedor-texto">
        <p class="text-left p-texto">VEHICULOS</p>
    </div>
    <div class="separador"></div>
    <!-- -->
    <div class="col-lg-5 alert alert-success">
        <h2>Carroceria</h2>
        <form action="index.php?action=otros" method="POST">
            <div class="form-group">
                <label class="fuente" for="">Nombre: </label>
                <input class="form-control" name="nombre" type="text" placeholder="Nombre" required>
            </div>
            <button class="btn btn-success" name="btnAltaCarroceria" type="submit">Guardar</button>
        </form>
    </div>
    <div class="row deRow">
        <div class="col-lg-5 alert alert-success" style="margin-left:20px !important;">
            <h2>Marca</h2>
            <form action="index.php?action=otros" method="POST">
                <div class="form-group">
                    <label class="fuente" for="">Nombre: </label>
                    <input class="form-control" name="nombre" type="text" placeholder="Nombre" required>
                </div>
                <button class="btn btn-success" name="btnAltaMarca" type="submit">Guardar</button>
            </form>
        </div>
        <div class="col-lg-5 alert alert-success">
            <h2>Modelo</h2>
            <form action="index.php?action=otros" method="POST">
                <div class="form-group">
                    <label class="fuente" for="">Nombre: </label>
                    <input class="form-control" name="nombre" type="text" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                    <label class="fuente" for="">Marca: </label>
                    <select class="form-control" name="marca" id="">
                        <?php 
                            foreach ($arrayMarca as $marca):
                        ?>
                        <option value="<?php echo $marca['id'];?>" name="marca"><?php echo $marca['nombre'];?></option>
                        <?php 
                            endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="fuente" for="">Carroceria: </label>
                    <select class="form-control" name="carroceria" id="">
                        <?php 
                            foreach ($arrayCarroceria as $carroceria):
                        ?>
                        <option value="<?php echo $carroceria['id'];?>" name="carroceria"><?php echo $carroceria['nombre'];?></option>
                        <?php 
                            endforeach;
                        ?>
                    </select>
                </div>
                <button class="btn btn-success" name="btnAltaModelo" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>








