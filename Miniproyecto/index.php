<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Login</title>
</head>
    
<body >
    
    <div class="container w-75  mt-5 rounded shadow">
        <div class="row align-items-stretch" >
            <div class="col bg d-done d-lg-block col-md-5 col-lg-5">
        
            </div>

            <div class="col bg-white p-5  rounded-end">
                <?php 
                if (isset($_GET['errorusuario'])) {
                
                    if ($_GET['errorusuario'] == 'si'){
                        echo '<b>Datos Incorrectos </b> <br>';
                        echo '<br>';
                        echo 'Vuelva a verificar su usuario y contraseña';

                    } else {
                        echo 'Introduce tu clave de acceso';
                    }
                }
                ?>
                
                
                
                <div class="container-fluid">
                    <form action="control.php" method="POST">
                        <h1 class="fw-bold text-center py-4"><font face="Open Sans Condensed, sans-serif">Iniciar Sesion</font></h1>
                        <div class="row g-3">
                            <div class="mb-4">
                                <label class="fw-bold">Usuario</label>
                                <input type="text" name="usuario" class="form-control" placeholder="Usuario" required >
                            </div>
                            <div class="mb-4">
                                <label class="fw-bold">Contraseña</label>
                                <input type="password" name="clave" class="form-control"  placeholder="Contraseña" required>
                            </div>

                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Iniciar Sesion"> 
                            </div>

                            <br>
                            <p class="text-center font-monospace">¿Aun no tienes una cuenta? <br><a href="registrar.php"><b>Registrate ahora</b></a></p>
                        </div>
                        
                    </form>
                </div>
               
            </div>
        </div>
        

    </div>

    <br><br>

    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


</html>