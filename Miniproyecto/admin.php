<?php include('seguridad.php');
include ('db.php');
include_once 'crud.php';
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Indie+Flower&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Laboratorio8</title>
</head>
	
<body>
	<cemter>
		<header>
			<div class="header-admin">
				<br>
				<div>
					<br>
					<h1> <font class="text-center fw-bold" face="Indie Flower, cursive">Bienvenido Administrador </font><span><font class="text-center fw-bold" face="Indie Flower, cursive" size=7 color="red"><?php echo $_SESSION['user'];?></font></span></h1>
				</div>
				<div class="salir">
					<br>
					<a class="btn btn-danger fw-bold" href="salir.php">Salir</a>
				</div>
			</div>
			<br>
			<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
				<ul class="nav nav-tabs container">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="admin.php">Usuarios</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pais.php">Pais</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="producto.php">Producto</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="comercial.php">Relacion comercial</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="diplomatica.php">Relacion diplomatica</a>
					</li>
				</ul>
			</nav>

		</header>
		<div class="contenido">
			<form method="POST">
				<?php
				if(isset($_GET['edit'])){
					?>
					<h1 class="text-center fw-bold"><font face="raro, courier" size=6 color="red">Editar Usuario</font></h1>
					<?php
				} else{
					?>
					<h1 class="text-center fw-bold"><font face="raro, courier" size=6 color="red">Registrar Usuario</font></h1>
					<?php
				}
				?>
				<br>
				<div class="row g-3">
					<div class="col-md-6 form-floating  ">
						<input type="text" name="nombre" class="form-control"  placeholder="Usuario" value="<?php if(isset($_GET['edit'])) echo $getROW['nombre'];?>" required>
						<label id="floatingInput">Nombre o Usuario</label>
						
					</div>

					<div class="col-md-6 form-floating ">
						<input type="text" name="apellido" class="form-control" placeholder="Apellido" value="<?php if(isset($_GET['edit'])) echo $getROW['apellido'];?>" required>
						<label for="inputEmail4">Apellido</label>
					</div>

					<div class="col-md-5 form-floating">
						<input type="password" name="clave" class="form-control" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $getROW['clave'];?>" required>
						<label for="inputPassword4">Contraseña</label>
					</div>

					<div class="col-md-7 form-floating">
						<input type="email" name="correo" class="form-control" placeholder="Correo Electronico" value="<?php if(isset($_GET['edit'])) echo $getROW['correo'];?>" required>
						<label for="inputEmail4">Correo</label>
					</div>

					<div class="col-md-3 form-floating">
						<input type="text" name="dni" class="form-control" placeholder="12345678" value="<?php if(isset($_GET['edit'])) echo $getROW['dni'];?>" required>
						<label for="inputAddress">DNI</label>
					</div>

					<div class="col-md-3 form-floating">
						<select name="id_pais" class="form-select" value="<?php if(isset($_GET['edit'])) echo $getROW['id_pais'];?>" required>
							<?php
							$res = $MySQLiconn->query("SELECT * FROM pais");
							while ($row=$res->fetch_array()) {
							?>
							<option><?php echo $row['id']; echo ' '; echo $row['nombre']; ?></option>
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
						<select name="tipo" class="form-select" value="<?php if(isset($_GET['edit'])) echo $getROW['tipo'];?>" required>
							<option>Administrador</option>
							<option>General</option>
						</select>
						<label for="inputState">Tipo</label>
					</div>
				</div>
				
				<center>
					<div>
						<br>
						<?php
						if (isset($_GET['edit'])) {
							?>
							<button type="submit" class="btn btn-primary btn-lg" name="update">Editar</button>
							<?php
						}else{
							?>
							<button type="submit" class="btn btn-primary btn-lg" name="save">Registrar</button>
							<?php
						}
						?>
					</div>
				</center>
				

			</form>
		</div>

		<div class="table-responsive">
			<table class="table contenido table-hover align-middle">
				<br>
				<tr class="table-dark">
					<td>
						<strong><?php 
						echo "ID"
						?></strong>
					</td>
					<td>
						<strong><?php 
						echo "Nombre"
						?></strong>
					</td>
					<td>
						<strong><?php 
						echo "Apellido"
						?></strong>
					</td>

					<td>
						<strong><?php 
						echo "Correo"
						?></strong>
					</td>
					<td>
						<strong><?php 
						echo "DNI"
						?></strong>
					</td>
					<td>
						<strong><?php 
						echo "Nacionalidad"
						?></strong>
					</td>
					<td>
						<strong><?php 
						echo "Celular"
						?></strong>
					</td>
					<td>
						<strong><?php 
						echo "Tipo"
						?></strong>
					</td>
					<td colspan="2"><strong><?php 
							echo "Acciones"
							?></strong>
					</td>
				<tr>
				<?php 
				$res = $MySQLiconn->query("SELECT * FROM usuario");
				while ($row=$res->fetch_array()) {
				?>
				<tr class="text-break">
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['apellido']; ?></td>
					<td><?php echo $row['correo']; ?></td>
					<td><?php echo $row['dni']; ?></td>
					<td><?php echo $row['id_pais']; ?></td>
					<td><?php echo $row['celular']; ?></td>
					<td><?php echo $row['tipo']; ?></td>
					<td><a href="?edit=<?php echo $row['id'];?>">Editar</a></td>
					<td><a href="?del=<?php echo $row['id'];?>">Eliminar</a></td>
				</tr>
				<?php
				}
				?>
			</table>
			<br><br>
		</div>

	</cemter>


	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>