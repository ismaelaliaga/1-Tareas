<!-- Se define el DTD (tipo de página) -->
<!DOCTYPE html>

<!-- Se indica idioma, la codificación y el título de la web-->
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Proyecto 1</title>
        <link rel="stylesheet" href="css/css.css">
    </head>
    <body>
        <!-- Se define la tabla donde van a ir las tareas pendientes, en progreso y finalizadas -->
        <table id="tabla"> 
            <tr>
                <th><center>Tareas Pendientes</center></th>
                <th><center>Tareas en Progreso</center></th>
                <th><center>Tareas Finalizadas</center></th>
            </tr>
            <tr>
                <td>
                    <?php

                        /*Ejecutamos un bucle para organizar los id de manera secuencial ascendente
                        comenzando por el valor 0 del archivo pendientes.txt
                        Se añade un formulario para para (Borrar o mover las tareas pendientes) mediante checklist
                        */
                        $pendientes = fopen ('tareas/pendientes.txt', "rb");
                        $contador = 0;
                        ?>
                        <form  method="POST" enctype="application/x-www-form-urlencoded" action="tratamiento.php">
                        <?php
                         while ($lineas =fgets ($pendientes)){
                            list($id, $tarea, $marcado) = explode(";", $lineas);
                            $comprobar = "$id".";"."$tarea".";"."$marcado";
                            $comprobar =trim($comprobar);

                            if($lineas == $contador){
                                if($comprobar != "$id".";"."$tarea".";"."*"){
                                ?>                                        
                                <div><label><?php echo "$id . $tarea";?><input type="checkbox" name="tratar[]" value="<?php echo "$id"?>"></label></div>                                                                
                                <?php                                 
                                }                                                      
                                $contador++;
                                fseek($pendientes,0);
                            }                     
                        }
                        ?>
                        <div class="botonesform"><button type="submit" name="borrarpendientes">Borrar tareas</button><button type="submit" name="moveraenprogreso">Mover a En Progreso</button></div>
                        </form>
                        <?php                      
                        fclose ($pendientes);
                        ?>
                </td>
                <td>    
                    <?php
                        //Se añade un formulario para para (Borrar o mover las tareas en progreso) mediante checklist
                        
                        $enprogreso = fopen ('tareas/enprogreso.txt', "rb");
                        ?>
                        <form  method="POST" enctype="application/x-www-form-urlencoded" action="tratamiento.php">
                        <?php
                        while ($lineas =fgets ($enprogreso)){
                            list($id, $tarea, $marcado) = explode(";", $lineas);
                            $comprobar = "$id".";"."$tarea".";"."$marcado";
                            $comprobar =trim($comprobar);  

                            
                                if($comprobar != "$id".";"."$tarea".";"."*"){
                                ?>                                        
                                <div><label><?php echo "$id . $tarea";?><input type="checkbox" name="tratar[]" value="<?php echo "$id"?>"></label></div>                                                                
                                <?php                                 
                                }                                                      
                            }                     

                        ?>
                        <div class="botonesform"><button type="submit" name="borrarenprogreso">Borrar tareas</button><button type="submit" name="moverafinalizadas">Mover a Finalizadas</button></div>
                        </form>
                        <?php

                        fclose ($enprogreso);
                    ?>

                </td>
                <td>
                    <?php

                        #Se define un bucle para leer e imprimir el pantalla el contenido de finalizadas.txt
                        $finalizadas = fopen ('tareas/finalizadas.txt', "rb");
                        while ($lineas =fgets ($finalizadas)) {
                            list($id, $tarea,) = explode(";", $lineas);

                            echo "$id . $tarea <br>";
                        }
                        fclose ($finalizadas);
                    ?>
                </td>
            </tr>
        </table>
        <!-- Se define un formulario para que el cliente pueda introducir una ID y una tarea 
        los datos de este formulario van enlazados a formproyecto.php-->
        <div class="itareas">
            <form method="POST" enctype="application/x-www-form-urlencoded" action="formproyecto.php">                
                <fieldset> 
                    <legend>Introducir Tareas</legend>
                    <div> <label>ID:(Introducir nº ID secuencial) <br><input name="intid"> </label> </div>
                    <div> <label>Descripción Tarea<br><input name="intpendientes"></label> </div>
                    <div><button type="submit">Introducir Tarea</button></div>                            
                </fieldset>
            </form>
        </div>
    </body>
</html>