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
                echo "<td><h2>".$dat['email']."</h2></td>";
                echo "</tr>";
            }
            ?>

            <br>
            <br>
            <a href="logout.php"><button class="t">Cerrar Sesion</button></a>
            <br>
            <br>
            <?php
            echo "<h2>";
                date_default_timezone_set('America/Lima');    
                $Time = date('h a', time());  
                echo "Son: $Time.";
                echo "<br>";
                date_default_timezone_set('America/Lima');    
                $Date = date('m-d-Y', time());  
                echo "De $Date.";
            echo "</h2>";
            ?>
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
                <td><h1>Clasificación</h1></td>
                <td width="30%"><h1>Acción</h1></td>
            </tr>
            <?php
            while($res = mysqli_fetch_array($result)) {		
                echo "<tr>";
                echo "<td>".$res['name']."</td>";
                echo "<td>".$res['clasi']."</td>";
                echo "<td><a href=\"edit.php?id=$res[id]\">
                <button>Editar</button></a>
                <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Deseas eliminar la tarea?')\">
                <button>Eliminar</button></a></td>";		
            }
            ?>
        </table>
        
</div>
    <a href="agregar.html">
        <button class="r">Nueva Tarea</button>
    </a>
</body>
</html>