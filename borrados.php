<?php
    $contador = count($borrado_pendientes = $_POST["borrado"]);
    $i=0;
    $pendientes = fopen ('tareas/pendientes.txt', "r+b");
       

    $borrado_pendientes = $_POST["borrado"] [$i + 0];

    while ($lineas =fgets ($pendientes)){        
        list($id) = explode(";", $lineas);  
             
        if($id == $borrado_pendientes){ 
            $chivato=ftell($pendientes);
            fseek($pendientes,$chivato-2);
            fwrite($pendientes,"*");
            $i++;
            if($i<$contador){
                $borrado_pendientes = $_POST["borrado"] [$i + 0];
            }
        }
    }
        
        
        

        



    #Enlace para volver a la aplicación web y mostrar las tareas correctamente
    echo '<a href="etapa7.php">Se ha introducido la tarea correctamente, pulsa aquí para continuar</a>';
    