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
        $sentenciaborrar->bind_param("i", $borrartarea);
        $borrartarea = $_POST["tareaborrar"];
        $sentenciaborrar->execute();
    }
    //Se mueve una tarea a un estado especificado por el usuario
    if(isset($_POST["movertarea"])){
        $sentencia = $bd->prepare("UPDATE `tareas` SET `estado` = ? WHERE `id` = ?");
        $sentencia->bind_param("ii", $estadotarea, $idmover);
        $estadotarea = $_POST["intestado"];
        $idmover = $_POST["tareamover"];
        $sentencia->execute(); 
    }
    //Se redirecciona a la carpeta raíz donde se cargará el archivo index.php
    header("Location: ./");