<?php
    //Se prepara la sentencia para mostrar tareas pendientes y en progreso
    //Ordenadas de una prioridad de mayor a menor
    $consultaasc = $bd->prepare("SELECT * FROM `tareas` WHERE `estado` = ? ORDER BY `tarea` ASC"); 
    //Se prepara la sentencia para mostrat las tareas finalizadad
    //Ordenadas de la A a la Z por el contenido de la tarea 
    $consultadesc = $bd->prepare("SELECT * FROM `tareas` WHERE `estado` = ? ORDER BY `prioridad` DESC");
    