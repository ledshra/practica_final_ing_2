<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
include_once("connection.php");

$result = mysqli_query($mysqli, "SELECT * FROM tareas WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");

$datos = mysqli_query($mysqli, "SELECT * FROM login WHERE id=".$_SESSION['id']." ORDER BY id DESC")

?>

<html>
<head>
    <html lang="es">
    <title>Todo List</title>
    <link rel="stylesheet" type="text/css" href="styleindex.css">
</head>

<h1 class="titulo">Todo List</h1>

<sidebar>
    <fieldset>
        <div>
            <center>
            <br>
            <h1>Lista de tareas de:</h1>
            <br>
            <?php
            while($dat = mysqli_fetch_array($datos)) {     
                echo "<tr>";
                echo "<td><h1>".$dat['name']."</h1></td>";   
                echo "<td>".$dat['email']."</td>";
                echo "</tr>";
            }
            ?>

            <br>
            <br>
            <a href="logout.php"><button class="t">Cerrar Sesion</button></a>
            </center>
        </div>
    </fieldset>
</sidebar>

<body>
<br/><br/>
<div class="container">
        <table width='90%' border=0>
            <tr>
                <td><h1>Tarea</h1></td>
                <td><h1>Fecha de Publicacion</h1></td>
                <td><h1>Fecha Programada</h1></td>
                <td width="30%"><h1>Accion</h1></td>
            </tr>
            <?php
            date_default_timezone_set("America/Lima");
            $fechaActual = date('d-m-Y H:i:s');
            while($res = mysqli_fetch_array($result)) {		
                echo "<tr>";
                echo "<td>".$res['id']."</td>";
                echo "<td>".$res['name']."</td>";
                echo "<td>".$fechaActual."</td>";
                echo "<td>".$res['fecha_date']."</td>";		
                echo "<td><a href=\"edit.php?id=$res[id]\"><button>Editar</button></a>  <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Deseas eliminar la tarea?')\"><button>Eliminar</button></a></td>";		

            while($res = mysqli_fetch_array($result)) {		
                echo "<tr>";
                echo "<td>".$res['name']."</td>";	
                echo "<td><a href=\"edit.php?id=$res[id]\">
                <button>Editar</button></a>
                <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Deseas eliminar la tarea?')\">
                <button>Eliminar</button></a></td>";		
            }
            ?>
        </table>
        
</div>
<form>
    <div class="container-clock">
    <center><h2 style="color:#FF0000" id="time">00:00:00</h2></center>
    <center><h2 style="color:#FF0000"><p id="date">date</p></h2></center>
  </div>
  <script src="clock.js"></script>
</form>
    <a href="agregar.html">
        <button class="r">Nueva Tarea</button>
    </a>
</body>
</html>