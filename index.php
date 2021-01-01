<!-- Se define el DTD (tipo de página) -->
<!DOCTYPE html>

<!-- Se indica idioma, la codificación y el título de la web-->
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <title>Proyecto 1</title>
        <link rel="stylesheet" href="css/estilos.css">   
    </head>
    <body> 
        <!-- Se conecta a la base de datos -->
            <?php
                include "conexionbd.php";
            ?>

        <!-- Se define la tabla donde van a ir las tareas pendientes, en progreso y finalizadas -->
        <table id="tabla"> 
            <tr>
                <th>Tareas Pendientes</th>
                <th>Tareas en Progreso</th>
                <th>Tareas Finalizadas</th>
            </tr>
            <tr>
                <td>
                    <?php
                        include "consultapen.php";
                    ?>
                </td>
                <td>      
                    <?php
                        include "consultaenpro.php";
                    ?>
                </td>
                <td>
                    <?php
                        include "consultafin.php";
                    ?>
                </td>
            </tr>
            <tr>
                <td>   
                    <form method="POST" enctype="application/x-www-form-urlencoded" action="funcionalidades.php">
                        <fieldset> 
                            <legend>Crear Tarea Pendiente</legend>
                            <div> <label>Descripción Tarea<br><input name="intdescripcion"></label> </div>
                            <div> <label>Prioridad Tarea <br>
                                <select name="intprioridad">
                                    <option value="0">Baja</option>
                                    <option value="1">Media</option>
                                    <option value="2">Alta</option>
                                </select> 
                            </label></div>
                            <div><button type="submit" name="inttarea">Introducir Tarea</button></div>                            
                        </fieldset>     
                    </form>
                </td>
                <td>
                    <form method="POST" enctype="application/x-www-form-urlencoded" action="funcionalidades.php">
                        <fieldset> 
                            <legend>Borrar tareas</legend>
                            <div> <label>ID de la tarea a borrar <br><input type= "number" name="tareaborrar"> </label> </div>
                            <div><button type="submit" name="borrartarea">Borrar Tarea</button></div>                            
                        </fieldset>     
                    </form>
                </td>
                <td>
                    <form method="POST" enctype="application/x-www-form-urlencoded" action="funcionalidades.php">
                        <fieldset> 
                            <legend>Mover tareas tareas</legend>
                            <div> <label>ID de la tarea a mover <br><input type= "number" name="tareamover"> </label> </div>
                            <div> <label>Estado Tarea <br>
                                <select name="intestado">
                                    <option value="0">Pendiente</option>
                                    <option value="1">En progreso</option>
                                    <option value="2">Finalizada</option>
                                </select> 
                            </label></div>
                            <div><button type="submit" name="movertarea">Mover Tarea</button></div>                            
                        </fieldset>     
                    </form>
                </td>
            </tr>
        </table>
        <?php
            $bd->close();
        ?>
    </body>
</html>