<?php

    function borrartareas($tareasaborrar){
        $contador = count($borrado_pendientes = $_POST["tratar"]);
        $i=0;
        $fichero = fopen ($tareasaborrar, "r+b");
        

        $borrado_fichero = $_POST["tratar"] [$i + 0];

        while ($lineas =fgets ($fichero)){        
            list($id) = explode(";", $lineas);  
                
            if($id == $borrado_fichero){ 
                $chivato=ftell($fichero);
                fseek($fichero,$chivato-2);
                fwrite($fichero,"*");
                $i++;
                if($i<$contador){
                    $borrado_fichero = $_POST["tratar"] [$i + 0];
                }
            }
        }
    }

    function movertareas($tareasaborrar,$tareasamover){
        $contador = count($borrado_pendientes = $_POST["tratar"]);
        $i=0;
        $fichero = fopen ($tareasaborrar, "r+b");
        $ficheromover = fopen ($tareasamover, "a+b");        

        $borrado_fichero = $_POST["tratar"] [$i + 0];

        while ($lineas =fgets ($fichero)){        
            list($id) = explode(";", $lineas);  
                
            if($id == $borrado_fichero){ 
                $chivato=ftell($fichero);
                fseek($fichero,$chivato-2);
                fwrite($fichero,"*");
                fwrite($ficheromover,"$lineas");
                $i++;
                if($i<$contador){
                    $borrado_fichero = $_POST["tratar"] [$i + 0];
                }
            }
        }
        fclose($fichero);
        fclose($ficheromover);
    }
    
    if(isset($_POST["borrarpendientes"])){
        $tareasaborrar = 'tareas/pendientes.txt';
        borrartareas($tareasaborrar);
    }
    if(isset($_POST["borrarenprogreso"])){
        $tareasaborrar = 'tareas/enprogreso.txt';
        borrartareas($tareasaborrar);
    }

    if(isset($_POST["moveraenprogreso"])){
        $tareasamover = 'tareas/enprogreso.txt';
        $tareasaborrar = 'tareas/pendientes.txt';
        movertareas($tareasaborrar,$tareasamover);
    }
    if(isset($_POST["moverafinalizadas"])){
        $tareasamover = 'tareas/finalizadas.txt';
        $tareasaborrar = 'tareas/enprogreso.txt';
        movertareas($tareasaborrar,$tareasamover);
    }
        
        

        



    #Enlace para volver a la aplicación web y mostrar las tareas correctamente
    echo '<a href="etapa7.php">Se ha introducido la tarea correctamente, pulsa aquí para continuar</a>';
    