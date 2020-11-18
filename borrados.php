<?php
<<<<<<< HEAD
    $contador = count($borrado_pendientes = $_POST["borrado"]);
    $i=0;
    $pendientes = fopen ('tareas/pendientes.txt', "r+b");
       

    $borrado_pendientes = $_POST["borrado"] [$i + 0];
    echo "el primer borrado es la id $borrado_pendientes";

    while ($lineas =fgets ($pendientes)){        
        list($id, $tarea) = explode(";", $lineas);
        if($id == $borrado_pendientes){
            echo "escribe<br>";
            fwrite($pendientes,";*");
            $i++;
            if($i<$contador){
                $borrado_pendientes = $_POST["borrado"] [$i + 0];
                echo "Los demas borrados es la id $borrado_pendientes";
            }
        }
    }
        
        
        

        


=======
    
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
    
>>>>>>> 34ea0ddd0699b5fbb055448227769f9d406f5fa9

    #Enlace para volver a la aplicación web y mostrar las tareas correctamente
    echo '<a href="etapa7.php">Se ha introducido la tarea correctamente, pulsa aquí para continuar</a>';
    //while($i<$contador)