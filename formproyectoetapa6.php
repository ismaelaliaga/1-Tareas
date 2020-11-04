<?php

    $pendientes = fopen ('tareas/pendientes.txt', "a+b");

    #Guardamos el contenido del formulario en variables
    $idform = $_POST["intid"];
    $pendientesform = $_POST["intpendientes"];

    /*Se escribe al final del archivo de pendientes.txt el ID y la tarea introducida por el usuario
    no se realiza validación, si el número es menor o mayor no se muestra en pantalla pero no da ningún aviso*/
    fwrite ($pendientes, " ".PHP_EOL . "$idform; $pendientesform");   
    fclose ($pendientes);

    #Enlace para volver a la aplicación web y mostrar las tareas correctamente
    echo '<a href="etapa6.php">Se ha añadido la tarea correctamente, pulsa aquí para continuar</a>';