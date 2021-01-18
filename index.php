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
                $contador=0;
                //Se inicializan y preparan las sentencias a consultar
                $consultaasc = $bd->prepare("SELECT * FROM `tareas` WHERE `estado` = ? ORDER BY `tarea` ASC");
                $consultadesc = $bd->prepare("SELECT * FROM `tareas` WHERE `estado` = ? ORDER BY `prioridad` DESC");
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
                        
                        ?>
                        <form method="POST" enctype="application/x-www-form-urlencoded" action="funcionalidades.php">
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
                </td>
                <td>
                    <fieldset>
                        <legend>Borrar tareas</legend>
                        <div><button type="submit" name="borrartarea">Borrar Tareas</button></div>
                    </fieldset>
                </td>
                <td>
                    <!-- Funcionalidad de mover la tarea a otro estado -->
                    
                        <fieldset> 
                            <legend>Mover tareas tareas</legend>
                            <div> <label>Estado Tarea <br>
                                <select name="intestado">
                                    <option value="0">Pendiente</option>
                                    <option value="1">En progreso</option>
                                    <option value="2">Finalizada</option>
                                </select> 
                                <div><br><button type="submit" name="movertarea">Mover Tareas</button></div>
                            </label></div>
                                                        
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