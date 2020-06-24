<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>MuSiCTreno</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital@1&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/esti_login.css">
        <link rel="shorcut icon" type="image/x-icon" href="imagenes/icono.png">
    </head>
    
    <body>
        <div class="contenedor">
            <header id="header" class="encabezado">
                <div class="titulo">
                    <h1>Iniciar Sesión</h1>
                </div>
                <div class="border">
                    <hr class="lazo">
                </div>
            </header>

            <section class="main">
                

                <form class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
                    <div class="form-group"> 
                        <i class="icono fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" name="correo" placeholder="Correo" class="caja">
                    </div>
                    <div class="form-group"> 
                        <i class="icono fa fa-key" aria-hidden="true"></i>
                        <input type="password" name="password" placeholder="Contraseña" class="caja">
                    </div>


                    <div class="form-group">
                        <i class="submit-btn fa fa-chevron-circle-right" aria-hidden="true" onclick="login.submit()"></i>
                    </div>

                    <?php if(!empty($errores)):?>
                        <div class="error">
                            <ul>
                                   <?php echo $errores; ?>
                            </ul>
                        </div>
                    <?php endif;?>

                </form>
            </section>
            <aside class="iniciar">
                <div class="pregunta">
                    <h5>¿No estás registrado?</h5>
                </div>
                <div class="abrir">
                    <a href="registrate.php">Crea una cuenta</a>
                </div>
            </aside>
        

        </div>
    </body>
</html>
