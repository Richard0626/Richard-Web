<?php 
include_once 'crud.php'
?>
<!DOCTYPE html>
<html class="back-regis">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Registrar</title>
</head>
<body class="back-regis">
    <div class="container w-75  mt-5 rounded">
        <div class="contenido regis mt-1 shadow">
            <div class="d-md-flex justify-content-md-end">
                <a href="index.php"><img src="img/salir.png" alt="salir" width=40rem></a>
            </div>

            <form method="POST">
                <h1 class="text-center">Registrar Usuario</h1>
                <br>
                <div class="row g-3">
                    <div class="col-md-6 form-floating">
                        <input type="text" name="nombre" class="form-control"  placeholder="Usuario" value="<?php if(isset($_GET['edit'])) echo $getROW['usuario'];?>" required>
                        <label id="floatingInput">Nombre o Usuario</label>
                        
                    </div>
                    <div class="col-md-6 form-floating ">
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="<?php if(isset($_GET['edit'])) echo $getROW['apellido'];?>" required>
                        <label for="inputEmail4">Apellido</label>
                    </div>
                    <div class="col-12 form-floating">
                        <input type="password" name="clave" class="form-control" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $getROW['clave'];?>" required>
                        <label for="inputPassword4">Contraseña</label>
                    </div>
                    <div class="col-12 form-floating">
                        <input type="email" name="correo" class="form-control" placeholder="Correo Electronico" value="<?php if(isset($_GET['edit'])) echo $getROW['correo'];?>" required>
                        <label for="inputEmail4">Correo</label>
                    </div>
                    <div class="col-md-3 form-floating">
                        <input type="text" name="dni" class="form-control" placeholder="12345678" value="<?php if(isset($_GET['edit'])) echo $getROW['dni'];?>" required>
                        <label for="inputAddress">DNI</label>
                    </div>
                    <div class="col-md-3 form-floating">
                        <select name="nacionalidad" class="form-select" value="<?php if(isset($_GET['edit'])) echo $getROW['nacionalidad'];?>"required>
                            <option disabled>Paises</option>
                            <?php
                            $res = $MySQLiconn->query("SELECT * from pais");
                            while ($row=$res->fetch_array()) {
                            ?>
                            <option><?php echo $row['id']; echo ' '; echo $row['nombre'];?></option>
                            <?php
                            }
                            ?>
                            </option>
                        </select>
                        <label for="inputState">Nacionalidad</label>
                        
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" name="celular" class="form-control" placeholder="987654321" value="<?php if(isset($_GET['edit'])) echo $getROW['celular'];?>" required>
                            
                        <label for="inputCity">Celular</label>
                    </div>
                    <div class="col-12 form-floating">
                        <select name="tipo" class="form-control" value="<?php if(isset($_GET['edit'])) echo $getROW['tipo'];?>" required>
                            <option selected>General</option>
                            <option disabled> Administrador</option>
                        </select>
                        <label for="inputState">Tipo</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="save-registrar" class="btn btn-primary">REGISTRARSE</button>
                    </div>
                </div>
            </form>
        </div>
        <br>    
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>