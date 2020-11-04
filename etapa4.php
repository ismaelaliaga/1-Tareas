<!DOCTYPE html> <!-- Se define tipo de página -->

<html lang="es"><!-- Se indica idioma de la página web -->
    <head><!-- Cabecera de la página -->
        <meta charset="utf-8" /> <!-- Se define la codificación de caracteres -->
        <title>Proyecto 1</title> <!-- Título de la página -->

        <style> 
            table {
                width: 100%;
            } /* Cambia el ancho de la tabla*/ 

            table, th, td {
                border: 2px solid black;
                border-collapse: collapse;
            } /* Cambia el borde de la tabla*/ 

            th, td {
                padding: 15px;
                text-align: left;
            } /* Estructura el texto*/

            #tabla tr:nth-child(even) {
                background-color: #eee;
            } /* Cambia color contenido en números pares de la tabla*/

            #tabla tr:nth-child(odd) {
                background-color: #fff;
            } /* Cambia color contenido en números impares de la tabla*/

            #tabla th {
                background-color: lightgrey;
                color: black;
            }  /* Cambia color cabecera de la tabla*/
        </style> <!-- Se define estructura y colores para los elementos table,th y td -->

    </head><!-- Se define cierre de cabecera -->
    <body> <!-- Se define comienzo del cuerpo de página -->

        <table id="tabla"> <!-- Se define una tabla con un id único -->
            <tr>
                <th>Tareas Pendientes</th>
                <th>Tareas en Progreso</th>
                <th>Tareas Finalizadas</th>
            </tr>
            <tr>
                <td>
                    <?php

                        $pendientes = fopen ('tareas/pendientes.txt', "rb"); #Se abre el documento y se guarda en la variable pendientes
                         while ($lineas =fgets ($pendientes)) { # Se define un bucle que se ejecuta mientras el documento txt tenga contenido por leer
 
                            echo $lineas;# Se imprime la variable líneas
                            echo "<br>";# Se imprime con salto de línea
                        }
                        fclose ($pendientes); # Se cierra el fichero
                    ?>
                </td>
                <td>
                    <?php
                        $enprogreso = fopen ('tareas/enprogreso.txt', "rb"); #Se abre el documento y se guarda en la variable enprogreso
                        while ($lineas =fgets ($enprogreso)) { # Se define un bucle que se ejecuta mientras el documento txt tenga contenido por leer
 
                            echo $lineas;# Se imprime la variable líneas
                            echo "<br>";# Se imprime con salto de línea
                        }
                        fclose ($enprogreso); # Se cierra el fichero
                    ?>
                </td>
                <td>
                    <?php
                        $finalizadas = fopen ('tareas/finalizadas.txt', "rb"); #Se abre el documento y se guarda en la variable finalizadas
                        while ($lineas =fgets ($finalizadas)) { # Se define un bucle que se ejecuta mientras el documento txt tenga contenido por leer
 
                            echo $lineas; # Se imprime la variable líneas
                            echo "<br>"; # Se imprime con salto de línea
                        }
                        fclose ($finalizadas); # Se cierra el fichero
                    ?>
                </td>
            </tr>
        </table> <!-- Se acaba la tabla -->
    
    </body> <!-- Se cierra el cuerpo de la página -->
</html> <!-- Se cierra la página -->