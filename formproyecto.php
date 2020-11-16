<?php
    
    $pendientes = fopen ('tareas/pendientes.txt', "a+b");

    #Guardamos el contenido del formulario en variables
    $contador = 0;
    $idform = $_POST["intid"];
    $pendientesform = $_POST["intpendientes"];

    /*Ejecutamos un bucle para organizar los id de manera secuencial ascendente
    comenzando por el valor 0 del archivo pendientes.txt */
    while ($lineas =fgets ($pendientes)){
        list($id, $tarea) = explode(";", $lineas);
        if($lineas == $contador){
            $contador++;
            fseek($pendientes,0);
        }                            
    }

    /*Ejecutamos un bucle para validar que el nº de ID introducido sea correcto
    de no ser correcto automáticamente se le asigna el valor correcto que debería tener
    y avisa al usuario de los cambios producidos*/

    if ($idform != $contador){

        echo "Cuidado! El valor del ID introducido ($idform) tendria que ser ($contador)<br>No te preocupes ya hemos realizado el cambio por ti :)<br>";
        $idform = $contador;

    }

    #Se escribe en el documento pendientes.txt la ID correcta y su tarea
    fwrite ($pendientes, "$idform; $pendientesform".PHP_EOL);
    fclose ($pendientes);

    
    #Enlace para volver a la aplicación web y mostrar las tareas correctamente
    echo '<a href="etapa7.php">Se ha introducido la tarea correctamente, pulsa aquí para continuar</a>';
    