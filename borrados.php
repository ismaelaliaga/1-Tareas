<?php
    
    if(isset($_POST["borrar"])){

        $contador = count($borrado_pendientes = $_POST["borrado"]);
        $pendientes = fopen ('tareas/pendientes.txt', "w+b");
                

        for ($i=0;$i<$contador;$i++){
            $borrado_pendientes = $_POST["borrado"] [$i + 0];
            echo "Se van a borrar las siguientes tareas $borrado_pendientes";
            fwrite($pendientes,"$borrado_pendientes*");            
            echo "<br>";
        }

    }        
    

    
    #Enlace para volver a la aplicación web y mostrar las tareas correctamente
    echo '<a href="etapa7.php">Se ha introducido la tarea correctamente, pulsa aquí para continuar</a>';
    