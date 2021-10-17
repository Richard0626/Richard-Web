<?php
include_once 'db.php';

/* code for data insert */
if (isset($_POST['save-registrar']))
{

	$nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
	$apellido = $MySQLiconn->real_escape_string($_POST['apellido']);
	$clave = $MySQLiconn->real_escape_string($_POST['clave']);
	$correo = $MySQLiconn->real_escape_string($_POST['correo']);
	$dni = $MySQLiconn->real_escape_string($_POST['dni']);
	$idPais = $MySQLiconn->real_escape_string($_POST['nacionalidad']);
	$celular = $MySQLiconn->real_escape_string($_POST['celular']);
	$tipo = $MySQLiconn->real_escape_string($_POST['tipo']);
	$SQL = $MySQLiconn->query("INSERT INTO usuario(nombre,apellido,clave,correo,dni,idPais,celular,tipo)VALUES('$nombre','$apellido','$clave','$correo','$dni','$idPais','$celular','$tipo')");
	header("Location: index.php");
	if(!$SQL)
	{
		echo $MySQLiconn->error;
	}
}

if (isset($_POST['save']))
{

	$nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
	$apellido = $MySQLiconn->real_escape_string($_POST['apellido']);
	$clave = $MySQLiconn->real_escape_string($_POST['clave']);
	$correo = $MySQLiconn->real_escape_string($_POST['correo']);
	$dni = $MySQLiconn->real_escape_string($_POST['dni']);
	$id_pais = $MySQLiconn->real_escape_string($_POST['id_pais']);
	$celular = $MySQLiconn->real_escape_string($_POST['celular']);
	$tipo = $MySQLiconn->real_escape_string($_POST['tipo']);
	$SQL = $MySQLiconn->query("INSERT INTO usuario(nombre,apellido,clave,correo,dni,id_pais,celular,tipo)VALUES('$nombre','$apellido','$clave','$correo','$dni','$id_pais','$celular','$tipo')");
	header("Location: admin.php");
	if(!$SQL)
	{
		echo $MySQLiconn->error;
	}
}

/* code for data insert */


/* code for date delete */
if(isset($_GET['del']))
{
	$SQL = $MySQLiconn->query("DELETE FROM usuario WHERE id=".$_GET['del']);
	header("Location: admin.php");
}
/* code for data delete */



/* code for date update */
if(isset($_GET['edit']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM usuario WHERE id=".$_GET['edit']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $MySQLiconn->query("UPDATE usuario SET nombre='".$_POST['nombre']."', apellido='".$_POST['apellido']."',clave='".$_POST['clave']."',correo='".$_POST['correo']."',dni='".$_POST['dni']."',id_pais='".$_POST['id_pais']."',celular='".$_POST['celular']."',tipo='".$_POST['tipo']."' WHERE id=".$_GET['edit']);
	header("Location: admin.php");
}
/* code for data update */




/* ---------------------- Pais CRUD ---------------------- */

if (isset($_POST['savep']))
{

	$nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
	$abreviatura = $MySQLiconn->real_escape_string($_POST['apellido']);
	$delegado = $MySQLiconn->real_escape_string($_POST['delegado']);
	$SQL = $MySQLiconn->query("INSERT INTO pais(nombre,abreviatura,delegado)VALUES('$nombre','$abreviatura','$delegado')");
	header("Location: pais.php");
	if(!$SQL)
	{
		echo $MySQLiconn->error;
	}
}

/* code for data insert */


/* code for date delete */
if(isset($_GET['delp']))
{
	$SQL = $MySQLiconn->query("DELETE FROM pais WHERE id=".$_GET['delp']);
	header("Location: pais.php");
}
/* code for data delete */



/* code for date update */
if(isset($_GET['editp']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM pais WHERE id=".$_GET['editp']);
	$getROW = $SQL->fetch_array();
	
}

if(isset($_POST['updatep']))
{
	$SQL = $MySQLiconn->query("UPDATE pais SET nombre='".$_POST['nombre']."', abreviatura='".$_POST['abreviatura']."',delegado='".$_POST['delegado']."' WHERE id=".$_GET['editp']);
	header("Location: pais.php");
}
/* code for data update */



/* ------------------- Producto CRUD -------------------- */

if (isset($_POST['savepr']))
{

	$nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
	$descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);
	$cantidad = $MySQLiconn->real_escape_string($_POST['cantidad']);
	$monto = $MySQLiconn->real_escape_string($_POST['monto']);
	$SQL = $MySQLiconn->query("INSERT INTO productos(nombre,descripcion,cantidad,monto)VALUES('$nombre','$descripcion','$cantidad','$monto')");
	header("Location: producto.php");
	if(!$SQL)
	{
		echo $MySQLiconn->error;
	}
}

/* code for data insert */


/* code for date delete */
if(isset($_GET['delpr']))
{
	$SQL = $MySQLiconn->query("DELETE FROM productos WHERE id=".$_GET['delpr']);
	header("Location: producto.php");
}
/* code for data delete */



/* code for date update */
if(isset($_GET['editpr']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM productos WHERE id=".$_GET['editpr']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['updatepr']))
{
	$SQL = $MySQLiconn->query("UPDATE productos SET nombre='".$_POST['nombre']."', descripcion='".$_POST['descripcion']."',cantidad='".$_POST['cantidad']."',monto='".$_POST['monto']."' WHERE id=".$_GET['editpr']);
	header("Location: producto.php");
}
/* code for data update */



/* ------------------------- Comercial CRUD ---------------------- */

if (isset($_POST['savec']))
{
	$idPais = $MySQLiconn->real_escape_string($_POST['idPais']);
	$idproducto = $MySQLiconn->real_escape_string($_POST['idproducto']);
	$fec_inicio = $MySQLiconn->real_escape_string($_POST['fec_inicio']);
	$descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);
	$tipo = $MySQLiconn->real_escape_string($_POST['tipo']);
	$SQL = $MySQLiconn->query("INSERT INTO relacion_comercial(idPais,idproducto,fec_inicio,descripcion,tipo)VALUES('$idPais','$idproducto','$fec_inicio','$descripcion','$tipo')");
	header("Location: comercial.php");
	if(!$SQL)
	{
		echo $MySQLiconn->error;
	}
}

/* code for data insert */


/* code for date delete */
if(isset($_GET['delc']))
{
	$SQL = $MySQLiconn->query("DELETE FROM relacion_comercial WHERE id=".$_GET['delc']);
	header("Location: comercial.php");
}
/* code for data delete */



/* code for date update */
if(isset($_GET['editc']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM relacion_comercial WHERE id=".$_GET['editc']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['updatec']))
{
	$SQL = $MySQLiconn->query("UPDATE relacion_comercial SET idPais='".$_POST['idPais']."', idProducto='".$_POST['idProducto']."',fec_inicio='".$_POST['fec_inicio']."',descripcion='".$_POST['descripcion']."',tipo='".$_POST['tipo']."' WHERE id=".$_GET['editc']);
	header("Location: comercial.php");
}
/* code for data update */



/* ------------------------- Diplomatica ------------------------ */

if (isset($_POST['saved']))
{

	$idPais = $MySQLiconn->real_escape_string($_POST['idPais']);
	$fecha_inicio = $MySQLiconn->real_escape_string($_POST['fecha_inicio']);
	$descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);
	$SQL = $MySQLiconn->query("INSERT INTO relacion_diplomatica(idPais,fecha_inicio,descripcion)VALUES('$idPais','$fecha_inicio','$descripcion')");
	header("Location: diplomatica.php");
	if(!$SQL)
	{
		echo $MySQLiconn->error;
	}
}

/* code for data insert */


/* code for date delete */
if(isset($_GET['deld']))
{
	$SQL = $MySQLiconn->query("DELETE FROM relacion_diplomatica WHERE id=".$_GET['deld']);
	header("Location: diplomatica.php");
}
/* code for data delete */



/* code for date update */
if(isset($_GET['editd']))
{
	$SQL = $MySQLiconn->query("SELECT * FROM relacion_diplomatica WHERE id=".$_GET['editd']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['updated']))
{
	$SQL = $MySQLiconn->query("UPDATE relacion_diplomatica SET idPais='".$_POST['idPais']."', fecha_inicio='".$_POST['fecha_inicio']."',descripcion='".$_POST['descripcion']."' WHERE id=".$_GET['editd']);
	header("Location: diplomatica.php");
}
/* code for data update */

?>
