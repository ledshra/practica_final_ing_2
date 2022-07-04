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
<?php
include 'connection.php';
?>
<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="" method="get">
            <input type="text" name="busqueda"> <br>
            <input type="submit" name="enviar" value="buscar">
        </form>

        <br><br><br>

        <?php
        if(isset($_GET['enviar'])){
            $busqueda =$_GET['busqueda'];

            $consulta = $con->query("SELECT * FROM tareas WHERE id LIKE '%$busqueda%' ");
            while ($row =$consulta->fetch_array()){
                echo $row['porque'].'<br>';
            }
        }
        ?>



    </body>
</html>

<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" type="text/css" href="styleindex.css">
</head>
<body>
    <div class="tit">
        <h1 class="titulo">Todo Listttd</h1>
        <div class="l">
            <p style="color:#FF0000" id="time">00:00:00</p>
            <p style="color:#FF0000" id="date">date</p>
        </div>
    </div>

    <sidebar>
        <fieldset>
            <div>
                <center>
                <h1>Lista de tareas de:</h1>
                <?php
                while($dat = mysqli_fetch_array($datos)) {     
                    echo "<tr>";
                    echo "<td><h2>".$dat['name']."</h2></td>";   
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
                </center>
            </div>
        </fieldset>
    </sidebar>
<br><br>
<div class="container">
        <table width='99%' border=0>
            <tr>
                <td width="20%"><h1>Tarea</h1></td>
                <td><h1>Creado</h1></td>
                <td><h1>Vence</h1></td>
                <td><h1>clase</h1></td>
                <td><h1>Status</h1></td>
                <td><h1>Acción</h1></td>
            </tr>
            <?php
            date_default_timezone_set("America/Lima");
            $fechaActual = date('d-m-Y H:i:s');
            while($res = mysqli_fetch_array($result)) {		
                echo "<tr>";
                echo "<td>".$res['name']."</td>";
                echo "<td>".$res['fecha_date']."</td>";
                echo "<td>".$res['fecha']."</td>";	
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
<form>
  <script src="clock.js"></script>
</form>
</body>
</html>