<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <link rel="stylesheet" href="Visual/Css/style.css">
        <link rel="stylesheet" href="Visual/Css/bootstrap.min.css">
        <link rel="stylesheet" href="Visual/Css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
        <link href="Visual/Imagenes/Gps/GPS.png" rel="shortcut icon" type="image"/>
        <title>GPS Seguros</title>
    </head>
    <body>
        <div class="fluido">
            <div class="fluido-interno">
                <img class="img-login" src="Visual\Imagenes\Gps\GPS.png">
            </div>
        </div>
        <div class="container-fluid contenedor-form">
            <div class="container">
                <div class="formulario">
                    <form action="index.php" method="POST">
                        <div class="form-group">
                            <label for="">Usuario:</label>
                            <input class="form-control" name="usuario" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña:</label>
                            <input class="form-control" name="pass" type="password">
                        </div>
                        <button class="btn btn-primary" name="btnIniciarSesion" type="submit">Iniciar</button>
                    </form>
                </div>
            </div>
        </div>
        <footer>
            <div class="logos">
                <div class="container">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="centrar">
                            <img class="img-login" src="Visual\Imagenes\Agrosalta\logosolo.gif"> 
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="centrar">
                            <img class="img-login" src="Visual\Imagenes\Antartida\ICONO.png">
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="centrar" style="width:80px;">
                            <img class="img-login" src="Visual\Imagenes\Liderar\Logo.png">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="Visual/Js/jquery.js"></script>
        <script src="Visual/Js/bootstrap.min.js"></script>
    </body>
</html>