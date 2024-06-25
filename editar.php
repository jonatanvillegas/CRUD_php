<?php 
include_once("conexion.php"); // Agregamos el archivo que contiene la conección
include_once("index.php"); // Agregamos el Archivo pricipal

$codigo = $_GET['cod']; // obtenemos el codigo del usuario al que dió clic en editar

 
$querybuscar = mysqli_query($conn, "SELECT * FROM usuarios WHERE cod=$codigo"); // Buscamos y obtenemos entre todas los registros al usuario que coincidacon el id a buscar.
 
while($mostrar = mysqli_fetch_array($querybuscar)) //Recorremos el arreglo para encontrar todos los datos.
{
    $codigo = $mostrar['cod']; //Guardamos el codigo del usuario en la variable $codigo
    $nombre = $mostrar['nom'];  //Guardamos el nombre del usuario en la variable $nombre
    $correo = $mostrar['correo']; //Guardamos el correo del usuario en la variable $correo
	$telefono = $mostrar['tel']; //Guardamos el telefono del usuario en la variable $telefono
}
?>
<html>
<head>    
		<title>Mi Primer CRUD</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>Codigo</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Correo</td>
                <td><input type="text" name="txtcorreo" value="<?php echo $correo;?>" required></td>
            </tr>
            <tr> 
                <td>Teléfono</td>
                <td><input type="text" name="txttelefono" value="<?php echo $telefono;?>"required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="index.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');"> <!–– Mostramos una Alerta con Javascript ––>
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['btnmodificar'])) //Comprobamos que se accedio a modificar
{    
    $codigo1 = $_POST['txtcodigo']; //Guardamos en una variable los Datos que el usuario escribio en la caja de texto para modificar
	
	$nombre1 	= $_POST['txtnombre'];//Guardamos en una variable los Datos que el usuario escribio en la caja de texto para modificar
    $correo1 	= $_POST['txtcorreo']; //Guardamos en una variable los Datos que el usuario escribio en la caja de texto para modificar
    $telefono1 	= $_POST['txttelefono']; //Guardamos en una variable los Datos que el usuario escribio en la caja de texto para modificar
      
    $querymodificar = mysqli_query($conn, "UPDATE usuarios SET nom='$nombre1',correo='$correo1',tel='$telefono1' WHERE cod=$codigo1"); // Creamos la consulta de Actualización a la base de //Datoss

  	echo "<script>window.location= 'index.php' </script>";
    
}
?>
	