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
	<div>
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
					<a class="nav-link"  href="admin.php">Usuarios</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="pais.php">Pais</a>
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
		<br>

		<center>
			<div class="contenido">
				<form method="post">
					<?php
					if(isset($_GET['editp'])){
						?>
						<h1 class="text-center fw-bold"><font face="raro, courier" size=6 color="red">Editar País</font></h1>
						<?php
					} else{
						?>
						<h1 class="text-center fw-bold"><font face="raro, courier" size=6 color="red">Registrar País</font></h1>
						<?php
					}
					?>
					<br>
					<div class="row g-3">
						<div class="col-md-6 form-floating  ">
							<input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php if(isset($_GET['editp'])) echo $getROW['nombre'];?>" required>
							<label id="floatingInput">País</label>					
						</div>

						<div class="col-md-6 form-floating  ">
							<input type="text" name="abreviatura" class="form-control" placeholder="Abreviatura" value="<?php if(isset($_GET['editp'])) echo $getROW['abreviatura'];?>" required>
							<label id="floatingInput">Abreviatura</label>					
						</div>

						<div class="col-md-6 form-floating  ">
							<input type="text" name="delegado" class="form-control" placeholder="Delegado" value="<?php if(isset($_GET['editp'])) echo $getROW['delegado'];?>" required>
							<label id="floatingInput">Delegado</label>				
						</div>
						<div>
						<?php
						if (isset($_GET['editp'])) {
							?>
							<button type="submit" class="btn btn-primary btn-lg" name="updatep">Editar</button>
							<?php
						}else{
							?>
							<button type="submit" class="btn btn-primary btn-lg" name="savep">Registrar</button>
							<?php
						}
						?>
						</div>
					</div>
				</form>
			</div>

		</center>
		

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
						echo "Abreviatura"
						?></strong>
					</td>
					<td>
						<strong><?php 
						echo "Delegado"
						?></strong>
					</td>
					<td colspan="2"><strong><?php 
							echo "Acciones"
							?></strong>
					</td>
				<tr>
				<?php 
				$res = $MySQLiconn->query("SELECT * FROM pais");
				while ($row=$res->fetch_array()) {
				?>
				<tr class="text-break">
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['abreviatura']; ?></td>
					<td><?php echo $row['delegado']; ?></td>
					<td><a href="?editp=<?php echo $row['id'];?>" onclick="return confirm('Confirmar edicion')">Editar</a></td>
					<td><a href="?delp=<?php echo $row['id'];?>" onclick="return confirm('Confirmar eliminacion')">Eliminar</a></td>
				</tr>
				<?php
				}
				?>
			</table>
			<br><br>
		</div>
		
	</div>
	
	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>