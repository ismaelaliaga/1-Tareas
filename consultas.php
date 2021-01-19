<?php
    //Ejecuta la sentencia para obtener las tareas pendientes
    if($contador==0){
        $consultadesc->bind_param("i", $estadotarea);
        $estadotarea = 0;
        $consultadesc->execute(); 
        $consultadesc->bind_result($id,$tarea,$estado,$prioridad); 
    }
    //Ejecuta la sentencia para obtener las tareas En Progreso
    if($contador==1){
        $estadotarea = 1;
        $consultadesc->execute(); 
        $consultadesc->bind_result($id,$tarea,$estado,$prioridad);
    }
    //Ejecuta la sentencia para obtener las tareas finalizadas
    if($contador==2){
        $consultaasc->bind_param("i", $estadotarea);
        $estadotarea = 2;
        $consultaasc->execute(); 
        $consultaasc->bind_result($id,$tarea,$estado,$prioridad);
    }
    //Muestra en pantalla el contenido de las tareas pendientes o en progreso dependiendo el estado
    if($contador == 0 || $contador ==1){
        while ($consultadesc->fetch()){
            if($prioridad == 0){
            ?><div> <div class="circulobaja"></div><label><?php echo "$id - $tarea"; ?><input type="checkbox" name="tareas[]" value="<?php echo $id; ?>" > </label> </div>
            <?php
            }
            elseif ($prioridad == 1) {
                ?><div> <div class="circulomedia"></div><label><?php echo "$id - $tarea"; ?><input type="checkbox" name="tareas[]" value="<?php echo $id; ?>" > </label> </div>
                <?php 
            }
            elseif ($prioridad == 2) {
                ?><div> <div class="circuloalta"></div><label><?php echo "$id - $tarea"; ?><input type="checkbox" name="tareas[]" value="<?php echo $id; ?>" > </label> </div>
                <?php 
            }

        }
        $contador++;
    }
    //Muestra en pantalla el contenido de las tareas finalizadas
    elseif($contador == 2) {
        while ($consultaasc->fetch()){
            if($prioridad == 0){
            ?><div> <div class="circulobaja"></div><label><?php echo "$id - $tarea"; ?><input type="checkbox" name="tareas[]" value="<?php echo $id; ?>" > </label> </div>
            <?php
            }
            elseif ($prioridad == 1) {
                ?><div> <div class="circulomedia"></div><label><?php echo "$id - $tarea"; ?><input type="checkbox" name="tareas[]" value="<?php echo $id; ?>" > </label> </div>
                <?php 
            }
            elseif ($prioridad == 2) {
                ?><div> <div class="circuloalta"></div><label><?php echo "$id - $tarea"; ?><input type="checkbox" name="tareas[]" value="<?php echo $id; ?>" > </label> </div>
                <?php 
            }

        }
        $contador++;
        //Comprueba que se han mostrado todas las tareas en pantalla y cierra las sentencias preparadas
        if($contador==3){
            $consultadesc->close();
            $consultaasc->close();
        }
    }
        
        

    