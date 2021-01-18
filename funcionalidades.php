<?php
    //Se conecta con la base de datos
    include "conexionbd.php";
    //Se introduce la tarea pendiente con su prioridad especificada por el usuario
    if(isset($_POST["inttarea"])){
        $sentencia = $bd->prepare("INSERT INTO `tareas`(`tarea`, `estado`, `prioridad`) VALUES (?, ?, ?)");
        $sentencia->bind_param("sii", $tarea, $estado, $prioridad);
        $tarea = $_POST["intdescripcion"];
        $estado = 0;
        $prioridad = $_POST["intprioridad"];
        $sentencia->execute(); 
    }
    //Se borra la tarea especificada por el usuario
    if(isset($_POST["borrartarea"])){
        $sentenciaborrar = $bd->prepare("DELETE FROM `tareas` WHERE `id` = ?");
        $sentenciaborrar->bind_param("i", $borrartarea2);
        $borrartarea = $_POST["tareas"];
        foreach($borrartarea as $valor){
            $borrartarea2 = $valor;
            $sentenciaborrar->execute();
        }
        
    }
    //Se mueve una tarea a un estado especificado por el usuario
    if(isset($_POST["movertarea"])){
        $sentenciamover = $bd->prepare("UPDATE `tareas` SET `estado` = ? WHERE `id` = ?");
        $sentenciamover->bind_param("ii", $estadotarea, $idmover2);
        $estadotarea = $_POST["intestado"];
        $idmover = $_POST["tareas"];
        foreach($idmover as $valor){
            $idmover2 = $valor;
            $sentenciamover->execute();
        }
        
    }
    //Se redirecciona a la carpeta raíz donde se cargará el archivo index.php
    header("Location: ./");