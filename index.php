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
<body>
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
            <a href="agregar.html">
                <button>Nueva Tarea</button>
            </a>

            <br>
            <br>
            <a href="logout.php"><button>Cerrar Sesion</button></a>
            <br>
            <br>
            </center>
        </div>
    </fieldset>
</sidebar>
<br><br>
<div class="container">
        <table width='99%' border=0 >
            <tr>
                <td width="20%"><h1>Tarea</h1></td>
                <td><h1>clasi</h1></td>
                <td><h1>Status</h1></td>
                <td><h1>Acción</h1></td>
            </tr>
            <?php
            while($res = mysqli_fetch_array($result)) {     
                echo "<tr>";
                echo "<td>".$res['name']."</td>";
                echo "<td>".$res['clasi']."</td>";
                echo "<td><a href=\"status.php?id=$res[id]\">
                <button class=\"ter\"><h2>".$res['status']."</h2></button></a></td>";

                echo "<td><a href=\"edit.php?id=$res[id]\">
                <button class=\"edi\">Editar</button></a>

                <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Deseas eliminar la tarea?')\">
                <button class=\"eli\">Eliminar</button></a></td>";
            }
            ?>
        </table>
        
</div>
</body>
</html>