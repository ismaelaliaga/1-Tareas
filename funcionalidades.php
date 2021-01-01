<?php
    
    include "conexionbd.php";
    if(isset($_POST["inttarea"])){

        $sentencia = $bd->prepare("INSERT INTO `tareas`(`tarea`, `estado`, `prioridad`) VALUES (?, ?, ?)");
        $sentencia->bind_param("sii", $tarea, $estado, $prioridad);
    
        $tarea = $_POST["intdescripcion"];
        $estado = 0;
        $prioridad = $_POST["intprioridad"];
        
        $sentencia->execute(); 
    }

    if(isset($_POST["borrartarea"])){
        $sentenciaborrar = $bd->prepare("DELETE FROM `tareas` WHERE `id` = ?");
        $sentenciaborrar->bind_param("i", $borrartarea);

        $borrartarea = $_POST["tareaborrar"];;

        $sentenciaborrar->execute();
    }

    if(isset($_POST["movertarea"])){
        $sentencia = $bd->prepare("UPDATE `tareas` SET `estado` = ? WHERE `id` = ?");
        $sentencia->bind_param("ii", $estadotarea, $idmover);
    
        $estadotarea = $_POST["intestado"];
        $idmover = $_POST["tareamover"];
        
        
        $sentencia->execute(); 
    }
    
    header("Location: ./");
    die();