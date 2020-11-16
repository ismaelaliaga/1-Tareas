<?php
    
    $contador = count($servicios = $_GET["borrado"]);

    for ($i=0;$i<$contador;$i++){

        $servicios = $_GET["borrado"] [$i + 0];
        echo $servicios;
        echo "<br>";

    }
    

    
    #Enlace para volver a la aplicación web y mostrar las tareas correctamente
    echo '<a href="etapa7.php">Se ha introducido la tarea correctamente, pulsa aquí para continuar</a>';
    