<?php
    //Ejecuta la sentencia para obtener las tareas pendientes
    if($contador==0){
        $consultadesc->bind_param("i", $estadotarea);
        $estadotarea = 0;
        $consultadesc->execute(); 
        $consultadesc->bind_result($id,$tarea); 
    }
    //Ejecuta la sentencia para obtener las tareas En Progreso
    if($contador==1){
        $estadotarea = 1;
        $consultadesc->execute(); 
        $consultadesc->bind_result($id,$tarea);
    }
    //Ejecuta la sentencia para obtener las tareas finalizadas
    if($contador==2){
        $consultaasc->bind_param("i", $estadotarea);
        $estadotarea = 2;
        $consultaasc->execute(); 
        $consultaasc->bind_result($id,$tarea);
    }
    //Muestra en pantalla el contenido de las tareas pendientes o en progreso dependiendo el estado
    if($contador == 0 || $contador == 1){
        while ($consultadesc->fetch()){
        echo "$id . $tarea<br>";
        }
        $contador++;
    }
    //Muestra en pantalla el contenido de las tareas finalizadas
    elseif($contador == 2) {
        while ($consultaasc->fetch()){
            echo "$id . $tarea<br>";
        }
        $contador++;
        //Comprueba que se han mostrado todas las tareas en pantalla y cierra las sentencias preparadas
        if($contador==3){
            $consultadesc->close();
            $consultaasc->close();
        }
    }
        
        

    