<!DOCTYPE html>
<html lang="en">
<head>
        <title>OLER FUMIGACIONES</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos/oler.css">
        <meta charset="utf-8">
</head>
<body class="navcolor" >
        <div class="col-md-7 col-sm-10 container my-5  border border-secondary rounded bg-light">
                <div class="row justify-content-center">
                        <div class="col-md-5 col-sm-7 text-center mt-5">
                                <a href="index.php" ><img src="IMAGENES/oler.png" class="border border-secondary rounded-circle" height="200" width="200" ></a>
                        </div>
                </div>
                <div class="row justify-content-center">
                        <div class="col-md-10 col-sm-10 mb-4">
                                <form action="php/verificar_inicio_sesion.php" method="post">
                                        <div class="form-group">
                                                <label for="Correo">Correo</label>
                                                <input type="email" class="form-control" name="correo" placeholder="Escriba su correo">
                                        </div>
                                        <div class="form-group">
                                                <label for="contraseña">Contraseña</label>
                                                <input type="password" class="form-control" name="contraseña" placeholder="Escriba una contraseña">
                                        </div>
                                        <div class="form-group">
                                                <button type="success" class="btn btn-success btn-lg btn-block">Iniciar Sesión</button>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>
        <?php include("footer.php") ?>
</body>
</html> 