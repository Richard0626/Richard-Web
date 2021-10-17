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
				<a class="nav-link" href="admin.php">Usuarios</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="pais.php">Pais</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="producto.php">Producto</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="comercial.php">Relacion comercial</a>
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
				if(isset($_GET['editc'])){
					?>
					<h1 class="text-center fw-bold"><font face="raro, courier" size=6 color="red"> Editar Relacion Comercial </font></h1>
					<?php
				} else{
					?>
					<h1 class="text-center fw-bold"><font face="raro, courier" size=6 color="red"> Registrar Relacion Comercial </font></h1>
					<?php
				}
				?>
				<br>
				<div class="row g-3">
					<div class="col-md-6 form-floating  ">
						<select name="idPais" class="form-select" value="<?php if(isset($_GET['editc'])) echo $getROW['idPais'];?>" required>
							<option disabled>Paises</option>
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
						<label id="floatingInput">País</label>					
					</div>

					<div class="col-md-6 form-floating  ">
						<select name="idProducto" class="form-select" value="<?php if(isset($_GET['editc'])) echo $getROW['idProducto'];?>" required>
							<?php
							$res = $MySQLiconn->query("SELECT * FROM productos");
							while ($row=$res->fetch_array()) {
							?>
							<option><?php echo $row['id']; echo ' '; echo $row['nombre']; ?></option>
							<?php
							}
							?>
							</option>
						</select>
						<label id="floatingInput">Producto</label>					
					</div>

					<div class="col-md-6 form-floating  ">
						<input type="date" name="fec_inicio" class="form-control" placeholder="Fecha Inicio" value="<?php if(isset($_GET['editc'])) echo $getROW['fec_inicio'];?>" required>
						<label id="floatingInput">Fecha de inicio</label>				
					</div>

					<div class="col-md-6 form-floating  ">
						<input type="text" name="descripcion" class="form-control" placeholder="Descripcion" value="<?php if(isset($_GET['editc'])) echo $getROW['descripcion'];?>" required>
						<label id="floatingInput">Descripcion</label>				
					</div>

					<div class="col-md-6 form-floating  ">
						<input type="text" name="tipo" class="form-control" placeholder="Tipo" value="<?php if(isset($_GET['editc'])) echo $getROW['tipo'];?>" required>
						<label id="floatingInput">Tipo</label>				
					</div>

					<div>
						<?php
						if (isset($_GET['editc'])) {
							?>
							<button type="submit" name="updatec" class="btn btn-primary btn-lg">Editar</button>
							<?php
						}else{
							?>
							<button type="submit"name="savec" class="btn btn-primary btn-lg">Registrar</button>
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
					echo "ID Pais"
					?></strong>
				</td>
				<td>
					<strong><?php 
					echo "ID Producto"
					?></strong>
				</td>
				<td>
					<strong><?php 
					echo "Fecha inicio"
					?></strong>
				</td>
				<td>
					<strong><?php 
					echo "Descripcion"
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
			$res = $MySQLiconn->query("SELECT * FROM relacion_comercial");
			while ($row=$res->fetch_array()) {
			?>
			<tr class="text-break">
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['idPais']; ?></td>
				<td><?php echo $row['idProducto']; ?></td>
				<td><?php echo $row['fec_inicio']; ?></td>
				<td><?php echo $row['descripcion']; ?></td>
				<td><?php echo $row['tipo']; ?></td>
				<td><a href="?editc=<?php echo $row['id'];?>" onclick="return confirm('Confirmar edicion')">Editar</a></td>
				<td><a href="?delc=<?php echo $row['id'];?>" onclick="return confirm('Confirmar eliminacion')">Eliminar</a></td>
			</tr>
			<?php
			}
			?>
		</table>
		<br><br>
	</div>	
	

	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>