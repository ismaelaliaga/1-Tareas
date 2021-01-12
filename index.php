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

            <?php
                //Se conecta a la base de datos
                include "conexionbd.php";
                //Se inicializan y preparan las sentencias a consultar
                include "consultas_preparadas.php";
                //Se inicializa un contador para saber en que estado se encuentra cada tarea a la hora de mostrarlas
                $contador=0;
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
                        //Se lleva a cabo la visualización de las tareas pendientes
                        //ordenadas por orden de prioridad de mayor a menor
                        include "consultas.php";   
                    ?>
                </td>
                <td>      
                    <?php
                        //Se lleva a cabo la visualización de las tareas En progreso
                        //ordenadas por orden de prioridad de mayor a menor
                        include "consultas.php";
                    ?>
                </td>
                <td>
                    <?php
                        //Se lleva a cabo la visualización de las tareas finalizadas
                        //ordenadas por orden de alfabético de la A a la Z las tareas
                        include "consultas.php";
                    ?>
                </td>
            </tr>
            <tr>
                <td>   
                    <!-- Funcionalidad de crear tarea pendiente con prioridad-->
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
                    <!-- Funcionalidad de borrar tarea -->
                    <form method="POST" enctype="application/x-www-form-urlencoded" action="funcionalidades.php">
                        <fieldset> 
                            <legend>Borrar tareas</legend>
                            <div> <label>ID de la tarea a borrar <br><input type= "number" name="tareaborrar"> </label> </div>
                            <div><button type="submit" name="borrartarea">Borrar Tarea</button></div>                            
                        </fieldset>     
                    </form>
                </td>
                <td>
                    <!-- Funcionalidad de mover la tarea a otro estado -->
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
            //Se cierra la conexión con la base de datos
            $bd->close();
        ?>
    </body>
</html>