<?php
    //Preparar sentencias 

    $pendientes = $bd->prepare("SELECT `id`, `tarea` FROM `tareas` WHERE `estado` = 0 ORDER BY `prioridad` DESC");
    $pendientes->execute();

    //Vincular columnas con variables

    $pendientes->bind_result($id,$tarea);
    
    //Tratamos los datos devueltos

    while ($pendientes->fetch()){
        echo "$id . $tarea<br>";
    }

    //Cerrar la conexión con la base de datos
    
    $pendientes->close();