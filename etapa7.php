<!-- Se define el DTD (tipo de página) -->
<!DOCTYPE html>

<!-- Se indica idioma, la codificación y el título de la web-->
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <title>Proyecto 1</title>

        <style> 
            /* Cambia el ancho de la tabla*/ 
            table {
                width: 100%;
            } 

            /* Cambia el borde de la tabla*/ 
            table, th, td {
                border: 2px solid black;
                border-collapse: collapse;
            } 

            /* Estructura el texto*/
            th, td {
                padding: 15px;
                text-align: left;
            } 

            /* Cambia color contenido en números pares de la tabla*/
            #tabla tr:nth-child(even) {
                background-color: #eee;
            } 

            /* Cambia color contenido en números impares de la tabla*/
            #tabla tr:nth-child(odd) {
                background-color: #fff;
            }

            /* Cambia color cabecera de la tabla*/
            #tabla th {
                background-color: lightgrey;
                color: black;
            }  
        </style>

    </head>
    <body> 

        <!-- Se define la tabla donde van a ir las tareas pendientes, en progreso y finalizadas -->
        <table id="tabla"> 
            <tr>
                <th>Tareas Pendientes</th>
                <th>Tareas en Progreso</th>
                <th>Tareas Finalizadas</th>
            </tr>
            <tr>
                <td>
                    <!-- Se define un formulario para que el cliente pueda introducir una ID y una tarea 
                    los datos de este formulario van enlazados a formproyecto.php-->
                    <form method="POST" enctype="application/x-www-form-urlencoded" action="formproyecto.php">
                
                        <fieldset> 
                            <legend>Introducir Tarea Pendiente</legend>
                            <div> <label>ID:(Introducir nº ID secuencial) <br><input name="intid"> </label> </div>
                            <div> <label>Descripción Tarea<br><input name="intpendientes"></label> </div>
                            <div><button type="submit">Introducir Tarea</button></div>                            
                        </fieldset>     
                    </form>
                    

                    <?php

                        /*Ejecutamos un bucle para organizar los id de manera secuencial ascendente
                        comenzando por el valor 0 del archivo pendientes.txt*/
                        $pendientes = fopen ('tareas/pendientes.txt', "rb");
                        
                        $contador = 0;
                        ?>
                        <form  method="POST" enctype="application/x-www-form-urlencoded" action="borrados.php">
                        <div><button type="submit" name="borrarpendientes">Borrar tareas</button></div>
                        <?php
                         while ($lineas =fgets ($pendientes)){
                            list($id, $tarea, $marcado) = explode(";", $lineas);
                            $comprobar = "$id".";"."$tarea".";"."$marcado";
                            $comprobar =trim($comprobar);
                            
                            
                            
                            

                            if($lineas == $contador){
                                if($comprobar != "$id".";"."$tarea".";"."*"){
                                ?>                                        
                                <div><label><?php echo "$id . $tarea";?><input type="checkbox" name="borrado[]" value="<?php echo "$id"?>"></label></div>                                                                
                                <?php                                 
                                }                                                      
                                $contador++;
                                fseek($pendientes,0);
                            }                     
                        }
                        ?>
                        </form>
                        <?php
                        fseek($pendientes,0);
                        

                        fclose ($pendientes);
                    ?>
                </td>
                <td>
                    <?php

                        /*Ejecutamos un bucle para organizar los id de manera secuencial ascendente
                        comenzando por el valor 0 del archivo pendientes.txt*/
                        $pendientes = fopen ('tareas/enprogreso.txt', "rb");

                        $contador = 0;
                        ?>
                        <form  method="POST" enctype="application/x-www-form-urlencoded" action="borrados.php">
                        <div><button type="submit" name="borrarenprogreso">Borrar tareas</button></div>
                        <?php
                        while ($lineas =fgets ($pendientes)){
                            list($id, $tarea, $marcado) = explode(";", $lineas);
                            $comprobar = "$id".";"."$tarea".";"."$marcado";
                            $comprobar =trim($comprobar);
                            
                            
                            
                            

                            if($lineas == $contador){
                                if($comprobar != "$id".";"."$tarea".";"."*"){
                                ?>                                        
                                <div><label><?php echo "$id . $tarea";?><input type="checkbox" name="borrado[]" value="<?php echo "$id"?>"></label></div>                                                                
                                <?php                                 
                                }                                                      
                                $contador++;
                                fseek($pendientes,0);
                            }                     
                        }
                        ?>
                        </form>
                        <?php
                        fseek($pendientes,0);


                        fclose ($pendientes);
                    ?>
                </td>
                <td>
                    <?php

                        #Se define un bucle para leer e imprimir el pantalla el contenido de finalizadas.txt
                        $finalizadas = fopen ('tareas/finalizadas.txt', "rb");
                        while ($lineas =fgets ($finalizadas)) {

                            echo "$lineas <br>";
                        }
                        fclose ($finalizadas);
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>