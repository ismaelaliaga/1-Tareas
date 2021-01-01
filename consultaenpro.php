<?php
    //Preparar sentencias 

    $enprogreso = $bd->prepare("SELECT `id`, `tarea` FROM `tareas` WHERE `estado` = 1 ORDER BY `prioridad` DESC");
    $enprogreso->execute();

    //Vincular columnas con variables

    $enprogreso->bind_result($id,$tarea);
    
    //Tratamos los datos devueltos

    while ($enprogreso->fetch()){
        echo "$id . $tarea<br>";
    }

    //Cerrar la conexión con la base de datos
    
    $enprogreso->close();