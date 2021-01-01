<?php
    //Preparar sentencias 

    $finalizadas = $bd->prepare("SELECT `id`, `tarea` FROM `tareas` WHERE `estado` = 2 ORDER BY `tarea` ASC");
    $finalizadas->execute();

    //Vincular columnas con variables

    $finalizadas->bind_result($id,$tarea);
    
    //Tratamos los datos devueltos

    while ($finalizadas->fetch()){
        echo "$id . $tarea<br>";
    }

    //Cerrar la conexión con la base de datos
    
    $finalizadas->close();