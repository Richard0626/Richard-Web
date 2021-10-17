<?php
include_once 'crud.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<title>Lab08</title>

</head>
<body>

	<center class="container-fluid">
		<br>
		<header>
			<div class="header-admin">
				<div>
					<h1>Bienvenido</h1>
				</div>
				<div class="salir">
					<a class="btn btn-danger" href="salir.php">Salir</a>
				</div>
			</div>
		</header>
		<br>

		<h2>Relaciones Comerciales</h2>
		<div class="table-responsive">
			<table class="text-center contenido table table-striped" border="2" cellpadding="15" align="center" width="100%">
				<thead bgcolor="#0E739F">
					<tr>
						<td><font size="4"color="white">País</font></td>
						<td><font size="4"color="white">Producto</font></td>
						<td><font size="4"color="white">Fecha Inicio</font></td>
						<td><font size="4"color="white">Descripcion</font></td>
						<td><font size="4"color="white">Tipo</font></td>
					</tr>
				</thead>
				<?php
				$res = $MySQLiconn->query("SELECT * FROM relacion_comercial");
				while ($row=$res->fetch_array()) {
				?>
				<tr>
					<td><?php echo $row['idPais']; ?></td>
					<td><?php echo $row['idProducto']; ?></td>
					<td><?php echo $row['fec_inicio']; ?></td>
					<td><?php echo $row['descripcion']; ?></td>
					<td><?php echo $row['tipo']; ?></td>
				</tr>
				<?php	
				}
				?>
			</table>
		</div>

		<br><br>

		<h2>Relaciones Diplomáticas</h2>
		<div class="table-responsive">
			<table class="text-center contenido table table-striped" border="2" cellpadding="15" align="center" width="100%">
				<thead bgcolor="#0E739F">
					<tr>
						<td><font size="4"color="white">ID</font></td>
						<td><font size="4"color="white">País</font></td>
						<td><font size="4"color="white">Fecha Inicio</font></td>
						<td><font size="4"color="white">Descripcion</font></td>
					</tr>
				</thead>
				<?php
				$res = $MySQLiconn->query("SELECT * FROM relacion_diplomatica");
				while ($row=$res->fetch_array()) {
				?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['idPais']; ?></td>
					<td><?php echo $row['fecha_inicio']; ?></td>
					<td><?php echo $row['descripcion']; ?></td>
				</tr>
				<?php	
				}
				?>
			</table>
		</div>

		<br><br>

		<h2>Productos</h2>
		<div class="table-responsive">
			<table class="text-center contenido table table-striped" border="2" cellpadding="15" align="center" width="100%">
				<thead bgcolor="#0E739F">
					<tr>
						<td><font size="4"color="white">ID</font></td>
						<td><font size="4"color="white">Nombre</font></td>
						<td><font size="4"color="white">Descripcion</font></td>
						<td><font size="4"color="white">Cantidad en Mill.</font></td>
						<td><font size="4"color="white">Costo en Mill.</font></td>
						
					</tr>
				</thead>
				<?php
				$res = $MySQLiconn->query("SELECT * FROM productos");
				while ($row=$res->fetch_array()) {
				?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['descripcion']; ?></td>
					<td><?php echo $row['cantidad']; ?></td>
					<td><?php echo $row['monto']; ?></td>
					
				</tr>
				<?php	
				}
				?>
			</table>
		</div>

		<br><br>

		<h2>Paises</h2>
		<div class="table-responsive">
			<table class="text-center contenido table table-striped" border="2" cellpadding="15" align="center" width="100%">
				<thead bgcolor="#0E739F">
					<tr>
						<td><font size="4"color="white">ID</font></td>
						<td><font size="4"color="white">Nombre</font></td>
						<td><font size="4"color="white">Abreviatura</font></td>
						<td><font size="4"color="white">Delegado</font></td>
					</tr>
				</thead>
				<?php
				$res = $MySQLiconn->query("SELECT * FROM pais");
				while ($row=$res->fetch_array()) {
				?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['abreviatura']; ?></td>
					<td><?php echo $row['delegado']; ?></td>
				</tr>
				<?php	
				}
				?>
			</table>
		</div>

		<br><br><br>
	</center>
</body>
</html>